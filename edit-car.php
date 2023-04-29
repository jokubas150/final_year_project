<?php
session_start();
$title = "Help";

if (isset($_POST['update-car']) && isset($_SESSION['user'])) {

    include 'includes/database_connection.php';
    include 'includes/database_functions.php';

    $errors = [];
    $makes = allMakes($pdo);
    $members = allMembers($pdo);
    $types = allVehicleTypes($pdo);

    $vehicle = getByVehicle($pdo, $_GET['vId']);

    $make = ($_POST['vehicle_make']);
    $model = ($_POST['model']);
    $engine_size = ($_POST['engine_size']);
    $year = ($_POST['year']);

    $vehicle_type_id = ($_POST['vehicle_type']);
    $transmission = ($_POST['transmission']);
    $fuel = ($_POST['fuel_type']);
    $keyless = ($_POST['keyless']);
    $doors = ($_POST['doors']);
    $location = ($_POST['location']);

    $price_min = ($_POST['price_min']);
    $price_h = ($_POST['price_h']);
    $price_day = ($_POST['price_day']);
    $price_mile = ($_POST['price_mile']);

    $member_Id = $_SESSION['user']['id'];
    $image = $_FILES['image']['tmp_name'];

    if (
        empty($model) or empty($engine_size) or empty($year) or empty($price_min) or empty($price_h) or empty($doors)
        or empty($price_day) or empty($price_mile)
    ) {
        $errors[] = "Please enter all required fields";
        $title = "Error";
    }

    if (
        str_contains($model, "https://") or str_contains($engine_size, "https://") or str_contains($year, "https://") or
        str_contains($price_min, "https://") or str_contains($price_h, "https://") or str_contains($price_day, "https://") or
        str_contains($price_mile, "https://") or str_contains($location, "https://") or str_contains($doors, "https://")
    ) {

        $errors[] = "Cannot post links";
        $title = "Error";
    }

    if(filesize($image) == 0){
        $errors[] = "Vehicle image is required";
    }

    if (empty($errors)) {
        try {
            updateVehicle($pdo, $_GET['vId'], $make, $model, $engine_size, $fuel, $year, $transmission, $keyless, $doors,
                $price_min, $price_h, $price_day, $price_mile, $location, $vehicle_type_id, $member_Id, $image);
            header("location: rent_car_view.php");

        } 
        catch (PDOException $e) {
            $output = 'Database  error: ' . $e->getMessage() .
                ' in ' . $e->getFile() . ':' . $e->getLine();
            $output = ob_get_clean();
        }
    }
    ob_start();
    include 'member_templates/edit-car.html.php';
    $output = ob_get_clean();

} else {
    include 'includes/database_connection.php';
    include 'includes/database_functions.php';
    $title = 'Edit Vehicle';

    $makes = allMakes($pdo);
    $members = allMembers($pdo);
    $types = allVehicleTypes($pdo);

    $vehicle = getByVehicle($pdo, $_GET['vId']);

    ob_start();
    include 'member_templates/edit-car.html.php';
    $output = ob_get_clean();
}
include 'public_templates/layout.html.php';