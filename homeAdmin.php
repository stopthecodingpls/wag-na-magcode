
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Notification</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="logo">R&R</div>
        <nav>
            <ul>
                <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="bookingAdmin.php">Bookings</a></li>
                <li><a href="messageAdmin.php">Messages</a></li>
            </ul>
        </nav>
        <form action="rnr.php">
            <button type="submit" class="sign-up">Logout</button>
        </form>
    </header>
    <main>
        <div class="notification" id="notification">
            <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "paymentinfo";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT booking_time, rental_date, pickup_location, dropoff_location, payment_method FROM paymenttable ORDER BY rental_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $bookingTime = $row['booking_time'];
                    $rentalDate = $row['rental_date'];
                    $pickupLocation = $row['pickup_location'];
                    $dropoffLocation = $row['dropoff_location'];
                    $paymentMethod = $row['payment_method'];

                    echo "<div class='booking'>";
                    echo "<p><strong>Time:</strong> $bookingTime</p>";
                    echo "<p><strong>Date:</strong> $rentalDate</p>";
                    echo "<p><strong>Pickup Location:</strong> $pickupLocation</p>";
                    echo "<p><strong>Dropoff Location:</strong> $dropoffLocation</p>";
                    echo "<p><strong>Payment Method:</strong> $paymentMethod</p>";
                    echo "</div><hr>";
                }
            } else {
                echo "No bookings found.";
            }

            $conn->close();
            ?>
        </div>
    </main>

    <script src="script.js"></script>
</body>
</html>