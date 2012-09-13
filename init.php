<?php
include_once 'config.php';
include_once CLASS_PATH.'mysql.php';
include_once CLASS_PATH.'curriculum.php';
include_once CLASS_PATH.'system.php';
include_once 'template.php';

if($config['debug'])error_reporting(E_ALL);
else error_reporting(E_ALL^E_WARNING^E_NOTICE);

header("content-Type: text/html; charset=".$config['char_set']);
$db = new Mysql();

$system = new System();
?>