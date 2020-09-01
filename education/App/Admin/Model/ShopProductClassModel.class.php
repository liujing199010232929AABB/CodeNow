<?php
namespace Admin\Model;
use Think\Model;
class ShopProductClassModel extends Model {

			
		public function getNavStr($allClass,$id,$urlModel,$flag='-',$isHref=0)
		{
			$id = intval($id);
			$url = U($urlModel,array('classid'=>$id));
			
			foreach ($allClass as $item){
				if ($item['id'] == $id){
					if ($item['parent_id']){	//非根分类
							if ($isHref){
								return $this->getNavStr($allClass,$item['parent_id'],$urlModel,$flag,$isHref).$flag."<a href=\"".$url."\" title=\"".$item['class_name']."\">".$item['class_name']."</a>";
							}else{
								return $this->getNavStr($allClass,$item['parent_id'],$urlModel,$flag,0).$flag.$item['class_name'];
							}
					}else{	//根分类
						if ($isHref){
							return "<a href=\"".$url."\" title=\"".$item['class_name']."\">".$item['class_name']."</a>";
						}else{
							return $item['class_name'];
						}
					}
				}	
			}
			return "";
		}
			
		public function getTitleStr($allClass,$id,$extag="_",$flag=1)
		{
			$id = intval($id);
			foreach ($allClass as $item){
				if ($item['id'] == $id){
						if ($flag == 1)
							return $item['class_name'].$this->getTitleStr($allClass,$item['parent_id'],$extag,0);
						else
							return $extag.$item['class_name'].$this->getTitleStr($allClass,$item['parent_id'],$extag,0);
				}	
			}
			return '';
		}		
		
		
		public function isHasChild($allClass, $id)
		{
			$isHas = false;
			foreach ($allClass as $item)
			{
				if ($item['parent_id'] == $id)
				{
					$isHas = true;
					break;
				}
			}
			return $isHas;
		}
		
		public function getAllParentIds($allClass,$id)
		{
			$ids = intval($id);
			foreach ($allClass as $item){
				if ($item['id'] == $id){
					if ($item['parent_id'])
					{
						$ids = $this->getAllParentIds($allClass,$item['parent_id']).','.$ids;
					}
				}	
			}
			return $ids;
		}
		
		public function getAllParentNames($allClass,$id,$left='【',$right='】')
		{
			$id = intval($id);
			$str = '';
			foreach ($allClass as $item){
				if ($item['id'] == $id){
					$str = $left.$item['class_name'].$right;
					if ($item['parent_id'])
					{
						$str = $this->getAllParentNames($allClass,$item['parent_id'],$left,$right).$str;
					}
				}	
			}
			return $str;
		}
		
		public function getMyParentId($id,$depth,$arr){
			$id = intval($id);
			$depth = intval($depth);
			if (is_array($arr)){
				foreach ($arr as $item){
					if ($item['id']==$id){
						if ($item['depth'] == $depth) return $id;
						foreach ($arr as $value){
							if ($item['parent_id'] == $value['id']){
								if ($value['depth'] == $depth){
									return $value['id'];
								}else{
									return $this->getMyParentId($value['id'],$depth,$arr);
								}//end if
								break;
							}
						}//end if
						break;
					}//end foreach
				}	
			}
			return 0;
		}			
		
		

}
