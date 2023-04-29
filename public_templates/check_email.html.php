<div class="login_form_container">
        
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Forgot Password</h2>

            <div class="errors">  
                <?php if(!empty($errors)){ ?>
                <span> <?php foreach($errors as $error){ ?>
                    <span class="error-msg"><?php echo $error; ?> </span> <?php }
                }?> 
                </span>
            </div>
            <div class="reset-link-sent-msg">
                <h4 class="success-reset">
                    <!-- Show Success message if email exists -->
                    <?php if(isset($message_reset)) { echo $message_reset; }?>
                </h4>
            </div>
            <strong>

            <div class="login_form_details">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="example@example.com" value="">

                <button type="submit" name="send-link">Send Link</button>
            </div>
            </strong>
        </form>
    </div>

