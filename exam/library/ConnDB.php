<?php
/*********************************************
 * @ 说明：ADODB数据库连接类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 *********************************************/
class ConnDB
{
    var $dbType;
    var $host;
    var $userName;
    var $password;
    var $dbName;
    var $connID;
    /**
     * @ 方法说明：
     *   构造方法，类的初始化
     *
     * @ 参数说明：
     *   $dbType：连接数据库的类型
     *   $host：数据库服务器主机名或IP地址
     *   $userName：用户名
     *   $password：密码
     *   $dbName：数据库名称
     */
    function ConnDB ($dbType = 'mysql', $host, $userName, $password, $dbName)
    {
        $this->dbtype = $dbType;
        $this->host = $host;
        $this->user = $userName;
        $this->pwd = $password;
        $this->dbname = $dbName;
    }
    /**
     * @ 方法说明：
     *   获取数据库连接ID
     */
    function getConnID ()
    {
		
		if($this->dbtype=="mysql" || $this->dbtype=="mssql"){
    		$dsn="$this->dbtype:host=$this->host;dbname=$this->dbname";
		}else{
			$dsn="$this->dbtype:dbname=$this->dbname";
		}    
		try {
    		$connID = new PDO($dsn, $this->user, $this->pwd); 	//初始化一个PDO对象，就是创建了数据库连接对象$pdo
			$connID->query("set names utf8");
    		return $connID;
		} catch (PDOException $e) {
    		die ("Error!: " . $e->getMessage() . "<br/>");
		}
		   
    }
    /**
     * @ 方法说明：
     *   关闭与数据库的连接
     */
    function closeConnID ()
    {
        @$connID->Disconnect();
    }
}


