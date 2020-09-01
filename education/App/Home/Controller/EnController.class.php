<?php
namespace Home\Controller;
use Think\Controller;
class EnController extends BaseController {

   private $navName  = '英国';

   public function _initialize(){
			parent::_initialize();
			$this->addPrPv();
			$this->assign('mark','en');
			
			$this->d = M('common');
			$this->m = M('news');
			$this->m_class = M('news_class');
			
			//国家图标
			$info        = $this->d->where('id=9')->find();
			$country_pic = $info['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$info['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
			
			$this->assign('navName',$this->navName);
			$this->assign('country_pic',$country_pic);
			
   }

    public function index(){
			
	        //banner
			$info        = $this->d->where('id=9')->find();
			$banner_pic  = $info['pic_paths']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$info['pic_paths']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
			$this->assign('banner_pic',$banner_pic);
				
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; 英国留学';
			$this->assign('navStr',$navStr);
			
			//新闻资讯
			$newslist = $this->m->field('id,title,list_order,status')->where('rid=10 and status=1')->order('list_order desc , id desc')->limit(10)->select();
			foreach($newslist as $key=>$item){
				$newslist[$key]['url']    =  turn_url('en/news_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('newslist',$newslist);
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->limit(12)->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);   
			
			//留学方案
			$planlist = $this->m->field('id,title,introduce,list_order,status')->where('rid=13 and status=1')->order('list_order desc , id desc')->limit(12)->select();
			foreach($planlist as $key=>$item){
				$planlist[$key]['url']    =  turn_url('en/plan_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('planlist',$planlist);
			
			//留学院校
			$schoollist = $this->m->field('id,title,title_en,list_order,status')->where('rid=14 and status=1')->order('list_order desc , id desc')->limit(8)->select();
			foreach($schoollist as $key=>$item){
				$schoollist[$key]['url']    =  turn_url('en/school_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('schoollist',$schoollist);          
			
			
			//美国高中、本科、研究生
			$info1 = $this->d->where('id=10')->getField('introduce');
			$this->assign('url1',U('en/common_view?id=10'));
			$this->assign('info1',!empty($info1)?wap_cv($info1):'<center>暂无信息！</center>');
			
			$info2 = $this->d->where('id=11')->getField('introduce');
			$this->assign('url2',U('en/common_view?id=11'));
			$this->assign('info2',!empty($info2)?wap_cv($info2):'<center>暂无信息！</center>');
			
			$info3 = $this->d->where('id=12')->getField('introduce');
			$this->assign('url3',U('en/common_view?id=12'));
			$this->assign('info3',!empty($info3)?wap_cv($info3):'<center>暂无信息！</center>');
			
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/index';
	  		$this->display('Pages/'.$this->tplName);
    }

	
	public function news_list(){
			  		
			$classname = '新闻资讯';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
			
			$where['rid']     = 10;
			$where['status']  = 1;
						
			$pageno    = I('p',1);
			$pageCount = 10;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();  
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('en/news_view?id='.$item['id'],$this->htmlPower);
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
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    		

			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/news_list';
	  		$this->display('Pages/'.$this->tplName);
    }

			
	public function news_view(){
	   
	        $classname = '新闻资讯';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
	 
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->m->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			$where['rid']    = 10;
			$where['status'] = 1; 
		 
		
			$ids = $this->m->where($where)->getField('id',true); 
						
			if(count($ids)){
				foreach($ids as $item){
					$newsIds[] = $item;
				}
			}
									
			$uid = $this->up_down( $id , $newsIds , 'up');
						
			if($uid){
			$newsInfoU = $this->m->find($uid);
			$title = cnsubstr($newsInfoU['title'],45);
			$strU  =  '<a target="_blank" href="'.turn_url('en/news_view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);	
			
			$did = $this->up_down( $id , $newsIds , 'down');
			
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],45);
			$strD =  '<a target="_blank" href="'.turn_url('en/news_view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);
			
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    	
						
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/news_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}
	
	public function class_list(){
			  		
			$classname = '留学专业';
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
			
			$where['rid']     = 11;
			$where['status']  = 1;
						
			$pageno    = I('p',1);
			$pageCount = 30;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();  
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$datalist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
				$datalist[$key]['introduce']    =  $item['introduce']? $item['introduce'] : '暂无简介';
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
			
			//新闻资讯
			$newslist = $this->m->field('id,title,list_order,status')->where('rid=10 and status=1')->order('list_order desc , id desc')->limit(10)->select();
			foreach($newslist as $key=>$item){
				$newslist[$key]['url']    =  turn_url('en/news_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('newslist',$newslist);
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->limit(12)->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 	

			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/class_list';
	  		$this->display('Pages/'.$this->tplName);
    }

			
	public function class_view(){
	   
	        $classname = '留学专业';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
	 
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->m->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			$where['rid']    = 11;
			$where['status'] = 1; 
		 
		
			$ids = $this->m->where($where)->getField('id',true); 
						
			if(count($ids)){
				foreach($ids as $item){
					$newsIds[] = $item;
				}
			}
									
			$uid = $this->up_down( $id , $newsIds , 'up');
						
			if($uid){
			$newsInfoU = $this->m->find($uid);
			$title = cnsubstr($newsInfoU['title'],45);
			$strU  =  '<a target="_blank" href="'.turn_url('en/class_view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);	
			
			$did = $this->up_down( $id , $newsIds , 'down');
			
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],45);
			$strD =  '<a target="_blank" href="'.turn_url('en/class_view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);	
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    
						
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/news_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}
	
	public function case_list(){
			  		
			$classname = '留学案例';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
			
			$where['rid']     = 12;
			$where['status']  = 1;
						
			$pageno    = I('p',1);
			$pageCount = 10;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();  
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$datalist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
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
			
			//新闻资讯
			$newslist = $this->m->field('id,title,list_order,status')->where('rid=10 and status=1')->order('list_order desc , id desc')->limit(10)->select();
			foreach($newslist as $key=>$item){
				$newslist[$key]['url']    =  turn_url('en/news_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('newslist',$newslist);
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->limit(12)->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 			

			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/case_list';
	  		$this->display('Pages/'.$this->tplName);
    }

			
	public function case_view(){
	   
	        $classname = '留学案例';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
	 
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->m->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			$where['rid']    = 12;
			$where['status'] = 1; 
		 
			$ids = $this->m->where($where)->getField('id',true); 
						
			if(count($ids)){
				foreach($ids as $item){
					$newsIds[] = $item;
				}
			}
									
			$uid = $this->up_down( $id , $newsIds , 'up');
						
			if($uid){
			$newsInfoU = $this->m->find($uid);
			$title = cnsubstr($newsInfoU['title'],45);
			$strU  =  '<a target="_blank" href="'.turn_url('en/case_view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);	
			
			$did = $this->up_down( $id , $newsIds , 'down');
			
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],45);
			$strD =  '<a target="_blank" href="'.turn_url('en/case_view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);	
						
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/case_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}
	
	//留学方案
	public function plan_list(){
			  		
			$classname = '留学方案';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港  &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
			
			$where['rid']     = 13;
			$where['status']  = 1;
						
			$pageno    = I('p',1);
			$pageCount = 10;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();  
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('en/plan_view?id='.$item['id'],$this->htmlPower);
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
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    		

			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/news_list';
	  		$this->display('Pages/'.$this->tplName);
    }

			
	public function plan_view(){
	   
	        $classname = '留学方案';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
	 
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->m->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			$where['rid']    = 13;
			$where['status'] = 1; 
		 
		
			$ids = $this->m->where($where)->getField('id',true); 
						
			if(count($ids)){
				foreach($ids as $item){
					$newsIds[] = $item;
				}
			}
									
			$uid = $this->up_down( $id , $newsIds , 'up');
						
			if($uid){
			$newsInfoU = $this->m->find($uid);
			$title = cnsubstr($newsInfoU['title'],45);
			$strU  =  '<a target="_blank" href="'.turn_url('en/plan_view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);	
			
			$did = $this->up_down( $id , $newsIds , 'down');
			
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],45);
			$strD =  '<a target="_blank" href="'.turn_url('en/plan_view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);
			
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    	
						
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/news_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}
	
	//留学院校
	public function school_list(){
			  		
			$classname = '留学院校';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
			
			$where['rid']     = 14;
			$where['status']  = 1;
						
			$pageno    = I('p',1);
			$pageCount = 10;
			$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();  
			foreach($datalist as $key=>$item){
				$datalist[$key]['url']    =  turn_url('en/school_view?id='.$item['id'],$this->htmlPower);
				$datalist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
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
			
			//新闻资讯
			$newslist = $this->m->field('id,title,list_order,status')->where('rid=10 and status=1')->order('list_order desc , id desc')->limit(10)->select();
			foreach($newslist as $key=>$item){
				$newslist[$key]['url']    =  turn_url('en/news_view?id='.$item['id'],$this->htmlPower);	
			}
			$this->assign('newslist',$newslist);
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->limit(12)->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 			

			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName.'_'.$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
			
			$this->tplName = 'Inc/case_list';
	  		$this->display('Pages/'.$this->tplName);
    }
	
	public function school_view(){
	   
	        $classname = '留学院校';
			$this->assign('classname',$classname);
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
	 
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->m->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			//阅读量
			$date['clicks'] = $dataInfo['clicks']+1;
			$this->m->where('id ='.$id)->save($date);
			
			$this->assign('clicks',$date['clicks']);
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			$where['rid']    = 14;
			$where['status'] = 1; 
		 
		
			$ids = $this->m->where($where)->getField('id',true); 
						
			if(count($ids)){
				foreach($ids as $item){
					$newsIds[] = $item;
				}
			}
									
			$uid = $this->up_down( $id , $newsIds , 'up');
						
			if($uid){
			$newsInfoU = $this->m->find($uid);
			$title = cnsubstr($newsInfoU['title'],45);
			$strU  =  '<a target="_blank" href="'.turn_url('en/school_view?id='.$uid,$this->htmlPower).'" title="'.$newsInfoU['title'].'">'.$title.'</a>';
			}else{
			$strU  =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strU',$strU);	
			
			$did = $this->up_down( $id , $newsIds , 'down');
			
			if($did){
			$newsInfoD = $this->m->find($did);
			$title = cnsubstr($newsInfoD['title'],45);
			$strD =  '<a target="_blank" href="'.turn_url('en/school_view?id='.$did,$this->htmlPower).'" title="'.$newsInfoD['title'].'">'.$title.'</a>';
			}else{
			$strD =  '<a target="_blank" href="javascript:" title="暂无信息">暂无信息</a>';
			}
			$this->assign('strD',$strD);
			
			
			//留学专业
			$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=11 and status=1')->order('list_order desc , id desc')->select();
			foreach($classlist as $key=>$item){
				$classlist[$key]['url']    =  turn_url('en/class_view?id='.$item['id'],$this->htmlPower);
				$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('classlist',$classlist); 
			
			//最新案例
			$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=12 and status=1')->order('list_order desc , id desc')->limit(3)->select();
			foreach($caselist as $key=>$item){
				$caselist[$key]['url']    =  turn_url('en/case_view?id='.$item['id'],$this->htmlPower);
				$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';	
			}
			$this->assign('caselist',$caselist);    	
						
			
			//seo设置
            $this->webConfig['site_name']['val']         =  $dataInfo['title'].'_'.$classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    = ($dataInfo['keywords']?$dataInfo['keywords']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] = ($dataInfo['description']?$dataInfo['description']."|":'').$dataInfo['title'].'|'.$classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/news_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}

	
	
	//美国高中、本科、研究生
	public function common_view(){
	
			$id = I('id',0,'int');
			if(!$id)$this->error('参数有误');
			
			$dataInfo = $this->d->find($id);  
			if(!$dataInfo)$this->error('参数有误');
			
			$classname = $dataInfo['title']; 
			$this->assign('classname',$classname);
			
			$this->assign('dataInfo',$dataInfo); //var_dump($dataInfo);exit;
			$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');
			
			//位置导航
			$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt; 英港 &gt; <a target="_blank" href="'.U('en/index').'" title="'.$this->navName.'">'.$this->navName.'</a> &gt;'. $classname;
			$this->assign('navStr',$navStr); 
				
			//seo设置
            $this->webConfig['site_name']['val']         =  $classname.'_'.$this->navName."_".$this->webConfig['site_name']['val']; 
	        $this->webConfig['keywords_index']['val']    =  $classname.'|'.$this->navName.'|'.$this->webConfig['keywords_index']['val'];
	        $this->webConfig['description_index']['val'] =  $classname.'|'.$this->navName.'|'.$this->webConfig['description_index']['val'];
	        $this->assign('webConfig',$this->webConfig);
	
	        $this->tplName = 'Inc/common_view';
	  		$this->display('Pages/'.$this->tplName);
	
	}
		
}