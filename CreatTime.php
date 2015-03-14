<?php
exit;
include_once 'init.php';
$cu_number = isset($_GET['n'])?$_GET['n']:8;
get_header("创建时间表");
?>
<form action="DoCreatTime.php" method="post">
<?php
for($i = 1; $i <= $cu_number; $i++){
?>
<div>
<p><?php echo $i?></p>
<input name="t[<?php echo $i?>][begin]" type="text">
<input name="t[<?php echo $i?>][end]" type="text">
</div>
<?php	
}
?>
<button type="submit">Creat</button>
</form>
<?php get_footer();?>