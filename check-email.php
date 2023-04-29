<?php
session_start();
$title = "Forgot Password";

if(isset($_SESSION['user'])){
    header("location: index.php");
}

if (isset($_POST['send-link'])) {
    include 'includes/database_connection.php';
    include 'includes/database_functions.php';

    $email = $_POST['email'];
    $errors = [];
    $row = getEmail($pdo, $email);

    // if email record is returned from the database continue
    if ($row > 0) { // Code Section From https://www.youtube.com/watch?v=OL-nSfHquUE&ab_channel=zerotocoding
        $code = randomString(4);

        // create a link that contains the code and email address
        $link = 'http://localhost/carsharing/reset-password.php?email=' . $email . '&code=' . $code . '';

        $from_reset = selectFromReset($pdo, $email);

        // if email record is not found in reset table create a new one
        if (empty($from_reset)) {
            insertIntoReset($pdo, $email, $code);
        // if there is an email record update the code
        } else {
            updateReset($pdo, $email, $code);
        }

        $to_email = "jokubas150@gmail.com";
        $subject =  "Reset Password FetchCar";
        $content =
        "Forgot your password? " . "\n" .
        "Please click this link to reset it " . $link . "\n" . 
        "\n". "If it wasn't you please ignore this message";
        $headers = "From: support@fetchcar.com\r\n";

        mail($to_email, $subject, $content, $headers);

        $message_reset = 'Please check your email to see the password reset link.';
    } else {
        // if there is no email in the database show an error message
        $errors[] = "Email Does not exist";
    }
}

ob_start();
include 'public_templates/check_email.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
