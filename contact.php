<?php
ini_set("SMTP","www.mail.bg");
$to = "alex_stef@mail.bg";
$subject = "Test mail";
$message = "Hello! This is a simple email message.";
$from = "alex_stef@mail.bg";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
echo "Mail Sent.";
?>