<?php
if(isset($_POST["id"])&&isset($_POST["name"])&&isset($_POST["price"]))
{
    $con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
      { echo "Failed to connect".mysqli_connect_error();}
    $name=mysqli_real_escape_string($con,$_POST["name"]);
    $price=mysqli_real_escape_string($con,$_POST["price"]);
    $id=mysqli_real_escape_string($con,$_POST["id"]);
    $oldPrice=mysqli_real_escape_string($con,$_POST["oldprice"]);
    $price=$oldPrice+$price;
    $msg="UPDATE carsinfo SET buyerName='$name',BidPrice='$price' WHERE Id='$id'";
    mysqli_query($con,$msg);
    $str=$name.";".$price;
    echo $str;
    mysqli_close($con);
}
?>