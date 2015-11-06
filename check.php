// this file is for testing purposes,it isn't used in the project
<?php
$con=mysqli_connect("localhost","root","","");
    if(mysqli_connect_errno($con))
    { 
    	echo "Failed to connect".mysqli_connect_error();
    }
    $ip = mysqli_real_escape_string($_GET['ip']);
    $answ = mysqli_query($con,"SELECT * FROM banned WHERE ip='$ip'");
    if($answ->num_rows>0) echo 1;
    else echo 0;
?>
