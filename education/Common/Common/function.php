<?php

/*$Url=1有参数 $Url=0没有参数 else 自定义路径*/
function NewUrl($Dialog,$Text,$Url,$target = false){
	if ($Url == '1') {$Url = $_SERVER['REQUEST_URI'];} else if ($Url == '0'){$Url = $_SERVER['SCRIPT_NAME'];}
	echo "<script language=\"javascript\">";
	if ($Dialog == 1){echo "alert(\"" . $Text . "\");";}
	if ($Url == '-1')
	{echo "history.back(-1);";} 
	else 
	{
	  
	  if($target)
	  { 
		 echo "window.open(\"".$Url."\");"; 
	     echo "location=\"" . $_SESSION['backurl'] . "\";";  
	  }
	  else
	  { echo "location=\"" . $Url . "\";";}
	
	}
	
	echo '</script>';
	exit;
}
 
function print_rr($var){
	dump($var);exit;
}

function debug($var){
	if($var){
		echo "<pre>";
		print_r($var);
	}else{
		echo "数据不存在";
	}
	exit;
}

/**
 * 将提交的数据进行html格式编码
 * @param array $array 处理的数组
 * @param array $lists 要处理的数组中key的数组
 * @return array
 */
function specConvert (&$array, $lists) {
	foreach ($lists as $value) {
		$array[$value] = htmlspecialchars($array[$value],ENT_COMPAT,'utf-8');
	}
}

function substrs($content, $length){
	if($length && strlen($content)>$length){
		if($db_charset!='utf-8'){
			$retstr='';
			for($i = 0; $i < $length - 2; $i++) {
				$retstr .= ord($content[$i]) > 127 ? $content[$i].$content[++$i] : $content[$i];
			}
			return $retstr.'...';
		}else{
			return utf8_trim(substr($content,0,$length*3));
		}
	}
	return $content;
}
//英文字符截取
function ensubstr($string, $sublen)
{
	if($sublen >= strlen($string)) {
		$s= $string;
	}else{
	    $s=substr($string,0,$sublen)."...";
	}
	
	return $s;
}
//中文字符截取
function cnsubstr($str = '', $len = 0, $etc = ' ...') 
{ 
	if(0 == $len) return ""; 

	$str_len = preg_match_all('/[\x00-\x7F\xC0-\xFD]/', $str, $dummy); 
	if($len >= $str_len) 
	{ 
		return $str; 
	}else{ 
		$newstr = mb_substr($str,0,$len,'utf-8'); 
		return $newstr.$etc; 
	} 
}
//截取字符串 FSubstr("要截取的字符串", 截取位数2 , 截取位置0);
function FSubstr($string,$length,$start=0,$symbol='…',$code='utf-8'){ 
	//strip_tags(con,"<a>,<p>")
	$sy = $code=='utf-8' ? 3 : 2;
	$chars = $string;   
	$i=0;$k=0;$n=0;$m=0;
	while($k < $length){   
		if (preg_match ("/[0-9a-zA-Z]/", $chars[$i])){  
			$m++;   
		} else {  
			$n++;
		}
		$k = $n/$sy+$m/2;   
		$l = $n/$sy+$m; 
		$i++;
	}
	$string = str_replace("　","",$string);
	$string = str_replace("&nbsp;","",$string);
	$string = preg_replace("/<([a-zA-Z]+)[^>]*>/","<\\1>",$string);
	//$string=preg_replace("/<\/*[^<>]*>/si","",$string);//过滤所有html标签
	//$string=content_replace($string);
	$str1 = mb_substr($string,$start,$l,$code);
	if((strlen($string)-$m-$n) > 0) $str1 .= $symbol;
	$str1=preg_replace("/<(\/?p.*?)>/si","",$str1);
	return $str1;   
}
//上传文件命名规则
function uploadName(){
	return strtoupper(md5(uniqid("",true)."".rand(0,99999999)));
	if (function_exists('com_create_guid')){
	   return com_create_guid();
	}else{
	   mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
	   $charid = strtoupper(md5(uniqid(rand(), true)));
	   $hyphen = chr(45);// "-"
	   $uuid = //chr(123)// "{"
			   substr($charid, 0, 8).$hyphen
			   .substr($charid, 8, 4).$hyphen
			   .substr($charid,12, 4).$hyphen
			   .substr($charid,16, 4).$hyphen
			   .substr($charid,20,12)
			   //.chr(125);// "}"
			   ;
	   return $uuid;
	}
}

