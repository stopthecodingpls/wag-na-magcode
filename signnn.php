<?php
require 'db.php'; // Assuming this file includes your database connection ($conn)

session_start();

if(isset($_SESSION['username'])) {
    if ($_SESSION['username'] === 'admin') {
        header("Location: homeAdmin.php");
    } else {
        echo "<script>
                alert('You are already logged in. Returning to Home Page');
                window.location.href = 'rnr.php';
              </script>";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'root') {
        $_SESSION['username'] = $username;
        header("Location: homeAdmin.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT id, username, password FROM logintable WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['id']; // Store user ID in session
            echo "<script>
                    alert('Login successful.');
                    window.location.href = 'rnr.php';
                  </script>";
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
                window.location.href = 'signn.php';
              </script>";
        exit();
    }
}
?>

