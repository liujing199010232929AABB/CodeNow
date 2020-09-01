<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class StoreController extends BaseController { 

	protected $statusArr=array("锁定","正常");
	protected $m = NULL;
	protected $m_class = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('store');	
	}
		
	
	public function index(){
		header('Content-Type:text/html;charset=utf-8');	
		$pageno = I('p',1);
		$pageCount = 10;
		
		$where['language'] = cookie('AUTH_USER_LANG');
		
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
		$this->assign('statusArr',$this->statusArr);// 留言状态
		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		
		$show = $Page->showAdmin();// 后台分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		
		$this->assign('nameArr',$this->nameArr);// 栏目名称
		$this->display();
    }
	
	
	public function add(){
		
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		
		  //选择地区
		  $region    =  M('regions');
		  $regionList  =  $region->order('id asc')->select(); 
		
		  $rootList	  = array();
		  $cityList   = array();
		  $areaList   = array();      
			
		 foreach ($regionList as $item)
		 {
			if ($item['parent_id']==1)
			{
				$rootList[]	=	$item;
			}
			
			if ($item['parent_id']==15)
			{
				$cityList[]	=	$item;
			}
			
			if ($item['parent_id']==211)
			{
				$areaList[]	=	$item;
			}
		 }
		 
		 $this->assign('rootList',$rootList);
		 $this->assign('cityList',$cityList);
		 $this->assign('areaList',$areaList);

		
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display('store/edit');
    }	
	
	public function edit(){
		
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		
		  //选择地区
		  $region    =  M('regions');
		  $regionList  =  $region->order('id asc')->select(); 
		
		  $rootList	  = array();
		  $cityList   = array();
		  $areaList   = array();      
			
		 foreach ($regionList as $item)
		 {
			if ($item['parent_id']==1)
			{
				$rootList[]	=	$item;
			}
			
			if ($item['parent_id']==$dataInfo['province'])
			{
				$cityList[]	=	$item;
			}
			
			if ($item['parent_id']==$dataInfo['city'])
			{
				$areaList[]	=	$item;
			}
		 }
		 
		 $this->assign('rootList',$rootList);
		 $this->assign('cityList',$cityList);
		 $this->assign('areaList',$areaList);

		
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display();
    }	
	
	
	
	public function save(){
		
		$data = $this->m->create();
		
		$data['language'] = cookie('AUTH_USER_LANG');
		
		$data['addtime'] = $data['addtime']?strtotime($data['addtime']):time();
		
		if($data['id']){
			$this->m->save($data); 
			//$this->success($GLOBALS['notice']['success'][2],I('back_url','','strip_tags'));
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Store/edit','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
		    $result = $this->m->add($data);
			/*if($result)$this->success($GLOBALS['notice']['success'][0],I('back_url','','strip_tags'));//,U('Ad/index')
			else $this->success($GLOBALS['notice']['error'][0]);*/
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Store/edit','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
	
	}
	
	public function del(){

		$ids = I('id');
		
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$this->baseDelFile('atm',$ids,'pic_path');
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
    }
	
	//省、市、区联动	
   public function region_ajax(){
   
      $region  =  M('regions');
      $regionList  =  $region->order('id')->select(); 


	 #取省下的市
	 if ($_POST['action'] == 'getcity')
	 {
		$pid		=	intval($_POST['id']);
		$regionList	=	$region->where('parent_id='.$pid)->order('id')->select();
		$returns	=	'';
		if (!empty($regionList))
		{
			foreach ($regionList as $key=>$item)
			{
				$returns	.=	$key>0?',':'';
				$returns	.=	$item['id'].'-'.$item['name'];
			}
		}
		else
		{
			$returns .= '-请选择';
		}
		die('TRUE#'.$returns);
	 }

	#取市下的区
	elseif ($_POST['action'] == 'getarea')
	{
		$pid		=	intval($_POST['id']);
		$regionList	=	$region->where('parent_id='.$pid)->order('id')->select();
		$returns	=	'';
		if (!empty($regionList))
		{
			foreach ($regionList as $key=>$item)
			{
				$returns	.=	$key>0?',':'';
				$returns	.=	$item['id'].'-'.$item['name'];
			}
		}
		else
		{
			$returns .= '-请选择';
		}
		die('TRUE#'.$returns);
	}
   
   }	
	
}