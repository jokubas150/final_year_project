<?php
session_start();
$title = "Add Post";
if (isset($_POST['submit-post']) && isset($_SESSION['user'])) {

    include 'includes/database_connection.php';
    include 'includes/database_functions.php';

    $errors = [];

    $going_from = ($_POST['going_from']);
    $going_to = ($_POST['going_to']);
    $message = ($_POST['message']);

    $member_Id = $_SESSION['user']['id'];
    $date = date('Y-m-d H:i:s');
    $image = $_FILES['image']['tmp_name'];
    
    if (empty($going_from) or empty($going_to) or empty($message)) {
        $errors[] = "Please enter all required fields";
        $title = "Error";
    }
    if (str_contains($going_from , "https://") or str_contains($going_to , "https://") 
        or str_contains($message, "https://")){

        $errors[] = "Cannot post links";
        $title = "Error";
    }

    if (empty($errors)) {
        try {
            insertPost($pdo, $going_from, $going_to, $message, $date, $image, $member_Id);
            header("location: check-routes.php");
        } 
        catch (PDOException $e) {
            $output = 'Database  error: ' . $e->getMessage() .
                ' in ' . $e->getFile() . ':' . $e->getLine();
            $output = ob_get_clean();
        }
    }
    ob_start();
    include 'member_templates/add_post.html.php';
    $output = ob_get_clean();
} else {
    ob_start();
    include 'member_templates/add_post.html.php';
    $output = ob_get_clean();
}

include 'public_templates/layout.html.php';
