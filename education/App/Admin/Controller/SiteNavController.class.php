<?php
namespace Admin\Controller;
use Think\Controller;
class SiteNavController extends BaseController {
	
	protected $statusArr=array("关闭","开放");
	protected $m = NULL;
	protected $m_para = NULL;
	public function _initialize(){
		parent::_initialize();
		$this->m = M('web_nav');	
	}
	
    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		$where['language'] = cookie('AUTH_USER_LANG');
		//------------------------
		$parentid = I('parentid',0,'int');
		$parentinfo = $this->m->find($parentid);
		$where = ' parent_id='.intval($parentid ).' ';
		$pageno = I('p',1);
		$pageCount = 10;
		$list = $this->m->where($where)->order('list_order desc, id asc')->page($pageno.','.$pageCount)->select();
		if($parentid && !$list){
			$this->error('没有相关信息，正在返回类别首页',U('Site/nav'));
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
		$this->assign('parentid',$parentid);// 所选父分类ID
		$this->assign('parentinfo',$parentinfo);// 所选父分类信息
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display('Site/nav');
    }
	
	public function view(){
		header('Content-Type:text/html;charset=utf-8');
		
		$id = I('id',0,"int");
		$this->assign('statusArr',$this->statusArr);// 状态
		
		$dataInfo = $this->m->find($id);//where('id='.$id)->getField('class_name');
		$this->assign('dataInfo',$dataInfo);// 赋值
		
		//$this->assign('pic_path',$dataInfo["pic_path"]);// 赋值
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		$this->display('Site/navEdit');
	}
	
	public function saveAll(){ // 批量添加类别名称
		header('Content-Type:text/html;charset=utf-8');

		$data=$this->m->create();
		$class_name=$data["class_name"];
		$class_name_arr=explode("\r\n",$data["class_name"]);
		$class_name_arr=array_filter($class_name_arr);// 过滤空数组
		foreach($class_name_arr as $key=>$item){
			$tempArray = explode('|',$item);
		
			$dateList[$key]["class_name"]=$tempArray[0];
			$dateList[$key]["link_url"]=$tempArray[1];
			$dateList[$key]["parent_id"]=intval($data["parent_id"]);
			$dateList[$key]["depth"]=intval($data["depth"]);
			$dateList[$key]["list_order"]=10;
			$dateList[$key]['language'] = cookie('AUTH_USER_LANG');
		}
		$result=$this->m->addAll($dateList);
		//echo $this->m->data($class_name_arr)->addAll();
		if ($result){
			$this->success($GLOBALS['notice']['success'][4]);
		}else{
			$this->error($GLOBALS['notice']['error'][4]);
		}
	}
	
	public function save(){ // 修改类别信息
		header('Content-Type:text/html;charset=utf-8');
		$data=$this->m->create();
		
		$data['language'] = cookie('AUTH_USER_LANG');
		$back_url=I('post.back_url','strip_tags,htmlspecialchars');
		if($data["id"]){
				$this->m->save($data);
				//$this->success($GLOBALS['notice']['success'][2],$back_url);
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('SiteNav/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
			$data["addtime"]=time();
			$this->m->add($data);
			//$this->success($GLOBALS['notice']['success'][0],$back_url);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'操作','back_url' => I('back_url'),'jump_url' => U('SiteNav/view','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
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
	}


	
	
	
	
	
	
	
	
	
	
	
	
	
}