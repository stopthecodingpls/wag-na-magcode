<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="cars.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#">
                <img src="logo.png" alt="R&R Logo" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="rnr.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="service.php">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cars.php">Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pricing.php">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rnr.php#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="rnr.php#about">About Us</a>
                    </li>
                    <li class="nav-item">
                    <?php
                    session_start();
                    if(isset($_SESSION['username'])) {
                        echo '<a class="nav-link btn btn-danger" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link btn btn-warning" href="signn.php">Sign Up</a>';
                    }
                    ?>
                </li>
                </ul>
            </div>
        </nav>


        <section id="cars">
            <div class="bg-pic">
                <div class="overlay"></div>
                <img src="bg.png" alt="Background">
            </div>
            <div class="container">
                <div class="row">
                    <div class="centered-content">
                        <h2>Meet our Cars? Wheels?</h2>
                    </div>
                </div>
            </div>
        </section>
        
    
        <section class="cars-section">
            <div class="car-list">
                <div class="row">
                    <div class="col">
                        <div class="car-item">
                            <img src="toyota-rush.png" alt="Toyota Rush">
                            <p><a href="https://toyota.com.ph/rush">Toyota Rush</a></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="car-item">
                            <img src="mitsubishi-xpander.png" alt="Mitsubishi Xpander">
                            <p><a href="https://www.mitsubishi-motors.com.ph/cars/xpander">Mitsubishi Xpander</a></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="car-item">
                            <img src="toyota-wigo.png" alt="Toyota Wigo">
                            <p><a href="https://toyota.com.ph/wigo">Toyota Wigo</a></p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="car-item">
                            <img src="mitsubishi-mirage.png" alt="Mitsubishi Mirage">
                            <p><a href="https://www.mitsubishi-motors.com.ph/cars/mirage">Mitsubishi Mirage</a></p>
                        </div>
                    </div>
                </div>
            </div>
    
        </section>
            
        
        <div id="container";>
            <div>
                <i class="fa fa-lock" aria-hidden="true"></i>
                <h3>SAFETY & SECURITY</h3>
                <p>Travel with peace of mind in our well-maintained, secure vehiclese</p>
            </div>
            <div>
                <i class="fa fa-laptop" aria-hidden="true"></i>
                <h3>ONLINE BOOKING</h3>
                <p>Reserve your car quickly and
                    easily wherever you are!</p>
            </div>
            <div>
                <i class="fa fa-car" aria-hidden="true"></i>
                <h3>AFFORDABLE PRICES</h3>
                <p>Enjoy competitive rates and special discounts,
                     making travel budget-friendly.</p>
            </div>
        </div>

    </body>
</html>
