<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */
/**
 * Smarty truncate modifier plugin
 *
 * Type:     modifier<br>
 * Name:     truncate<br>
 * Purpose:  Truncate a string to a certain length if necessary,
 *           optionally splitting in the middle of a word, and
 *           appending the $etc string or inserting $etc into the middle.
 * @link http://smarty.php.net/manual/en/language.modifier.truncate.php
 *          truncate (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param integer
 * @param string
 * @param boolean
 * @param boolean
 * @return string
 */
function smarty_modifier_truncate ($string, $length = 80, $etc = '...', $break_words = false, $middle = false)
{
    if ($length == 0)
        return '';
    if (strlen($string) > $length) {
        $string = iconv('utf-8', 'gbk', $string);
        $length -= min($length, strlen($etc));
        //        if (!$break_words && !$middle) {
        //            $string = preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, $length+1));
        //        }
        //        if(!$middle) {
        //            return substr($string, 0, $length) . $etc;
        //        } else {
        //            return substr($string, 0, $length/2) . $etc . substr($string, -$length/2);
        //        }
        for ($i = 0; $i <$length; $i ++) {
            if (ord(substr($string, $i, 1)) > 0xa0) {
                $tmpstr .= substr($string, $i, 2);
                $i ++;
            } else
                $tmpstr .= substr($string, $i, 1);
        }
        return iconv('gbk', 'utf-8' ,$tmpstr . $etc);
    } else {
        return $string;
    }
}
/* vim: set expandtab: */
?>
