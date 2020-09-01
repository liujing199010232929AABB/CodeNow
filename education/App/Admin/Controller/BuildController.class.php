<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\File;
class BuildController extends BaseController {


	 protected $m = NULL;
	 protected $m_config = NULL;
	 protected $m_send = NULL;
	 
	 public function _initialize(){
	 		parent::_initialize();
			$this->m = M('admin_language');	
			$this->m_config = M('admin_config');	
			$this->m_send = M('admin_emailcontent');	
	 }
	
    public function index(){

	    $powerArray = array("<font color='#ff0000'>关</font>","<font color='#006600'>开</font>");
		
		$this->assign('powerArray',$powerArray);// 赋值数据集
		
		$this->display();
    }
	
	
	
    public function langShow(){

		
		$dataList = $this->m->order('list_order desc , id asc')->select();
		
		$this->assign('dataList',$dataList);// 赋值数据集
		$this->display('langShow');
    }	
	
	public function langEdit(){
		
		
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		
		$this->assign('dataInfo',$dataInfo);
		
		$this->display('langEdit');
    }		
			
	public function langSave(){
		
		$temp = $this->m->create();
		if($temp['id']){
			$this->m->save($temp); 
			$this->success($GLOBALS['notice']['success'][2],U('Build/langShow'));
		}else{	
		    $result = $this->m->add($temp); 
			if($result)$this->success($GLOBALS['notice']['success'][0],U('Build/langShow'));
			else $this->error($GLOBALS['notice']['error'][0]);
		}
	
	}	
	
