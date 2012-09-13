<?php
define('CLASS_PATH','class/');
define('TEMPLATE_PATH','template/');
$config['site_name'] = "课程表";
$config['char_set'] = 'utf8';
$config['cookie_prefix'] = "cu_";
$config['debug'] = true;
$config['db']['hostname'] = 'localhost';
$config['db']['username'] = 'root';
$config['db']['password'] = '123456';
$config['db']['database'] = 'curriculum';
$config['db']['dbprefix'] = 'c_';
$config['db']['db_debug'] = true;
$config['db']['char_set'] = $config['char_set'];
?>