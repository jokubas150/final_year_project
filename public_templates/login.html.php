<div class="login_form_container">

    <form action="" method="post" enctype="multipart/form-data">
        <h2>Welcome Back</h2>

        <div class="errors">
            <?php if (!empty($errors)) { ?>
            <span> <?php foreach ($errors as $error) { ?>
                <span class="error-msg">
                    <?php echo $error; ?> </span> <?php } } ?>
            </span>
        </div>
        <strong>

            <div class="login_form_details">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="example@example.com" id="email" 
                value=" <?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter Your Password" id="password">
                <!-- Fogot password Link -->
                <a href="check-email.php" class="forgot-password">Forgot Password?</a>
                <button type="submit" name="submit">Login</button>
            </div>
        </strong>
    </form>
</div>