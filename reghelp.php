<?php
function validateMail($str)
{
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) 
    {
        header("Location:register.php");die();
    }
}
if(isset($_POST["name"]) && isset($_POST["password"]) && isset($_POST["e-mail"]))
{
    validateMail($_POST["e-mail"]);
    $con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $username = mysqli_real_escape_string($con,$_POST["name"]);
    $password = md5(mysqli_real_escape_string($con,$_POST["password"]));
    $email = mysqli_real_escape_string($con,$_POST["e-mail"]);
    $ip = $_SERVER['REMOTE_ADDR'];
    $msgSql = "SELECT * FROM users WHERE User_Name='$username' OR e_mail='$email'";
    $answer = mysqli_query($con,$msgSql);
    if($answer->num_rows == 0)
    {
    	$msgInsertSql = "INSERT INTO  users (User_Name,Password,e_mail,ip) VALUES ('$username','$password','$email','$ip')";
    	$bool = true;
        $bool = mysqli_query($con,$msgInsertSql);
        //var_dump($bool);
    	setcookie("name",$username,time()+24*60*60);
    	setcookie("password",md5($password),time()+24*60*60);
    	header("Location:index.php");
    }
    else
    {
    	header("Location:register.php");
    }
}
mysqli_close($con);
?>