function utf8_trim($str) {
	$len = strlen($str);
	for($i=strlen($str)-1;$i>=0;$i-=1){
		$hex .= ' '.ord($str[$i]);
		$ch   = ord($str[$i]);
		if(($ch & 128)==0)	return substr($str,0,$i);
		if(($ch & 192)==192)return substr($str,0,$i);
	}
	return($str.$hex);
}
function c_addslashes($string, $force = 0) {
	if(!$GLOBALS['magic_quotes_gpc'] || $force) {
		if(is_array($string)) {
			foreach($string as $key => $val) {
				$string[$key] = c_addslashes($val, $force);
			}
		} else {
			$string = addslashes($string);
		}
	}
	return $string;
}
function addslashes_mssql($string) {
	return str_replace('\'','\'\'',$string);
}
/**
 * cookie编码处理
 * @param string $string 要编码的字符串
 * @param string $operation 操作ENCODE编码，DECODE解码
 * @param string $key hash值
 * @return string
 */
function authcode($string, $operation, $key = '') {
	$coded = '';
	$keylength = strlen($key);
	$string = $operation == 'DECODE' ? base64_decode($string) : $string;
	for($i = 0; $i < strlen($string); $i += $keylength) {
		$coded .= substr($string, $i, $keylength) ^ $key;
	}
	$coded = $operation == 'ENCODE' ? str_replace('=', '', base64_encode($coded)) : $coded;
	return $coded;
}

/**
 * 取服务器文档根路径
 * @return string
 */
function getRootPath() {
	$sRealPath = realpath('./');
	$sSelfPath = $_SERVER['PHP_SELF'];
	$sSelfPath = substr( $sSelfPath, 0, strrpos( $sSelfPath, '/' ));
	return substr($sRealPath, 0, strlen($sRealPath) - strlen($sSelfPath));
}

/**
 * 把文件路径转换成URL
 * @param string $path 要转换的路径
 * @return string
 */
function pathToUrl($path) {
	$path = str_replace(getRootPath(),'',$path);
	$path = str_replace('\\','/',$path);
	$path = str_replace('//','/',$path);
	return $path;
}
function charsetIconv($vars,$from='utf-8',$to='gbk') {
	if (is_array($vars)) {
		$result = array();
		foreach ($vars as $key => $value) {
			$result[$key] = charsetIconv($value);
		}
	} else {
		$result = iconv($from,$to, $vars);
	}
	return $result;
}

function wap_cv($msg){
	/*$msg = str_replace('<p>','',$msg);
	$msg = str_replace('</p>','<br /><br />',$msg);
	$msg = str_replace('&ldquo;','"',$msg);
	$msg = str_replace('&rdquo;','"',$msg);
	$msg = str_replace('&nbsp;',' ',$msg);
	$msg = str_replace('<br>','<br/> ',$msg);
	$msg = str_replace('&quot;','"',$msg);
	$msg = str_replace('&#39;','',$msg);
	$msg = str_replace('&lt;','<',$msg);
	$msg = str_replace('&gt;','>',$msg);
	$msg = str_replace('&nbsp; &nbsp;','\t',$msg);
	$msg = str_replace('&nbsp; ','  ',$msg);*/
	return htmlspecialchars_decode($msg);
}
function StrCode($string,$action='ENCODE'){
	global $cfg;
	$key	= substr(md5($_SERVER["HTTP_USER_AGENT"].$cfg['auth_key']),8,18);
	$string	= $action == 'ENCODE' ? $string : base64_decode($string);
	$len	= strlen($key);
	$code	= '';
	for($i=0; $i<strlen($string); $i++){
		$k		= $i % $len;
		$code  .= $string[$i] ^ $key[$k];
	}
	$code = $action == 'DECODE' ? $code : base64_encode($code);
	return $code;
}


function PwdCode($pwd){
	global $cfg;
	return md5($_SERVER["HTTP_USER_AGENT"].$pwd.$cfg['auth_key']);
}
//-----------------------------------------------------------
function confuse($pwd){
	global $cfg;
	$cfg['auth_key']='?3@d#s$7^';
	$pwd=md5($_SERVER["HTTP_USER_AGENT"].$pwd.$cfg['auth_key']);
	return $pwd;
}

