<?php
include 'messagehandler.php'; // Ensure this file connects to the correct database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reply = $_POST['reply'];
    $user_email = $_POST['user_email']; // Retrieve the user's email from the form data

    $to = $user_email;
    $subject = "Reply to your message from R&R";
    $message = "Dear user,\n\n" . $reply . "\n\nBest regards,\nR&R";
    $headers = "From: gnijpablococ@gmail.com";

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully to " . htmlspecialchars($user_email);
    } else {
        echo "Failed to send email.";
    }
}
?>
