<?php
session_start();
$title = "Add Post";
include 'includes/database_connection.php';
include 'includes/database_functions.php';

if (isset($_POST['submit-post']) && isset($_SESSION['user'])) {
    $errors = [];
    $posts = getByPost($pdo, $_GET['post_id']);

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

    if(filesize($image) == 0){
        $errors[] = "Vehicle image is required";
    }

    if (str_contains($going_from , "https://") or str_contains($going_to , "https://") 
        or str_contains($message, "https://")){

        $errors[] = "Cannot post links";
        $title = "Error";
    }

    if (empty($errors)) {
        try {
            updatePost($pdo, $_GET['post_id'], $going_from, $going_to, $message, $date, $image);
            header("location: check-routes.php");
        } 
        catch (PDOException $e) {
            $output = 'Database  error: ' . $e->getMessage() .
                ' in ' . $e->getFile() . ':' . $e->getLine();
            $output = ob_get_clean();
        }
    }
    ob_start();
    include 'member_templates/edit_post.html.php';
    $output = ob_get_clean();
} else {
    $posts = getByPost($pdo, $_GET['post_id']);
    ob_start();
    include 'member_templates/edit_post.html.php';
    $output = ob_get_clean();
}

include 'public_templates/layout.html.php';
