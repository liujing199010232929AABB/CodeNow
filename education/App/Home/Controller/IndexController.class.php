<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

	public function _initialize(){
		parent::_initialize();
		$this->addPrPv();
		$this->m = M('news');
		$this->m_class  = M('news_class');
        $this->category = $category = M('category')->where(array('is_recommend'=>1))->order('list_order desc')->select();
	    $this->assign('category',$category);
    }

    /**
     * 首页
     */
	public function index(){
        $slide = M('atm');
		//小幻灯片
		$small_slide = $this->getSlide(1);
	    $this->assign('small_slide',$small_slide);

	    //大幻灯片
		$big_slide = $this->getSlide(2);
		$this->assign('big_slide',$big_slide);

		//最新活动
		$activities = $this->getNewsInfo($class_id = 1,$limit = 8);
		$this->assign('activities',$activities);

		//申请经验
		$experience    = $this->getNewsInfo($class_id = 2,$limit = 10);
		$this->assign('experience',$experience);
	  
	    //留学专题
		$study_info = $this->getNewsInfo($class_id = 3,$limit = 8);
	    $this->assign('study_info',$study_info);
	  
	    //聚焦
		$focus_info     = $this->getNewsInfo($class_id = 4,$limit = 7);
		$more_focus_url = U("news/index_list/cid/$class_id");
		$this->assign('more_focus_url',$more_focus_url); //更多聚焦
	  	$this->assign('focus_info',$focus_info);
	  
	    //推荐
		$recommend          = $this->getNewsInfo($class_id = 5,$limit = 7);
		$more_recommend_url = U("news/index_list/cid/$class_id");
		$this->assign('more_recommend_url',$more_recommend_url); //更多推荐
		$this->assign('recommend',$recommend);
	  
	  	//考试
		$exam          = $this->getNewsInfo($class_id = 6,$limit = 7);
		$more_exam_url = U("news/index_list/cid/$class_id");
		$this->assign('more_exam_url',$more_exam_url); //更多推荐
		$this->assign('exam',$exam);

	  	//顾问风采
        $rid        = M('news_config')->where(array('type'=>6))->getField('id');
        $consultant = M('news')->where(array('rid'=>$rid))->order('list_order desc , id desc')->field('id,title,introduce,pic_path,list_order,status')->select();
        $this->assign('count',count($consultant));
        $this->assign('consultant',$consultant);

		//留学专业
		$category = $this->category;
		foreach($category as $vo){
			$map['type']    = 2;//专业
			$map['cate_id'] = $vo['id'];
			$rid  = M('news_config')->where($map)->getField('id');
			$news = M('news')->where(array('rid'=>$rid))->field('id,title,pic_path')->select();
			if($news){
				$profession[] = $news;
			}
		}
		$this->assign('profession',$profession);

	   $this->tplName = 'index';
	   $this->display('Pages/'.$this->tplName);
    }

    /**
     * 获取幻灯片
     * @param $class_id:分类id
     * @return mixed
     */
    private function getSlide($class_id){
        $map['class_id'] = $class_id;
        $map['status']   = 1;
        $slideList = M('atm')->where($map)->order('list_order desc , id desc')->select();
        return $slideList;
    }


    /**
     * 获取新闻信息
     * @param $class_id:分类id
     * @param $limit:显示数目
     * @return mixed
     */
    private function getNewsInfo($class_id,$limit){
        $map['class_id'] = $class_id;
        $map['is_home']  = 1;
        $map['status']   = 1;
        $info = $this->m->field('id,title,introduce,list_order,status')
            ->where($map)
            ->order('list_order desc , id desc')
            ->limit($limit)->select();
        return $info;
    }


}