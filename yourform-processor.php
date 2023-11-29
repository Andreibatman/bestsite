<?php


if(!isset($_POST['submit']))
{
    echo "error; you need to submit the form";
}

$fname = $_POST['firstname'];
$sname = $_POST['surname'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];


if((empty($fname) || empty($sname) )  || empty($visitor_email))
{
    echo "Name and email are mandatory!";
    exit;
}


$email_from = $visitor_email;
$email_subject = "New Mail from $fname $sname";
$email_body = "You have received a new message from the user $fname $sname. \n".
"email adress: $visitor_email\n".
"Here is the message: \n $message \n"; 


$to = "dancro1122@gmail.com";
$headers = "From: $email_from \r\n";
mail($to,$email_subject,$email_body,$headers);


echo '<a href ="index.php" style="text-decoration: none; font-size: 500%;">Go back to the main page</a>';

?>