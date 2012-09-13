<?php
exit;
include_once 'init.php';
$s = $_POST['t'];
foreach($s as $n => $v){
	$db->insert("time",array('id'=>$n,'begin'=>$v['begin'].":00",'end'=>$v['end'].":00"));
}
?>