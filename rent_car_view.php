<?php
try {
    include 'includes/database_connection.php';
    include 'includes/database_functions.php';

    if(isset($_GET['All']) or empty($_GET)){
        $carTitle = "Browse all Vehicles";
        $vehicles = allVehicles($pdo);
        $title = 'All Vehicles';
    }

    if(isset($_GET['Sedan'])){
        $carTitle = "Browse all Sedans";
        $vehicles = allSedan($pdo);
        $title = 'Sedans';
    }

    if(isset($_GET['Wagon'])){
        $carTitle = "Browse all Station Wagons";
        $vehicles = allWagons($pdo);
        $title = 'Station Wagons';
    }

    if(isset($_GET['Hatchback'])){
        $carTitle = "Browse all Hatchback";
        $vehicles = allHatchback($pdo);
        $title = 'Hatchback';
    }

    if(isset($_GET['SUV'])){
        $carTitle = "Browse all SUVs";
        $vehicles = allSUV($pdo);
        $title = 'SUVs';
    }

    if(isset($_GET['Minivan'])){
        $carTitle = "Browse all Minivans";
        $vehicles = allMinivan($pdo);
        $title = 'Minivans';
    }

    if(isset($_GET['Van'])){
        $carTitle = "Browse all Vans";
        $vehicles = allVan($pdo);
        $title = 'Vans';
    }

    if(isset($_GET['Electric'])){
        $carTitle = "Browse all Electric Vehicles";
        $vehicles = allElectric($pdo);
        $title = 'Electric Vehicles';
    }
    ob_start();
    include 'public_templates/rent_car.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occured';
    $output = 'Database  error: ' . $e->getMessage() . 
    ' in ' . $e->getFile() . ':' . $e->getLine();
}
include 'public_templates/layout.html.php';