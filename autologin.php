<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $token = $_COOKIE['remember_token'];
    
    $sql = "SELECT id, username FROM users WHERE remember_token=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $username);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
        $_SESSION['user_id'] = $id;
        $_SESSION['username'] = $username;
    }

    $stmt->close();
}

$conn->close();
?>
