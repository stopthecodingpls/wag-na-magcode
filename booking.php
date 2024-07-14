<?php
session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "login";

if (!isset($_SESSION['id'])) {
    header("Location: signn.php");
    exit();
}

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_location = isset($_POST['pickup_location']) ? $conn->real_escape_string($_POST['pickup_location']) : '';
    $dropoff_location = isset($_POST['dropoff_location']) ? $conn->real_escape_string($_POST['dropoff_location']) : '';
    $pickup_date = isset($_POST['pickup_date']) ? $conn->real_escape_string($_POST['pickup_date']) : '';
    $dropoff_date = isset($_POST['dropoff_date']) ? $conn->real_escape_string($_POST['dropoff_date']) : '';
    $pickup_time = isset($_POST['pickup_time']) ? $conn->real_escape_string($_POST['pickup_time']) : '';
    $dropoff_time = isset($_POST['dropoff_time']) ? $conn->real_escape_string($_POST['dropoff_time']) : '';

    $id = $_SESSION['id'];

    $check_sql = "SELECT * FROM paymenttable WHERE id='$id' AND pickup_date='$pickup_date' AND dropoff_date='$dropoff_date'";
    $result = $conn->query($check_sql);

    if ($result->num_rows > 0) {
        // Record already exists, you can handle this scenario if needed
    } else {
        $sql = "INSERT INTO paymenttable (id, pickup_location, pickup_time, pickup_date, dropoff_time, dropoff_date, dropoff_location)
                VALUES ('$id', '$pickup_location', '$pickup_time', '$pickup_date', '$dropoff_time', '$dropoff_date', '$dropoff_location')";

        if ($conn->query($sql) === TRUE) {
            // Successfully inserted
        } else {
            $message = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="booking.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="R&R Logo" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#service">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#cars">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing.php">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="rnr.php#about">About Us</a>
                </li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['username'])) {
                        echo '<a class="nav-link btn btn-danger" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link btn btn-warning" href="signn.php">Sign Up</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <form id="search-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="search-section">
            <div class="search-field">
                <label for="pickup-location">Pick-up location</label>
                <input type="text" id="pickup-location" name="pickup_location" required>
            </div>
            <div class="search-field">
                <label for="pickup-date">Pick-up date</label>
                <input type="date" id="pickup-date" name="pickup_date" value="<?php echo date('Y-m-d'); ?>" required>
                <label for="pickup-time">Pick-up time</label>
                <input type="time" id="pickup-time" name="pickup_time" required>
            </div>
            <div class="search-field">
                <label for="dropoff-date">Drop-off date</label>
                <input type="date" id="dropoff-date" name="dropoff_date" value="<?php echo date('Y-m-d'); ?>" required>
                <label for="dropoff-time">Drop-off time</label>
                <input type="time" id="dropoff-time" name="dropoff_time" required>
            </div>
            <div class="search-field">
                <label for="dropoff-location">Drop-off location</label>
                <input type="text" id="dropoff-location" name="dropoff_location" required>
            </div>
            <button type="submit" class="edit-btn" id="search-button">SEARCH</button>
        </div>
    </form>

        <div class="card-container" id="car-cards">

        <div class="card">
            <div class="car-details">
                <div class="car-image">
                    <img src="mitsubishi-mirage1.png" alt="mitsubishi-mirage">
                </div>
                <div class="car-info">
                    <div class="subheading">Subcompact sedan</div>
                    <h2>Mitsubishi Mirage</h2>
                    <div class="features">
                        <div>5 seats</div>
                        <div>Automatic</div>
                        <div>Full to full</div>
                    </div>
                    <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                </div>
            </div>
            <div class="price-section">
                <div class="price">₱ 1,500 /day</div>
                <a href="loginM1.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
            </div>
        </div>

        <div class="card">
            <div class="car-details">
                <div class="car-image">
                    <img src="toyota-rush1.png" alt="Toyota Rush">
                </div>
                <div class="car-info">
                    <div class="subheading">Compact SUV</div>
                    <h2>Toyota Rush</h2>
                    <div class="features">
                        <div>7 seats</div>
                        <div>Automatic</div>
                        <div>Full to full</div>
                    </div>
                    <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                </div>
            </div>
            <div class="price-section">
                <div class="price">₱ 2,500 /day</div>
                <a href="loginTR.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
            </div>
        </div>

        <div class="card">
            <div class="car-details">
                <div class="car-image">
                    <img src="mitsubishi-xpander1.png" alt="Mitsubishi Xpander">
                </div>
                <div class="car-info">
                    <div class="subheading">Compact MPV (Multi-Purpose Vehicle)</div>
                    <h2>Mitsubishi Xpander</h2>
                    <div class="features">
                        <div>7 seats</div>
                        <div>Automatic</div>
                        <div>Full to full</div>
                    </div>
                    <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                </div>
            </div>
            <div class="price-section">
                <div class="price">₱ 2,500 /day</div>
                <a href="loginXP.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
            </div>
        </div>

        <div class="card">
            <div class="car-details">
                <div class="car-image">
                    <img src="toyota-wigo1.png" alt="Toyota Wigo">
                </div>
                <div class="car-info">
                    <div class="subheading">Subcompact hatchback</div>
                    <h2>Toyota Wigo</h2>
                    <div class="features">
                        <div>5 seats</div>
                        <div>Automatic</div>
                        <div>Full to full</div>
                    </div>
                    <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                </div>
            </div>
            <div class="price-section">
                <div class="price">₱ 1,200 /day</div>
                <a href="loginTW1.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
            </div>
        </div>

       <div class="card">
           <div class="car-details">
               <div class="car-image">
                   <img src="mitsubishi-mirage1.png" alt="mitsubishi-mirage">
               </div>
               <div class="car-info">
                   <div class="subheading">Subcompact sedan</div>
                   <h2>Mitsubishi Mirage</h2>
                   <div class="features">
                       <div>5 seats</div>
                       <div>Automatic</div>
                       <div>Full to full</div>
                   </div>
                   <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
               </div>
           </div>
           <div class="price-section">
               <div class="price">₱ 1,500 /day</div>
               <a href="loginM2.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
           </div>
       </div>

       <div class="card">
           <div class="car-details">
               <div class="car-image">
                   <img src="toyota-wigo1.png" alt="Toyota Wigo">
               </div>
               <div class="car-info">
                   <div class="subheading">Subcompact hatchback</div>
                   <h2>Toyota Wigo</h2>
                   <div class="features">
                       <div>5 seats</div>
                       <div>Automatic</div>
                       <div>Full to full</div>
                   </div>
                   <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
               </div>
           </div>
           <div class="price-section">
               <div class="price">₱ 1,200 /day</div>
               <a href="loginTW2.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
            </div>
        </div>
    </div>
    </main>

    <script>
        document.getElementById('search-button').addEventListener('click', function() {
            const cars = [
                {
                    name: 'Mitsubishi Mirage',
                    type: 'Subcompact sedan',
                    seats: 5,
                    transmission: 'Automatic',
                    rate: '1,500',
                    img: 'mitsubishi-mirage1.png',
                    availableFrom: '2024-06-01',
                    availableTo: '2024-12-31'
                },
                {
                    name: 'Toyota Rush',
                    type: 'Compact SUV',
                    seats: 7,
                    transmission: 'Automatic',
                    rate: '2,500',
                    img: 'toyota-rush1.png',
                    availableFrom: '2024-06-01',
                    availableTo: '2024-12-31'
                },
                {
                    name: 'Mitsubishi Xpander',
                    type: 'Compact MPV',
                    seats: 7,
                    transmission: 'Automatic',
                    rate: '2,500',
                    img: 'mitsubishi-xpander1.png',
                    availableFrom: '2024-06-01',
                    availableTo: '2024-12-31'
                },
                {
                    name: 'Toyota Wigo',
                    type: 'Subcompact hatchback',
                    seats: 5,
                    transmission: 'Automatic',
                    rate: '1,200',
                    img: 'toyota-wigo1.png',
                    availableFrom: '2024-06-01',
                    availableTo: '2024-12-31'
                }
            ];

            const pickupDate = new Date(document.getElementById('pickup-date').value);
            const dropoffDate = new Date(document.getElementById('dropoff-date').value);

            const filteredCars = cars.filter(car => {
                const availableFrom = new Date(car.availableFrom);
                const availableTo = new Date(car.availableTo);
                return pickupDate >= availableFrom && dropoffDate <= availableTo;
            });

            const carCardsContainer = document.getElementById('car-cards');
            carCardsContainer.innerHTML = '';

            filteredCars.forEach(car => {
                const card = document.createElement('div');
                card.className = 'card';
                card.innerHTML = `
                    <div class="car-details">
                        <div class="car-image">
                            <img src="${car.img}" alt="${car.name}">
                        </div>
                        <div class="car-info">
                            <div class="subheading">${car.type}</div>
                            <h2>${car.name}</h2>
                            <div class="features">
                                <div>${car.seats} seats</div>
                                <div>${car.transmission}</div>
                                <div>Full to full</div>
                            </div>
                            <div class="reservation-fee">NOTE: ₱ 500 reservation fee deductible to the total rate upon paying.</div>
                        </div>
                    </div>
                    <div class="price-section">
                        <div class="price">₱ ${car.rate} /day</div>
                        <a href="loginn${car.name.replace(/\s+/g, '')}.php" class="select-button">Select</a> <!-- need muna mag login/sign up bago mag proceed sa next step-->
                    `;
                carCardsContainer.appendChild(card);
            });
        });
    </script>
</body>
</html>