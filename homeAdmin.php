<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Notification</title>
    <link rel="stylesheet" href="home.css">
    <style>
        .btn-yellow {
            background-color: #DAA520; /* Darker shade of yellow */
            color: black; /* Set text color to black */
            border-color: #DAA520;
            font-family: inherit; /* Ensuring the font family is inherited */
            font-size: inherit; /* Ensuring the font size is inherited */
            padding: 0.375rem 0.75rem; /* Adjust padding to match nav-link */
        }

        .btn-yellow:hover {
            background-color: #FFC107; /* Slightly darker shade for hover */
            border-color: #FFC107;
        }

        .nav-link {
            text-decoration: none; /* Ensuring text-decoration matches links */
            color: inherit; /* Ensuring color matches links */
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">R&R</div>
        <nav>
            <ul>
                <li><a href="homeAdmin.php" class="nav-link">Home</a></li>
                <li><a href="bookingAdmin.php" class="nav-link">Bookings</a></li>
                <li><a href="messageAdmin.php" class="nav-link">Messages</a></li>
            </ul>
        </nav>
        <form action="logout.php" method="post" class="d-inline">
            <button type="submit" class="nav-link btn btn-yellow">Logout</button>
        </form>
    </header>
    <main>
        <div class="notification" id="notification">
            <?php
            $servername = "127.0.0.1";
            $username = "root";
            $password = "";
            $dbname = "login";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT pickup_time, dropoff_time, pickup_date, dropoff_date, pickup_location, dropoff_location FROM paymenttable ORDER BY pickup_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $pickupTime = $row['pickup_time'];
                    $dropoffTime = $row['dropoff_time'];
                    $pickupDate = $row['pickup_date'];
                    $dropoffDate = $row['dropoff_date'];
                    $pickupLocation = $row['pickup_location'];
                    $dropoffLocation = $row['dropoff_location'];

                    echo "<div class='booking'>";
                    echo "<p><strong>Pickup Time:</strong> $pickupTime</p>";
                    echo "<p><strong>Dropoff Time:</strong> $dropoffTime</p>";
                    echo "<p><strong>Pickup Date:</strong> $pickupDate</p>";
                    echo "<p><strong>Dropoff Date:</strong> $dropoffDate</p>";
                    echo "<p><strong>Pickup Location:</strong> $pickupLocation</p>";
                    echo "<p><strong>Dropoff Location:</strong> $dropoffLocation</p>";
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
