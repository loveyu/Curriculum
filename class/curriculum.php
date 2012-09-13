<?php
class Curriculum{
	private $where;
	private $db;
	private $system;
	private $week;
	private $error;
	public $today;
	function __construct(){
		global $db,$system;
		$this->error = array();
		$this->db = &$db;
		$this->system = &$system;
	}
	public function today(){
		$this->today = array();
		$subject = $this->db->select("subject","*","(`week` like '%,".$this->system->info['now_week'].",%') AND (`week2` like '%".$this->system->info['week2']."%') AND (`group` = ".$this->system->group['id'].")");
		$tmp = array();
		foreach($subject as $v){
			$tmp = explode(',',$v['time']);
			foreach($tmp as $v2){
				if(empty($v2))continue;
				$this->today[$v2] = $v;
			}
		}
	}
	public function get(){
		$this->get_where();
		return $this->db->select("subject","*",$this->where." AND `group`=".$this->system->group['id']);
	}
	private function get_where(){
		$where = array();
		$this->where = '';
		$tmp = '';
		$tmp2 = '';
		if(isset($_GET['name']) && !empty($_GET['name'])){
			array_push($where, "(`name` like '%".$_GET['name']."%')");
		}
		if(isset($_GET['week']) && !empty($_GET['week'])){
			$tmp = explode(',',$_GET['week']);
			$tmp2 = '';
			foreach($tmp as $v){
				if(empty($v) || !is_numeric($v))continue;
				if($v>$this->system->info['all_week']){
					array_push($this->error,"学期最大周期为".$this->system->info['all_week']);
					continue;
				}
				if($v<1){
					array_push($this->error,"学期最小周期为 1 ");
					continue;
				}
			
				$tmp2 .= "(`week` like '%,".$v.",%') OR ";
			}
			if(!empty($tmp2))array_push($where,substr($tmp2,0,-4));
		}
		if(isset($_GET['time']) && !empty($_GET['time'])){
			$tmp = explode(',',$_GET['time']);
			$tmp2 = '';
			foreach($tmp as $v){
				if(empty($v))continue;
				$tmp2 .= "(`time` like '%,".$v.",%') OR ";
			}
			array_push($where,substr($tmp2,0,-4));
		}
		if(isset($_GET['week2']) && !empty($_GET['week2'])){
			$tmp = explode(',',$_GET['week2']);
			$tmp2 = '';
			foreach($tmp as $v){
				if(empty($v))continue;
				if(!is_numeric($v))
					$v=number_to_week($v,true);
				$tmp2 .= "(`week2` like '%".$v."%') OR ";
			}
			if(!empty($tmp2))array_push($where,substr($tmp2,0,-4));
		}
		if(isset($_GET['classroom']) && !empty($_GET['classroom']) ){
			$tmp = explode(',',$_GET['classroom']);
			$tmp2 = '';
			foreach($tmp as $v){
				if(empty($v))continue;
				$tmp2 .= "(`classroom` like '%".$v."%') OR ";
			}
			if(!empty($tmp2))array_push($where,substr($tmp2,0,-4));
		}
		if(isset($_GET['teacher']) && !empty($_GET['teacher'])){
			$tmp = explode(',',$_GET['teacher']);
			$tmp2 = '';
			foreach($tmp as $v){
				if(empty($v))continue;
				$tmp2 .= "(`teacher` like '%".$v."%') OR ";
			}
			if(!empty($tmp2))array_push($where,substr($tmp2,0,-4));
		}	
		foreach($where as $v){
			$this->where.="(".$v.") AND ";
		}
		if(!empty($this->where))
			$this->where = substr($this->where,0,-5);
		else
			$this->where = '1';
	}
	public function show_errors($before='',$end=''){
		$tmp='';
		foreach($this->error as $v)
			$tmp.=$before.' '.$v.' '.$end."\n";
		return $tmp;
	}
}
?>