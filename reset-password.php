<?php
session_start();
$title = "Reset Password";

include 'includes/database_connection.php';
include 'includes/database_functions.php';

if(isset($_SESSION['user'])){
    header("location: index.php");
}

// check if there is an email and code in the url
if (isset($_GET['email']) && $_GET['code']) { // Code Section From https://www.youtube.com/watch?v=OL-nSfHquUE&ab_channel=zerotocoding
    // store the email in the session if there are any errors this will not disappear
    $_SESSION['email'] = $_GET['email'];
    $code = $_GET['code'];

    // get the email from the reset table
    $from_reset = selectFromReset($pdo, $_SESSION['email']);

    //check if there is a code
    if ($code != $from_reset['code']) {
        $errors[] = "Sorry, your link has expired";
    }
}
// if button reset is click
if (isset($_POST['reset'])) {
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $errors = [];

    // Password Validation
    if ($password == $cpassword) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    } else {
        $errors[] = "Passwords do not match";
    }
    if (empty($password) or empty($cpassword)){
        $errors[] = "Please enter all required fields";
    }
    if (strlen($password && $cpassword) < 8) {
        $errors[] = "Password needs to be at least 8 characters long";
    }
    // if there are no errors 
    if(empty($errors)){
        //update the password in the members table
        updatePassword($pdo, $_SESSION['email'], $hashed_password);
        header("location: login.php");
        session_destroy();
    }
}

ob_start();
include 'public_templates/reset-password.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
