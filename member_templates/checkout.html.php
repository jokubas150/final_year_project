<head>
    <link rel="stylesheet" href="style/success.css">
</head>

<div class="checkout-view">
    <div class="order-summary">
        <h3>Reservation Summary:</h3>
        <p>Date: <?php echo $_POST['date']?> </p>
        <p>Time: <?php echo $_POST['time']?> </p>
        <p>Car: <?php echo $car['make']?> </p>
        <p>Model: <?php echo $car['model']?> </p>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="ID" value="<?=$car['vId']?>">
        <input type="hidden" name="time" value="<?=$_POST['time']?>">
        <input type="hidden" name="date" value="<?=$_POST['date']?>">
        <input type="hidden" name="make" value="<?=$car['make']?>">
        <input type="hidden" name="model" value="<?=$car['model']?>">

        <div class="card-num-input">
            <label>Card Number</label>
            <input type="text" name="card_num" minlength="16" maxlength="20" placeholder="1234 1234 1234 1234 1234"/>
            <label>Card Holder Name</label>
            <input type="text" name="card_name" placeholder="John Doe"/>
        </div>
    
        <div class="checkout-dates">
            <label>CVC</label>
            <label>Expiration (MM/YYYY)</label>
            <span></span>
            <input type="text" name="cvc" maxlength="4" minlength="3" placeholder="CVC"/>
            <input type="text" name="exp_month" maxlength="2" minlength="1" placeholder="MM"/>
            <input type="text" name="exp_year" maxlength="4" minlength="4" placeholder="YYYY"/>
        </div>

        <button type="submit" name="checkout">Checkout</button>
    </form>
</div>
