<?php
if(isset($_POST["brandp"])&&isset($_POST["modelp"]))
{
	$con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $brand=mysqli_real_escape_string($con,$_POST["brandp"]);
    $model=mysqli_real_escape_string($con,$_POST["modelp"]);
    $msg="SELECT * FROM carsinfo WHERE Model='$model' AND Car='$brand'";
    $answ=mysqli_query($con,$msg);
    $str="<center> <table id='bet' width=100% style='background-color:#008822';>
        <thead id='res' style='color:orange;text-weight:bold;'>
        <th style='width:6%'>ID</th>
        <th style='width:6%'>Кола</th>
        <th style='width:10%'>Производство</th>
        <th style='width:6%'>Модел</th>
        <th style='width:6%'>Цена</th>
        <th style='width:6%'>Срок</th>
        <th style='width:10%'>Картина</th>
        <th style='width:6%'>Продавач</th>
        <th style='width:6%'>Купувач</th>
        <th style='width:120px' >Добави</th>
        <th>hoo</th>
        </thead>";
     while($row=mysqli_fetch_array($answ))
     {
     	$str=$str."<tr> 
     	<td id='id'><center>".$row['Id']."</center></td>
     	<td><center>" .$row['Car']."</center></td>
     	<td><center>".$row['DateofProduction']."год.</center></td>
     	<td><center>".$row['Model']."</center></td>
     	<td id='price'><center>".$row['BidPrice']."лв.</center></td>
     	<td><center>".$row['Expire']."</center></td>
     	<td><center><a href='Image/".$row['image']."'><img height=30 width=30 src='Image/".$row['image']."''></img></a></center></td>
     	<td ><center>".$row['sellerName']."</center></td>
     	<td id='buyer'><center>".$row['buyerName']."</center></td>
     	</td><td><center><input type=text class='myClass' id='".$row['Id']."'/></center></td></tr>";
     }
    $str=$str."</table></center>";
    echo $str;
}
?>