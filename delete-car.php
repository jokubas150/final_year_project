<?php
    try{
        include 'includes/database_connection.php';
        include 'includes/database_functions.php';

        deleteCar($pdo, $_POST['id']);
        header('location: rent_car_view.php');
        
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database  error: ' . $e->getMessage() . 
        ' in ' . $e->getFile() . ':' . $e->getLine();
    }
    
include 'public_templates/layout.html.php';
