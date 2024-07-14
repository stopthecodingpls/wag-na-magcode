<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="rnrnew.css">
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
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo '<a class="nav-link btn btn-danger" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link btn btn-warning" href="signn.php">Sign Up</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>

    <section id="home" style="padding-top: 80px;">
        <div class="background-photo">
            <img src="bggg.png" alt="Background">
            <div class="hero-content">
                <h1>Drive your way,<br>Rent Today!</h1>
                <p>Experience a fantastic car rental that is created to meet your needs.<br>
                Take advantage of our incredible deals, pick from a broad selection of cars,<br>
                and have flexible rental options. We have the ideal vehicle for any journey,<br>
                whether it is a weekend getaway, a business trip, or just wanting to go somewhere<br>
                to relax, we got you! Book now so you can travel with confidence and comfort.</p>
            </div>
        </div>
    </section>

    <div class="search-box">
        <button class="btn btn-primary btn-block" id="search-button">Want to rent a car? Book now!</button>
    </div>

    <div class="yellow-bg">
        <div class="container text-center">
            <h2><a href="signn.php">Sign in</a> or create a FREE account to unlock the best prices!</h2>
        </div>
    </div>

    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>ABOUT US</h2>
                    <p class="lead">Welcome to R&R Car Rental Services, We are located in Santa Rosa Laguna, Golden City, Brgy. Dila.<br> 
                        We are your go-to destination for reliable transportation solutions, offering a diverse fleet of well-maintained vehicles<br>
                        available for booking 24/7 since June 2023.<br>
                        <br>
                        Choose from popular models like the MITSUBISHI MIRAGE G4 GLX, MITSUBISHI XPANDER GLS, TOYOTA WIGO G, and TOYOTA RUSH,<br>
                        all equipped with automatic transmission. Whether you need a vehicle for self-drive or with a driver, we have flexible rental<br>
                        options including 24-hour, daily, weekly, and monthly packages. Make use of our advance booking feature for convenience.<br>
                        Our services come with the assurance of updated units, competitive rates, and clean, sanitized cars.<br>
                        <br>
                        We make renting easy with straightforward requirements and the option for delivery and pick-up services.<br>
                        In addition to our core offerings, we provide airport transfers, transportation to various Laguna locations,<br>
                        and bridal car services.<br>
                        <br>
                        Contact us at 09688793230 to secure your booking today and enjoy our affordable,<br>
                        quality service with no downpayment or security fees required.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="centered-content2">
            <h2>Get in Touch</h2>
        </div>
    <div class="contact-form-container">
        <form action="contactus.php" method="post" class="contact-form">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your Number" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" placeholder="Your Message" required></textarea>
            </div>
            <button type="submit">Send</button>
        </form>
    </div>
</section>

    <footer class="footer">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <p>&copy; 2024 Your Website. All rights reserved.</p>
                <h2><a href="FAQs.php" style="color: red;">FAQs</a></h2>
            </div>
            <div>
                <a href="https://www.facebook.com/profile.php?id=100094203083299&mibextid=ZbWKwL" target="_blank">
                    <img src="fb.png" alt="Facebook Logo" width="40">
                </a>
                <a href="tel:+63 968 252 1783">
                    <img src="call.png" alt="Contact Logo" width="40">
                </a>
            </div>
        </div>
    </footer>

    <script>
    document.getElementById('search-button').addEventListener('click', function() {
        // Check if user is logged in
        <?php if(isset($_SESSION['id'])) { ?>
            window.location.href = 'booking.php';
        <?php } else { ?>
            window.location.href = 'signn.php';
        <?php } ?>
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>