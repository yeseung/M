<?php


$connect_db = sql_connect('localhost', '', '');
$select_db = sql_select_db('', $connect_db);
if(!$select_db) die("db connect error");


sql_query("set session character_set_connection=utf8;");
sql_query("set session character_set_results=utf8;");
sql_query("set session character_set_client=utf8;");

define('SERVER_TIME',    time());
define('TIME_YMDHIS',    date('Y-m-d H:i:s', SERVER_TIME));
define('TIME_YMD',       substr(TIME_YMDHIS, 0, 10));
define('TIME_HIS',       substr(TIME_YMDHIS, 11, 8));


// DB 연결
function sql_connect($host, $user, $pass)
{
	@mysql_query(" set names utf8 ");
    return @mysql_connect($host, $user, $pass);
}


// DB 선택
function sql_select_db($db, $connect)
{
    @mysql_query(" set names utf8 ");
    return @mysql_select_db($db, $connect);
}


function sql_query($sql, $error=TRUE){
    if ($error)
        $result = @mysql_query($sql) or die("<p>$sql<p>" . mysql_errno() . " : " .  mysql_error() . "<p>error file : $_SERVER[PHP_SELF]");
    else
        $result = @mysql_query($sql);
    return $result;
}


function sql_fetch($sql, $error=TRUE){
    $result = sql_query($sql, $error);
    $row = mysql_fetch_array($result);
    return $row;
}


// 결과값에서 한행 연관배열(이름으로)로 얻는다.
function sql_fetch_array($result){
    $row = @mysql_fetch_assoc($result);
    return $row;
}


/*function get_curl($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSLVERSION, 3);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$return = curl_exec($ch); 	
	$cinfo = curl_getinfo($ch);
	curl_close($ch);
	
	if ($cinfo['http_code'] != 200) return FALSE;
	return $return;	
}*/	


