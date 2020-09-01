<?php
/***********************************************
 * @ 说明：项目工具类
 *
 * @ 作者：我的中文名叫 刘中华，我的英文名叫 lzh 
 * @ E-mail:jlnu_lzh@126.com
 * @ Tel：15043191896  
 ***********************************************/
class Util
{
    var $arrayIni;
    function Util ()
    {
        $this->arrayIni = parse_ini_file('library/lzhConfig.ini');
    }
    /**
     * @ 方法说明：
     *   网站相对地址
     */
    function baseUrl ()
    {
        $arrayIni = $this->arrayIni;
        return $arrayIni['baseUrl'];
    }
    /**
     * @ 方法说明：
     *   对货币进行格式化
     *
     * @ 参数说明：
     *   $money：金额
     */
    function moneyFormat ($money)
    {
        return str_replace(',', '', number_format($money, 2));
    }
    /**
     * @ 方法说明：
     *   对html标记进行转意输出
     *
     * @ 参数说明：
     *   $text：需转意的文本
     */
    function unHtml ($text)
    {
        $str = htmlspecialchars($text);
        // $str = ereg_replace('<br>', chr(13), $str);
        // $str = nl2br($str);
        // $str = ereg_replace(' ', chr(32), $str);
        $str = str_replace(chr(13), "<br>", $str);
        $str = nl2br($str);
        $str = str_replace(chr(32), "&nbsp;", $str);
        return $str;
    }
    /**
     * @ 方法说明：
     *   对中文进行截取，防止出现乱码
     *
     * @ 参数说明：
     *   $str：要截取的字符串
     *   $start：开始截取的位置
     *   $len：截取的长度
     */
    function msubstr ($str, $start, $len, $end = '...')
    {
        $str = iconv('utf-8', 'gbk', $str);
        $strlen = $start + $len;
        for ($i = 0; $i < $strlen; $i ++) {
            if (ord(substr($str, $i, 1)) > 0xa0) {
                $tmpstr .= substr($str, $i, 2);
                $i ++;
            } else
                $tmpstr .= substr($str, $i, 1);
        }
        $retStr = iconv('gbk', 'utf-8', $tmpstr);
        if ($len - $start < strlen($str)) {
            $retStr .= $end;
        }
        return $retStr;
    }
    /**
     * @
     */
    function esubstr ($str, $start, $len)
    {
        return substr($str, $start, $len);
    }
    /**
     * @ 方法说明：
     *   集成FCKEditor
     *
     * @ 参数说明：
     *   $name：编辑器名称
     *   $value：编辑器内容
     *   $width：编辑器宽度
     *   $height：编辑器高度
     */
    function editor ($name, $value, $width = '100%', $height = '200')
    {
        require_once 'library/fckeditor/fckeditor.php';
        $arrayIni = $this->arrayIni;
        $oFCKeditor = new FCKeditor($name);
        $oFCKeditor->BasePath = $arrayIni['baseUrl'] . '/library/fckeditor/';
        $oFCKeditor->Width = $width;
        $oFCKeditor->Height = $height;
        $oFCKeditor->ToolbarSet = 'Default';
        $oFCKeditor->Value = $value;
        $oFCKeditor->Create();
    }
    /**
     * @ 方法说明：
     *   对编辑器输出内容转移
     *
     * @ 参数说明：
     *   $text：输出内容
     */
    function editorUnHtml ($text)
    {
        return stripslashes($text);
    }
    /**
     * 
     */
    function delhtml ($str, $start, $len1, $end = '...')
    { //清除HTML标签
        $st = - 1; //开始
        $et = - 1; //结束
        $stmp = array();
        $stmp[] = "&nbsp;";
        $len = strlen($str);
        for ($i = 0; $i < $len; $i ++) {
            $ss = substr($str, $i, 1);
            if (ord($ss) == 60) { //ord("<")==60
                $st = $i;
            }
            if (ord($ss) == 62) { //ord(">")==62
                $et = $i;
                if ($st != - 1) {
                    $stmp[] = substr($str, $st, $et - $st + 1);
                }
            }
        }
        $str = str_replace($stmp, "", $str);
        return $this->msubstr($str, $start, $len1, $end);
    }
    /**
     * @ 方法说明：
     *   文字描红
     * 
     * @ 参数说明：
     *   $arrayKey：描红关键字
     *   $text：要描红的文本
     */
    function setRed ($arrayKey, $text)
    {
        $tmpText = $this->unHtml($text);
        for ($i = 0; $i < count($arrayKey); $i ++) {
            if ($arrayKey[$i] != '') {
                $tmpText = str_replace(trim($arrayKey[$i]), "<font color=\"#FF0000\">" . $arrayKey[$i] . "</font>", $tmpText);
            }
        }
        return $tmpText;
    }
    /**
     * Enter description here...
     *
     * @param unknown_type $string
     * @param unknown_type $type
     * @return unknown
     */
    function urlcode ($string, $type)
    {
        if ($type == 'e') {
            return urlencode($string);
        } else {
            return urldecode($string);
        }
    }
    /**
     * 隐藏IP
     *
     * @param unknown_type $ip
     */
    function hiddenIP ($ip)
    {
        $array = explode('.', $ip);
        $array[3] = '*';
        return implode('.', $array);
    }
	
	
	 function mreplace ($str, $strs){			//实现字符串的替换操作
		 
//		 $string=str_replace("()","<span style=' line-height:22px; padding-left:2px; padding-right:2px;'><input name='fill[]' type='text'  style='width:80px; height:18px; line-height:18px; border:1px solid #DDDDDD;' id='fill[]' size='10' maxlength='50'></span>",$str);
         $string=str_replace("______","<span style=' line-height:38px; padding-left:2px; padding-right:2px;'><input name='fill[]' type='text'  style='width:80px; height:28px; line-height:28px;border:1px solid #DDDDDD;width: 200px;' id='fill[]' size='10' maxlength='50'></span>",$str);
		 $retStr=str_replace("fill[]","fill".$strs."[]",$string);
        return $retStr;
    }

    public function getWorktypes(){
        global $adminDB;
        global $connID;
        $worktypeArr = array();
        $worktypes = $adminDB->executeSQL("select * from tb_types_work", $connID);
        foreach($worktypes as $worktype){
            $worktypeArr[$worktype['id']] = $worktype['typename'];
        }
        return $worktypeArr;
    }

    function getTypename($pro_class){
        $workArr = $this->getWorktypes();
        return $workArr[$pro_class];
    }
}


