<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<script src="scripts/jquery-2.0.2.js"></script>
<script>
	var move = 0;
	var commentsString;
	function start()
	{
		move = 0;
	}
	function goLeft()
	{
		var commentTable  = "<table style='border-color:blue;background-color:#114411' id='bet' width=30% ><thead id='res' style='color:orange;text-weight:bold;'><th>Коментари за залагане</th></thead>";
		for(var i = move; i < move + 10; i++)
		{
			if(i < commentsString.length - 1) 
				item = item + commentsString[i];
		}
		commentTable  = commentTable  + "<br><input type=button onclick=goLeft() value='Left'></input> <input type=button onclick=goRight() value='Right'></input></table>";
		document.getElementById("comm").innerHTML = commentTable;	
		move += 10;
		commentTable  = "";
	}
	function goRight()
	{
		var commentTable = "<table style='border-color:blue;background-color:#114411' id='bet' width=30% ><thead id='res' style='color:orange;text-weight:bold;'><th>Коментари за залагане</th></thead>";
		for(var i = move; i > move - 10; i--)
		{
			if(i >= 0) 
				commentTable = commentsString[i] + commentTable;
		}
		commentTable = commentTable  + "<br><input type=button onclick=goLeft() value='Left'></input> <input type=button onclick=goRight() value='Right'></input></table>";
		document.getElementById("comm").innerHTML = commentTable;
		move = move - 10;
		commentTable  = "";

	}
</script>
<body color=red bgcolor=#000000>
<div style="display:inline;">
	<a href="index.php" class="logo">CarsBet</a>
<?php
if(!isset($_COOKIE["name"]))
{
echo "<fieldset style='display:inline;margin-left:90px;color:red'>
<form action='User.php'  method='POST' >
 <label value='User'>Потребител:<input type=text class='textfield' name='User' id='User' /></label>
 <label value='Password'> Парола :<input type=password class='textfield'name='Password' id='Password'/></label>
   <input type='submit' class='button1'value='Влез'' />
	</form>
</fieldset>";
}
?>
</div>
<table style="width:100%;margin-top:20px;background-color:white;">
<tr>
<td style="width:27%;">
<?php
if(!isset($_COOKIE["name"])) 
	echo "Добре дошъл,гост!";
else 
	echo "<div stlye='color:red'><b>Здравей, ".$_COOKIE["name"]."!</b></div>";
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
	<li><a  id="men" class="menu" href="bet.php">Добави обява</a></li>
	<?php
	if(isset($_COOKIE["name"]))
	{
		echo '<li><a class="menu" href="profile.php">Профил</a></li>';
	}
	else 
		echo '<li><a class="menu" href="warning.php">Профил</a></li>';
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
</td></tr>
</table>
<p style="clear:both">
<div style="margin-left:500px;color:red">
<label>Търсене:<input type="text" id="word" class="textfield1" name="word"/></label>
<label>Марка:&nbsp
<select  name="model" id="model">
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
</label>
<label>
	Модел: &nbsp
	<select name="model" id="model">
	</select>
</label>
<label>
Година :&nbsp
<select id="year">
	<?php
	for($i = 1992; $i < 2013; $i++)
	echo "<option>След".$i."</option>";
	?>
</select>
</label>
</div>
<br>
<div id="list"></div>
<div id="comm"></div>
<form style="padding-left:100px" >
<span style="text-weight:400%;text-size:150%;color:red">Коментар:</span><br>
<input type=text value="ID на залога" id="id" name="id" /><br>
<textarea id="textarea" style="resize:vertical; max-height:300px; min-height:100px;resize:horizontal; max-width:400px; min-width:200px;"></textarea><br>
<input type=button id="subm" value="Коментар"/>	<br>
</form>
<hr style="margin-top:200px"width=80% color=red align=center>
<p align=center style="font-weight:1000;font-size:120%;color:red"> ALEX & TEQ SITE</p>
<script src="mainEvents.js"></script>
<script>
//comment submit button
$("#subm").click(function(){
	var commentMsg = $("#textarea").val();
	var postId = $("input#id").val();
	$("#textarea").val("");
	if(msg == "")
	{
		$.ajax({
			type:"POST",
			url:"getComments.php",
			data : { postId:postId },
			dataType:"html",
			success:function(result)
			{
				commentsString = result.split("!@#");
				start();
				goLeft();
			}
		});
	}
	else
	{
		var cookie = document.cookie;
		var cookiePart = cookie.substr(cookie.indexOf("name="));
		var username = cookiePart.split(';');
		username = username[0].substr(username[0].indexOf('=')+1);
		$.ajax({
			type:"POST",
			url:"getComments.php",
			data : {id:postId, msg:commentMsg, name:username},
			dataType:"html",
			success:function(result)
			{
				commentsString = result.split("!@#");
				start();
				goLeft();
			}
		});
	}
});
</script>
</body>
</html>
