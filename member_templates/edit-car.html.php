<head>
    <link rel="stylesheet" href="style/add-vehicle.css">
</head>

<div class="add-car-form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Enter Details to List Your Car</h2>

        <div class="errors">
            <?php if (!empty($errors)) { ?>
                <p style="margin-left: .9em;"> Vehicle could not be added because: </p>
                <span> <?php foreach ($errors as $error) { ?>
                        <span class="error-msg"><?php echo $error; ?> </span> <?php }} ?>
                </span>
        </div>

        <div class="add-car-inputs">
            <div class="add-car-inner">
                <label for="vehicle_make">Make</label>
                <label for="model">Model</label>

                <select class="select-make" name="vehicle_make">
                    <?php foreach($makes as $make) : ?>
                        <option value="<?php echo htmlspecialchars($make['id'], ENT_QUOTES, 'UTF-8');?>">
                            <?php echo htmlspecialchars($make['make'], ENT_QUOTES, 'UTF-8');?>
                        </option>
                    <?php endforeach;?>
                </select>

                <input type="text" name="model" placeholder="Enter Model" value="<?= $vehicle['model'] ?>">

                <label for="engine-size">Engine Size</label>
                <label for="last_name">Year</label>
                <input type="text" name="engine_size" placeholder="Enter Engine Size" maxlength="20" value="<?= $vehicle['engine_size'] ?>">
                <input type="text" name="year" placeholder="Enter Year" id="year" maxlength="4" value="<?= $vehicle['year']?>">

                <label for="select-type">Select Vehicle Type</label>
                <label for="transmission">Transmission</label>
                <select class="select-type" name="vehicle_type">
                    <?php foreach($types as $type) : ?>
                        <option value="<?php echo ($type['type_id']);?>">
                            <?php echo ($type['type']);?>
                        </option>
                    <?php endforeach;?>
                </select>

                <select class="transmission" name="transmission">
                    <option value="Automatic">Automatic</option>
                    <option value="Manual">Manual</option>
                </select>

                <label for="fuel_type">Fuel Type</label>
                <label for="keyless">Keyless</label>
                <select class="select-fuel-type" name="fuel_type">
                    <option value="Petrol">Petrol</option>
                    <option value="Diesel">Diesel</option>
                    <option value="Petrol/Hybrid">Petrol/Hybrid</option>
                    <option value="Diesel/Hybrid">Diesel/Hybrid</option>
                    <option value="Electric">Electric</option>
                </select>
                <select class="select_keyless" name="keyless">
                    <option value="Yes">Yes</option>
                    <option value="Partially">Partially</option>
                    <option value="No">No</option>
                </select>

                <label for="price_min">Price for Minute</label>
                <label for="price_min">Price for Hour</label>
                <input type="text" name="price_min" placeholder="£0.00" maxlength="8" value="<?= $vehicle['price_min']?>">
                <input type="text" name="price_h" placeholder="£0.00" maxlength="8" value="<?= $vehicle['price_h']?>">

                <label for="price_min">Price for Day</label>
                <label for="price_min">Price for Mile</label>
                <input type="text" name="price_day" placeholder="£0.00" maxlength="8" value="<?=$vehicle['price_day']?>">
                <input type="text" name="price_mile" placeholder="£0.00" maxlength="8" value="<?= $vehicle['price_mile']?>">
                
                
                <label for="location">Location</label>
                <label for="door">Doors</label>
                <input type="text" name="location" placeholder="CITY Street POSTCODE" value="<?= $vehicle['vehicle_location']?>">
                <input type="text" name="doors" placeholder="Enter door number" value="<?= $vehicle['doors']?>">

                <label for="image">Vehicle Image</label>
                <label></label>
                <input type="file" name="image">
            </div>

        </div>
        
        <div class="submit-car-div">
            <button type="submit" name="update-car" class="btn-submit-car">Update Vehicle</button>
        </div>

</div>
</div>