<?php
    $con=mysqli_connect("localhost","root","","");
    if(mysqli_connect_errno($con))
    { 
        echo "Failed to connect".mysqli_connect_error();
    }
    $postId = mysqli_real_escape_string($con,$_POST["id"]);
    if(isset($_POST["id"]) && !isset($_POST["msg"]))
    {
        $msg = "SELECT * FROM messages WHERE num='$id'";
        $answ = mysqli_query($con,$msg);
        $str = "";
        while($row = mysqli_fetch_array($answ))
        {
            $str = "!@#<tr><td style='text-align:left'>" . $row["textq"] . "</td></tr>" . $str;
        }
        echo $str;
    }
    else
    {
        $message = mysqli_real_escape_string($con, $_POST["message"]);
        $name = mysqli_real_escape_string($con, $_POST["name"]);
        $fullMessage = date("Y-m-d",time())." ".$name.":".$message;
        $sqlMsg = "INSERT INTO messages (textq,num) VALUES ('$fullMessage','$postId')";
        mysqli_query($con,$sqlMsg);
        $sqlMsgSearch = "SELECT * FROM messages WHERE num='$postId'";
        $answer = mysqli_query($con,$sqlMsgSearch);
        $resultStr = "";
        while($row = mysqli_fetch_array($answer))
        {
            $resultStr = "!@#<tr><td style='text-align:left'>".$row["textq"]."</td></tr>".$resultStr;
        }
        echo $resultStr;
    }
    mysqli_close($con);
?>
