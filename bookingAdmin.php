<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - R&R</title>
    <link rel="stylesheet" href="home.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <h1>Manage Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Pickup Date</th>
                    <th>Pickup Time</th>
                    <th>Pickup Location</th>
                    <th>Drop-off Date</th>
                    <th>Drop-off Time</th>
                    <th>Drop-off Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "127.0.0.1";
                $username = "root";
                $password = "";
                $dbname = "login";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT payment_id, pickup_date, pickup_time, pickup_location, dropoff_date, dropoff_time, dropoff_location FROM paymenttable ORDER BY pickup_date DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $paymentId = $row['payment_id'];
                        $pickupDate = $row['pickup_date'];
                        $pickupTime = $row['pickup_time'];
                        $pickupLocation = $row['pickup_location'];
                        $dropoffDate = $row['dropoff_date'];
                        $dropoffTime = $row['dropoff_time'];
                        $dropoffLocation = $row['dropoff_location'];

                        echo "<tr data-id='$paymentId'>";
                        echo "<td class='payment_id'>$paymentId</td>";
                        echo "<td class='pickup_date'>$pickupDate</td>";
                        echo "<td class='pickup_time'>$pickupTime</td>";
                        echo "<td class='pickup_location'>$pickupLocation</td>";
                        echo "<td class='dropoff_date'>$dropoffDate</td>";
                        echo "<td class='dropoff_time'>$dropoffTime</td>";
                        echo "<td class='dropoff_location'>$dropoffLocation</td>";
                        echo "<td>";
                        echo "<button class='delete button-style'>Delete</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No bookings found.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </main>
    <script>
        $(document).ready(function() {
            $('.delete').click(function() {
                if (confirm('Are you sure you want to delete this booking?')) {
                    var row = $(this).closest('tr');
                    var paymentId = row.find('.payment_id').text();

                    $.post('delete.php', { payment_id: paymentId }, function(response) {
                        if (response == "Booking deleted successfully") {
                            row.remove();
                        } else {
                            alert(response);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
