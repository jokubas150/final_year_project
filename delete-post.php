<?php
    try{
        include 'includes/database_connection.php';
        include 'includes/database_functions.php';

        deletePost($pdo, $_POST['post_id']);
        header('location: check-routes.php');
        
    } catch (PDOException $e) {
        $title = 'An error has occured';
        $output = 'Database  error: ' . $e->getMessage() . 
        ' in ' . $e->getFile() . ':' . $e->getLine();
    }
    
include 'public_templates/layout.html.php';
