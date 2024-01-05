<?php

/*$EmailTo = "info@radiustheme.com";*/
$EmailTo = "rjhridoy96@gmail.com";
$Subject = "New Message Received";

$errorMSG = "";
$name = $email = $phone = $message = $subject= null;

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL

if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// Phone

if (empty($_POST["phone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $subject = $_POST["phone"];
}

// Company

if (empty($_POST["company"])) {
    $errorMSG .= "Company is required ";
} else {
    $subject = $_POST["company"];
}

// MESSAGE

if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];

}

// prepare email body text
$Body = null;
$Body .= "<p><b>Name:</b> {$name}</p>";
$Body .= "<p><b>Email:</b> {$email}</p>";
$Body .= "<p><b>Phone:</b> {$phone}</p>";
$Body .= "<p><b>Message:</b> </p><p>{$message}</p>";

 

// send email
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:  ' . $name . ' <' . $email .'>' . " \r\n" .
            'Reply-To: '.  $fromEmail . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

if($name && $email && $message){
    $success = mail($EmailTo, $Body, $headers );
}else{
    $success = false;
}


if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
} 