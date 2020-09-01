<?php
/******************************************************************
 * @ 说明：ADODB数据库操作类，可同时进行查询、填加、删除和查找操作
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 ******************************************************************/
class AdminDB
{
    /**
	 * @ 方法说明：
	 *   执行SQL语句
	 *
	 * @ 参数说明：
	 *   $sql：所要执行的SQL语句
	 *   $connID：数据库连接ID
	 */
	 
	 function executeSQL($sqlstr,$connID){
		
		$sqltype=strtolower(substr(trim($sqlstr),0,6));
		$rs=$connID->prepare($sqlstr);		//准备查询语句
		$rs->execute();					//执行查询语句，并返回结果集
		if($sqltype=="select"){
			$array=$rs->fetchAll();		//获取结果集中的所有数据
			if(count($array)==0 || $rs==false)
				return false;
			else
				return $array;
		}elseif ($sqltype=="update" || $sqltype=="insert" || $sqltype=="delete"){			
			if($rs)
			    return true;
			else 
			    return false;    
		}
	}
}



