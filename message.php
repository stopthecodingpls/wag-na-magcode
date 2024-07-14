<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - R&R</title>
    <link rel="stylesheet" href="message.css">
</head>
<body>
    <header>
        <div class="logo">R&R</div>
        <nav>
            <ul>
                <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="booking.php">Booking</a></li>
                <li><a href="message.php">Messages</a></li>
            </ul>
        </nav>
        <button class="sign-up">Sign Up</button>
    </header>
    <main>
        <h1>Messages</h1>
        <div class="message-container">
            <?php
            include 'messagehandler.php'; // Ensure this file connects to the correct database

            $sql = "SELECT name, email, phone, message, submission FROM contacttable";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="message">';
                    echo '<div class="message-header">';
                    echo '<span class="message-sender">' . htmlspecialchars($row["name"]) . '</span>';
                    echo '<span class="message-date">' . htmlspecialchars($row["submission"]) . '</span>';
                    echo '</div>';
                    echo '<div class="message-content">';
                    echo '<p>' . htmlspecialchars($row["message"]) . '</p>';
                    echo '</div>';
                    echo '<form class="reply-form" action="replyhandler.php" method="POST">';
                    echo '<textarea name="reply" id="reply" cols="30" rows="5" placeholder="Write your reply here..." required></textarea>';
                    echo '<input type="hidden" name="user_email" value="' . htmlspecialchars($row["email"]) . '">';
                    echo '<button type="submit">Send</button>';
                    echo '</form>';
                    echo '</div>';
                }
            } else {
                echo "No messages found.";
            }

            $conn->close();
            ?>
        </div>
    </main>
    <script src="script.js"></script>
</body>
</html>
