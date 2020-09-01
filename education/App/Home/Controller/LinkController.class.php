<?php
namespace Home\Controller;
use Think\Controller;
class LinkController extends BaseController {

   private $navName = '友情链接';
   
   public function _initialize(){
   		 parent::_initialize();
		 $this->addPrPv();
		 $this->assign('mark','link');
		 $this->m = M('link');
			
   }

   public function index(){
	  	 	 
		 $datalist = $this->m->where('status=1')->order('list_order desc , id desc')->select();
		 $this->assign('datalist',$datalist);
		 $this->assign('count',count($datalist)); 
		
	
		 //seo设置
		 $this->webConfig['site_name']['val']         =  $this->navName.'_'.$this->webConfig['site_name']['val']; 
		 $this->webConfig['keywords_index']['val']    =  $this->navName.'|'.$this->webConfig['keywords_index']['val'];
		 $this->webConfig['description_index']['val'] =  $this->navName.'|'.$this->webConfig['description_index']['val'];
		 $this->assign('webConfig',$this->webConfig);
		
		 $this->tplName = 'link'; 
		 $this->display('Pages/'.$this->tplName);
    }
	
}