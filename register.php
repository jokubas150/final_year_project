<?php
session_start();

if (!isset($_POST["submit"])) {

    $title = 'Register';
    ob_start();
    include 'public_templates/register.html.php';
    $output = ob_get_clean();
}
if (isset($_SESSION['user'])) {
    header("location: index.php");
}

if (isset($_POST["submit"])) {
    try {
        include 'includes/database_connection.php';
        include 'includes/database_functions.php';

        $errors = [];

        $f_name = ($_POST['first_name']);
        $l_name = ($_POST['last_name']);
        $email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_EMAIL);
        $phone = $_POST['phone_number'];
        $password = strip_tags($_POST['password']);
        $cpassword = strip_tags($_POST['cpassword']);
        $dvla = ($_POST['dvla']);

        if (empty($f_name) or empty($l_name) or empty($email) or empty($phone) or
            empty($password) or empty($cpassword) or empty($dvla)) 
        {
            $errors[] = 'All fields must be entered';
            $title = 'Error';
        }
        // if there are no @ and . characters show an error message
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Email is not valid';
            $title = 'Error';
        }
        //Chcek if the user already exists
        if (getEmail($pdo, $email) > 0) { // code from https://www.youtube.com/watch?v=ILLVyPEHZqk&ab_channel=zerotocoding
            $title = 'Error';
            $errors[] = "Email already exists";
        }
        //Check if the passwords match
        if ($password !== $cpassword) {
            $errors[] = 'Passwords do not match';
            $title = 'Error';
        }
        //Check if the password is longer than 8 characters
        if (strlen($password && $cpassword) < 8) {
            $erorrs[] = 'Password needs to be at least 8 characters long';
            $title = 'Error';
        }
        // if there are no errors continue
        if (empty($errors)) {
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            $to_email = "jokubas150@gmail.com";
            $subject =  "Registration Complete";
            $content = 
            "Welcome to FetchCar " . $f_name . " " . $l_name . ",\n" .
            "We sincerely hope will you will enjoy our services!" . "\n" .
            "If you need any help please visit our Help page or Contact us";
            $headers = "From: support@fetchcar.com\r\n";

            // add member to the database
            addMember($pdo, $f_name, $l_name, $email, $password_hash, $phone, $dvla);
            // send welcome email
            mail($to_email, $subject, $content, $headers);

            header("location: login.php");
        }

        ob_start();
        include 'public_templates/register.html.php';
        $output = ob_get_clean();
    } catch (PDOException $e) {
        $title = "An erorr has occured";
        $output = "Database error: " . $e->getMessage() . " in " . $e->getFile() .
        ":" . $e->getLine();
    }
} else {
    include 'includes/database_connection.php';
    include 'includes/database_functions.php';
}

include 'public_templates/layout.html.php';
