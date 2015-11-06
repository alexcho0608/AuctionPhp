<?php 
if(isset($_GET["word"]))
{
    $con = mysqli_connect("localhost","root","","");
    if(mysqli_connect_errno($con))
    	 echo "Failed to connect".mysqli_connect_error();
    $sqlMsg = "SELECT * FROM carsinfo ";
    $text = mysqli_real_escape_string($_GET["word"]);
    switch($_GET['opt'])
    {
    	case "Модел":$req += "WHERE Model='$text'";break;
    	case "Година":$req += "WHERE DateoffProduction='$text'";break;
    	case "Марка" :$req += "WHERE Car='$text'";break;
    	case "Цена"  :$req += "WHERE minprice BETWEEN ('$text'-2000) AND ('$text+2000)";
    }
    $answ = mysqli_connect($con,$req);
    while($res = mysqli_fetch_array($answ))
    {
    	$respond = "";
    }
   echo $respond;
}
echo 20;
mysqli_close($con);
?>
