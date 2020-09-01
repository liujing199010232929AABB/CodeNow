<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class CommonController extends BaseController {

	protected $statusArr=array("<font color='#990000'>关闭</font>","<font color='#006600'>开启</font>");	
	protected $m = NULL;

	/**
	 * 初始化
	 */
	public function _initialize(){
		parent::_initialize();
		$this->m = M('common');	
	}

	/**
	 * 管理页面
	 */
    public function index(){
		$dataList = $this->m->select();
		$this->assign('dataList',$dataList);
		$this->assign('statusArr',$this->statusArr);
		$this->display();
    }

	/**
	 * 新增或编辑页面
	 */
    public function edit(){
		$id = I('id',0,"int");
		$dataInfo = $this->m->find($id);
		$category = M('category')->select();

		$this->assign('dataInfo',$dataInfo);
		$this->assign('category',$category);
		$this->display();
    }

	/**
	 * 保存数据
	 */
	public function save(){
		$data=$this->m->create();
		/**第一张图片**/
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

		/**第二张图片**/
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
		    //编辑
		if($data["id"]){
			$this->m->save($data);
			$this->success($GLOBALS['notice']['success'][2],U('index'));
		}else{
			//新增
			$this->m->add($data);
			$this->success($GLOBALS['notice']['success'][2],U('index'));
		}
		exit;
	}

	/**
	 * 删除分页
	 */
	public function del(){
		$id = I('id',0,"int");
			if ($this->m->delete($id)){
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		exit;
	}


	/**
	 * 分页管理
	 */
    public function manage(){
		$id = I('id',0,"int");
		$dataInfo = $this->m->find($id);	//获取分页信息
		$this->assign('dataInfo',$dataInfo);
		$this->display();
    }

	/**
	 * 调用Ueditor
	 */
	public function ueditor(){
		$data = new \Org\Util\Ueditor();
		echo $data->output();
	}	

				
}