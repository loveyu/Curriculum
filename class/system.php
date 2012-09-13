<?php
class System{
	public $group;
	public $config;
	public $info;
	private $db;
	public $time;
	function __construct(){
		global $config,$db;
		$this->config = &$config;
		$this->db = &$db;
		$this->get_group();
		$this->get_setting();
		$this->count_week();
		$this->get_time();
	}
	public function set_group(){
		$this->set_cookie("group",$_POST['group'],time()+31536000);
	}
	public function get_time(){
		$time = $this->db->select("time");
		$this->time = array();
		foreach($time as $v){
			$this->time[$v['id']] = $v;
		}
	}
	public function get_all_group(){
		return $this->db->select("group");
	}
	private function get_group(){
		$group['id'] = $this->get_cookie('group');
		if(!$group['id'] || !is_numeric($group['id']) || $group['id']<1)$group['id'] = 1;
		$s = $this->db->select("group","*","`id`=".$group['id']);
		$group = $s[0];
		$this->group = $group;
	}
	private function count_week(){
		$now_time = (isset($_GET['date']) && is_numeric($_GET['date']) && checkdate(substr($_GET['date'],4,2),substr($_GET['date'],6,2),substr($_GET['date'],0,4)))?$_GET['date']:date('Ymd');
		$now = mktime(0,0,0,substr($now_time,4,2),substr($now_time,6,2),substr($now_time,0,4));
		$date = $this->info['first_week'];
		$begin = mktime(0,0,0,(int)substr($date,5,2),(int)substr($date,8,2),(int)substr($date,0,4));
		$x = ($now-$begin)/(24*60*60*7);
		$this->info['now'] = $now;
		$this->info['now_date'] = $now_time;
		$this->info['now_week'] = (int)$x+1;
		$this->info['week2'] = date("N",$now);
	}
	private function get_setting(){
		$s = $this->db->select("setting");
		$this->info = array();
		foreach($s as $v){
			$this->info[$v['name']] = $v['value'];
		}
	}
	public function get_cookie($name){
		if(!isset($_COOKIE[$this->config['cookie_prefix'].$name]))return false;
		else return $_COOKIE[$this->config['cookie_prefix'].$name];
	}
	public function set_cookie($name,$value,$time){
		setcookie($this->config['cookie_prefix'].$name,$value,$time);
	}
}
?>