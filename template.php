<?php
function get_header($title='',$css = ''){
	global $config;
	if(!empty($config['site_name']))$title.=" - ".$config['site_name'];
	include TEMPLATE_PATH.'header.php';
}
function get_footer(){
	include TEMPLATE_PATH.'footer.php';
}
function get_search(){
	include TEMPLATE_PATH.'search.php';
}
function number_to_week($number,$invert=false,$begin='',$end=''){
	$a = array( 1 => '一',
				2 => '二',
				3 => '三',
				4 => '四',
				5 => '五',
				6 => '六',
				7 => '日'
				);
	if(!$invert)$a=array_flip($a);
	foreach($a as $i => $v){
		$number=str_replace($v,$i,$number);
	}
	return $begin.$number.$end;
}
function long_list_to_short($s){
	$a = explode(',',$s);
	$n='';
	$next=0;
	$start=0;
	foreach($a as $v){
		if(empty($v))continue;
		$sv=$v;
		if($next==0){
			$n=$v;
			$start=$v;
		}
		if($v==$next+1 || $next==0){
			$next=$v;
		}else{
			if($start<$next)$n.="-".$next;
			$next=$v;
			$start=$v;
			$n.=",".$v;
		}
	}
	if($start<$next)$n.="-".$next;
	return $n;
}
?>