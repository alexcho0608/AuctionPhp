<?php
if(isset($_POST["marka"]))
{
$con=mysqli_connect("localhost","root","","test");
if(mysqli_connect_errno($con))
{ 
	echo "Failed to connect".mysqli_connect_error();
}
$a=mysqli_real_escape_string($con,$_POST["marka"]);
$msg="SELECT * FROM  modelbrand WHERE brand='$a' ";
$answ=mysqli_query($con,$msg);
$str="";
while ( $row=mysqli_fetch_array($answ)) 
	{
	$str=$str."<option>".$row["model"]."</option>";
	}
echo $str;
mysqli_close($con);
}
?>