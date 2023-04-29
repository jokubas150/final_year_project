<?php
session_start();

include 'includes/database_connection.php';
include 'includes/database_functions.php';

if(!isset($_GET['vId'])){
    header("Location: rent_car_view.php");
}

if (isset($_SESSION['user'])){ 
    $role = $_SESSION['user']['member_type'];
    $email = $_SESSION['user']['email'];
    $memberID = $_SESSION['user']['id'];
}

try{
    $vehicle = getCar($pdo, $_GET['vId']);
    $reviews = getReviewByCar($pdo, $_GET['vId']);
    $title = 'View ' . $vehicle['make'];
    

    if(isset($_POST['submit-review'])){
        $car_review = ($_POST['input-review']);
        if (str_contains($car_review , "https://")){
            $errors = "Error";
            $title = "Error";
        }
        if(empty($errors)){
            
            insertReview($pdo, $car_review, $_GET['vId'], $memberID);
            header("location: view-car.php?vId=" . $_GET['vId']);
        }
    }

    if(isset($_SESSION['user'])){
        $role = $_SESSION['user']['member_type'];
    }
    
    if(isset($_POST['join'])){
        header("location: register.php");
    }
}catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database  error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();
}

ob_start();
include 'public_templates/view-car.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
