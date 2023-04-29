<?php
$title = "CarFetch Member Routes";
session_start();

include 'includes/database_connection.php';
include 'includes/database_functions.php';

$routes = allPosts($pdo);

if (isset($_SESSION['user'])){
    $role = $_SESSION['user']['member_type'];
}

$errors = [];

try{
    if(isset($_POST['submit-comment']) && !empty($_POST['input-comment'])){
        $route_id = $_POST["rout_ID"];
        $commentInput = $_POST['input-comment'];
        $mId = $_SESSION['user']['id'];

        if (str_contains($commentInput, "https://")){
            $errors = "Error";
        }

        if (empty($errors)){
            insertComment($pdo, $commentInput, $mId, $route_id);
            header("location: check-routes.php");
        }
    }

    if(isset($_POST['join'])){
        header("location: register.php");
    }
    
} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database  error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();
}

ob_start();
include 'public_templates/check-routes.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
