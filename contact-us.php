<?php
session_start();
$title = "Contact Us";

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $messageContact = $_POST['message'];
    if (!empty($name) and !empty($email) and !empty($messageContact)) {

        $to_email = "jokubas150@gmail.com";
        $subject =  "Question From " . $_POST['name'];
        $message =  "\n" . "Email: " . $_POST['email'] . "\n" . 
        "Message: " . $_POST['message'];
        $headers = "From: support@fetchcar.com\r\n";
        mail($to_email, $subject, $message, $headers);
        
        header("location: index.php");
    }
}
ob_start();
include 'public_templates/contact_us.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
