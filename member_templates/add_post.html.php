<head>
    <link rel="stylesheet" href="style/add-vehicle.css">
</head>
<style>
    
footer{
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
}

</style>
<div class="add-car-form-container">
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Enter Details to Post</h2>

        <div class="errors">
            <?php if (!empty($errors)) { ?>
                <p> Your Post could not be added because: </p>
                <span> <?php foreach ($errors as $error) { ?>
                    <span class="error-msg"><?php echo $error; ?> </span> <?php }} ?>
                </span>
        </div>

        <div class="add-car-inputs">
            <div class="add-car-inner">
                <label for="going_from">Going From</label>
                <label for="going_to">Going To</label>

                <input type="text" name="going_from" placeholder="Enter Starting Destination Details" value="<?php echo isset($_POST['going_from']) ? $_POST['going_from'] : ''; ?>">
                <input type="text" name="going_to" placeholder="Enter Final Destination Details" value="<?php echo isset($_POST['going_to']) ? $_POST['going_to'] : ''; ?>">

                <label for="image">Route Image</label>
                <label for="message">Addittional Message</label>
                <input type="file" name="image">
                <textarea type="text" name="message" placeholder="Enter Extra Information" value="<?php echo isset($_POST['message']) ? $_POST['message'] : ''; ?>"></textarea>

            </div>
        </div>
        
        <div class="submit-car-div">
            <button type="submit" name="submit-post" class="btn-submit-car">Add Post</button>
        </div>
    </form>
</div>
</div>