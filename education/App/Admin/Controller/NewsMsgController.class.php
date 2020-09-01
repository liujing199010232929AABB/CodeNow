<?php
namespace Admin\Controller;
use Think\Controller;
class NewsMsgController extends BaseController {

	protected $statusArr=array("未审核","已审核");
	protected $m = NULL;
	protected $m_news = NULL;
	protected $m_member = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('news_msg');	
		$this->m_news = M('news');	
		$this->m_member = M('member');	
	}
		
	
	
    public function index(){
		header('Content-Type:text/html;charset=utf-8');


		
/*		for($i=0;$i<100;$i++){
			$temp['mid'] = M('member')->order('rand()')->limit(1)->getField('id');
			$temp['news_id'] = $this->m_news->order('rand()')->limit(1)->getField('id');
			$temp['content'] = '这篇文章第'.rand(1,100).'行写的真好，让我有了身临其境，如沐春风的感觉，真是一篇不可多得的好文章！';
			$temp['status'] = rand(0,1);
			$temp['webip'] = rand(1,255).'.'.rand(1,255).'.'.rand(1,255).'.'.rand(1,255);
			$temp['addtime'] = time()-(86400*rand(1,15))-rand(12345,99999);
			$this->m->add($temp);
		}*/








		//-----------------搜索-------------------
		$sh_q = I('sh_q','');//关键字
		if(!empty($sh_q)){
			$shArray['sh_q'] = $sh_q;
			$map['content'] = array('LIKE','%'.$sh_q.'%');
			$map['_logic'] = 'OR';
			$where['_complex'] = $map;
		}
		
		$sh_news_id = I('sh_news_id');
		if($sh_news_id!=""){
			$shArray['sh_news_id'] = $sh_news_id;
			$where['news_id'] = $sh_news_id;
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
		//-------------------------搜索end-----------------

		$pageno = I('p',1);
		$pageCount = 10;
		$list = $this->m->where($where)->order('status asc , addtime desc')->page($pageno.','.$pageCount)->select();
		foreach($list as $key=>$item){
			$list[$key]['title'] = $this->m_news->where('id='.$item['news_id'])->getField('title');
			$list[$key]['username'] = $item['mid']?$this->m_member->where('id='.$item['mid'])->getField('username'):'游客';
		}
		
		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		$show = $Page->showAdmin();// 分页显示输出
		
		$this->assign('page',$show);// 赋值分页输出	

		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display('News/msg');
    }
	
	

	
	
	public function del(){

		
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