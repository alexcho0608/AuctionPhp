<?php
if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["price"]))
{
    $con = mysqli_connect("localhost","root","","");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $name = mysqli_real_escape_string($con,$_POST["name"]);
    $currentPrice = mysqli_real_escape_string($con,$_POST["currentPrice"]);
    $id = mysqli_real_escape_string($con,$_POST["id"]);
    $raisePrice = mysqli_real_escape_string($con,$_POST["raisePrice"]);
    $currentPrice = $currentPrice + $raisePrice;
    $msgSql = "UPDATE carsinfo SET buyerName = '$name', BidPrice='$currentPrice' WHERE Id='$id'";
    mysqli_query($con,$msgSql);
    $str = $name . ";" . $currentPrice;
    echo $str;
    mysqli_close($con);
}
?>
