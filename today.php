<?php
include_once('init.php');
get_header("今日课表","today");
$c = new curriculum();
$c->today();
?>
<div id="title">
<h1><a href="./">网络课程</a></h1>
</div>

<div id="info">
		<p>
			专业：<span><?php echo $system->group['major']?></span>&nbsp;&nbsp;
			班级：<span><?php echo $system->group['class']?></span>&nbsp;&nbsp;
			年级:<span><?php echo $system->group['grade']?></span>&nbsp;&nbsp;
			<a href="setting.php">修改设置</a>
		</p>
		<p>
			当前课程日期：<span><?php echo substr($system->info['now_date'],0,4),"-",substr($system->info['now_date'],4,2),"-",substr($system->info['now_date'],6,2),"&nbsp";?></span>
			课程周：<span><?php echo $system->info['now_week']?>&nbsp(<?php echo number_to_week($system->info['week2'],false,"星期");?>)</span>
		</p>
</div>

<div id="today">
<a href="today.php">今日课程</a>
</div>

<div id="search">
<a href="search.php">搜索课程</a>
</div>

<div id="week">
<a href="week.php">本周课程</a>
</div>

<div id="table">
<table width="520" border="0" align="center" cellpadding="0">
<tbody align="center">
<tr class="tr_0"><th colspan="2"><a href="time.php">时间</a></th><th>课程</th><th>教室</th></tr>
<tr><td colspan="5"></td>
<?php for($i=1;$i<=$system->info['one_day_number'];$i++){?>
<tr class="tr_<?php echo $i%2+1;?>" title="<?php if(isset($c->today[$i]))echo "老师： ",$c->today[$i]['teacher'],!empty($c->today[$i]['other'])?"\n备注：".$c->today[$i]['other']:"";else echo "无课程";?>">
	<td><?php echo $i?></td>
	<td><?php echo substr($system->time[$i]['begin'],0,5)," - ",substr($system->time[$i]['end'],0,5) ?></td>
	<td><?php if(isset($c->today[$i]))echo "<a href=\"search.php?name=".$c->today[$i]['name']."\">",$c->today[$i]['name'],"</a>";?></td>
	<td><?php if(isset($c->today[$i]))echo $c->today[$i]['classroom']?></td>
</tr>
<?php

if($i%4==0){
	echo "<tr><td colspan=\"5\"></td>\n";
}
}
if(isset($c->today['-1'])){
	$i = '-1';
?>
<tr class="tr_<?php echo $system->info['one_day_number']%2+1;?>" title="<?php echo "老师： ",$c->today[$i]['teacher'],!empty($c->today[$i]['other'])?"\n备注：".$c->today[$i]['other']:"";?>">
	<td>其他时间</td>
	<td><?php echo substr($system->time[$i]['begin'],0,5)," - ",substr($system->time[$i]['end'],0,5) ?></td>
	<td><?php echo "<a href=\"search.php?name=".$c->today[$i]['name']."\">",$c->today[$i]['name'],"</a>";?></td>
	<td><?php echo $c->today[$i]['classroom']?></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>

<form action="today.php" method="get" id="form">
<input name="date" value="<?php echo date("Ymd",$system->info['now']+24*60*60)?>"><button type="submit">查看</button>
</form>

<?php get_footer();?>