function GetSecure(){
	$https = array();
	if ($_SERVER['REQUEST_URI']) $https = @parse_url($_SERVER['REQUEST_URI']);
	if (empty($https['scheme'])) {
		if ($_SERVER['HTTP_SCHEME']) {
			$https['scheme'] = $_SERVER['HTTP_SCHEME'];
		} else {
			$https['scheme'] = ($_SERVER['HTTPS'] && strtolower($_SERVER['HTTPS']) != 'off') ? 'https' : 'http';
		}
	}
	if ($https['scheme'] == 'https'){
		return 1;
	}
	return 0;
}
function HideTelNum($num){
	$pattern = "/(1\d{1,2})\d\d(\d{0,3})/";
	$replacement = "\$1****\$3";
	$endNum = preg_replace($pattern, $replacement, $num);
	return $endNum;
}

function Char_cv($msg){
	$msg = str_replace('&nbsp;&nbsp;','　',$msg);
	$msg = str_replace('&amp;','&',$msg);
	$msg = str_replace('&nbsp;',' ',$msg);
	$msg = str_replace('"','&quot;',$msg);
	$msg = str_replace("'",'&#39;',$msg);
	$msg = str_replace("<","&lt;",$msg);
	$msg = str_replace(">","&gt;",$msg);
	$msg = str_replace("\t","&nbsp; &nbsp; ",$msg);
	$msg = str_replace("\r","",$msg);
	return $msg;
}

function getIP(){
	$IPaddress='';
	if (isset($_SERVER)){
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
			$IPaddress = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
			$IPaddress = $_SERVER["HTTP_CLIENT_IP"];
		} else {
			$IPaddress = $_SERVER["REMOTE_ADDR"];
		}
	} else {
		if (getenv("HTTP_X_FORWARDED_FOR")){
			$IPaddress = getenv("HTTP_X_FORWARDED_FOR");
		} else if (getenv("HTTP_CLIENT_IP")) {
			$IPaddress = getenv("HTTP_CLIENT_IP");
		} else {
			$IPaddress = getenv("REMOTE_ADDR");
		}
	}
	return $IPaddress;
}

function taobaoIP($clientIP){
	$taobaoIP = 'http://ip.taobao.com/service/getIpInfo.php?ip='.$clientIP;
	$IPinfo = json_decode(file_get_contents($taobaoIP));
	$province = $IPinfo->data->region;
	$city = $IPinfo->data->city;
	$data = $province.$city;
	return $data;
}

function getDirSize($dir)
    { 
        $handle = opendir($dir);
        while (false!==($FolderOrFile = readdir($handle)))
        { 
            if($FolderOrFile != "." && $FolderOrFile != "..") 
            { 
                if(is_dir("$dir/$FolderOrFile"))
                { 
                    $sizeResult += getDirSize("$dir/$FolderOrFile"); 
                }
                else
                { 
                    $sizeResult += filesize("$dir/$FolderOrFile"); 
                }
            }    
        }
        closedir($handle);
        return $sizeResult;
    }

    // 单位自动转换函数
function getRealSize($size)
    { 
        $kb = 1024;         // Kilobyte
        $mb = 1024 * $kb;   // Megabyte
        $gb = 1024 * $mb;   // Gigabyte
        $tb = 1024 * $gb;   // Terabyte
        
        if($size < $kb)
        { 
            return $size." B";
        }
        else if($size < $mb)
        { 
            return round($size/$kb,2)." KB";
        }
        else if($size < $gb)
        { 
            return round($size/$mb,2)." MB";
        }
        else if($size < $tb)
        { 
            return round($size/$gb,2)." GB";
        }
        else
        { 
            return round($size/$tb,2)." TB";
        }
    }
	
/**
 * 从数组中删除空白的元素（包括只有空白字符的元素）
 *
 * @param array $arr
 * @param boolean $trim
 */
function array_remove_empty(& $arr, $trim = true)
{
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            array_remove_empty($arr[$key]);
        } else {
            $value = trim($value);
            if ($value == '') {
                unset($arr[$key]);
            } elseif ($trim) {
                $arr[$key] = $value;
            }
        }
    }
}
/**
 * 将一个二维数组转换为 hashmap
 *
 * 如果省略 $valueField 参数，则转换结果每一项为包含该项所有数据的数组。
 *
 * @param array $arr
 * @param string $keyField
 * @param string $valueField
 *
 * @return array
 */
