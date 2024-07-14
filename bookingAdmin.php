<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings - R&R</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <header>
        <div class="logo">R&R</div>
        <nav>
            <ul>
                <li><a href="homeAdmin.php">Home</a></li>
                <li><a href="bookingAdmin.php">Bookings</a></li>
                <li><a href="messageAdmin.php">Messages</a></li>
            </ul>
        </nav>
        <form action="rnr.php">
            <button type="submit" class="sign-up">Logout</button>
        </form>
    </header>
    <main>
        <h1>Manage Bookings</h1>
        <table>
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Pickup Location</th>
                    <th>Drop-off Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>2023-06-22</td>
                    <td>10:00 AM</td>
                    <td>123 Main St</td>
                    <td>456 Oak St</td>
                    <td>
                        <button class="edit">Edit</button>
                        <button class="delete">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>
    <script src="script.js"></script>
</body>
</html>
