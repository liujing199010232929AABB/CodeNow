<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class NewsController extends BaseController {

	protected $statusArr=array("关闭","开放");
	protected $statusArr1=array("待发布","待解决","已解决"); //留言咨询
	protected $isHome=array("未推荐","已推荐");
	protected $isMobile=array("未同步","已同步");
	protected $m = NULL;
	protected $m_class = NULL;
	protected $m_config = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('news');	
		$this->m_class = M('news_class');	
		$this->m_config = M('news_config');	
	}
		
		
    public function index(){

		header('Content-Type:text/html;charset=utf-8');
		
		$where['language'] = cookie('AUTH_USER_LANG');
		
		$rid = I('rid',0,'int');
		if($rid)$where['rid'] = $rid;
		$cfg = $this->m_config->find($rid);

		$this->assign('cfg',$cfg);
		$this->assign('rid',$rid);
		//-----------------搜索-------------------
		$sh_q = I('sh_q','');//关键字
		if(!empty($sh_q)){
			$shArray['sh_q'] = $sh_q;
			$map['id'] = $sh_q;
			$map['title'] = array('LIKE','%'.$sh_q.'%');
			$map['_logic'] = 'OR';
			$where['_complex'] = $map;
		}
		
		if($cfg['is_class']){
			$content = "";
			$classIds = I('class_id');
			foreach($classIds as $key=>$item){
				if(!$item)continue;
				$content .= 'findNext('.$item.','.$key.');';
				$where[]   = ' FIND_IN_SET ('.$item.',class_id) ';
			}
			
			$this->assign('content',$content);
			$whereA['parent_id'] = 0;
			$whereA['rid'] = $rid;
			$whereA['language'] = cookie('AUTH_USER_LANG');
			$classList = $this->m_class->where($whereA)->order('list_order desc')->select();
			$this->assign('classList',$classList);
			
		}
		
		$from_time = I('from_time','');
		$to_time = I('to_time','');
		  
		if($from_time){
			$from_time_s = strtotime($from_time);
			$where['addtime']= array('EGT',$from_time_s);
			$shArray['from_time'] = $from_time;
		}
		
		if($to_time){
			$to_time_s = strtotime($to_time)+86400;
			$where['addtime']= array('ELT',$to_time_s);
			$shArray['to_time'] = $to_time;	
		}		
		
		if($from_time && $to_time){
			$where['addtime']=array(array('EGT',$from_time_s),array('ELT',$to_time_s),'and');
		}	
			  
			  
			  
			  
		$this->assign('shArray',$shArray);// 搜索参数输出
		//-------------------------搜索end-----------------

		$pageno = I('p',1);
		$pageCount = 10;
		$list = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();
		foreach($list as $key=>$item){
			$classIds = explode(',',$item['class_id']);
			foreach($classIds as $aa){
				$tempArray[] = $this->m_class->where('id="'.$aa.'"')->getField('class_name');
			}
			$list[$key]['class_name'] = implode(' - ',$tempArray);
			unset($tempArray);
		}		
		
		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->showAdmin();// 分页显示输出
		
		$this->assign('page',$show);// 赋值分页输出	

		
		$this->assign('isHome',$this->isHome);// 首页推荐
		$this->assign('isMobile',$this->isMobile);// Mobile同步
		
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display(); 
		
    }
	
	
	public function edit(){
		
		
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		

		$rid = I('rid',0,'int');
		$cfg = $this->m_config->find($rid);
		$this->assign('rid',$rid);
		$this->assign('cfg',$cfg);
		$this->assign('rid',$rid);		
		
		if($cfg['is_class']){
			$content = "";
			$classIds = explode(',',$dataInfo['class_id']?$dataInfo['class_id']:cookie( "COOK_CID"));
			
			foreach($classIds as $key=>$item){
				if(!$item)continue;
				$content .= 'findNext('.$item.','.$key.');';
			}
			$this->assign('content',$content);
			$whereA['parent_id'] = 0;
			$whereA['rid'] = $rid;
			$whereA['language'] = cookie('AUTH_USER_LANG');
			$classList = $this->m_class->where($whereA)->order('list_order desc')->select();
			$this->assign('classList',$classList);
		}

		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->assign('isHome',$this->isHome);// 首页推荐
		$this->assign('isMobile',$this->isMobile);// Mobile同步
		
		$this->assign('statusArr',$this->statusArr);
		
		$this->display(); 
    }	
	
	
	
	public function save(){
		
		$temp = $this->m->create();
		
		$temp['language'] = cookie('AUTH_USER_LANG');
		
		$pic_new=I('post.pic_path_new');
		if($pic_new){
			$config=C("TMPL_PARSE_STRING");//获取相关配置信息
			$pic=$temp['pic_path'];
			$picArr=explode(',',$pic_new);
			$temp['pic_path']=$picArr[1].$picArr[3]; // 实际保存数据库路径地址
			$fromPath=$picArr[0].$picArr[2];//源文件夹
			$ToPath=$picArr[0].$picArr[1];//目标文件夹
			$file[]=$picArr[3];
			$file[]="thumb_".$picArr[3];
			FileSystem::mv($file , $fromPath , $ToPath);
			$delpic=$config["__AFILE__"].$pic;
			FileSystem::rm($delpic);//删除原图
		}
		$file_new=I('post.file_path_new');
		if($file_new){
			$config=C("TMPL_PARSE_STRING");//获取相关配置信息
			$pic=$temp['file_path'];
			$picArr=explode(',',$file_new);
			$temp['file_path']=$picArr[1].$picArr[3]; // 实际保存数据库路径地址
			$fromPath=$picArr[0].$picArr[2];//源文件夹
			$ToPath=$picArr[0].$picArr[1];//目标文件夹
			$file[]=$picArr[3];
			FileSystem::mv($file , $fromPath , $ToPath);
			$delpic=$config["__AFILE__"].$pic;
			FileSystem::rm($delpic);//删除原图
		}

		$temp['addtime'] = $temp['addtime']?strtotime($temp['addtime']):time();
		$temp['class_id'] = implode(',',$temp['class_id']);
		if($temp['id']){
			$this->m->save($temp); 
			//$this->success($GLOBALS['notice']['success'][2],I('back_url','','strip_tags')); // I('back_url','','strip_tags,htmlspecialchars')
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('News/edit','rid='.(I('rid')).'&id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
			cookie( "COOK_CID", $temp['class_id']);    /////选取分类记忆
		    $result = $this->m->add($temp);
			/*if($result)$this->success($GLOBALS['notice']['success'][0],I('back_url','','strip_tags'));//,U('News/index')
			else $this->error($GLOBALS['notice']['error'][0]);*/
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'添加','back_url' => I('back_url'),'jump_url' => U('News/edit','rid='.(I('rid')).'&backurl=' .urlencode(I('back_url')).'' )));
		}
	
	}
	
	public function del(){
		
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$this->baseDelFile('news',$ids,'pic_path');
			if ($this->m->delete($ids)){
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
				//$this->success($GLOBALS['notice']['success'][1]);
			}else{
				//$this->error($GLOBALS['notice']['error'][1]);
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][1]);
		}		
    }	

	public function upClass(){
	
		$ids = I('id');
		$class_id = array_filter(I('class_id'));

		if(!$ids)$this->error('您没有选中信息');
		if(empty($class_id))$this->error('您没有选中信息');
		if($ids && !empty($class_id)){
			if(is_array($ids)){$ids=implode(",",$ids);}
			if(is_array($class_id)){$class_id=implode(",",$class_id);}
			if ($this->m->where('id in ('.$ids.')')->setField('class_id',$class_id)){
				$this->success($GLOBALS['notice']['success'][2]);
			}else{
				$this->error($GLOBALS['notice']['error'][2]);
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][2]);
		}		
    }
	
	public function addtime(){
	
		$ids = I('id');
		$addtime = I('addtime');
		
		if(empty($addtime))$this->error('请填写修改时间');
		
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			
			if ($this->m->where('id in ('.$ids.')')->setField('addtime',strtotime($addtime))){
				$this->success($GLOBALS['notice']['success'][2]);
			}else{
				$this->error($GLOBALS['notice']['error'][2]);
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][2]);
		}		
    }		
	
	
	
	public function ajaxFindNext(){
	
		
	
		$selValue = I('selValue','0','int');
		$areaNextId = I('areaNextId','','int');
		$dom = I('dom','area');
		
		
	
	
		$classList = $selValue?$this->m_class->where('parent_id='.$selValue)->select():array();
		
		$content = "";
		
		
		
		if(!count($classList)){
			echo 0;exit;
		}else{
		
			$content .= '<span id="'.$dom.'_'.$areaNextId.'">'."\n\t";
			$content .= '<select class="sel1" name="class_id[]" onchange="javascript:findNext(this.value , '.$areaNextId.',\''.$dom.'\')">'."\n\t";
			$content .= '<option value="0">请选择</option>'."\n\t";
			foreach($classList as $item){
			$selectedMark = $selValue==$item['id']?'selected':'';
			$content .= '<option value="'.$item['id'].'" '.$selectedMark.'>'.$item['class_name'].'</option>'."\n\t";
			}
			$content .= '</select>'."\n\t";
			$content .= '</span>'."\n\t";
		
			echo $content;exit;
		
		}
	
	
	
	
	}
	
		
	
	public function ajaxListInput(){
		header('Content-Type:text/html;charset=utf-8');
		$info = I('post.');
		$data[$info["fieldName"]] = $info["Val"];
		$data["id"] = $info["id"];
		if ($this->m->save($data)){
			echo "success";
		}else{
			echo "error";
		}
		exit;
	}
	
	
	
	
}