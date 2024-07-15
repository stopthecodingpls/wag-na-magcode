<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentId = $_POST['payment_id'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "login";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM paymenttable WHERE payment_id='$paymentId'";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    $conn->close();
}
?>
