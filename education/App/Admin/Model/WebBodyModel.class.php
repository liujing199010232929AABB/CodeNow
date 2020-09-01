<?php
namespace Admin\Model;
use Think\Model;
class WebBodyModel extends Model {

		public $language = 'cn';
		
		public function index_company($id=1, $num , $arr=NULL, $field = "introduce")
		{
			//M('common')->field("id,title,introduce,content,pic_path,editor_used,pic_used,introduce_used,language")->find(1)
			$comInfo=M('common')->field($field)->where(' language=\''.$this->language.'\' ')->find($id);
			if($arr){return $comInfo;}
			return FSubstr($comInfo[$field],$num);
		}
		

}
