<!-- Override the the css file -->
<head>
    <link rel="icon" href="sport-car.png"> <!-- Icon from https://www.flaticon.com/free-icon/sport-car_1300302?term=car&page=1&position=78&origin=tag&related_id=1300302 created by Freepik - Flaticon  -->
</head>

<!-- Different Headers for different pages-->
<header>
    <div class="header-content">
        <div class="header-left">
            <h2>Fetch Car</h2>
            <p>
                Welcome to FetchCar website. We hope that you find everything you looking for. 
                We strive for a better future for our cities. Check out the wide range of vehicles available 
                at the Rent a Car page. FetchCar made simpler and faster.
            </p>
            
            <form>
                <button formaction="<?php if(isset($_SESSION['user'])){ ?>
                rent_car_view.php">RENT A CAR!</button>
                <?php } 
                else {?>register.php">JOIN NOW!</button><?php } ?>
            </form>
        </div>
        <div class="header-right"> 
             <img src="web_images/car-sharing.png"> <!--<a href="https://www.vecteezy.com/vector-art/1436637-online-transportation-urban-business">Online transportation urban business Vectors by Vecteezy</a> -->
        </div>
    </div>
</header>

<!-- the main content for index page -->
<div class="main-content-index">
    <div class="index-contents">
        <div class="index-info">
            <img src="web_images/fuel.jpg"> <!-- <a href="https://www.vecteezy.com/vector-art/356939-fuel-station-vector-icon">Fuel Station Vector Icon Vectors by Vecteezy</a> -->
            <img src="web_images/parking_space.jpg"> <!-- https://www.vecteezy.com/vector-art/19011451-flat-isometric-3d-illustration-concept-of-public-parking-space -->
            <img src="web_images/search.jpg"> <!-- <a href="https://www.freepik.com/free-vector/rental-car-service-abstract-concept-illustration_12290948.htm#query=car%20rent&position=12&from_view=search&track=ais">Image by vectorjuice</a> on Freepik -->
            <p>Save money on fuel! Only spend as much as you drive</p>
            <p>By using our services free up space for everybody. By using our services find a allocated free space to park</p>
            <p>Browse through selection of vehicles to find your needs. The vehicles ranging from small hatcbacks to family minivans</p>
        </div>

        <div class="index-info">
            <img src="web_images/community.jpg"> <!-- https://www.vecteezy.com/vector-art/3503491-multicultural-and-multiethnic-people-community-integration-concept -->
            <img src="web_images/bolt.jpg"> <!-- https://www.vecteezy.com/vector-art/14773249-illustration-realistic-icon-3d-yellow-thunder-bolt-lighting-flash-isolated-on-background -->
            <img src="web_images/money.jpg"> <!-- https://www.vecteezy.com/vector-art/375048-money-bag -->
            <p>Become part of a community by joining FetchCar, that will only get bigger</p>
            <p>We have modern fleet of vehicles. That includes fully electric cars</p>
            <p>By joining our community save money, by using a vehicles when you only need them.</p>
        </div>
    </div>
</div>