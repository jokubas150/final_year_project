<?php
    try{
        include 'includes/database_connection.php';
        include 'includes/database_functions.php';

        deleteReview($pdo, $_POST['rId']);
        header("location: view-car.php?vId=" . $_POST['vehicle_id']);
        
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database  error: ' . $e->getMessage() . 
        ' in ' . $e->getFile() . ':' . $e->getLine();
    }
    
include 'public_templates/layout.html.php';
