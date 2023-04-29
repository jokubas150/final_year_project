<?php
session_start();
include 'includes/database_connection.php';
include 'includes/database_functions.php';
$title = "Reservation Failed";

if (!isset($_SESSION['user'])) {
    header("location: index.php");
}

ob_start();
include 'member_templates/order_fail.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';