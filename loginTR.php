<?php
require 'db.php'; 

session_start();

if(isset($_SESSION['username'])) {
    header("Location: driverTR.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM logintable WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: driverTR.php");
            exit();
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No user found with that username.";
    }

    $stmt->close();
    $conn->close();

    if (isset($message)) {
        echo "<script>
            alert('$message');
            window.location.href = 'loginnTR.php';
        </script>";
        exit();
    }
}
?>
