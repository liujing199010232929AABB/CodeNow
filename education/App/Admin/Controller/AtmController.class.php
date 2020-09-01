<?php
namespace Admin\Controller;
use Think\Controller;
use Myself\FileSystem;
class AtmController extends BaseController { 

	protected $statusArr=array("锁定","正常");
	protected $m = NULL;
	protected $m_class = NULL;
	
	public function _initialize(){
		parent::_initialize();
		$this->m = M('atm');	
		$this->m_class = M('atm_class');	
	}
		
	
	public function index(){
		header('Content-Type:text/html;charset=utf-8');
		$where['language'] = cookie('AUTH_USER_LANG');
		$class_id = I('class_id',0,'int');
		$this->assign('class_id',$class_id);
		if(!$class_id)$this->error($GLOBALS['notice']['warming'][2]);
		$class_str = $this->getNavStrStr($this->m_class->select(),$class_id,'','-',1);
		$where['class_id'] = $class_id;
		$this->assign('class_str',$class_str);
		$list = $this->m->where($where)->order('list_order desc , id')->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display();
    }

	/**
	 * 新增或编辑页面
	 */
	public function edit(){
		$class_id = I('class_id',0,'int');
		$this->assign('class_id',$class_id);
		$class_str = $this->getNavStrStr($this->m_class->select(),$class_id,'','-',1);
		$this->assign('class_str',$class_str);
		$id = I('id',0,'int');
		$dataInfo = $this->m->find($id);
		$this->assign('dataInfo',$dataInfo);
		$this->assign('back_url',I('backurl')?I('backurl','','strip_tags'):$_SERVER['HTTP_REFERER']);
		$this->assign('statusArr',$this->statusArr);// 状态
		$this->display();
    }

	/**
	 * 添加或修改数据
	 */
	public function save(){
		$data = $this->m->create();
		$data['language'] = cookie('AUTH_USER_LANG');
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
		$data['addtime'] = $data['addtime']?strtotime($data['addtime']):time();
		
		if($data['id']){
			$this->m->save($data);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Atm/edit','class_id='.(I('class_id')).'&id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}else{
		    $result = $this->m->add($data);
			$this->redirect('Base/selectPage', array('act'=>'success','title'=>'修改','back_url' => I('back_url'),'jump_url' => U('Atm/edit','class_id='.(I('class_id')).'&id='.(I('id')).'&backurl=' .urlencode(I('back_url')).' ')));
		}
	
	}

	/**
	 * 单选或全选删除
	 */
	public function del(){
		$ids = I('id');
		if($ids){
			if(is_array($ids)){$ids=implode(",",$ids);}
			$this->baseDelFile('atm',$ids,'pic_path');
			if ($this->m->delete($ids)){
				$this->redirect('Base/selectPage', array('act'=>'success','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}else{
				$this->redirect('Base/selectPage', array('act'=>'error','title'=>'删除','back_url' => $_SERVER['HTTP_REFERER'],'jump_url' =>""));
			}
		}else{
			$this->error($GLOBALS['notice']['warming'][1]);
		}		
    }	

	public function ajaxFindNext(){
		$selValue = I('selValue','0','int');
		$areaNextId = I('areaNextId','','int');
		$classList = $selValue?$this->m_class->where('parent_id='.$selValue)->select():array();
		$content = "";
		if(!count($classList)){
			echo 0;exit;
		}else{
			$content .= '<span id="area_'.$areaNextId.'">'."\n\t";
			$content .= '<select class="sel1" name="class_id[]" onchange="javascript:findNext(this.value , '.$areaNextId.')">'."\n\t";
			$content .= '<option value="0">请选择</option>'."\n\t";
			foreach($classList as $item){
			$selectedMark = $selValue==$item['id']?'selected':'';
			$content .= '<option value="'.$item['id'].'" '.$selectedMark.'>'.$item['class_name'].'</option>'."\n\t";
			}
			$content .= '</select>'."\n\t";
			$content .= '</span>'."\n\t";
		
			echo $content;exit;
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

	public function getNavStrStr($allClass,$id,$url='',$flag='-',$depth=1){
		$id = intval($id);
		foreach ($allClass as $item){
			if ($item['id'] == $id){
				if ($item['parent_id']){	//非根分类
						if ($depth){
							return $this->getNavStrStr($allClass,$item['parent_id'],$url,$flag,0)." ".$flag." ".$item['class_name'];
						}else{
							$pos = strpos($url,'?');
							$ext = $pos===false?'?':'&';
							return $this->getNavStrStr($allClass,$item['parent_id'],$url,$flag,0)." ".$flag." ".$item['class_name']."";
						}
				}else{	//根分类
					if ($depth){
						return " ".$flag." ".$item['class_name'];
					}else{
						$pos = strpos($url,'?');
						$ext = $pos===false?'?':'&';
						return " ".$flag." ".$item['class_name']."";
					}
				}
			}	
		}
		return "";
	}


}