function array_to_hashmap(& $arr, $keyField, $valueField = null)
{
    $ret = array();
    if ($valueField) {
        foreach ($arr as $row) {
            $ret[$row[$keyField]] = $row[$valueField];
        }
    } else {
        foreach ($arr as $row) {
            $ret[$row[$keyField]] = $row;
        }
    }
    return $ret;
}
/**
 * 根据指定的键值对数组排序
 *
 * @param array $array 要排序的数组
 * @param string $keyname 键值名称
 * @param int $sortDirection 排序方向
 *
 * @return array
 */
function array_column_sort($array, $keyname, $sortDirection = SORT_ASC)
{
    return array_sortby_multifields($array, array($keyname => $sortDirection));
}

/**
 * 将一个二维数组按照指定列进行排序，类似 SQL 语句中的 ORDER BY
 *
 * @param array $rowset
 * @param array $args
 */
function array_sortby_multifields($rowset, $args)
{
    $sortArray = array();
    $sortRule = '';
    foreach ($args as $sortField => $sortDir) {
        foreach ($rowset as $offset => $row) {
            $sortArray[$sortField][$offset] = $row[$sortField];
        }
        $sortRule .= '$sortArray[\'' . $sortField . '\'], ' . $sortDir . ', ';
    }
    if (empty($sortArray) || empty($sortRule)) { return $rowset; }
    eval('array_multisort(' . $sortRule . '$rowset);');
    return $rowset;
}
/***
* 将一个多维数组转换为一维数组
***/
function array_multi2single($array)
{
	static $result_array=array();
	foreach($array as $value)
	{
		if(is_array($value))
		{
			$this->array_multi2single($value);
		}
		else  
			$result_array[]=$value;
	}
	return $result_array;
} 



/**
 * 系统邮件发送函数
 * @param string $to    接收邮件者邮箱
 * @param string $name  接收邮件者名称
 * @param string $subject 邮件主题 
 * @param string $body    邮件内容
 * @param string $attachment 附件列表
 * @return boolean 
 */
function think_send_mail($to, $name, $subject = '', $body = '', $attachment = NULL){
    $config = C('THINK_EMAIL');
    vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
    $mail             = new PHPMailer(); //PHPMailer对象
    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();  // 设定使用SMTP服务
    $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    //$mail->SMTPSecure = 'ssl';                 // 使用安全协议  ////服务器不支持会报错，可以注释掉
    $mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器  
    $mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
    $mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
    $mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
    $mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
    $replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
    $replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if(is_array($attachment)){ // 添加附件
        foreach ($attachment as $file){
            is_file($file) && $mail->AddAttachment($file);
        }
    }
    //return $mail->Send() ? true : $mail->ErrorInfo;     /////这一行调试时使用
    return $mail->Send() ? true : false;
}


//////文章分页
function Cut_Page($str,$url='',$cut=''){

    $cut = ($cut=='')?$cut='[page]':$cut;//默认的分页标签为[page]
    $str_cut = explode("$cut",$str);//对要分页的内容按照$cut标记进行拆分
    $total = intval(count($str_cut));//得到总页数
    $url = ($url=='')?$url=$_SERVER['PHP_SELF']:$url;//链接的页面
    $page = isset($_GET['page'])?intval($_GET['page']):1; //获得页码数，没有则默认为1
    $nextpage = ($page==$total)?0:($page+1); //下一页
    $uppage = ($page==1)?0:($page-1);//上一页

    $pagenav = $str_cut[$page-1];
	$pagenav .= '<p>'."\n";
	$pagenav .= '<div align="center">'."\n";


    if($uppage==0)$pagenav .= "<span class=pagebox_pre_nolink>上一页</span> "."\n";
    else $pagenav .= "<span class=pagebox_pre>"."\n"."<a href=$url&page=$uppage class=a2>上一页</a></span> "."\n";
    for($x=1;$x<=$total;$x++){
        if($x==$page)$pagenav .= "<span class=pagebox_num_nonce><b>";
        else$pagenav .= "<span class=pagebox_num><a href=$url&page=$x>";
        $pagenav .= $x;
        if($x==$page)$pagenav .= '</b></span> '."\n";
        else$pagenav .= '</a></span> '."\n";
    }
    if($nextpage==0)$pagenav .= "<span class=pagebox_next_nolink>下一页</span> "."\n";
    else$pagenav .= "<span class=pagebox_next><a href=$url&page=$nextpage class=a2>下一页</a></span> "."\n";

	$pagenav.="</div>"."\n";

   return   "<div class='pb'>"."\n"."<div class='pagebox'>"."\n".$pagenav."\n"."</div>"."\n"."</div>"."\n";
}





