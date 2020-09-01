<?php
/************************************************
 * @ 说明：Smarty 模板引擎配置类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 ************************************************/
require_once 'library/smarty/libs/Smarty.class.php';
class SmartyConfig extends Smarty
{
    /**
     * @ 配置Smarty
     */
    function SmartyConfig ()
    {
        $this->Smarty();
        $arrayIni = parse_ini_file('library/lzhConfig.ini');
        $this->template_dir = $arrayIni['template_dir'];
        $this->compile_dir = $arrayIni['compile_dir'];
        $this->cache_dir = $arrayIni['cache_dir'];
        $this->config_dir = $arrayIni['config_dir'];
        $this->caching = $arrayIni['caching'];
    }
}




