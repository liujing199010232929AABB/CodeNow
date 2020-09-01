<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class AtmConfigController extends BaseController {

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
		
		$where['parent_id'] = I('parentid',0,'int');
		
		$list = $this->m->where($where)->order('list_order desc, id asc')->select();
		if($parentid && !$list){
			$this->error('没有相关信息，正在返回...',U('AtmClass/index'));
		}
		foreach($list as $key=>$item){
			$list[$key]["is_child"]=$this->m->where('parent_id='.$item["id"].'')->getField('count(*)');
		}
		
		
		$this->assign('list',$list);// 赋值
		
		$this->assign('showType',$this->showType);// 赋值
		$this->display('Atm/config');
    }
	
	public function view(){
		header('Content-Type:text/html;charset=utf-8');
		
		$id = I('id',0,"int");
		$this->assign('statusArr',$this->statusArr);// 状态
		
		$dataInfo = $this->m->find($id);
		$this->assign('showType',$this->showType);// 赋值
		$this->assign('dataInfo',$dataInfo);// 赋值
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		$this->display('Atm/configEdit');
	}
	
	public function saveAll(){ // 批量添加类别名称
		header('Content-Type:text/html;charset=utf-8');
		

		$data=$this->m->create();
		$class_name=$data["class_name"];
		$class_name_arr=explode("\r\n",$data["class_name"]);
		$class_name_arr=array_filter($class_name_arr);// 过滤空数组
		//$class_name_arr=array_unique($class_name_arr);// 过滤重复
		foreach($class_name_arr as $key=>$item){
			$dateList[$key]["class_name"]=$item;
			$dateList[$key]["parent_id"]=intval($data["parent_id"]);
			$dateList[$key]["depth"]=intval($data["depth"]);
			$dateList[$key]["list_order"]=10;
		}
		$result=$this->m->addAll($dateList);
		$this->success($GLOBALS['notice']['success'][0]);
		exit;
	}
	
	public function save(){ // 修改类别信息
		header('Content-Type:text/html;charset=utf-8');
		
		$data=$this->m->create();

		$back_url=I('post.back_url','strip_tags,htmlspecialchars');
		if($data["id"]){
				$this->m->save($data);
				//$this->success($GLOBALS['notice']['success'][2],$back_url);
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('AtmConfig/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
				$this->m->add($data);
				//$this->success($GLOBALS['notice']['success'][0],$back_url);
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'操作','back_url' => I('back_url'),'jump_url' => U('AtmConfig/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
		exit;
	}
	
	//删除
	public function delList(){
		header('Content-Type:text/html;charset=utf-8');
		
		$parentid = I('parentid',0,'int');
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$parent_count = $this->m->where('parent_id in('.$ids.')')->count();// 查询子级
			if($parent_count){$this->error('请先删除当前信息下的所有子级在删除当前信息',"",5);exit;}
			$this->baseDelFile('atm_class',$ids,'pic_path');
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