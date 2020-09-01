<?php
namespace Home\Controller;
use Think\Controller;
class CountryController extends BaseController {
	public function _initialize(){
		parent::_initialize();
		$this->addPrPv();
		$this->assign('mark','usa');

		$this->d = M('common');
		$this->m = M('news');
		$this->m_class = M('news_class');
        $this->rid     = I('rid',0,'int');  // news_config表id
		$this->cate_id = $cate_id = I('cate_id',0,'int');
		$info = M('category')->where(array('id'=>$cate_id))->find();
        $this->assign('rid',$this->rid);
        $this->assign('cate_id',$this->cate_id);
        $this->assign('nav_name',$info['cate_name']);   //留学国家名字
		$this->assign('country_pic',$info['pic_path']); //留学国家图片


	}

	public function index(){
		//banner
		$info        = $this->d->where('id=8')->find();
		$banner_pic  = $info['pic_paths']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$info['pic_paths']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
		$this->assign('banner_pic',$banner_pic);

		//位置导航
		$navStr = '<a target="_blank" href="'.U('index/index').'" title="网站首页">网站首页</a> &gt;'. $this->nav_name;
		$this->assign('navStr',$navStr);

		//新闻资讯
		$newslist = $this->m->field('id,title,list_order,status')->where('rid=5 and status=1')->order('list_order desc , id desc')->limit(10)->select();
		foreach($newslist as $key=>$item){
			$newslist[$key]['url']    =  turn_url('usa/news_view?id='.$item['id'],$this->htmlPower);
		}
		$this->assign('newslist',$newslist);

		//留学专业
		$classlist = $this->m->field('id,title,title_en,pic_path,list_order,status')->where('rid=6 and status=1')->order('list_order desc , id desc')->limit(12)->select();
		foreach($classlist as $key=>$item){
			$classlist[$key]['url']    =  turn_url('usa/class_view?id='.$item['id'],$this->htmlPower);
			$classlist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
		}
		$this->assign('classlist',$classlist);

		//最新案例
		$caselist = $this->m->field('id,title,introduce,pic_path,list_order,status')->where('rid=7 and status=1')->order('list_order desc , id desc')->limit(3)->select();
		foreach($caselist as $key=>$item){
			$caselist[$key]['url']    =  turn_url('usa/case_view?id='.$item['id'],$this->htmlPower);
			$caselist[$key]['pic']    =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
		}
		$this->assign('caselist',$caselist);

		//留学方案
		$planlist = $this->m->field('id,title,introduce,list_order,status')->where('rid=8 and status=1')->order('list_order desc , id desc')->limit(12)->select();
		foreach($planlist as $key=>$item){
			$planlist[$key]['url']    =  turn_url('usa/plan_view?id='.$item['id'],$this->htmlPower);
		}
		$this->assign('planlist',$planlist);

		//留学院校
		$schoollist = $this->m->field('id,title,title_en,list_order,status')->where('rid=9 and status=1')->order('list_order desc , id desc')->limit(8)->select();
		foreach($schoollist as $key=>$item){
			$schoollist[$key]['url']    =  turn_url('usa/school_view?id='.$item['id'],$this->htmlPower);
		}
		$this->assign('schoollist',$schoollist);


		//美国高中、本科、研究生
		$info1 = $this->d->where('id=5')->getField('introduce');
		$this->assign('url1',U('usa/common_view?id=5'));
		$this->assign('info1',!empty($info1)?wap_cv($info1):'<center>暂无信息！</center>');


		$info2 = $this->d->where('id=6')->getField('introduce');
		$this->assign('url2',U('usa/common_view?id=6'));
		$this->assign('info2',!empty($info2)?wap_cv($info2):'<center>暂无信息！</center>');

		$info3 = $this->d->where('id=7')->getField('introduce');
		$this->assign('url3',U('usa/common_view?id=7'));
		$this->assign('info3',!empty($info3)?wap_cv($info3):'<center>暂无信息！</center>');

		$this->tplName = 'Inc/index';
		$this->display('Pages/'.$this->tplName);
	}

    /**
     * 新闻资讯
     */
	public function news_list(){
		$classname = '新闻资讯';
		$this->assign('classname',$classname);

		$where['rid']     = $this->rid;
		$where['status']  = 1;
		$pageno    = I('p',1);
		$pageCount = 10;
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

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit='');
        $this->assign('classlist',$classlist);

        //最新案例
        $caselist  = $this->get_right_content($type=5,$limit=3);
        $this->assign('caselist',$caselist);


