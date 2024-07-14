<?php
// Retrieve available cars
$pickup_date = '2024-06-05'; // Get from form input
$dropoff_date = '2024-06-08'; // Get from form input

$sql = "SELECT * FROM cars WHERE id NOT IN (
            SELECT car_id FROM bookings 
            WHERE (pickup_date <= :dropoff_date AND dropoff_date >= :pickup_date)
        )";

$stmt = $pdo->prepare($sql);
$stmt->execute(['pickup_date' => $pickup_date, 'dropoff_date' => $dropoff_date]);
$cars = $stmt->fetchAll();

// Display car cards
foreach ($cars as $car) {
    echo "<div class='card'>
            <div class='car-details'>
                <div class='car-image'>
                    <img src='{$car['image']}' alt='{$car['name']}'>
                </div>
                <div class='car-info'>
                    <div class='subheading'>{$car['type']}</div>
                    <h2>{$car['name']}</h2>
                    <div class='features'>
                        <div>{$car['seats']} seats</div>
                        <div>{$car['transmission']}</div>
                        <div>Full to full</div>
                    </div>
                    <div class='reservation-fee'>NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                </div>
            </div>
            <div class='price-section'>
                <div class='price'>₱ {$car['rate']} /day</div>
                <a href='loginn.php' class='select-button'>Select</a>
            </div>
          </div>";
}
?>
