<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="service.css">
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


                    <section id="service" style="padding-top: 80px;">
                        <div class="bg-photo">
                            <img src="bg.png" alt="Background">
                            <div class="header-overlay">
                                <div class="container text-center">
                                    <div class="white-bg">
                                        <h1>Car rentals that fit your budget</h1>
                                    </div>
                                    <div class="rent-info">
                                        <div class="rent-photo">
                                            <img src="rent.png" alt="Car Photo">
                                        </div>
                                        <div class="rent-details">
                                            <h2>Rent a Car for as low as ₱1,500</h2>
                                            <p>Enjoy affordable and convenient car rental options starting<br>
                                                at just ₱1,500. Select the ideal vehicle for your trip<br>
                                                from our great selection of well-maintained cars.<br>
                                                Take in the opportunity to travel without going over budget.<br>
                                                Book today and start your adventure!</p>
                                        </div>
                                        <div class="rent-button">
                                            <a href="pricing.php" class="btn btn-danger">View All Deals</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <main>
                        <div class="container text-center">
                            <div class="main-info">
                                <div class="main-photo">
                                    <img src="ulcopy.png" alt="Main Photo">
                                </div>
                                <div class="main-details">
                                    <p>Unlock your next adventure with our seamless car rentals <br>
                                    Where every journey begins with comfort, convenience, <br>
                                    and endless possibilities</p>
                                </div>
                                <div class="main-button">
                                    <a href="pricing.php" class="btn btn-outline-dark">View All Deals</a>
                                </div>
                            </div>
                        </div>
                    </main>
</body>
</html>