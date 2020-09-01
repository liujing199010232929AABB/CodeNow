<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class NewsClassController extends BaseController {


	 protected $m = NULL;
	 protected $m_config = NULL;
	 protected $statusArr=array("锁定","正常");
	 
	 public function _initialize(){
	 		parent::_initialize();
			$this->m = M('news_class');	
			$this->m_config = M('news_config');	//var_dump($_COOKIE['AUTH_USER_NAME']);
	 }
	


    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		
		$where['language'] = cookie('AUTH_USER_LANG');
		//-----配置信息-------
		$rid = I('rid',0,'int');
		$cfg = $this->m_config->find($rid);
		$this->assign('rid',$rid);// 赋值数据集
		$this->assign('cfg',$cfg);	
		//------------------------
		$parentid = I('parentid',0,'int');
		
		$where['rid'] = $rid;
		$where['parent_id'] = $parentid;
		
		
		
		$pageno = I('p',1);
		$pageCount = 15;
		$list = $this->m->where($where)->order('list_order desc, id')->page($pageno.','.$pageCount)->select();
		if($parentid && !$list){
			$this->error('没有相关信息，正在返回类别首页',U('NewsClass/index?rid='.$rid.''));
		}
		foreach($list as $key=>$item){
			$list[$key]["is_parentid"]=$this->m->where('parent_id='.$item["id"].'')->count('id');
		}
		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->isOneHide=true;
		$show = $Page->showAdmin();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('parentid',$parentid);// 判断上一步
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display('News/class');
    }
	
	public function view(){
		header('Content-Type:text/html;charset=utf-8');
		
		$id = I('id',0,"int");
		$rid = I('rid',0,"int");
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->assign('rid',$rid);
		
		$dataInfo = $this->m->find($id);//where('id='.$id)->getField('class_name');
		$this->assign('dataInfo',$dataInfo);// 赋值
		$this->assign('rid',$rid);// 返回的url
		$cfg = $this->m_config->find(intval($rid));
		
		$this->assign('cfg',$cfg);
		//$this->assign('pic_path',$dataInfo["pic_path"]);// 赋值
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		$this->display('News/classEdit');
		exit;
	}
	
	public function saveAll(){ // 批量添加类别名称
		header('Content-Type:text/html;charset=utf-8');

		$data=$this->m->create();
		$class_name=$data["class_name"];
		$class_name_arr=explode("\r\n",$data["class_name"]);
		$class_name_arr=array_filter($class_name_arr);// 过滤空数组
		//$class_name_arr=array_unique($class_name_arr);// 过滤重复
		foreach($class_name_arr as $key=>$item){
			$dateList[$key]["rid"]=intval($data["rid"]);
			$dateList[$key]["class_name"]=$item;
			$dateList[$key]["parent_id"]=intval($data["parent_id"]);
			$dateList[$key]["depth"]=intval($data["depth"]);
			$dateList[$key]["list_order"]=10;
			$dateList[$key]['language'] = cookie('AUTH_USER_LANG');
		}
		$result=$this->m->addAll($dateList);
		//echo $this->m->data($class_name_arr)->addAll();
		if ($result){
			$this->success($GLOBALS['notice']['success'][0]);
		}else{
			$this->error($GLOBALS['notice']['error'][0]);
		}
	}
	
	public function save(){ // 修改类别信息
		header('Content-Type:text/html;charset=utf-8');
		$data=$this->m->create();
		
		$data['language'] = cookie('AUTH_USER_LANG');
		$pic_new=I('post.pic_path_new');
		if($pic_new){
			$config=C("TMPL_PARSE_STRING");//获取相关配置信息
			$pic=$data['pic_path'];
			$picArr=explode(',',$pic_new);
			$data['pic_path']=$picArr[1].$picArr[3]; // 实际保存数据库路径地址
			$fromPath=$picArr[0].$picArr[2];//源文件夹
			$ToPath=$picArr[0].$picArr[1];//目标文件夹
			$file[]=$picArr[3];
			$file[]="thumb_".$picArr[3];
			FileSystem::mv($file , $fromPath , $ToPath);
			$delpic=$config["__AFILE__"].$pic;
			FileSystem::rm($delpic);//删除原图
		}
		
		$pic_new1=I('post.pic_paths_new');
		if($pic_new1){
			$config=C("TMPL_PARSE_STRING");//获取相关配置信息
			$pic1=$data['pic_paths'];
			$picArr=explode(',',$pic_new1);
			$data['pic_paths']=$picArr[1].$picArr[3]; // 实际保存数据库路径地址
			$fromPath=$picArr[0].$picArr[2];//源文件夹
			$ToPath=$picArr[0].$picArr[1];//目标文件夹
			$file[]=$picArr[3];
			$file[]="thumb_".$picArr[3];
			FileSystem::mv($file , $fromPath , $ToPath);
			$delpic=$config["__AFILE__"].$pic1;
			FileSystem::rm($delpic);//删除原图
		}
		
		$back_url=I('post.back_url','strip_tags,htmlspecialchars');
		if($data["id"]){
			$this->m->save($data);
			$this->success($GLOBALS['notice']['success'][2],$back_url);
			//$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('NewsClass/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
			$this->m->add($data);
			//$this->success($GLOBALS['notice']['success'][0],$back_url);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'操作','back_url' => I('back_url'),'jump_url' => U('NewsClass/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
		exit;
	}
	
	//删除
	public function delList(){
		header('Content-Type:text/html;charset=utf-8');
		
		$parentid = I('parentid',0,'int');
		$pageno = I('p',1,"int");
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$parent_count = $this->m->where('parent_id in('.$ids.')')->count();// 查询子级
			if($parent_count){$this->error('请先删除当前信息下的所有子级在删除当前信息',"",5);exit;}
			$this->baseDelFile('news_class',$ids,'pic_path');
			if ($this->m->delete($ids)){
				//$this->m->where('parent_id in('.$ids.')')->setField("parent_id",0);
				//$this->success($GLOBALS['notice']['success'][1]);// U('NewsClass/index?p='.$pageno.'&parentid='.$parentid.'')
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
				//$this->error($GLOBALS['notice']['error'][1]);
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][1]);
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
	}
	
	
	
	
	
}