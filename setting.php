<?php
include_once("init.php");
if(isset($_POST['group'])){
	$system->set_group();
	header('Location: index.php');
	exit;
}
get_header("设置页面","setting");
?>
<h2>选择你的班级</h2>
<form action="setting.php" method="post">
<select name="group">
<?php
foreach($system->get_all_group() as $v)
echo "<option value=\"",$v['id'],"\">",$v['major'],$v['grade'],"级",$v['class'],"班</option>";
?>
</select>
<button type="submit">确定</button>
</form>
<?php get_footer();?>