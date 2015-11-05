<?php
function validateMail($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) 
    {
        header("Location:register.php");die();
    }
}
if(isset($_POST["name"])&&isset($_POST["password"])&&isset($_POST["e-mail"]))
{
	validateMail($_POST["e-mail"]);
	$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $a=mysqli_real_escape_string($con,$_POST["name"]);
    $b=mysqli_real_escape_string($con,$_POST["password"]);
    $c=mysqli_real_escape_string($con,$_POST["e-mail"]);
    $ip=$_SERVER['REMOTE_ADDR'];
    $msg="SELECT * FROM users WHERE User_Name='$a' OR e_mail='$c'";
    $answ=mysqli_query($con,$msg);
    if($answ->num_rows==0)
    {
    	$msg="INSERT INTO  users (User_Name,Password,e_mail,ip) VALUES ('$a','$b','$c','$ip')";
    	$bool=true;
        $bool=mysqli_query($con,$msg);
        //var_dump($bool);
    	setcookie("name",$a,time()+24*60*60);
    	setcookie("password",md5($b),time()+24*60*60);
    	header("Location:index.php");
    }
    else
    {
    	header("Location:register.php");
    }
}
mysqli_close($con);
?>