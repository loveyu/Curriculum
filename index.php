<?php
include_once("init.php");
if(!isset($_COOKIE[$config['cookie_prefix']."group"]) || $_COOKIE[$config['cookie_prefix']."group"]<1)include_once("setting.php");
else include_once('today.php');
?>