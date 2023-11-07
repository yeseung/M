<?php
header("Content-type:application/json; charset=utf-8");
//header("content-type:text/html; charset=utf-8");

include_once("lib.php");



$q = array();


$p = trim($_POST['p']);
$s = trim($_POST['s']);
$i = trim($_POST['i']);


$row = sql_fetch(" select count(*) as cnt from bin_messenger where mg_idx = TRIM('$i') ");
if ($row['cnt']==0){
	$q['index'] = 'ERR';
	echo json_encode($q);
	exit;
}
		

$sql = " update bin_messenger set {$s} = '".$p."' where mg_idx = '".$i."' ";
sql_query($sql);

$q['index'] = $p." / ".$s." / ".$i;
$q['sql'] = $sql;


echo json_encode($q);
exit;


