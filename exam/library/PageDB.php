<?php
/*********************************************
 * @ 说明：ADODB数据库分页类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 *********************************************/
class PageDB
{
    /**
     * @ 方法说明：
     *   数据分页处理，并以数组形式返回分页信息
     *
     * @ 参数说明：
     *   $sql：所要执行的SQL语句
     *   $conn：数据库连接ID
     *   $pagesize：每页显示数据的条数
     *   $page：当前显示的页数
     */
	var $rs;
	var $pagesize;
	var $nowpage;
	var $connID;
	var $sqlstr;
    function pageData ($sqlstr, $connID, $pagesize, $nowpage, $num = null)
    {
        $arrayPageInfo = array();
		
		
		if(!isset($nowpage) || $nowpage=="")			//判断变量值是否为空
			$this->nowpage=1;						//定义每页起始页
		else
			$this->nowpage=$nowpage;
			$this->pagesize=$pagesize;					//定义每页输出的记录数
			$this->conn=$connID;							//连接数据库返回的标识
			$this->sqlstr=$sqlstr;							//执行的查询语句
			$offset=($this->nowpage-1)*$this->pagesize;
			$sql=$this->sqlstr." limit $offset, $this->pagesize";
			$result=$this->conn->prepare($sql);			//准备查询语句
			$rs=$result->execute();						//执行查询语句，并返回结果集
			$arrayData=$result->fetchAll();		//获取结果集中的所有数据
        if (count($arrayData) == 0 || $rs == false) {
            return false;
        } else {
            $arrayPageInfo['data'] = $arrayData; //每页的数据
			$res=$this->conn->prepare($this->sqlstr);			//准备查询语句
			$res->execute();						//执行查询语句，并返回结果集
			$this->array=$res->fetchAll();		//获取结果集中的所有数据	
			$countRs=count($this->array);				//统计记录总数
            $countPage = ceil($countRs / $pagesize);
            $arrayPageInfo['pageSize'] = $pagesize; //每页显示记录的条数
            $arrayPageInfo['countRs'] = $countRs; //总记录数
            if ($this->nowpage <= $countPage) {
                $arrayPageInfo['page'] = $this->nowpage; //当前页
            } else {
                $arrayPageInfo['page'] = $countPage;
            }
            $arrayPageInfo['countPage'] = $countPage; //总页数
            $arrayPageInfo['first'] = 1; //第一页的页码
            if ($this->nowpage > 1) {
                $arrayPageInfo['previous'] = $this->nowpage - 1; //前一页的页码
            } else {
                $arrayPageInfo['previous'] = 1;
            }
            if ($this->nowpage < $countPage) {
                $arrayPageInfo['next'] = $this->nowpage + 1; //后一页的页码
            } else {
                $arrayPageInfo['next'] = $countPage;
            }
            $arrayPageInfo['last'] = $countPage; //最后一页的页码
            if ($num != null) {
                if ($countPage <= $num) {
                    $beginNum = 1;
                    $lastNum = $countPage;
                } else {
                    if ($this->nowpage % $num == 0) {
                        $beginNum = $this->nowpage - $num + 1;
                    } else {
                        $beginNum = ($this->nowpage - $this->nowpage % $num) + 1;
                    }
                    if ($beginNum + $num - 1 >= $countPage) {
                        $lastNum = $countPage;
                    } else {
                        $lastNum = $beginNum + $num - 1;
                    }
                }
            }
            $arrayPageInfo['beginNum'] = $beginNum;
            $arrayPageInfo['lastNum'] = $lastNum;
            $arrayNum = array();
            for ($i = $beginNum; $i < $lastNum + 1; $i ++) {
                array_push($arrayNum, $i);
            }
            $arrayPageInfo['arrayNum'] = $arrayNum;
        }
        return $arrayPageInfo;
    }
}


