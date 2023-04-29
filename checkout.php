<?php
session_start();
include 'includes/database_connection.php';
include 'includes/database_functions.php';

$title = "Checkout";

$errors = [];
$now_date = date('Y-m-d H:i:s');

$vehicleID = ($_POST['vehicleID']);
$car = getCar($pdo, $vehicleID);

if (!isset($_SESSION['user'])) {
    header("location: index.php");
}

if($vehicleID == NULL){
    header("location: rent_car_view.php?All");
}

if (isset($_POST['checkout'])) {
    $oder_number = "#" . $_POST['make'] . randomString(10);
    $member = ($_SESSION['user']['id']);

    $card_num = $_POST['card_num'];
    $cvc = $_POST['cvc'];
    $exp_month = $_POST['exp_month'];
    $exp_year = $_POST['exp_year'];

    $orders = [$oder_number, $now_date, $_POST['date'], $_POST['time'], $_POST['ID'], $member];
    var_dump($orders);

    if (empty($card_num) or empty($cvc) or empty($exp_month) or empty($exp_year)){
        $errors = ["Error"];
    }

    if (empty($errors)) {
        try {
            insertBooking($pdo, $oder_number, $now_date, $_POST['date'], $_POST['time'], $_POST['ID'], $member);
            header("location: success_payment.php");
        } 
        catch (PDOException $e) {
            $output = 'Database  error: ' . $e->getMessage() .
                ' in ' . $e->getFile() . ':' . $e->getLine();
            $output = ob_get_clean();
            }

            $to_email = "jokubas150@gmail.com";
            $subject =  "Order Details: " . $oder_number;
            $content = "Car " . $_POST['make'] . "\n" .
                "Model " . $_POST['model'] . "\n" . "Date " . $_POST['date'] . "\n" .
                "Time " . $_POST['time'];
            $headers = "From: jokubas150@gmail.com\r\n";

            mail($to_email, $subject, $content, $headers);
        }
    else {
        header("location: order_fail.php");
    }  
};

ob_start();
include 'member_templates/checkout.html.php';
$output = ob_get_clean();
include 'public_templates/layout.html.php';