		$this->tplName = 'Inc/news_list';
		$this->display('Pages/'.$this->tplName);
	}


    /**
     * 新闻详情
     */
	public function news_view(){
		$classname = '新闻资讯';
		$this->assign('classname',$classname);
		$id = I('id',0,'int');
		if(!$id) $this->error('参数有误');
		$dataInfo = $this->m->find($id);
		if(!$dataInfo) $this->error('参数有误');
		//阅读量
		$date['clicks'] = $dataInfo['clicks']+1;
		$this->m->where('id ='.$id)->save($date);

		$this->assign('clicks',$date['clicks']);
		$this->assign('dataInfo',$dataInfo);
		$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');

        //获取相关id
        $news_ids = $this->get_news_ids();
		//上一页
		$up_id = $this->up_down( $id , $news_ids , 'up');
		if($up_id){
			$newsInfoU = $this->m->find($up_id);
			$up_title = cnsubstr($newsInfoU['title'],45);
			$this->assign('up_id',$up_id);
			$this->assign('up_title',$up_title);
		}
		//下一页
		$down_id = $this->up_down( $id , $news_ids , 'down');
		if($down_id){
			$newsInfoD = $this->m->find($down_id);
			$down_title = cnsubstr($newsInfoD['title'],45);
			$this->assign('down_id',$down_id);
			$this->assign('down_title',$down_title);
		}

		//留学专业
        $classlist = $this->get_right_content($type=2,$limit='');
        $this->assign('classlist',$classlist);

        //最新案例
        $caselist  = $this->get_right_content($type=5,$limit=3);
        $this->assign('caselist',$caselist);

		$this->tplName = 'Inc/news_view';
		$this->display('Pages/'.$this->tplName);
	}



    /***
     * 获取右侧列表内容
     * @param string $type
     * @param string $limit
     * @return mixed
     */
    private function get_right_content($type='',$limit=''){
        $map['type']     = $type; //留学案例
        $map['cate_id']  = $this->cate_id;
        $rid             = M('news_config')->where($map)->getField('id');
        $fields          = 'id,title,introduce,pic_path,list_order,status';
        $order           = 'list_order desc , id desc';
        $where['rid']    = $rid;
        $where['status'] = 1;
        $content = $this->m->field($fields)->where($where)->order($order)->limit($limit)->select();
        return $content;
    }

    /**
     * 相关news的ids
     */
    private function get_news_ids(){
        $where['rid']    = $this->rid;
        $where['status'] = 1;
        $ids = $this->m->where($where)->getField('id',true);
        if(count($ids)){
            foreach($ids as $item){
                $news_ids[] = $item;
            }
        }
        return $news_ids;
    }


    /**
     * 留学专业
     */
	public function class_list(){
		$classname = '留学专业';
        $this->assign('classname',$classname);

		$where['rid']     = $this->rid;
		$where['status']  = 1;
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

		//新闻资讯
        $newslist = $this->get_right_content($type=1,$limit=10);
		$this->assign('newslist',$newslist);

		//留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);


		$this->tplName = 'Inc/class_list';
		$this->display('Pages/'.$this->tplName);
	}

    /**
     * 留学专业详细
     */
	public function class_view(){
		$classname = '留学专业';
		$this->assign('classname',$classname);

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

        $news_ids = $this->get_news_ids();
        //上一页
        $up_id = $this->up_down( $id , $news_ids , 'up');
        if($up_id){
            $newsInfoU = $this->m->find($up_id);
            $up_title = cnsubstr($newsInfoU['title'],45);
            $this->assign('up_id',$up_id);
            $this->assign('up_title',$up_title);
        }

        //下一页
        $down_id = $this->up_down( $id , $news_ids , 'down');
        if($down_id){
            $newsInfoD = $this->m->find($down_id);
            $down_title = cnsubstr($newsInfoD['title'],45);
            $this->assign('down_id',$down_id);
            $this->assign('down_title',$down_title);
        }

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

		//最新案例
        $caselist = $this->get_right_content($type=5,$limit=3);
		$this->assign('caselist',$caselist);

		$this->tplName = 'Inc/news_view';
		$this->display('Pages/'.$this->tplName);

	}

    /**
     * 留学案例
     */
	public function case_list(){
		$classname = '留学案例';
		$this->assign('classname',$classname);

		$where['rid']     = 7;
		$where['status']  = 1;

		$pageno    = I('p',1);
		$pageCount = 10;
		$datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();
		foreach($datalist as $key=>$item){
			$datalist[$key]['url']    =  turn_url('usa/case_view?id='.$item['id'],$this->htmlPower);
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
        $newslist = $this->get_right_content($type=1,$limit=10);
        $this->assign('newslist',$newslist);

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

		$this->tplName = 'Inc/case_list';
		$this->display('Pages/'.$this->tplName);
	}

    /**
     * 留学案例详细
     */
	public function case_view(){
		$classname = '留学案例';
		$this->assign('classname',$classname);

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

        $news_ids = $this->get_news_ids();
        //上一页
        $up_id = $this->up_down( $id , $news_ids , 'up');
        if($up_id){
            $newsInfoU = $this->m->find($up_id);
            $up_title = cnsubstr($newsInfoU['title'],45);
            $this->assign('up_id',$up_id);
            $this->assign('up_title',$up_title);
        }

        //下一页
        $down_id = $this->up_down( $id , $news_ids , 'down');
        if($down_id){
            $newsInfoD = $this->m->find($down_id);
            $down_title = cnsubstr($newsInfoD['title'],45);
            $this->assign('down_id',$down_id);
            $this->assign('down_title',$down_title);
        }

		$this->tplName = 'Inc/case_view';
		$this->display('Pages/'.$this->tplName);

	}

	//留学方案
	public function plan_list(){
		$classname = '留学方案';
		$this->assign('classname',$classname);

		$where['rid']     = $this->rid;
		$where['status']  = 1;

		$pageno    = I('p',1);
		$pageCount = 10;
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

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

        //最新案例
        $caselist = $this->get_right_content($type=5,$limit=3);
        $this->assign('caselist',$caselist);

		$this->tplName = 'Inc/news_list';
		$this->display('Pages/'.$this->tplName);
	}


	public function plan_view(){
		$classname = '留学方案';
		$this->assign('classname',$classname);

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

        $news_ids = $this->get_news_ids();
        //上一页
        $up_id = $this->up_down( $id , $news_ids , 'up');
        if($up_id){
            $newsInfoU = $this->m->find($up_id);
            $up_title = cnsubstr($newsInfoU['title'],45);
            $this->assign('up_id',$up_id);
            $this->assign('up_title',$up_title);
        }

        //下一页
        $down_id = $this->up_down( $id , $news_ids , 'down');
        if($down_id){
            $newsInfoD = $this->m->find($down_id);
            $down_title = cnsubstr($newsInfoD['title'],45);
            $this->assign('down_id',$down_id);
            $this->assign('down_title',$down_title);
        }

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

        //最新案例
        $caselist = $this->get_right_content($type=5,$limit=3);
        $this->assign('caselist',$caselist);

		$this->tplName = 'Inc/news_view';
		$this->display('Pages/'.$this->tplName);

	}

	//留学院校
	public function college_list(){

		$classname = '留学院校';
		$this->assign('classname',$classname);

		$where['rid']     = $this->rid;
		$where['status']  = 1;

		$pageno    = I('p',1);
		$pageCount = 10;
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

        //新闻资讯
        $newslist = $this->get_right_content($type=1,$limit=10);
        $this->assign('newslist',$newslist);

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

		$this->tplName = 'Inc/case_list';
		$this->display('Pages/'.$this->tplName);
	}

	public function school_view(){
		$classname = '留学院校';
		$this->assign('classname',$classname);

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

        $news_ids = $this->get_news_ids();
        //上一页
        $up_id = $this->up_down( $id , $news_ids , 'up');
        if($up_id){
            $newsInfoU = $this->m->find($up_id);
            $up_title = cnsubstr($newsInfoU['title'],45);
            $this->assign('up_id',$up_id);
            $this->assign('up_title',$up_title);
        }

        //下一页
        $down_id = $this->up_down( $id , $news_ids , 'down');
        if($down_id){
            $newsInfoD = $this->m->find($down_id);
            $down_title = cnsubstr($newsInfoD['title'],45);
            $this->assign('down_id',$down_id);
            $this->assign('down_title',$down_title);
        }

        //留学专业
        $classlist = $this->get_right_content($type=2,$limit=12);
        $this->assign('classlist',$classlist);

        //最新案例
        $caselist = $this->get_right_content($type=5,$limit=3);
        $this->assign('caselist',$caselist);

		$this->tplName = 'Inc/news_view';
		$this->display('Pages/'.$this->tplName);

	}

	//高中、本科、研究生
	public function common_view(){
		$id = I('id',0,'int');
		if(!$id)$this->error('参数有误');

		$dataInfo = $this->d->find($id);
		if(!$dataInfo)$this->error('参数有误');

		$classname = $dataInfo['title'];
		$this->assign('classname',$classname);

		$this->assign('dataInfo',$dataInfo);
		$this->assign('content',wap_cv($dataInfo['content'])? wap_cv($dataInfo['content']):'<center>本栏目暂无资料，感谢您的关注...</center>');


		$this->tplName = 'Inc/common_view';
		$this->display('Pages/'.$this->tplName);
	}

}