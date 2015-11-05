<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/index.css">
<body bgcolor=#000000>
<div  style="display:inline">
	<a href="index.php" class="logo">CarsBet</a>
<?php
if(!isset($_COOKIE["name"]))
{
echo "<fieldset style='display:inline;margin-left:90px;color:red'>

<form action='User.php' autocomplete=off method='POST' >
 <label value='User'>Потребител:<input type=text class='textfield' name='User' id='User' /></label>
 <label value='Password'> Парола :<input type=password class='textfield'name='Password' id='Password'/></label>
 <input type='submit' class='button1'value='Влез'' />
</form>
</fieldset>";
}
?>
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
 echo "<div style='font-weight:bold'>".date("Y-j-D")."</div>";
 ?>
</td></tr></table>
	<br>
<form action="upload.php" enctype="multipart/form-data" method="POST" style="height:300 px;width:400px;color:red;">
<table height=400 width=400>
<tr>
<td>
<center>Marka</center>
</td>	
<td>
<select id="marka">
	<option></option>
	<option>Audi</option>
    <option>BMW</option>
    <option>Chevrolet</option>
    <option>Citroen</option>
    <option>Ford</option>
    <option>Mazda</option>
    <option>Mercedes</option>
    <option>Pegueot</option>
    <option>Renault</option>
</select>
</td></tr>
<tr>
<td><center>Model</center></td>
<td>
<select name="model" id="model">
	</select>
</td>
</tr>
<tr>
<td> <center>Цена</center></td>
<td>	
<input type=text name="cena" id="cena" /></td>
</tr>
<tr>
<td><center>Снимка</center></td>	
<td><input type=file name="snimka" id="snimka"/></td>
</tr>
<tr>
<td><center>Година на производство:</center></td>	
<td><input type=text name="date" id="date"/></td>
</tr>  	
</tr>
<tr>
<td>
<input type=submit value="Качи" id="DD"/>
</td>
</tr>
</table>
</form>
<br>
	<hr style="margin-top:300px;"width=80% color=red align=center>
	<p align=center style="font-weight:1000;font-size:120%;color:red"> ALEX & TEQ SITE</p>
<script>
$("#marka").change(function()
{
var brand=$("#marka").val();
$.ajax({
	type:"POST",
	url:"getModel.php",
	data:{marka: brand},
	dataType:"html",
	success:function(result)
	{
		$("#model").html(result);
	}
});
});
</script>
</body>
</html>