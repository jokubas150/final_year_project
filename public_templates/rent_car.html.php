<!-- Override the the css file -->
<head>
    <link rel="icon" href="sport-car.png"> <!-- Icon from https://www.flaticon.com/free-icon/sport-car_1300302?term=car&page=1&position=78&origin=tag&related_id=1300302 created by Freepik - Flaticon  -->
    <link rel="stylesheet" href="style/car-rent.css">
    <script src="https://kit.fontawesome.com/4196309b32.js" crossorigin="anonymous"></script>
</head>

<?php session_start();
if (isset($_SESSION['user'])){ 
    $role = $_SESSION['user']['member_type'];
    $email = $_SESSION['user']['email'];
    $memberID = $_SESSION['user']['id'];
}
?>

<h2 class="rent-car-heading"><?=$carTitle?></h2>

<div class="rent-car">
    <?php if(isset($_SESSION['user']) && ($role =="admin" or "member")){ ?>
        <div class="div-add-car">
            <form>
                <a class="btn-add-car" type="submit" name="add-car" href="add_car.php"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>List Vehicle</a>
            </form>
        </div>
    <?php }?>
        <!-- Check if there are any uploaded vehicles -->
        <?php if (empty($vehicles)) {?>
            <style>footer{ bottom: 0; position: fixed; width: 100%;}</style> <!-- If there are no vehicles uploaded then make footer stuck to bottom -->
        <p class="no-cars-message"><?php echo "No vehicles are added. Add your Vehicle Now!"; ?></p><!-- If there aren't any Display this message -->
        
        <!-- Check if the size of array is equals to or less than 5 make footer stuck to the bottom-->
        <?php } 
        if (sizeof($vehicles) <= 5) { ?>
            <style>footer{ bottom: 0; position: fixed; width: 100%;}</style> 
        <?php } ?>

        <div class="cars">
        <?php foreach($vehicles as $vehicle) : ?> 
            <!-- Loop through array of vehicles and display their information-->
            <a class="car-card-content" name="vId" href="view-car.php?vId=<?=$vehicle['vId']?>">
                <img src="<?php echo $vehicle['image']?>" alt="Image of a Car">
                <div class="rent-card-body">
                    <h5 class="vehicle-title"><?php echo htmlspecialchars($vehicle['make'], ENT_QUOTES, 'UTF-8')?></h5>
                    <p>£<?php echo htmlspecialchars($vehicle['price_min'], ENT_QUOTES, 'UTF-8')?>/min</p>
                    <p><?php echo htmlspecialchars($vehicle['vehicle_location'], ENT_QUOTES, 'UTF-8')?></p>
                    <p><?php echo htmlspecialchars($vehicle['transmission'], ENT_QUOTES, 'UTF-8')?></p>
                   
                    <!-- show delete button if matches the -->
                    <?php if (isset($_SESSION['user']['id']) && ($memberID == $vehicle['member_id'] or ($role == "admin"))){ ?>
                        <form method="post" action="delete-car.php">
                            <input type="hidden" name="id" value="<?=$vehicle['vId']?>">
                            <button type="submit" class="btn-delete-car" value="Delete">Delete</button>
                        </form>
                    <?php }?> 
                    <!-- display edit button if matches the conditional statement -->
                    <?php if (isset($_SESSION['user']['id']) && ($memberID == $vehicle['member_id'])){ ?>
                        <form method="post" action="edit-car.php?vId=<?=$vehicle['vId']?>">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn-edit-car">Edit</button>
                        </form>
                    <?php }?>   
                </div>
            </a>
        <?php endforeach; ?>    
    </div>
</div>

