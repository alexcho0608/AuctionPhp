<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<script src="scripts/jquery-2.0.2.js"></script>
<?php
	session_start();
	if(isset($_SESSION['views']))
	$_SESSION['views']=$_SESSION['views']+1;
	else
	$_SESSION['views']=1;
?>
<body bgcolor=#000000>
<div  style="display:inline">
	<a href="index.php" class="logo">CarsBet</a>
</div>
<br>
<table style="background-color:#ff00ff;color:red;padding:3px 3px 3px 3px;margin: 100px 100px 100px 430px;" height=300 width=400>
	<tr height=20% ><td> <div style="font-size:400%;font-weight:bold;font-style:oblique">CarsBet</div></td></tr>
	<tr height=90%>
		<td>
		<div style="align:center">
			<form method="POST" action="reghelp.php">
            <label>Име:&nbsp&nbsp&nbsp &nbsp&nbsp <input type=text name="name"></input></label> <br>
            <label>Парола:&nbsp <input type=password name="password"></input></label><br> 
            <label> Е-майл:&nbsp <input type=text name="e-mail"></input></label> <br><br><br>
            <center><input type=submit value="Регистрирай се"></intput></center>
			</from>
		</td>
		</div>
	</tr>
	<tr>
	<td>
		<?php
        if($_SESSION['views']>=2) echo "<div style='text-align:center;text-weight:bold;color:blue;'>Грешно потребителско име или е-майл</div>";
		?>
	</td>
    </tr>
</table>
</body>
</html>