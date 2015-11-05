<?php
    $con=mysqli_connect("localhost","root","","test");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $id=mysqli_real_escape_string($con,$_POST["id"]);
    if(isset($_POST["id"])&&!isset($_POST["msg"]))
    {
        $msg="SELECT * FROM messages WHERE num='$id'";
        $answ=mysqli_query($con,$msg);
        $str="";
        while($row=mysqli_fetch_array($answ))
        {
            $str="!@#<tr><td style='text-align:left'>".$row["textq"]."</td></tr>".$str;
        }
        echo $str;
    }
    else
    {
        $text=mysqli_real_escape_string($con,$_POST["msg"]);
        $name=mysqli_real_escape_string($con,$_POST["name"]);
        $text=date("Y-m-d",time())." ".$name.":".$text;
        $ins="INSERT INTO messages (textq,num) VALUES ('$text','$id')";
        mysqli_query($con,$ins);
        $msg="SELECT * FROM messages WHERE num='$id'";
        $answ=mysqli_query($con,$msg);
        $str="";
        while($row=mysqli_fetch_array($answ))
        {
            $str="!@#<tr><td style='text-align:left'>".$row["textq"]."</td></tr>".$str;
        }
        echo $str;
    }
    mysqli_close($con);
?>