<?php 
	if(isset($_GET["word"]))
{
    echo "1";
	$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    	{ echo "Failed to connect".mysqli_connect_error();}
    $req="SELECT * FROM carsinfo ";
    $text=mysqli_real_escape_string($_GET["word"]);
    switch($_GET['opt'])
    {
    	case "Модел":$req += "WHERE Model='$text'";break;
    	case "Година":$req += "WHERE DateoffProduction='$text'";break;
    	case "Марка" :$req += "WHERE Car='$text'";break;
    	case "Цена"  :$req += "WHERE minprice BETWEEN ('$text'-2000) AND ('$text+2000)";
    }
    $answ=mysqli_connect($con,$req);
    $respond;
    while($res=mysqli_fetch_array($answ))
    {
    	$respond=""
    }
   echo $respond;
}
echo 20;
mysqli_close($con);
?>