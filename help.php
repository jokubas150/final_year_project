<?php
session_start();
$title = "Help";
ob_start();
include 'public_templates/help.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
