<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class PhotoController extends BaseController {


	protected $m = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('photo');	
	}
	

    public function index(){
		header('Content-Type:text/html;charset=utf-8');
		
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);// 返回的url// 返回的url
		//-----配置信息-------
		$typeid = I('typeid');
		$this->assign('typeid',$typeid);
		$parentType = I('parentType','pic');
		$this->assign('parentType',$parentType);
		
		

		$parentid = I('parentid',0,'int');
		$PInfo = M($typeid)->find($parentid);//where('id='.$id)->field("id,class_name,pic_path,introduce")
		$this->assign('PInfo',$PInfo);// 赋值数据集
		//------------------------------------

		
		$where = ' typeid=\''.$typeid.'\' and parentid='.$parentid.' and parentType=\''.$parentType.'\' ';
		$pageno = I('p',1);
		$pageCount = 27;
		$list = $this->m->where($where)->order('list_order desc, id asc')->page($pageno.','.$pageCount)->select();


		$this->assign('list',$list);// 赋值数据集
		$count = $this->m->where($where)->count();// 查询满足要求的总记录数
		$this->assign('count',$count);// 赋值分页输出	
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->isOneHide=true;
		$show = $Page->showAdmin();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出
		$this->assign('parentid',$parentid);// 判断上一步
		
		$fileType = I('get.fileType');
		$this->assign('fileType',$fileType);
		$config=C("TMPL_PARSE_STRING");//获取相关配置信息
		$this->assign('upload',$config["__UPLOAD__"]);
		
		$language=cookie('AUTH_USER_LANG');//多语言版本
		$this->assign('language',$language);
		
		$id = I('get.id',0);
		if($id){$dataInfo = $this->m->find($id);$this->assign('dataInfo',$dataInfo);}
		$this->display();
		exit;
    }
	
	public function save(){
		header('Content-Type:text/html;charset=utf-8');
		$data=$this->m->create();
		$back_url=I('post.back_url','strip_tags,htmlspecialchars');

		if($data["id"]){
			$this->m->save($data);
				$this->success($GLOBALS['notice']['success'][2]);//$back_url
			exit;
		}
		$pic_new=I('post.pic_path_new');
		if($pic_new){
			foreach($pic_new as $key=>$item){
				$dateList[$key]["typeid"]=$data["typeid"];
				$dateList[$key]["parentid"]=intval($data["parentid"]);
				$dateList[$key]["parentType"]=$data["parentType"];
				$dateList[$key]["title"]=$data["title"];
				$dateList[$key]["list_order"]=10;
				$dateList[$key]["language"]=$data["language"];
				$dateList[$key]["addtime"]=time();
				$dateList[$key]["islock"]=$data["islock"];
				//$dateList[$key]["pic_path"]=$item;
				$picArr=explode(',',$item);
				$dateList[$key]["pic_path"]=$picArr[1].$picArr[3]; // 实际保存数据库路径地址
				$fromPath=$picArr[0].$picArr[2];//源文件夹
				$ToPath=$picArr[0].$picArr[1];//目标文件夹
				$file[]=$picArr[3];
				$file[]="thumb_".$picArr[3];
				FileSystem::mv($file , $fromPath , $ToPath);
			}
		}else{
			$this->error('您没有上传图片');
		}

		$result=$this->m->addAll($dateList);
		if ($result){
			$this->success($GLOBALS['notice']['success'][0]);//$back_url
		}else{
			$this->error($GLOBALS['notice']['error'][0]);
		}
		exit;
	}
	
	//删除
	public function delList(){
		header('Content-Type:text/html;charset=utf-8');
		
		//$typeid = I('typeid');
		//$parentid = I('parentid',0,'int');
		//$fileType = I('get.fileType');
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$this->baseDelFile('photo',$ids,'pic_path');
			if ($this->m->delete($ids)){
				//$this->success($GLOBALS['notice']['success'][1]);//U('Photo/index?typeid='.$typeid.'&parentid='.$parentid.'&fileType='.$fileType.'')
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
				//$this->error($GLOBALS['notice']['error'][1]);
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		}else{
			$this->error($GLOBALS['notice']['error'][1]);
		}
		exit;
	}
	
	
	
	
	
}