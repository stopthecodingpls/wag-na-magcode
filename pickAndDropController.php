<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login"; // Assuming 'login' database contains logintable

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $pickupDate = isset($_POST['pickup-date']) ? $_POST['pickup-date'] : null;
    $dropoffDate = isset($_POST['dropoff-date']) ? $_POST['dropoff-date'] : null;

    if ($pickupDate && $dropoffDate) {
        // Fetch the login ID for the current user
        $fetchLoginIdSQL = "SELECT id FROM logintable WHERE username = ?";
        $fetchLoginIdStmt = $conn->prepare($fetchLoginIdSQL);
        $fetchLoginIdStmt->bind_param("s", $username);
        $fetchLoginIdStmt->execute();
        $result = $fetchLoginIdStmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $loginId = $row['id'];

            // Update the receipt table with the new pickup and dropoff dates
            $updateReceiptSQL = "UPDATE receipttable SET pickup_date = ?, dropoff_date = ? WHERE login_id = ?";
            $stmt = $conn->prepare($updateReceiptSQL);
            $stmt->bind_param("ssi", $pickupDate, $dropoffDate, $loginId);

            if ($stmt->execute()) {
                // Successful update
                echo json_encode(['success' => true, 'message' => 'Dates updated successfully']);
            } else {
                // Error updating the record
                echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            // User not found
            echo json_encode(['success' => false, 'message' => 'Login ID not found for username: ' . $username]);
        }
        $fetchLoginIdStmt->close();
    } else {
        // Missing form data
        echo json_encode(['success' => false, 'message' => 'Pickup date or Dropoff date is missing']);
    }
} else {
    // User not logged in
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
}

$conn->close();
?>
