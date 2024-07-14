<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id'];

    $pickup_location = $conn->real_escape_string($_POST['pickup_location']);
    $dropoff_location = $conn->real_escape_string($_POST['pickup_location']);
    $pickup_date = $conn->real_escape_string($_POST['pickup_date']);
    $dropoff_date = $conn->real_escape_string($_POST['dropoff_date']);
    $pickup_time = $conn->real_escape_string($_POST['pickup_time']);
    $dropoff_time = $conn->real_escape_string($_POST['dropoff_time']);

    $sql = "INSERT INTO paymenttable (id, pickup_location, pickup_time, pickup_date, dropoff_time, dropoff_date, dropoff_location)
    VALUES ('$id', '$pickup_location', '$pickup_time', '$pickup_date', '$dropoff_time', '$dropoff_date', '$dropoff_location')";

    if ($conn->query($sql) === TRUE) {
        header("Location: booking.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
