<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    $con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
    	echo "Failed to connect".mysqli_connect_error();
    }
    $username = mysqli_real_escape_string($con,$_POST["username"]);
    $password = mysqli_real_escape_string($con,$_POST["password"]);
    $sqlMsg="SELECT * FROM users WHERE 
    User_Name='$username' AND Password='$password'";
	$answer = mysqli_query($con,$sqlMsg);
	if($row = mysqli_fetch_array($answer))
	{
		setcookie('name',$row['User_Name'],time()+60*60*24);
		setcookie('password', md5($row['Password']), time()+60*60*24);
		header('Location:index.php');
	}
	else 
		header("Location:warning.php");
		
	mysqli_close($con);
}
else 
	header("Location:warning.php");
?>
