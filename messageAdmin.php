<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages - R&R</title>
    <link rel="stylesheet" href="message.css">
    <style>
        .btn-yellow {
            background-color: #DAA520; 
            color: black; 
            border-color: #DAA520;
            font-family: inherit; 
            font-size: inherit; 
            padding: 0.375rem 0.75rem; 
        }

        .btn-yellow:hover {
            background-color: #FFC107; 
            border-color: #FFC107;
        }

        .nav-link {
            text-decoration: none; 
            color: inherit; 
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">R&R</div>
        <nav>
            <ul>
                <li><a href="homeAdmin.php" class="nav-link">Home</a></li>
                <li><a href="bookingAdmin.php" class="nav-link">Booking</a></li>
                <li><a href="messageAdmin.php" class="nav-link">Messages</a></li>
            </ul>
        </nav>
        <form action="logout.php" method="post" class="d-inline">
            <button type="submit" class="nav-link btn btn-yellow">Logout</button>
        </form>
    </header>
    <main>
        <h1>Messages</h1>
        <div class="message-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "contact";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT name, message, email FROM contacttable";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $name = htmlspecialchars($row["name"]);
                    $message = htmlspecialchars($row["message"]);
                    $email = htmlspecialchars($row["email"]);
                    echo '<div class="message">';
                    echo '    <div class="message-header">';
                    echo '        <span class="message-sender">' . $name . '</span>';
                    echo '    </div>';
                    echo '    <div class="message-content">';
                    echo '        <p>' . $message . '</p>';
                    echo '    </div>';
                    echo '    <form class="reply-form" method="post" action="send_reply.php">';
                    echo '        <textarea name="reply" cols="30" rows="5" placeholder="Write your reply here..." required></textarea>';
                    echo '        <input type="hidden" name="email" value="' . $email . '">';
                    echo '        <input type="hidden" name="name" value="' . $name . '">';
                    echo '        <button type="submit">Send</button>';
                    echo '    </form>';
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
