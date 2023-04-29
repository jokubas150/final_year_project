<div class="login_form_container">
    <form action="" method="post" enctype="multipart/form-data">
    <h2>Reset Password</h2>
    <!-- Display erorrs here if there are any -->
    <div class="errors">
        <?php if (!empty($errors)) { ?>
            <span> <?php foreach ($errors as $error) { ?>
                    <span class="error-msg"> <?php echo $error; ?> </span> <?php }
            } ?>
            </span>
    </div>

    <?php if (!isset($errors) && isset($_GET['code'])) {
        // if there is a code in the url show the reset password form
        echo '
            <strong>
                <div class="login_form_details">
                    <label for="password">Enter Password</label>
                    <input type="password" name="password" placeholder="Password" value="">

                    <label for="cpassword">Confirm Password</label>
                    <input type="password" name="cpassword" placeholder="Confirm Password">
                    <button type="submit" name="reset">Reset</button>
                </div>
            </strong>     
         ';
    } ?>
    </form>
</div>