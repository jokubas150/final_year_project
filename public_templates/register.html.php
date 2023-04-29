
    
    <div class="register_form_container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Welcome</h2>
            <div class="errors">  
                <?php if(!empty($errors)){ ?>
                    <p> Your acount could not be created because: </p>
                    <span> <?php foreach($errors as $error){ ?>
                        <span class="error-msg"><?php echo $error; ?> </span> <?php }}?> 
                    </span>
            </div>
                
            <strong>
            <div class="register_form_names">
                <label for="first_name">First Name</label>
                <label for="last_name">Last Name</label>
                <input type="text" name="first_name" placeholder="First Name" id="first_name" 
                value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : ''; ?>">

                <input type="text" name="last_name" placeholder="Last Name" id="last_name"
                value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : ''; ?>">
            </div>

            <div class="register_form_details">

                <label for="email">Email</label>
                <input type="email" name="email"  placeholder="example@example.com" id="email"
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">

                <label for="phone_number">Phone Number</label>
                <input type="text" name="phone_number" placeholder="+44" id="phone_number"
                value="<?php echo isset($_POST['phone_number']) ? $_POST['phone_number'] : ''; ?>">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="At least 8 characters long" id="password">

                <label for="password">Confirm Password</label>
                <input type="password" name="cpassword" placeholder="At least 8 characters long" id="cpassword">

                <label for="dvla">DVLA Code</label>
                <input type="text" name="dvla" placeholder="DVLA" id="dvla"
                value="<?php echo isset($_POST['dvla']) ? $_POST['dvla'] : ''; ?>">

                <div class="terms_container">
                    <input type="checkbox" name="terms" id="terms" required>
                    <label for="terms">Agree to <a href="terms.php">Terms and Conditions</a></label>
                </div>
                
                <div>
                    <button type="submit" name="submit">Register Now</button> 
                </div>
                
            </div>
            </strong>
        </form>
    </div>

