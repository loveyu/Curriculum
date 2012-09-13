<?php
exit;
include_once 'init.php';
if(isset($_GET['group'])){
	$s = $db->select("subject","*","`group`=1");
	print_r($s);
	foreach($s as $v)				
		$db -> insert("subject",array(  "name" => $v['name'],
										"week" => $v['week'],
										"time" => $v['time'],
										"week2" => $v['week2'],
										"classroom" => $v['classroom'],
										"group" => $_GET['group'],
										"teacher" => $v['teacher'],
										"credit" => $v['credit'],
										"hours" => $v['hours'],
										"other" => $v['other'],
									)
				);
}
?>