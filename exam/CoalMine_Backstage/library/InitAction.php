<?php
/*********************************************
 * @ 说明：Action基类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 *********************************************/
class InitAction
{
    var $smarty;
    var $connID;
    var $adminDB;
    var $pageDB;
    /**
     * @ 方法说明：
     *   构造方法，类的初始化
     *
     * @ 参数说明：
     *   $smarty：Smarty模板引擎对象
     *   $connID：数据库连接类对象
     *   $adminDB：数据库管理类对象
     *   $pageDB：数据库分页类对象
     */
    function InitAction ($smarty = null, $connID = null, $adminDB = null, $pageDB = null)
    {
        $this->smarty = $smarty;
        $this->connID = $connID;
        $this->adminDB = $adminDB;
        $this->pageDB = $pageDB;
    }
}