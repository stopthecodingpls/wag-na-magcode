<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "paymentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$title = $conn->real_escape_string($_POST['title']);
$first_name = $conn->real_escape_string($_POST['first-name']);
$last_name = $conn->real_escape_string($_POST['last-name']);
$driver_age = $conn->real_escape_string($_POST['driver-age']);
$license_no = $conn->real_escape_string($_POST['license-no']);
$cellphone = $conn->real_escape_string($_POST['cellphone']);
$email = $conn->real_escape_string($_POST['email']);
$address = $conn->real_escape_string($_POST['address']);

$sql = "INSERT INTO userInfo (title, firstname, lastname, age, license, cellphone, email, home)
        VALUES ('$title', '$first_name', '$last_name', '$driver_age', '$license_no', '$cellphone', '$email', '$address')";

if ($conn->query($sql) === TRUE) {
    header("Location: paynowXP.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
