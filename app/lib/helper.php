<?php


function helper_sql_regcase($str){
    $res = "";
    $chars = str_split($str);
    foreach($chars as $char){
        if(preg_match("/[A-Za-z]/", $char))
            $res .= "[".mb_strtoupper($char, 'UTF-8').mb_strtolower($char, 'UTF-8')."]";
        else $res .= $char;
    }
    return $res;
}

function anti_injection($sql){
  $sql = preg_replace(helper_sql_regcase("/(http|www|wget|from|select|insert|delete|where|.dat|.txt|.gif|drop table|show tables| or |#|\*|--|\\\\)/"),"",$sql);
  $sql = trim($sql);
  $sql = strip_tags($sql);
  $sql = addslashes($sql);
  return $sql;
}

/* 
* Obtem a url tratada e limpa
* 0 => string 'controller' (length=10)
* 1 => string 'action' (length=6)
* 2 => string 'param' (length=5)
*/
function URL($url = '', $remove_zero = false){
  if(empty($url) || $url == null) 
    return false;

  $_url = explode('/', filter_var( rtrim(urldecode($url), '/') , FILTER_SANITIZE_URL));  
  $_url = array_filter(array_map('anti_injection', $_url));    
  if($remove_zero) array_shift($_url);
  return $_url;  
}

function getURL($index, $default = null) {
    $url = URL($_SERVER['REQUEST_URI'], false);    
    return (isset($url[$index]) && !empty($url[$index])) ? $url[$index] : $default;
}
?>