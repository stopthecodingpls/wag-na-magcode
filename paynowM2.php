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
$totalPrice = $numDays * 1500;

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="paynow.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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

    <div class="container">
        <div class="rectangle1">
            <div class="rectangle-content">
                <h2 class="complete-payment">Complete Payment</h2>
                <p id="timer" class="payment">Pay within <span class="bold">30 mins 00 secs</span></p>
                <script>
                    let time = 30 * 60;
                    let timerInterval = setInterval(function() {
                        let minutes = Math.floor(time / 60);
                        let seconds = time % 60;
                        seconds = seconds < 10 ? '0' + seconds : seconds;

                        document.getElementById('timer').innerHTML = `Pay within <span class="bold">${minutes} mins ${seconds} secs</span>`;
                        
                        if (time <= 0) {
                            clearInterval(timerInterval);
                            document.getElementById('timer').innerHTML = 'Payment time expired';
                        }
                        time--;
                    }, 1000);
                </script>
                <p class="secure">All card information is fully secure and protected</p>
                <div class="payment-option">
                    <label><input type="radio" name="payment-method" value="gcash" required> GCASH</label>
                </div>
                <hr class="separator">
                <div class="payment-option">
                    <label><input type="radio" name="payment-method" value="onsite" required> On-site Payment</label>
                </div>
            </div>
        </div>

        <div class="box1">
            <div class="box-content">
                <div class="left">
                    <img src="mitsubishi-mirage1.png" alt="Car Photo" class="smallphoto">
                </div>
                <div class="right">
                    <p>Subcompact Sedan</p>
                    <h3><strong>Mitsubishi Mirage</strong></h3>
                    <div class="red-line"></div>
                    <p>Pick-up location: <?php echo $pickup_location; ?></p>
                    <p>Pick-up date and time: <?php echo $pickup_date; ?></p>
                    <p>Drop-off location: <?php echo $dropoff_location; ?></p>
                    <p>Drop-off date and time: <?php echo $dropoff_date; ?></p>
                </div>
            </div>
        </div>
        
        <div class="box2">
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

    <div class="container2">
        <div class="rectangle2">
            <div class="rec-content rectanglee">
                <p>By clicking “Pay now”, you agreed that you have read and understood<br>
                our Term and Condition and Cancellation Policy</p>
                <button class="payment" onclick="handlePayment()">Pay Now</button>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Please Scan the QR Code</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="qr.png" alt="Receipt Image" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="confirmScan()">I have scanned the QR Code</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<script>
    function handlePayment() {
        const gcashSelected = document.querySelector('input[value="gcash"]').checked;
        const onsiteSelected = document.querySelector('input[value="onsite"]').checked;

        if (gcashSelected) {
            $('#paymentModal').modal('show');
        } else if (onsiteSelected) {
            redirectToReceipt();
        } else {
            alert("Please select a payment method.");
        }
    }

    function confirmScan() {
        alert("QR Code scanned successfully. Redirecting to receipt.");
        redirectToReceipt();
    }

    function redirectToReceipt() {
        window.location.href = "receiptM2.php";
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

</body>
</html>
