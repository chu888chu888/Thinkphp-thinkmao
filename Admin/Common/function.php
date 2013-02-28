<?php
 /**
  * 必须要在配置文件中配置载入
  */

  /**
  *中文字符串截取函数
  */
  function truncate($string, $length = 80, $etc = '...',$break_words = false, $middle = false){
  	 if ($length == 0)
        return '';             
     if (mb_strlen($string) > $length) {
        $length -= min($length, mb_strlen($etc));
        if (!$break_words && !$middle) {
            $string = preg_replace('/\s+?(\S+)?$/', '', mb_substr($string, 0, $length+1));
            //通过乱码字符无法识别的特性将字符串截取
        }
        if(!$middle) {
            return mb_substr($string, 0, $length) . $etc;
        } else {
            return mb_substr($string, 0, $length/2) . $etc . mb_substr($string, -$length/2);
        }
    } else {
        return $string;
    }
  }

?>
