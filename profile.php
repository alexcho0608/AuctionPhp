<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<script src="scripts/jquery-2.0.2.js"></script>
<script src= "scripts/ajax1.js"></script>
<?php
if(!isset($_COOKIE["name"]))
{
	header("Location:register.php");
}
?>
<script>
// get history of bets user has participated in
$("body").ready(function(e){
	$.ajax({
		url:"search.php",
		type:"POST",
		dataType:"html",
		success:function(result){
			$("#list").html(result);
		}
	});
});
</script>
<body bgcolor=#000000>
<div  id="header">
	<a href="index.php" class="logo">CarsBet</a>
</div>
<table style="width:100%;margin-top:20px;background-color:white;"><tr>
<td style="width:27%;">
<?php
if(!isset($_COOKIE["name"])) 
	echo "Добре дошъл,гост!";
else 
	echo "<div stlye='color:red'><b>Здрасти, ".$_COOKIE["name"]."!</b></div>";
?>
</td>
<td style="width:60%;">
<p>
<ul style="margin:0px 0px 0px 30px;padding:0px 0px 0px 50px;" class="nolines">
	<li><a class="menu" href="index.php">Начало</a></li>
	<?php
	if(!isset($_COOKIE["name"]))
	{
	echo '<li><a  class="menu" href="register.php">Регистрация</a></li>';
	}
	?>
	<li><a  class="menu" href="bet.php">Добави обява</a></li>
	<?php
	if(isset($_COOKIE["name"]))
	{
	echo '<li><a class="menu" href="profile.php">Профил</a></li>';
	}
	else echo '<li><a class="menu" href="warning.php">Профил</a></li>';
	?>
	<?php
	if(isset($_COOKIE["name"]))
	{
	echo '<li><a class="menu" href="logout.php">Изход</a></li>';
	}
	?>
</ul>
</p>
</td>
<td  id="clock" style="width:20%">
 <?php
 echo "<div style='font-weight:bold'>".date("Y-m-d")."</div>";
 ?>
</td></tr></table>
<div id="list"></div>
	<hr style="margin-top:300px"width=80% color=red align=center><br>
	<p align=center style="font-weight:1000;font-size;color:red"> ALEX & TEQ SITE</p>
</body>
</html>
