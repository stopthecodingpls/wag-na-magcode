<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$pickup_location = isset($_SESSION['pickup_location']) ? $_SESSION['pickup_location'] : 'Not set';
$pickup_date = isset($_SESSION['pickup_date']) ? $_SESSION['pickup_date'] : 'Not set';
$dropoff_location = isset($_SESSION['dropoff_location']) ? $_SESSION['dropoff_location'] : 'Not set';
$dropoff_date = isset($_SESSION['dropoff_date']) ? $_SESSION['dropoff_date'] : 'Not set';

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $sql = "SELECT pickup_location, pickup_date, dropoff_location, dropoff_date FROM paymenttable WHERE id = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $pickup_location = $row['pickup_location'];
            $pickup_date = $row['pickup_date'];
            $dropoff_location = $row['dropoff_location'];
            $dropoff_date = $row['dropoff_date'];
        }
    }
}

$pickupDateTime = new DateTime($pickup_date);
$dropoffDateTime = new DateTime($dropoff_date);
$interval = $pickupDateTime->diff($dropoffDateTime);
$numDays = $interval->days + 1;
$totalPrice = $numDays * 2500;

$conn->close();
?>
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
        <div class="collapse navbar-collapse" id="navbarNav">
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

    <div class="containerr">
        <div class="rectangle-box">
            <h1 class="box-title">Driver's Info</h1>
            <p class="info-note">Once your info is submitted, it cannot be changed. Please double-check before proceeding.</p>

            <form id="driver-info-form" action="driverinfohandlerTR.php" method="POST">
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
                        <img src="toyota-rush1.png" alt="Car Photo" class="photo">
                    </div>
                    <div class="right">
                        <p>Compact SUV</p>
                        <h1><strong>Toyota Rush</strong></h1>
                        <div class="red-line"></div>
                        <p>Pick-up location: <?php echo $pickup_location; ?></p>
                        <p>Pick-up date and time: <?php echo $pickup_date; ?></p>
                        <p>Drop-off location: <?php echo $dropoff_location; ?></p>
                        <p>Drop-off date and time: <?php echo $dropoff_date; ?></p>
                    </div>
                </div>
            </div>

            <div class="square-box2">
                <div class="box-content2">
                    <div>
                        <p>Total price for <?php echo $numDays; ?> day(s)</p>
                        <h3>₱ <?php echo number_format($totalPrice, 2); ?></h3>
                    </div>
                    <div class="red-line"></div>
                    <div class="box-content3">
                        <p>Payment amount</p>
                        <h3>₱ <?php echo number_format($totalPrice, 2); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pay">
            <button class="payment" onclick="validateForm()">Pay Now</button>
        </div>
        
        <script>
            function validateForm() {
                const form = document.getElementById("driver-info-form");
                const inputs = form.querySelectorAll("input[required], textarea[required]");
                let allFilled = true;

                inputs.forEach(input => {
                    if (!input.value) {
                        allFilled = false;
                        input.classList.add("is-invalid");
                    } else {
                        input.classList.remove("is-invalid");
                    }
                });

                if (allFilled) {
                    form.submit();
                } else {
                    alert("Please fill in all the required fields.");
                }
            }

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
                            validateForm();
                        }
                    });
                });
            });
        </script>
    </div>
</body>
</html>
