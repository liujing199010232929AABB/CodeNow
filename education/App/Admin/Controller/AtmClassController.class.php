<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class AtmClassController extends BaseController {

	 protected $m = NULL;
	 protected $m_atm = NULL;
	 protected $showType = NULL;

	 public function _initialize(){
	 		parent::_initialize();
			$this->m = M('atm_class');	
			$this->m_atm = M('atm');	
			$this->showType = C('ATM');	
	 }

    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		//获取mr_atm表数据
		$list = $this->m->order('list_order desc, id asc')->select();
		foreach($list as $key=>$item){
			//获取下级分类
			$list[$key]["is_child"]=$this->m->where('parent_id='.$item["id"])->getField('count(*)');
			//获取图片数量
			$list[$key]["atm_count"]=$this->m_atm->where('class_id='.$item["id"].' and language="'.cookie('AUTH_USER_LANG').'"')->getField('count(*)');
		}
		$this->assign('list',$list);// 赋值
		$this->assign('showType',$this->showType);// 赋值
		$this->display('Atm/class');
    }
	
	public function view(){
		header('Content-Type:text/html;charset=utf-8');
		
		$id = I('id',0,"int");
		$this->assign('statusArr',$this->statusArr);// 状态
		
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);// 赋值
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		$this->display('Atm/classEdit');
	}
	
	
	
	
	
}