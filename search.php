<?php
include_once 'init.php';
get_header("搜索查看","search");
$c = new curriculum();
$get = $c->get();
?>
<div id="title">
<h1><a href="./">网络课程</a></h1>
</div>
<?php get_search();?>

<div id="info">
<ul class="left">
<?php echo $c->show_errors("\t<li>","</li>");?>
</ul>
<ul class="right link">
<li><a href="search.php">搜索课表</a></li>
<li><a href="today.php">今日课表</a></li>
<li><a href="week.php">本周课表</a></li>
</ul>
<ul class="right">
<li>专业：<span><?php echo $system->group['major']?></span></li>
<li>班级：<span><?php echo $system->group['class']?></span></li>
<li>年级<span>：<?php echo $system->group['grade']?></span></li>
<li><a href="setting.php">修改设置</a></li>
</ul>
<div class="clear"></div>
</div>

<div id="table">

<table width="730" border="1" align="center" cellpadding="6" cellspacing="0">
<tbody align="center">
	<tr><th colspan="2">课程</th><th>星期</th><th>教室</th><th>老师</th><th><a href="time.php" target="_blank" title="查看作息时间表">时间</a></th><th>周次</th><th>学分</th><th>学时</th></tr>

<?php foreach($get as $n => $v){ ?>
	<tr><td><?php echo $n+1;?></td><td><?php echo $v['name']?></td><td><?php echo number_to_week($v['week2'])?></td><td><?php echo $v['classroom']?></td><td><?php echo $v['teacher']?></td><td><?php echo substr($v['time'],1,-1);?>节</td><td><?php echo long_list_to_short($v['week']),"周";?></td><td><?php echo $v['credit']?></td><td><?php echo $v['hours']?></td></tr>
<?php } ?>

</tbody>
</table>

</div>

<?php get_footer();?>