<?php
$title = 'Home';
session_start();
ob_start();
include 'public_templates/index.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';