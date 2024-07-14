<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="driverinfo.css">
</head>
<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="R&R Logo" height="30">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" href="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#service">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#cars">Cars</a>
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
                    <a class="nav-link btn btn-warning" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="background-photo">
        <img src="bg.png" alt="Background">
    </div>
   
    <header class="header">
        <div class="header-overlay">
            <div class="container text-center">
                <div class="circle red-circle">
                    <p>Select your car</p>
                </div>
                <div class="line red-line"></div>
                <div class="circle yellow-circle">
                    <p>Driver's info</p>
                </div>
                <div class="line gray-line"></div>
                <div class="circle gray-circle">
                    <p>Pay now</p>
                </div>
            </div>
        </div>
    </header>


    <div class="containerr">
        <div class="rectangle-box">
            <h1 class="box-title">Driver's Info</h1>
            <p class="info-note">Once your info is submitted, it cannot be changed. Please double-check before proceeding.</p>


            <h1 class="form-title">Driver's Info</h1>
            <form action="">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="first-name">First name (as on Driver's license)</label>
                    <input type="text" id="first-name" name="first-name" required>
                </div>
                <div class="form-group">
                    <label for="last-name">Last name (as on Driver's license)</label>
                    <input type="text" id="last-name" name="last-name" required>
                </div>
                <div class="form-group">
                    <label for="driver-age">Driver's age</label>
                    <input type="number" id="driver-age" name="driver-age" required>
                </div>
                <div class="form-group">
                    <label for="license-no">Driver's license no.</label>
                    <input type="text" id="license-no" name="license-no" required>
                </div>


                <h1 class="form-title">Contact Info</h1>
                <div class="form-group">
                    <label for="cellphone">Cellphone no.</label>
                    <input type="tel" id="cellphone" name="cellphone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address (for booking confirmation)</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea id="address" name="address" rows="4" required></textarea>
                </div>
            </form>
        </div>


        <div class="stacked-boxes">
            <div class="square-box1">
                <div class="box-content">
                    <div class="left">
                        <img src="mitsubishi-xpander1.png" alt="Car Photo" class="photo">
                    </div>
                    <div class="right">
                        <p>Compact SUV</p>
                        <h1><strong>Mitsubishi Xpander</strong></h1>
                        <div class="red-line"></div>
                        <p>Pick-up location: set by the customer</p>
                        <p>Pick-up date and time</p>
                        <p>Drop-off location: set by the customer</p>
                        <p>Drop-off date and time</p>
                    </div>
                </div>
            </div>


            <div class="square-box2">
                <div class="box-content2">
                    <div>
                        <p>Total price for 3 day(s)</p>
                        <h3>₱ 7,500</h3>
                    </div>
                    <div class="red-line"></div>
                    <div class="box-content3">
                        <p>Payment amount</p>
                        <h3>₱ 7,500</h3>
                    </div>
                </div>
            </div>
        </div>
       
        <div class="pay">
            <button class="payment" onclick="redirectToNextPage()">Pay Now</button>
        </div>


        <script>
            function redirectToNextPage() {
                window.location.href = "paynow.php";
            }
        </script>


</body>
</html>
