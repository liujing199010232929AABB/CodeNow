<?php

namespace Home\Controller;

use Think\Controller;

class BaseController extends Controller {
	public $defaultLang = 'cn';
	public $tplName = NULL;
	public $webConfig = array();
	public $htmlPower = NULL;
	public $member = NULL;

	public function _initialize(){
		header('Content-Type:text/html;charset=utf-8');
		$this->webConfig = require(COMMON_PATH."Conf/site.".$this->defaultLang.".php");
		$this->assign('webConfig',$this->webConfig);
		$this->htmlPower = C('CREAT_HTML');
		$this->assign('htmlPower',$this->htmlPower);  //静态页开关

		/**获取首页导航数据**/
		$category = M('category')->where(array('is_recommend'=>1))->order('list_order desc')->limit(6)->select();
		foreach($category as $key=>$vo){
			$navigation[$key]['cate_id']   = $vo['id']; //分类名称
			$navigation[$key]['cate_name'] = $vo['cate_name']; //分类名称
			$navigation[$key]['pic_path']  = $vo['pic_path'];	 //分类图片
			$navigation[$key]['common'] = M('common')->where(array('cate_id'=>$vo['id']))->select();      //common数据
			$navigation[$key]['news']   = M('news_config')->where(array('cate_id'=>$vo['id']))->select(); //news数据
		}

		$this->assign('navigation',$navigation);

		//新闻中心
		$newsLists = M('news_class')->where('rid=2 and status=1')->order('list_order desc,id')->select();
		$this->assign('newsLists',$newsLists);


        //二维码
		$slide = M('atm');
		$codeList = $slide->where('class_id=5 and status=1')->order('list_order desc , id')->limit(3)->select();
		foreach($codeList as $key=>$item){
				$codeList[$key]['pic']    = $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
			}
		$this->assign('codeList',$codeList);

   }


    /**
     * 记录Pr,PV
     */
   public function addPrPv(){
  		$mpr = M('guest_pr');
		$mpv = M('guest_pv');
		$guest['addtime'] = strtotime(date('Y-m-d'));
		$guest['ip']      = getIp();
		$mpv->add($guest);
		$isAdd = $mpr->where($guest)->getField('count(*)');
		if(!$isAdd)$mpr->add($guest);
   }


	/**
	 * 上一页 或 下一页
	 * @param $id
	 * @param $arr
	 * @param $flag
	 * @return bool
	 */
	public function up_down( $id , $arr , $flag){
		$arr_key_max = count($arr)-1;
		$id_key = array_search($id,$arr);
		if($flag=="up"){    //上一页
		  $uid =  $id_key==0?false:$arr[$id_key-1];
		  return $uid;
		}
		if($flag=="down"){  //下一页
		  $did =  $id_key==$arr_key_max?false:$arr[$id_key+1];
		  return $did;
		}
	}


    /**
     * 验证码验证
     */
	public function baseValid(){
	    $config = require( __PHYSICS__."/Common/Conf/valid_index.php");
		if(!$config['codeSet'])unset($config['codeSet']);
		if(!$config['zhSet'])unset($config['zhSet']);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}


    /**
     * @param $valid:验证码
     * @return bool: true 或 false
     */
	public function bascCheckValid($valid){
		$config = require( __PHYSICS__."/Common/Conf/valid_admin.php");
		$verify = new \Think\Verify($config);
		return $verify->check($valid);
	}

	


}