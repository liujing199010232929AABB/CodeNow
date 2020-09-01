<?php
//数据库连接类
class ConnDB{
	var $dbtype;
	var $host;
    var $user;
    var $pwd;
    var $dbname;

	//构造方法
    function ConnDB($dbtype,$host,$user,$pwd,$dbname){
		$this->dbtype=$dbtype;
    	$this->host=$host;
		$this->user=$user;
		$this->pwd=$pwd;
		$this->dbname=$dbname;
	}

    //实现数据库的连接并返回连接对象
    function GetConnId(){
        $dsn="$this->dbtype:Server=$this->host;Database=$this->dbname";
		try {
			$conn = new PDO($dsn, $this->user, $this->pwd);
            $conn->query('set names utf8');
			return $conn;
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
    }	
}

//数据库管理类
class AdminDB{
	function ExecSQL($sqlstr,$conn){
		$sqltype=strtolower(substr(trim($sqlstr),0,6));
		$rs=$conn->prepare($sqlstr);		//准备查询语句
		$rs->execute();					//执行查询语句，并返回结果集
		if($sqltype=="select"){
			$array=$rs->fetchAll(PDO::FETCH_ASSOC);		//获取结果集中的所有数据
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

class UseFun{
	
	function UnHtml($text){
	   $content=(nl2br(htmlspecialchars($text)));
	   $content=str_replace("[strong]","<strong>",$content);
	   $content=str_replace("[/strong]","</strong>",$content);
	   $content=str_replace("[em]","<em>",$content);
	   $content=str_replace("[/em]","</em>",$content);
	   $content=str_replace("[u]","<u>",$content);
	   $content=str_replace("[/u]","</u>",$content);
	
	
	   $content=str_replace("[font color=#FF0000]","<font color=#FF0000>",$content);
	   $content=str_replace("[font color=#00FF00]","<font color=#00FF00>",$content);
	   $content=str_replace("[font color=#0000FF]","<font color=#0000FF>",$content);
	
	   $content=str_replace("[font face=楷体_GB2312]","<font face=楷体_GB2312>",$content);
	   $content=str_replace("[font face=宋体]","<font face=新宋体>",$content);
	   $content=str_replace("[font face=隶书]","<font face=隶书>",$content);
       $content=str_replace("[/font]","</font>",$content);
	   //$content=str_replace(chr(32)," ",$content);
	   $content=str_replace("[font size=1]","<font size=1>",$content);
	   $content=str_replace("[font size=2]","<font size=2>",$content);
	   $content=str_replace("[font size=3]","<font size=3>",$content);
	   $content=str_replace("[font size=4]","<font size=4>",$content);
       $content=str_replace("[font size=5]","<font size=5>",$content);
	   $content=str_replace("[font size=6]","<font size=6>",$content);
	   
	   $content=str_replace("[FIELDSET][LEGEND]","<FIELDSET><LEGEND>",$content);
	   $content=str_replace("[/LEGEND]","</LEGEND>",$content);
	   $content=str_replace("[/FIELDSET]","</FIELDSET>",$content);
	   return $content;
	}
	
}

?>