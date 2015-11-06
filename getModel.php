<?php
if(isset($_POST["model"]))
{
$con = mysqli_connect("localhost","root","","");
if(mysqli_connect_errno($con))
{ 
	echo "Failed to connect".mysqli_connect_error();
}
$model = mysqli_real_escape_string($con,$_POST["model"]);
$sqlMsg = "SELECT * FROM  modelbrand WHERE brand='$model' ";
$models = mysqli_query($con,$sqlMsg);
$resultStr = "";
while ( $row = mysqli_fetch_array($models)) 
	{
	$resultStr = $resultStr . "<option>" . $row["model"] . "</option>";
	}
echo $resultStr;
mysqli_close($con);
}
?>
