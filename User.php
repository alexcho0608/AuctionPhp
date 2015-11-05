<?php
session_start();
if(isset($_POST['User'])&&isset($_POST['Password']))
{
	$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
    	echo "Failed to connect".mysqli_connect_error();
    }
    $a=mysqli_real_escape_string($con,$_POST["User"]);
    $b=mysqli_real_escape_string($con,$_POST["Password"]);
    $msg="SELECT * FROM users WHERE 
    User_Name='$a' AND Password='$b'";
	$answ=mysqli_query($con,$msg);
	if($row=mysqli_fetch_array($answ))
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