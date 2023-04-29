<?php
$title = 'Login';
session_start();

if (!isset($_REQUEST['submit'])) {
    ob_start();
    include 'public_templates/login.html.php';
    $output = ob_get_clean();
}

if (isset($_SESSION['user'])) {
    header("location:index.php");
}

if (isset($_REQUEST['submit'])) {
    
    $errors = [];
        
    $email = filter_var(strtolower($_REQUEST['email']), FILTER_SANITIZE_EMAIL);
    $password = strip_tags($_REQUEST['password']);

    if (empty($email) or empty($password)) {
        $errors[] = 'Please enter email and password.';
    }

    if(empty($errors)) {
        try {
            include 'includes/database_connection.php';
            include 'includes/database_functions.php'; 

            $row = getEmail($pdo, $email);
            
            if($row > 0) {   
                if(password_verify($password, $row['password'])) { // This section of code is from  https://www.youtube.com/watch?v=BYRx3rkOZ9I&t=2s&ab_channel=FollowAndrew
                    $_SESSION['user']['id'] = $row['id'];
                    $_SESSION['user']['email'] = $row['email'];
                    $_SESSION['user']['first_name'] = $row['first_name'];
                    $_SESSION['user']['last_name'] = $row['last_name'];
                    $_SESSION['user']['member_type'] = $row['member_type'];
                    header("location:index.php");
                }
                else {
                    $errors[] = 'Invalid email or password';
                }
            }
            else {
                $errors[] = 'Invalid email or password';
            }
            
        }

        catch (PDOException $e) {
            $title = "An erorr has occured";
            $output = "Database error: " . $e->getMessage() . " in " . $e->getFile() .
            ":" . $e->getLine();
        }
    }
    ob_start();
    include 'public_templates/login.html.php';
    $output = ob_get_clean();
}

include 'public_templates/layout.html.php';
