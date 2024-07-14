<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="driver.css">
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

        <div class="background-photo">
            <img src="bg.png" alt="Background">
        </div>
        
        <header class="header">
            <div class="header-overlay">
                <div class="container text-center">
                    <div class="step-buttons">
                        <button class="step-button" id="select-car-button">Select your car</button>
                        <button class="step-button" id="drivers-info-button">Driver's info</button>
                        <button class="step-button" id="pay-now-button">Pay now</button>
                    </div>
                </div>
            </div>
        </header>
                
        <div class="main-content">
            <div class="rectangle-box">
                <div class="rectangle-content">
                    <div class="text-content">
                        <p>Subcompact Hatchback</p>
                        <h1>Toyota Wigo</h1>
                        <div class="car-photo">
                            <img src="toyota-wigo1.png" alt="Car Photo">
                        </div>
                        <div class="features">
                            <p>5 seats</p>
                            <p>Automatic</p>
                            <p>Full to full</p>
                        </div>
                        <p class="service-info">Service provided by R&R Car rental services</p>
                        <strong>Pick-up and drop-off details</strong>
                        <div class="text-container">
                            <div class="text">
                                <p>Pick-up location: set by the customer</p>
                                <p>Pick-up date</p>
                            </div>
                            <div class="text">
                                <p>Drop-off location: set by the customer</p>
                                <p>Drop-off date</p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        
            <div class="side-box">
                <h3>Total price for 3 day(s)</h3>
                <h1>₱ 3,600</h1>
                <p>Toyota Wigo</p>
                <hr class="separator">
                <button class="next-step" onclick="redirectToNextPage()">Next Step</button>
            </div>
        </div>
    
        <div class="main-content2">
            <div class="rectangle-box2">
                <div class="rectangle-content2">
                    <div class="text-content2">
                        <h1><strong>TERMS & CONDITIONS</strong></h1>
                        <p>*The rented vehicle shall not used to carry passengers or property for hire.<br>
                            *The rented vehicle shall not used to carry passengers other than in the interior or cab of the vehicle.<br>
                            *The rented vehicle shall not used to push, propel or tow another vehicle, trailer, or any other thing without written approval of the Owner.<br>
                           *The rented vehicle shall not be used for any race or in any competition.<br>
                            *The rented vehicle shall not be used for any illegal purpose.<br>
                           *The Renter shall not operate the vehicle in a negligent manner.<br>
                            *The rented vehicle shall not be operated by any other person other than the Renter stipulated in.<br>
                           *The Renter shall be fully responsible for all expenses relating to the rental car and any Vehicle involve in any type of accident.<br>
                           *The Renter hereby agrees that he/she shall be held fully responsible for any accident while on rent.<br>
                           *The Renter also agrees that personal belongings and other items left in the vehicle at any time are not covered.<br>
                           *All fuel used shall be paid for by the Renter.<br>
                           *The Owner states that he/she is physically and legally qualified to operate the above-describe vehicle.</p>
                    </div>
                </div>
            </div>
        </div>
    

        <script>
            function redirectToNextPage() {
                window.location.href = "driverinfoTW2.php";
            }
        </script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const buttons = document.querySelectorAll(".step-button");
    
        buttons.forEach(button => {
            button.addEventListener("click", function() {
                
                buttons.forEach(btn => btn.classList.remove("active"));
    
                
                this.classList.add("active");
    
                if (this.id === "select-car-button") {
                    window.location.href = "";
                } else if (this.id === "drivers-info-button") {
                    window.location.href = "";
                } else if (this.id === "pay-now-button") {
                    window.location.href = "";
                }
            });
        });
    });
</script>
    

</body>
</html>
    


