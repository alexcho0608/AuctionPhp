<?php
function postOK()
{
	return isset($_POST["marka"])&&isset($_POST["model"])&&
	isset($_POST["cena"])&&isset($_POST["data"]);
}
function fileOK()
{
	return ($_FILES["snimka"]["error"]>0)&&(($_FILES["snimka"]["type"] == "image/gif")
|| ($_FILES["snimka"]["type"] == "image/jpeg")
|| ($_FILES["snimka"]["type"] == "image/jpg")
|| ($_FILES["snimka"]["type"] == "image/pjpeg")
|| ($_FILES["snimka"]["type"] == "image/x-png")
|| ($_FILES["snimka"]["type"] == "image/png"));
}
if(!(fileOK()&&postOK()))
{	
$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    	{ echo "Failed to connect".mysqli_connect_error();}
$marka=mysqli_real_escape_string($con,$_POST["marka"]);
$model=mysqli_real_escape_string($con,$_POST["model"]);
$cena=mysqli_real_escape_string($con,$_POST["cena"]);
$date=mysqli_real_escape_string($con,$_POST["date"]);
$name=mysqli_real_escape_string($con,$_COOKIE["name"]);
$expire=time()+2*24*60*60;
$expire=date("Y-m-d",$expire);
$snimka=$_FILES["snimka"]["name"];
$image="Images/".$_FILES["snimka"]["name"];
    if (file_exists("Images/" . $_FILES["snimka"]["name"]))
      {
      echo $_FILES["snimka"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["snimka"]["tmp_name"],
      "Images/" . $snimka["_FILES"]["name"]);
      }
 $msg="INSERT INTO carsinfo (Car,DateofProduction,Model,BidPrice,image,sellerName,Expire)
 VALUES ('$marka','$date','$model','$cena','$image','$name','$expire')";
$succ=mysqli_query($con,$msg);

if($succ) setcookie("success",1,time()+60);
//header("Location:bet.php");
mysqli_close($con);
}
if(isset($_POST["id"])&&isset($_POST["name"])&&isset($_POST["price"]))
{
$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
      { echo "Failed to connect".mysqli_connect_error();}
    $a=mysqli_real_escape_string($con,$_POST["name"]);
    $b=mysqli_real_escape_string($con,$_POST["price"]);
    $id=mysqli_real_escape_string($con,$_POST["id"]);
    $d=mysqli_real_escape_string($con,$_POST["oldprice"]);
    $b=$b+$d;
    $msg="UPDATE carsinfo SET buyerName='$a',price='$b' WHERE Id='$id'";
    mysqli_query($con,$msg);
    $str=$a.";".$b;
    echo $str;
    mysqli_close($con);
}
?>