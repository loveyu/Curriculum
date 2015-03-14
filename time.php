<?php
include_once('init.php');
get_header('时刻表',"time");
?>
<div id="title">
<h1><a href="./">网络课程</a></h1>
</div>

<div id="time">
<a href="time.php">时刻表</a>
</div>

<div id="today">
<a href="today.php">今日课表</a>
</div>

<div id="search">
<a href="search.php">课程搜索</a>
</div>

<div id="week">
<a href="week.php">本周课表</a>
</div>

<div id="table">
<table width="404" border="0" align="center" cellpadding="2" cellspacing="0">
<tbody align="center">
<tr class="tr_0"><th>节时</th><th>时间</th><th>备注</th></tr>
<?php
$i=0;
foreach($system->time as $v){
?>
<tr class="tr_<?php echo ($i++)%2+1?>"><td><?php echo $v['id']?></td><td><?php echo substr($v['begin'],0,5),"-",substr($v['end'],0,5)?></td><td><?php echo $v['other']?></td></tr>
<?
if($v['id']==-1 || $v['id']%4==0)echo "<tr><td colspan=\"3\"></td></tr>";
}
?>
</tbody>
</table>
</div>

<?php
get_footer();
?>