//////移动临时文件夹文件
function moveFile($array,$flag=NULL)
{
	global $cfg;
	$file = array();
	$del_file = array();
	$from_path = $cfg['path']['root'].'upfile/temp/';
	
	
	if($flag=='file'){
		$to_path = $cfg['path']['root'].'upfile/'.$array['file_file_path'];
		$fileBaseName = $array['file_name'];
		$fileExt = $array['file_ext'];
		$file[] = $fileBaseName.'.'.$fileExt;
		if($array['old_file_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_file_path'];
	}elseif($flag=='video'){
		$to_path = $cfg['path']['root'].'upfile/'.$array['video_file_path'];
		$fileBaseName = $array['video_name'];
		$fileExt = $array['video_ext'];
		$file[] = $fileBaseName.'.'.$fileExt;
		if($array['old_video_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_video_path'];
	}else{
		$to_path = $cfg['path']['root'].'upfile/'.$array['pic_file_path'];
		$fileBaseName = $array['pic_name'];
		$fileExt = $array['pic_ext'];
		$file[] = $fileBaseName.'.'.$fileExt;
		if($array['pic_large_path'])$file[] = $fileBaseName.'_large.'.$fileExt;
		if($array['pic_thumb_path'])$file[] = $fileBaseName.'_thumb.'.$fileExt;
		if($array['old_pic_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_path'];
		if($array['old_pic_large_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_large_path'];
		if($array['old_pic_thumb_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_thumb_path'];
	}

 		 try{
			if (!is_dir($to_path) && $to_path!='./' && $to_path!='../') {
				$dirname = '';
				$folders = explode('/',$to_path);
				foreach ($folders as $folder) {
					$dirname .= $folder . '/';
					if ($folder!='' && $folder!='.' && $folder!='..' && !is_dir($dirname)) {
						mkdir($dirname,0777);
					}
				}				
			}
		}catch(Exception $e){
			echo '未找到上传目录，创建失败';   
			exit();   
		}	
	
	FileSystem::rm($del_file);
	FileSystem::mv($file , $from_path , $to_path);
}

//////删除原有图片或者附件
function delFile($array,$flag=NULL)
{
	global $cfg;
	$del_file = array();
	
	
	if($flag=='file'){
		if($array['old_file_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_file_path'];
	}elseif($flag=='video'){
		if($array['old_video_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_video_path'];
	}else{
		if($array['old_pic_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_path'];
		if($array['old_pic_large_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_large_path'];
		if($array['old_pic_thumb_path'])$del_file[] = $cfg['path']['root'].'upfile/'.$array['old_pic_thumb_path'];
	}
	
	FileSystem::rm($del_file);
}



/////清理临时文件夹过期文件---三天上限

function removeFile($array)
{
	global $cfg;
	$del_array = array();
	$maxTime = 86400*3;///过期时间
	$file_path = $cfg['path']['root'].'upfile/temp/';
  	foreach($array as $item){
		$fileCreatTime = strtotime(date ("Y-m-d H:i:s", filectime($file_path.$item)));
		if((time()-$fileCreatTime)>$maxTime){
			$del_array[] = $file_path.$item;
		}
	}
	FileSystem::rm($del_array);
}


/**
 * 将一张图片按照给定框体进行同比例缩放
 *
 * @param $pic_path  图片路径
 * @param $width_k  框体宽度
 * @param $height_k  框体高度
 */
 

function thumb_pic($pic_path,$width_k,$height_k){
 $pic_info = getimagesize($pic_path);
 $img_width = $pic_info[0];
 $img_height = $pic_info[1];
 if ($img_width < $width_k && $img_height < $height_k){
	 $end_width = $img_width;
	 $end_height = $img_height;
 }else{
    if($img_width/$img_height>$width_k/$height_k){
		$end_width = $width_k;
		$end_height = round($end_width/$img_width*$img_height);
	 }else{
		$end_height = $height_k;
		$end_width = round($end_height/$img_height*$img_width); 
	 }
 } 
 $img_info['end_width'] = $end_width;
 $img_info['end_height'] = $end_height;
 return $img_info;
}



function downloadFile($sourceFile , $outFile="showName.rar"){
	//$sourceFile = "321.rar"; //要下载的临时文件名     
		 
	//$outFile = "aaa.rar"; //下载保存到客户端的文件名     
		 
	$file_extension = strtolower(substr(strrchr($sourceFile, "."), 1)); //获取文件扩展名     
	//echo $sourceFile;     
	if (!ereg("[tmp|txt|rar|pdf|doc]", $file_extension))exit ("非法资源下载");     
		 
	//检测文件是否存在     
	if (!is_file($sourceFile)) {     
		die("<b>404 File not found!</b>");     
	}     
		 
	$len = filesize($sourceFile); //获取文件大小     
	$filename = basename($sourceFile); //获取文件名字     
	$outFile_extension = strtolower(substr(strrchr($outFile, "."), 1)); //获取文件扩展名     
		 
	//根据扩展名 指出输出浏览器格式     
	switch ($outFile_extension) {     
		case "exe" :     
			$ctype = "application/octet-stream";     
			break;     
		case "zip" :     
			$ctype = "application/zip";     
			break;     
		case "mp3" :     
			$ctype = "audio/mpeg";     
			break;     
		case "mpg" :     
			$ctype = "video/mpeg";     
			break;     
		case "avi" :     
			$ctype = "video/x-msvideo";     
			break;     
		default :     
			$ctype = "application/force-download";     
	}     
	//Begin writing headers     
	header("Cache-Control:");     
	header("Cache-Control: public");     
		 
	//设置输出浏览器格式     
	header("Content-Type: $ctype");     
	header("Content-Disposition: attachment; filename=" . $outFile);     
	header("Accept-Ranges: bytes");     
		 
	$size = filesize($sourceFile);     
		 
	//如果有$_SERVER['HTTP_RANGE']参数     
	if (isset ($_SERVER['HTTP_RANGE'])) {     
		/*Range头域 　　Range头域可以请求实体的一个或者多个子范围。    
		例如，    
		表示头500个字节：bytes=0-499    
		表示第二个500字节：bytes=500-999    
		表示最后500个字节：bytes=-500    
		表示500字节以后的范围：bytes=500- 　　    
		第一个和最后一个字节：bytes=0-0,-1 　　    
		同时指定几个范围：bytes=500-600,601-999 　　    
		但是服务器可以忽略此请求头，如果无条件GET包含Range请求头，响应会以状态码206（PartialContent）返回而不是以200 （OK）。    
		*/     
		// 断点后再次连接 $_SERVER['HTTP_RANGE'] 的值 bytes=4390912-     
		list ($a, $range) = explode("=", $_SERVER['HTTP_RANGE']);     
		//if yes, download missing part     
		str_replace($range, "-", $range); //这句干什么的呢。。。。     
		$size2 = $size -1; //文件总字节数     
		$new_length = $size2 - $range; //获取下次下载的长度     
		header("HTTP/1.1 206 Partial Content");     
		header("Content-Length: $new_length"); //输入总长     
		header("Content-Range: bytes $range$size2/$size"); //Content-Range: bytes 4908618-4988927/4988928   95%的时候     
	} else {     
		//第一次连接     
		$size2 = $size -1;     
		header("Content-Range: bytes 0-$size2/$size"); //Content-Range: bytes 0-4988927/4988928     
		header("Content-Length: " . $size); //输出总长     
	}     
	//打开文件     
	$fp = fopen("$sourceFile", "rb");     
	//设置指针位置     
	fseek($fp, $range);     
	//虚幻输出     
	while (!feof($fp)) {     
		//设置文件最长执行时间     
		set_time_limit(0);     
		print (fread($fp, 1024 * 8)); //输出文件     
		flush(); //输出缓冲     
		ob_flush();     
	}     
	fclose($fp);     
	exit ();    
} 


//Remove the exploer'bug XSS
function RemoveXSS($val) {
   // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
   // this prevents some character re-spacing such as <java\0script>
   // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
   $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);
   // straight replacements, the user should never need these since they're normal characters
   // this prevents like <IMG SRC=@avascript:alert('XSS')>
   $search = 'abcdefghijklmnopqrstuvwxyz';
   $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $search .= '1234567890!@#$%^&*()';
   $search .= '~`";:?+/={}[]-_|\'\\';
   for ($i = 0; $i < strlen($search); $i++) {
      // ;? matches the ;, which is optional
      // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

      // @ @ search for the hex values
      $val = preg_replace('/(&#[xX]0{0,8}'.dechex(ord($search[$i])).';?)/i', $search[$i], $val); // with a ;
      // @ @ 0{0,7} matches '0' zero to seven times
      $val = preg_replace('/(&#0{0,8}'.ord($search[$i]).';?)/', $search[$i], $val); // with a ;
   }

   // now the only remaining whitespace attacks are \t, \n, and \r
   $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
   $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
   $ra = array_merge($ra1, $ra2);

   $found = true; // keep replacing as long as the previous round replaced something
   while ($found == true) {
      $val_before = $val;
      for ($i = 0; $i < sizeof($ra); $i++) {
         $pattern = '/';
         for ($j = 0; $j < strlen($ra[$i]); $j++) {
            if ($j > 0) {
               $pattern .= '(';
               $pattern .= '(&#[xX]0{0,8}([9ab]);)';
               $pattern .= '|';
               $pattern .= '|(&#0{0,8}([9|10|13]);)';
               $pattern .= ')*';
            }
            $pattern .= $ra[$i][$j];
         }
         $pattern .= '/i';
         $replacement = substr($ra[$i], 0, 2).'<x>'.substr($ra[$i], 2); // add in <> to nerf the tag
         $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
         if ($val_before == $val) {
            // no replacements were made, so exit the loop
            $found = false;
         }
      }
   }
   return $val;
}



/**
 * 格式化字节大小
 * @param  number $size      字节数
 * @param  string $delimiter 数字和单位分隔符
 * @return string            格式化后的带单位的大小
 */
function format_bytes($size, $delimiter = '') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
    for ($i = 0; $size >= 1024 && $i < 5; $i++) $size /= 1024;
    return round($size, 2) . $delimiter . $units[$i];
}


/*
 * $url 页面路径
 * $vars 参数
 * $view 详细页路径，加$view是为了兼容现有的移动站生成详细页规则
 * $SUFFIX 格式
 turn_url('pic_view','classid=12&id=10','html|php');
 turn_url('News/','classid=12&id=10',$this->defaultLang,$this->htmlPower)
*/

function turn_url($url='', $html_power = true , $SUFFIX='html',$vars='',$lang = 'Cn' ){
	if(!$html_power || $SUFFIX=='U')return U($url);
	$lang = ucfirst(strtolower($lang));
	$cfg['html']=__ROOT__."/Html/".$lang."/";
	$cfg['url']=__ROOT__."/".$lang."/";
	$varsArr=explode("&",$vars);
	if($SUFFIX=='z'){
		$url=$cfg['url'].$url;
		$url.='.'.$SUFFIX;
		$url.='?'.$vars;
	}else{
		$url=$cfg['html'].$url;
		foreach($varsArr as $k=>$v){
			$vArr=explode("=",$v);
			//$vArr[1]=str_replace("=","-",$v);
			//if($k>0){$url.='-';}
			$url.='-'.$vArr[1];
		}
		$url.='.'.$SUFFIX;
	}
	return $url;
}

/**
 * 根据id 获取新闻链接
 * @param string $id:新闻id
 * @return string: 新闻链接
 */
function get_news_url($id=''){
	//$url = 'news/view/id/'.$id;
	$url = U('news/view',array('id'=>$id));
	return $url;
}

function get_pic_url($pic_path){
	$url = $pic_path ? C("TMPL_PARSE_STRING.__UPLOAD__").'/'.$pic_path: C("TMPL_PARSE_STRING.__IMG__").'/nopic.gif';
	return $url;
}


/*
 * $picurl 页面路径
 * $isthumb 参数
 getPic('picurl');
*/
function getPic($picurl,$isthumb=true) {
	if($picurl && $isthumb) {
		$picpathinfo = pathinfo($picurl);
		$thumbpic = $picpathinfo['dirname']."/thumb_".$picpathinfo['basename'];
		return $thumbpic;
	} else {
		return $picurl;
	}
}

function qling($v){  
	if ($v==="" || $v==="0"){return true;}
	return true;  
}

function cbuxian($arr,$num,$v="0"){  
	$arr[$num]=$v;
	$arr=implode("-",$arr);
	return $arr;
}


/**
 * 获取消息信息
 */
function getNewsInfo($class_id,$limit){
	$map['class_id'] = $class_id;
	$map['is_home']  = 1;
	$map['status']   = 1;
	$info = M('news')->field('id,title,introduce,list_order,status')
		->where($map)
		->order('list_order desc , id desc')
		->limit($limit)->select();
	return $info;
}