	public function langDel(){

		
		$id = I('id',0,'int');
		
		
		if($id){
			
			if($id==1){
				$this->error('默认语言不能删除...');
			}
		
		
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
	
	
	
	public function langAjaxList(){
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
	
	
	
    public function sendShow(){

		
		$dataList = $this->m_send->order('id asc')->select();
		
		$this->assign('dataList',$dataList);// 赋值数据集
		$this->display('sendShow');
    }	
		

	
	public function sendAjaxList(){
		header('Content-Type:text/html;charset=utf-8');
		$info = I('post.');
		$data[$info["fieldName"]] = $info["Val"];
		$data["id"] = $info["id"];
		
		if ($this->m_send->save($data)){
			echo "success";
		}else{
			echo "error";
		}
		exit;
	}	
		
	
	public function sendEdit(){
		
		$id = I('id',0,'int');
		$dataInfo = $this->m_send->find($id);
		
		$this->assign('dataInfo',$dataInfo);
		
		$this->display('sendEdit');
    }		
			
	public function sendSave(){
		
		$temp = $this->m_send->create();
		if($temp['id']){
			$this->m_send->save($temp); 
			$this->success($GLOBALS['notice']['success'][2],U('Build/sendShow'));
		}else{	
		    $result = $this->m_send->add($temp); 
			if($result)$this->success($GLOBALS['notice']['success'][0],U('Build/sendShow'));
			else $this->error($GLOBALS['notice']['error'][0]);
		}
	
	}
	
	
	public function changePower(){
	
		$temp = $this->m_config->create();
		
		
		
		$field = I('field');
		
		$val = I('val',0,'int');
		$val = $val?0:1;
		
		$temp['id'] = 1;
		$temp['is_'.$field] = $val;
		$this->m_config->save($temp);
		$this->redirect('Build/index');
	
	}
	
	
	
	
	public function creatHtml(){
		$htmlArray = C('HTML');
		if(!C('CREAT_HTML')){
			//echo U('Index/addMain');
			//echo "您没有开启静态缓存，请配置“common/conf/config.php”文件";exit;
			$this->error('您没有开启静态缓存！',U('Index/addMain'));
		}
		$markArray = array();
		$isInfo = false;    ////是否存在可生成静态页面的信息
		
		foreach($htmlArray as $key=>$item){
			$theCount = M($item['model'])->where(array('language'=>cookie('AUTH_USER_LANG')))->getField('count(*)');
			if($theCount){
				$isInfo = true;
				$markArray[] = $key;
			}else{
				unset($htmlArray[$key]);
			}
		}
		if(!$isInfo){
			//$this->error('暂无任何信息可生成静态页面，填点资料再过来吧!!!');
			echo "暂无任何信息可生成静态页面，填点资料再过来吧!!!";exit;
		}
		$this->assign('markArray',$markArray);
		$this->assign('htmlArray',$htmlArray);
	
	
		$this->display('Build/creatHtml');
	}
	
	
	
	public function startCreat(){
	
		$htmlArray = C('HTML');
		
		$mark = I('mark');
		$startid = I('get.startid',0,'int');
		$endid = I('get.endid',0,'int');
		if($endid>0){
			$limitNum=$startid.",".$endid;
		}
		if(!$htmlArray[$mark])die(0);
		//$ids = M($htmlArray[$mark]['model'])->where(array('language'=>cookie('AUTH_USER_LANG')))->field('id')->select();
		//$htmlIds  = json_encode($ids);
		//$htmlUrl  = str_replace('admin.php','index.php',U(ucfirst(strtolower(cookie('AUTH_USER_LANG'))).'/'.$htmlArray[$mark]['url']));
		
		$where=$htmlArray[$mark]['where'];
		$where['language']=cookie('AUTH_USER_LANG');
		$htmlArr["ids"] = M($htmlArray[$mark]['model'])->where($where)->field('id')->limit($limitNum)->select();
		$htmlArr["htmlUrl"]  = str_replace('admin.php','index.php',U(ucfirst(strtolower(cookie('AUTH_USER_LANG'))).'/'.$htmlArray[$mark]['url']));
		$htmlJson  = json_encode($htmlArr);
		$htmlPath = ucfirst(strtolower(cookie('AUTH_USER_LANG'))).'/'.$htmlArray[$mark]['htmlpath'];
		foreach($htmlArr["ids"] as $item){//$ids
			File::delFile(__PHYSICS__.'/Html/'.$htmlPath.'/view-'.$item['id'].'.html');
		}
		//File::deleteDir(__PHYSICS__.'/App/Html/'.$htmlPath.'/');
		echo $htmlJson;
		exit;
		die($htmlIds.'@*#'.$htmlUrl);
	}	
	
	
	
	public function creatMobileHtml(){
		
		$htmlArray = C('HTML_MOBILE');
	
		$markArray = array();
		$isInfo = false;    ////是否存在可生成静态页面的信息
		
		foreach($htmlArray as $key=>$item){
			$theCount = M($item['model'])->where(array('is_mobile'=>1,'language'=>cookie('AUTH_USER_LANG')))->getField('count(*)');
			if($theCount){
				$isInfo = true;
				$markArray[] = $key;
			}else{
				unset($htmlArray[$key]);
			}
		}
		
		if(!$isInfo){
			$this->error('暂无任何信息可生成静态页面，填点资料再过来吧!!!');
		}
		
		$this->assign('markArray',$markArray);
		$this->assign('htmlArray',$htmlArray);
	
		$this->display('Build/creatMobileHtml');
	}	
	
	public function startMobileCreat(){

		$htmlArray = C('HTML_MOBILE');
		
		$mark = I('mark');
		$startid = I('get.startid',0,'int');
		$endid = I('get.endid',0,'int');
		if($endid>0){
			$limitNum=$startid.",".$endid;
		}
		if(!$htmlArray[$mark])die(0);
		$where=$htmlArray[$mark]['where'];
		$where['is_mobile']=1;
		$where['language']=cookie('AUTH_USER_LANG');
		$htmlArr["ids"] = M($htmlArray[$mark]['model'])->where($where)->field('id')->limit($limitNum)->select();
		$htmlArr["htmlUrl"]  = str_replace('admin.php','index.php',U(ucfirst(strtolower(cookie('AUTH_USER_LANG'))).'m/'.$htmlArray[$mark]['url']));
		$htmlJson  = json_encode($htmlArr);
		$htmlPath = ucfirst(strtolower(cookie('AUTH_USER_LANG'))).'/Mobile/'.$htmlArray[$mark]['htmlpath'];
		foreach($htmlArr["ids"] as $item){//$ids
			File::delFile(__PHYSICS__.'/Html/'.$htmlPath.'/view-'.$item['id'].'.html');
		}
		//File::deleteDir(__PHYSICS__.'/App/Html/'.$htmlPath.'/');
		echo $htmlJson;
		exit;
		die($htmlIds.'@*#'.$htmlUrl);
	
	}
	
	public function clearCache(){
		if($this->_clearRuntime('Cache')){
			$this->success('清理成功！',U('Index/addMain'));
		}else{
			$this->error('没有可清除的缓存！',U('Index/addMain'));
		}
	}
	
	public function clearLogs(){
		if($this->_clearRuntime('Logs')){
			$this->success('清理成功！',U('Index/addMain'));
		}else{
			$this->error('没有可清除的日志！',U('Index/addMain'));
		}
	}
	
	public function _clearRuntime($CPath='Cache'){
		$fileArr=File::GetFile(__PHYSICS__.'/Runtime/'.$CPath);
		//var_dump($fileArr);
		$this->checkUser();
		if($fileArr){
			foreach($fileArr as $item){
				File::deleteDir(__PHYSICS__.'/Runtime/'.$CPath.'/'.$item);
			}
			return true;
		}else{
			return false;
		}
	}
	
}