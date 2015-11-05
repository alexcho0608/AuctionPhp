<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<script src="scripts/check.js"></script>
<script src="scripts/jquery-2.0.2.js"></script>
<?php
if(!isset($_COOKIE["name"]))
{
	header("Location:register.php");
}
?>
<script>
$("#Word").keypress(function(e)
{
	if(e.which==13)
	{	
		if(window.XMLHttpRequest)
		{
		 msg=new XMLHttpRequest;
		}
		else
		{
			msg=new ActiveXObjext("Microsoft.XMLHttp");
		}
		var option=$("opt").val();
		var tekst=$("Word").val();
		if(tekst!="")
		{
			msg.open("GET","Search.php?word="+tekst+&"opt="+option,true);
			msg.send();
			msg.onreadystatechange=function()
			{
				if(msg.readyState==4&&msg.status==200)
				{
					var response=msg.responseText;
					$("list").html("<font color=red>haha</font>");
				}
			}
		}
	}
});
</script>
<body bgcolor=#000000>
<div  style="display:inline">
	<a href="index.php" class="logo">CarsBet</a>
</div>
<table style="width:100%;margin-top:20px;background-color:white;"><tr>
<td style="width:27%;">
<?php
if(!isset($_COOKIE["name"])) echo "Добре дошъл,гост!";
else echo "<div stlye='color:red'><b>Здрасти".$_COOKIE["name"]."</b></div>";
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
 echo "<div style='font-weight:bold'>".date("Y-M-D")."</div>";
 ?>
</td></tr></table>



	<hr style="margin-top:300px"width=80% color=red align=center><br>
	<p align=center style="font-weight:1000;font-size;color:red"> ALEX & TEQ SITE</p>
</body>
</html>