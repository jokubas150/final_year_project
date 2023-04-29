<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="icon" href="sport-car.png"> <!-- Icon from https://www.flaticon.com/free-icon/sport-car_1300302?term=car&page=1&position=78&origin=tag&related_id=1300302 created by Freepik - Flaticon  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inter&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4196309b32.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>

<body>
    <?php
    if (isset($_SESSION['user'])) {
        $role = $_SESSION['user']['member_type'];
    } ?>

    <!-- Navigation Bar -->
    <nav class="nav-bar">
        <div class="nav-contents">
            <div class="left-nav">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="contact-us.php">Contact Us</a></li>
                    <li><a href="check-routes.php">Check Routes</a></li>

                    <div class="dropdown">
                        <button class="dropbtn">Rent Vehicle
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content"> <!-- https://www.w3schools.com/howto/howto_css_dropdown_navbar.asp -->
                            <a href="rent_car_view.php?All">Browse All </a>
                            <a href="rent_car_view.php?Sedan">Sedan</a>
                            <a href="rent_car_view.php?Wagon">Station Wagon</a>
                            <a href="rent_car_view.php?Hatchback">Hatchback </a>
                            <a href="rent_car_view.php?SUV">SUV</a>
                            <a href="rent_car_view.php?Minivan">Minivan</a>
                            <a href="rent_car_view.php?Van">Van</a>
                            <a href="rent_car_view.php?Electric">Electric <i class="fa-solid fa-bolt" style="color: #e6df19;"></i></a>
                        </div>
                    </div>
                </ul>
            </div>

            <div class="nav-logo"> <a href="index.php">FETCH CAR</a> </div>

            <div class="right-nav">
                <ul>
                    <li><a href="help.php">Help</a>
                    <li>
                    <li>
                        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                            <form>
                                <button class="login_button" formaction="logout.php">Logout</button> <!-- https://stackoverflow.com/questions/44431427/hide-login-register-button-when-logged-in-and-hide-logout-button-when-logged-out -->
                            </form>
                    </li>

                    <?php } else { ?>
                    <li>
                        <form>
                            <button class="login_button" formaction="login.php">Login</button>
                        </form>
                    </li>

                    <li>
                        <a href="register.php">Register</a>
                    <li>

                    <?php } ?>

                </ul>
            </div>
        </div>
    </nav>

    <main>
        <?= $output ?>
    </main>

    <footer>
        <div class="footer-content">
            <ul class="footer-ul">
                <li> <a href="help.php">Help</a></li>
                <li> <a href="terms.php">Terms and Conditions</a></li>
            </ul>
            &copy; Fetch Car 2023
        </div>
    </footer>
</body>

</html>