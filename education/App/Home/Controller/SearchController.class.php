<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends BaseController {


   public function _initialize(){
   		parent::_initialize();
		$this->addPrPv();
		$this->m = M('news');
		$this->m_class = M('news_class');
		session_start();		
   }

    public function index(){
	  
	   $navName = '搜索结果';
	   $keywords = I('keyword','');
	   
	   if($keywords !='')
       {  $_SESSION['keyword'] = $keywords ;}
	   
	   if($_SESSION['keyword'] =='')
	   {
	     header("Location: ".__ROOT__); 
         exit;
	   }
	   $this->assign('keywords',$_SESSION['keyword']); 
	   
	   $pageno    = I('p',1);
	   $pageCount = 10;
	   $where     = 'title like "%'.$_SESSION['keyword'].'%" and rid in (2,3)';
	   $datalist  = $this->m->where($where)->order('list_order desc , id desc')->page($pageno.','.$pageCount)->select();
	   foreach($datalist as $key=>$item){
	       switch ($item['rid']){
		    case 2:
			     $datalist[$key]['url'] = turn_url('news/view?id='.$item['id'],$this->htmlPower);
			     break;
		    case 3:
			     $datalist[$key]['url'] = turn_url('yimin/view?id='.$item['id'],$this->htmlPower);
			     break;
		    default:
		         $datalist[$key]['url'] = 'javascript:';
		   }
		   
		   $cid = $item['class_id'];
		   $datalist[$key]['classname']  = $this->m_class->where('id='.$cid)->getField('class_name');
		   $datalist[$key]['date']  =  date('Y-m-d',$item['addtime']);
		   //$datalist[$key]['pic']   =  $item['pic_path']? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$item['pic_path']: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
	   } 
	   
	   $this->assign('datalist',$datalist);        // 赋值数据集
	   $count = $this->m->where($where)->count(); //查询满足要求的总记录数
	   $totalPages = ceil($count/$pageCount);
	
	   // 分页参数
	   $this->assign('count',$count);
	   $this->assign('pageno',$pageno);
	   $this->assign('pageCount',$pageCount);
	   $this->assign('totalPages',$totalPages);
	
	   $Page = new \Think\Page($count,$pageCount);// 实例化分页类 传入总记录数和每页显示的记录数
	   $Page->setConfig('first','第一页');
	   $Page->setConfig('prev','上一页');
	   $Page->setConfig('next','下一页');
	   $Page->setConfig('last','最后一页');
	   $Page->setConfig('rollPage',8);      // 分页数字按钮数量
	   $show = $Page->show();               // 分页显示输出
	   $this->assign('page',$show?$show:'');// 赋值分页输出			   
		
	   //seo设置
	   $this->webConfig['site_name']['val']         =  $navName."_".$this->webConfig['site_name']['val']; 
	   $this->webConfig['keywords_index']['val']    =  $navName.'|'.$this->webConfig['keywords_index']['val'];
	   $this->webConfig['description_index']['val'] =  $navName.'|'.$this->webConfig['description_index']['val'];
	   $this->assign('webConfig',$this->webConfig);
		
	   //视图
	   $this->tplName = 'search';
	   $this->display('Pages/'.$this->tplName);
    }
	
}