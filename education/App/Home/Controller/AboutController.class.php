<?php

namespace Home\Controller;

use Think\Controller;

class AboutController extends BaseController {



   private $navName = '关于我们';

   

   public function _initialize(){

   		 parent::_initialize();

		 $this->addPrPv();

		 $this->assign('mark','about');

		 $this->m = M('news');

			

   }



   public function index(){

	  	 	 

		 $data      = M('common');

		 $id        = I('id',1,'int');

		 if(empty($id)){ $this->error('抱歉，参数错误！');}

		 

		 $info      = $data->where('id='.$id)->find();

		 if(empty($info)){ $this->error('抱歉，参数错误！');}

		 $classname = $info['title'];

		 $content   = !empty($info['content'])?wap_cv($info['content']):'<center>暂无信息！</center>';

		 

		 $this->assign('id',$id);

		 $this->assign('info',$info);

		 $this->assign('content',$content);

		 $this->assign('classname',$classname);	

		 if($id==3){ $this->tplName = 'contact'; }

		 else{ $this->tplName = 'about'; }

		 $this->display('Pages/'.$this->tplName);

    }

	

   //顾问风采	

   public function consultant(){
	    $map['type'] = 6;//顾问风采
		$rid         = M('news_config')->where($map)->getField('id');
		$where['rid']      = $rid;
		$where['status']   = 1;
		//类信息
		$classname = '顾问风采';
		$this->assign('rid',$rid);
		$this->assign('classname',$classname);

		$pageno    = I('p',1);
		$pageCount = 30;
		$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();

		$this->assign('datalist',$datalist);        // 赋值数据集
		$count = $this->m->where($where)->count(); //查询满足要求的总记录数
		$Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
		$Page->setConfig('first','首页');
		$Page->setConfig('prev','上一页');
		$Page->setConfig('next','下一页');
		$Page->setConfig('last','末页');
		$Page->setConfig('rollPage',8);      // 分页数字按钮数量

		$show = $Page->show();               // 分页显示输出
		$this->assign('page',$show?$show:'');// 赋值分页输出

		$this->tplName = 'consultant';
		$this->display('Pages/'.$this->tplName);

    }



			

	public function view(){

	

			$id = I('id',0,'int');

			if(!$id)$this->error('参数有误');

			

			$dataInfo = $this->m->find($id);  

			if(!$dataInfo)$this->error('参数有误');

			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;

			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');

			$this->assign('pic',$dataInfo['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$dataInfo['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif'); 

			

			

			$rid  =  $dataInfo['rid'];

			$where['rid'] = $rid;

			$where['status'] = 1; 

			

			//类信息

			$classname = '顾问风采'; 

			$this->assign('rid',$rid);

			$this->assign('classname',$classname);

		

			$ids = $this->m->where($where)->getField('id',true); 

						

			if(count($ids)){

				foreach($ids as $item){

					$newsIds[] = $item;

				}

			}

									

			$uid = $this->up_down( $id , $newsIds , 'up');

						

			if($uid){

			$newsInfoU = $this->m->find($uid);

			$title = cnsubstr($newsInfoU['title'],35);

			$strU  =  '<a target="_blank" href="'.turn_url('about/view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';

			}else{

			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';

			}

			$this->assign('strU',$strU);	

			

			$did = $this->up_down( $id , $newsIds , 'down');

			

			if($did){

			$newsInfoD = $this->m->find($did);

			$title = cnsubstr($newsInfoD['title'],35);

			$strD =  '<a target="_blank" href="'.turn_url('about/view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';

			}else{

			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';

			}

			$this->assign('strD',$strD);	

						

			

			//seo设置

            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 

	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];

	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];

	        $this->assign('webConfig',$this->webConfig);

	

	        $this->tplName = 'consultant_view';

	  		$this->display('Pages/'.$this->tplName);

	

	}

	

}