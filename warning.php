<!doctype html>
<html>
<head><title>Test page</title></head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/index.css">
<script src="scripts/jquery-2.0.2.js"></script>
<body bgcolor=#000000>
<div  style="display:inline">
	<a href="index.php" class="logo">CarsBet</a>
</div>
<br>
<table style="background-color:#ff00ff;color:red;padding:3px 3px 3px 3px;margin: 100px 100px 100px 430px;" height=300 width=400>
	<tr height=20% >
		<td> 
		<div style="font-size:150%;font-weight:bold;font-style:oblique;text-align:center">Не сте влезли в профила си!</div>
		</td>
	</tr>
	<tr height=90%>
		<td>
		<div style="align:center">
		<form method="POST" action="User.php">
	            <label>Име:&nbsp&nbsp&nbsp &nbsp&nbsp <input type=text name="username"></input></label> <br>
	            <label>Парола:&nbsp <input type=password name="password"></input></label><br> 
	            <input type=submit style="margin-left:110px;padding:0px 10px 0px 10px" value="Влез" />
	             <br><br>
		</from>
		<div style="font-size:150%;font-weight:bold;font-style:oblique;text-align:center">Все още нямате регистрация?<br><a href="register.php">Регистрирай се</a>
		</div>
		</div>
		</td>
	</tr>
</table>
</body>
</html>
