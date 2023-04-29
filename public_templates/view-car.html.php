<head>
    <link rel="stylesheet" href="style/view-car.css">
</head>
<div class="view-car">

    <form action="checkout.php" method="post" class="form-view-car">

        <div class="car-view-title">
            <h3><?php echo $vehicle['make'] . " " . $vehicle['model'] ?></h3>
        </div>

        <div class="view-car-image">
            <div class="car-image">
                <img src="<?php echo $vehicle['image'] ?>" alt="Image of the vehicle in view car page">
            </div>

            <div class="view-car-details">
                <label for="make">Make</label>
                <label for="model">Model</label>
                <label for="fuel_type">Fuel Type</label>
                <p name="make"><?= $vehicle['make'] ?></p>
                <p name="model"><?= $vehicle['model'] ?></p>
                <p name="fuel_type"><?= $vehicle['fuel_type'] ?></p>


                <label for="transmission">Transmission</label>
                <label for="keyless">Has Keyless</label>
                <label for="vehicle_type">Vehicle Type</label>
                <p name="transmission"><?= $vehicle['transmission'] ?></p>
                <p name="keyless"><?= $vehicle['keyless'] ?></p>
                <p name="vehicle_type"><?= $vehicle['type'] ?></p>

                <label for="year">Year</label>
                <label for="engine_size">Engine Size</label>
                <label for="doors">Doors</label>
                <p name="year"><?= $vehicle['year'] ?></p>
                <p name="engine_size"><?= $vehicle['engine_size'] ?> CC</p>
                <p name="doors"><?= $vehicle['doors'] ?></p>
            </div>
        </div>

        <div class="view-car-prices">
            <div class="price_min">
                <label for="price_min">PRICE PER MINUTE</label>
                <p name="price_min">£<?= $vehicle['price_min'] ?></p>
            </div>

            <div class="price_h">
                <label for="price_h">PRICE PER HOUR</label>
                <p name="price_h">£<?= $vehicle['price_h'] ?></p>
            </div>

            <div class="price_day">
                <label for="price_day">PRICE PER DAY</label>
                <p name="price_day">£<?= $vehicle['price_day'] ?></p>
            </div>

            <div class="price_mile">
                <label for="price_mile">PRICE PER MILE</label>
                <p name="price_mile">£<?= $vehicle['price_mile'] ?></p>
            </div>
        </div>

        <div class="view-car-user-details">
            <h3>Renter's information</h3>
            <div class="car-user-details">
                <label for="first_name">Name</label>
                <p name="first_name"><?= $vehicle['first_name'] ?></p>
                <label for="location">Car Location</label>
                <p name="location"><?= $vehicle['vehicle_location'] ?></p>
            </div>
        </div>

        <div class="view-car-inputs">
            <label for="date">Select the Date</label>
            <label for="time">Select time</label>
            <label for=""></label>
            <input type="date" name="date">
            <input type="time" name="time">
            <input type="hidden" name="vehicleID" value="<?= $vehicle['vId'] ?>">
            <?php if (isset($_SESSION['user'])) { ?> <button name="reserve" type="submit" class="reserve-btn">Reserve</button>
            <?php } else { ?>
                <a name="join" type="submit" href="register.php" class="reserve-btn">JOIN NOW!</a><?php } ?>
        </div>

    </form>
    <!--  
    CAR Reviews
     -->
    <div class="view-car-review">
        <h3>Reviews</h3>
        <div class="review-text">
            <?php foreach ($reviews as $i => $review) : ?>
                <div class="review-text-review">
                    <p class="review"><?php echo htmlspecialchars($review['review'], ENT_QUOTES, 'UTF-8') ?></p>

                    <?php if (isset($_SESSION['user']) && ($memberID == $review['member_review_id'] or $role == "admin")) { ?>
                        <form action="delete-review.php" method="post" class="delete-post">
                            <input type="hidden" name="rId" value="<?= $review['rId'] ?>">
                            <input type="hidden" name="vehicle_id" value="<?= $vehicle['vId'] ?>">
                            <button type="submit" class="btn-delete-car" value="Delete">Delete</button>
                        </form>
                    <?php } ?>
                </div>
            <?php endforeach; ?>

            <?php if (empty($review['review'])) { ?>
                <p class="review">No reviews yet. Leave your review!</p>
            <?php } ?>
            
            

            <form action="" method="post" class="form-view-car">
                <div class="submit-review-heading">
                    <label for="review">Leave a Review</label>
                </div>

                <div class="submit-review">
                    <input type="text" name="input-review" placeholder="Leave a review here">
                    <?php if (isset($_SESSION['user'])) { ?><button name="submit-review">Add Review</button> <?php } ?>
                </div>
            </form>

        </div>
    </div>
</div>