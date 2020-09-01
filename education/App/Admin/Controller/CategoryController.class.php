<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class CategoryController extends BaseController {
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('category');
	}
		
	
	public function index(){
		header('Content-Type:text/html;charset=utf-8');
		$list = $this->m->order('list_order desc, id asc')->select();
		$this->assign('list',$list);
		$this->display();
    }

	/*
	 * 显示编辑或删除页面
	 */
	public function edit(){
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);
		$this->display();
    }

	/**
	 * 新增或保存数据
	 */
	public function save(){
		$data = $this->m->create();
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
		if($data['id']){
			$this->m->save($data);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Category/edit','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
		    $result = $this->m->add($data);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Category/edit','id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
	
	}

	/**
	 * 单选删除或多选删除
	 */
	public function del(){
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$this->baseDelFile('category',$ids,'pic_path'); //删除照片
			if ($this->m->delete($ids)){                    //删除数据
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
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