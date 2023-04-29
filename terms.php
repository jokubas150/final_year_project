<?php
session_start();
include 'includes/database_connection.php';
include 'includes/database_functions.php';
$title = "Terms and Conditions";

ob_start();
include 'public_templates/terms.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';