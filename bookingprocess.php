<?php
require 'bookingdb.php'; // include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_location = $_POST['pickup_location'];
    $pickup_date = $_POST['pickup_date'];
    $dropoff_date = $_POST['dropoff_date'];
    $car_id = 1; // assuming car_id is known or selected previously
    $user_id = 1; // assuming user_id is known (e.g., from a logged-in user session)

    $sql = "INSERT INTO bookings (car_id, user_id, pickup_location, pickup_date, dropoff_date, status) 
            VALUES (:car_id, :user_id, :pickup_location, :pickup_date, :dropoff_date, 'pending')";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'car_id' => $car_id,
        'user_id' => $user_id,
        'pickup_location' => $pickup_location,
        'pickup_date' => $pickup_date,
        'dropoff_date' => $dropoff_date,
    ]);

    echo "Booking successful!";
}
?>
