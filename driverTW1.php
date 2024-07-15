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

$conn->close();
?>

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
                        <p>Pick-up location: <?php echo $pickup_location; ?></p>
                        <p>Pick-up date: <?php echo $pickup_date; ?></p>
                    </div>
                    <div class="text">
                        <p>Drop-off location: <?php echo $dropoff_location; ?></p>
                        <p>Drop-off date: <?php echo $dropoff_date; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="side-box">
        <h3>Total price for <?php echo $numDays; ?> day(s)</h3>
        <h1><?php echo '₱ ' . ($numDays * 1200); ?></h1>
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
        window.location.href = "driverinfoTW1.php";
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
