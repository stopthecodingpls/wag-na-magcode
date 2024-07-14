<?php
session_start();

// Database connection
$host = "127.0.0.1";
$username = "root"; // replace with your DB username
$password = ""; // replace with your DB password
$dbname = "login";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure the user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo "You must be logged in to book a car.";
        exit();
    }

    $user_id = $_SESSION['user_id'];
    $pickup_location = $_POST['pickup_location'];
    $pickup_date = $_POST['pickup_date'];
    $pickup_time = $_POST['pickup_time'];
    $dropoff_date = $_POST['dropoff_date'];
    $dropoff_time = $_POST['dropoff_time'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO paymenttable (user_id, pickup_location, pickup_date, pickup_time, dropoff_date, dropoff_time) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $pickup_location, $pickup_date, $pickup_time, $dropoff_date, $dropoff_time);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        // Redirect to a confirmation page or the main page
        header("Location: confirmation.php"); // change to your desired redirect
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the connection
$conn->close();
?>
