<?php
namespace Admin\Controller;
use Think\Controller;
class NewsConfigController extends BaseController {

	protected $m = NULL;
	protected $showArr=array("第一种","第二种","第三种");
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('news_config');	
	}
	


    public function index(){
		$dataList = $this->m->select();
		$this->assign('dataList',$dataList);
		$this->assign('showArr',$this->showArr);// 状态
		$this->display('News/config');
		
    }
	

		
	public function edit(){
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		//选择分类
		$category = M('category')->select();
		$this->assign('category',$category);
		$this->assign('showArr',$this->showArr);
		$this->display('News/configEdit');
    }		
		
	
	
	
	public function save(){
		
		$temp = $this->m->create();
		if($temp['id']){
			$this->m->save($temp); 
			//$this->success($GLOBALS['notice']['success'][2],U('NewsConfig/index'));
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => U('NewsConfig/index'),'jump_url' => U('NewsConfig/edit','rid='.(I('rid')).'&id='.(I('id')).'&backurl=' .urlencode(U('NewsConfig/index')).' ')));
		}else{	
			$temp['addtime'] = time();
		    $result = $this->m->add($temp);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => U('NewsConfig/index'),'jump_url' => U('NewsConfig/edit','rid='.(I('rid')).'&id='.(I('id')).'&backurl=' .urlencode(U('NewsConfig/index')).' ')));
		}
	
	}
		
		
		
	public function del(){

		
		$id = I('id','','int');
		
		if($id){
			if ($this->m->delete($id)){
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