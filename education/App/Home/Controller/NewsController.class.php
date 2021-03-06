<?php

namespace Home\Controller;

use Think\Controller;

class NewsController extends BaseController {
    private $navName = '新闻中心';

	public function _initialize(){
		parent::_initialize();
		$this->addPrPv();
		$this->assign('mark','news');
		$this->m = M('news');
		$this->m_class = M('news_class');
    }
	/***
	 * 根据分类id 获取新闻分类信息
	 */
	public function index_list(){
			$cid = I('cid',0,"int");
			if($cid==0)$this->error('参数有误');
			$where['class_id'] = $cid;
			$where['status']   = 1;
			$info      = $this->m_class->where('id ='.$cid)->find();
			$classname = $info['class_name'];
			$this->assign('cid',$cid);
			$this->assign('classname',$classname);
			$pageno    = I('p',1);
			$pageCount = 10;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('news/view?id='.$item['id'],$this->htmlPower);
			}
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

			$this->tplName = 'news_list';
	  		$this->display('Pages/'.$this->tplName);

    }

	public function view(){
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			$dataInfo = $this->m->find($id);  //获取新闻信息
			if(!$dataInfo)$this->error('参数有误');
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			//分配数据
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
		//查找新闻分类信息
		$cid  =  $dataInfo['class_id'];
			$where['class_id'] = $cid;
			$where['status'] = 1;

			$info      = $this->m_class->where('id ='.$cid)->find();
			$classname = $info['class_name'];
			//分配数据
			$this->assign('cid',$cid);
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
			$title = cnsubstr($newsInfoU['title'],50);
			$strU  =  '<a target="_blank" href="'.turn_url('news/view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);
			$did = $this->up_down( $id , $newsIds , 'down');
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],50);
			$strD =  '<a target="_blank" href="'.turn_url('news/view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);	

						

			

			//seo设置

            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 

	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];

	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];

	        $this->assign('webConfig',$this->webConfig);

	

	        $this->tplName = 'news_view';

	  		$this->display('Pages/'.$this->tplName);

	

	}

		

}