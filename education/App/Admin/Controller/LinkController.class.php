<?php
//namespace Think;
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class LinkController extends BaseController {
	
	protected $nameArr=array("","友情链接","切换图片","广告");
	protected $statusArr=array("锁定","开放");
	protected $m = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('link');	
	}
		
	
	
	
    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		
		$where['language'] = cookie('AUTH_USER_LANG');
		
		$classid = I('classid',1,'int');
		$where['classid'] = $classid;
		$this->assign('classid',$classid);
		
		$pageno = I('p',1);
		$pageCount = 10;
		
		$sh_q = I('sh_q','');
		if(!empty($sh_q)){
			$shArray['sh_q'] = $sh_q;
			$where['title'] = array('LIKE','%'.$sh_q.'%');
		}
		
		$sh_status = I('sh_status');
		if($sh_status!=""){
			$shArray['sh_status'] = $sh_status;
			$where['status'] = $sh_status;
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
		
		$list = $this->m->where($where)->order('addtime desc')->page($pageno.','.$pageCount)->select();
		
		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		
		$show = $Page->showAdmin();// 后台分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->assign('nameArr',$this->nameArr);// 栏目名称
		$this->display();
    }
	
	public function view(){
		header('Content-Type:text/html;charset=utf-8');
		
		$classid = I('classid',1,'int');
		$where['classid'] = $classid;
		$this->assign('classid',$classid);
		
		$id = I('id',0,"int");
		
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);// 赋值
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->assign('nameArr',$this->nameArr);// 栏目名称
		$this->display();
	}
	
	public function save(){
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
		
		
		if($data["id"]){
			$back_url=I('back_url');
			$this->m->save($data);
			//$this->success($GLOBALS['notice']['success'][2],$back_url);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Link/view','classid='.(I('classid')).'&id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
			$data["addtime"]=time();
			$this->m->add($data);
			//$this->success($GLOBALS['notice']['success'][0],U('Link/index'));
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'添加','back_url' => I('back_url'),'jump_url' => U('Link/view','classid='.(I('classid')).'&id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
		exit;
	}
	
	//删除
	public function del(){
		header('Content-Type:text/html;charset=utf-8');
		
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			if ($this->m->delete($ids)){
				//$this->success($GLOBALS['notice']['success'][1]);
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
				//$this->error($GLOBALS['notice']['error'][1]);
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][1]);
		}
		exit;
	}
	
	
	public function ajaxList(){
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