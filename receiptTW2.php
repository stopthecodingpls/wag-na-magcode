<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Car Rental Service</title>
   <link rel="stylesheet" href="receipt.css">
   <style>
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
            padding-top: 60px; 
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .rating-option {
            margin: 15px 0;
        }
    </style>
</head>
<body>

<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "paymentinfo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname, rental_date FROM paymenttable WHERE car_model = 'Wigo'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   $row = $result->fetch_assoc();
   $customerName = $row['firstname'] . ' ' . $row['lastname'];
   $rentalDate = $row['rental_date'];
} else {
   $customerName = "N/A";
   $rentalDate = "N/A";
}

$conn->close();
?>

<div id="receipt-container" class="container">
   <img src="NL.png" alt="R&R Car Rental Logo" class="logo">
   <h1>Receipt</h1>
   <p>Thank you for your payment!</p>
   <div class="receipt-details">
       <p><strong>Customer Name:</strong> <?php echo $customerName; ?></p>
       <p><strong>Rental Date:</strong> <?php echo $rentalDate; ?></p>
       <p><strong>Car Model:</strong> Toyota Wigo</p>
       <p><strong>Rental Duration:</strong> 3 days</p>
       <p><strong>Total Amount Paid:</strong> 3600.00</p>
   </div>
   <a href="#" class="btn" id="returnHomeBtn">Return to Home</a>
</div>

<div id="feedbackModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>How would you rate your experience with the website today?</h2>
        <div class="rating-option">
            <input type="radio" id="veryUnsatisfied" name="rating" value="Very unsatisfied">
            <label for="veryUnsatisfied">Very unsatisfied</label>
        </div>
        <div class="rating-option">
            <input type="radio" id="unsatisfied" name="rating" value="Unsatisfied">
            <label for="unsatisfied">Unsatisfied</label>
        </div>
        <div class="rating-option">
            <input type="radio" id="neutral" name="rating" value="Neutral">
            <label for="neutral">Neutral</label>
        </div>
        <div class="rating-option">
            <input type="radio" id="satisfied" name="rating" value="Satisfied">
            <label for="satisfied">Satisfied</label>
        </div>
        <div class="rating-option">
            <input type="radio" id="verySatisfied" name="rating" value="Very satisfied">
            <label for="verySatisfied">Very satisfied</label>
        </div>
        <button onclick="submitFeedback()">Submit</button>
    </div>
</div>

<script>
    var modal = document.getElementById("feedbackModal");
    var btn = document.getElementById("returnHomeBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function(event) {
        event.preventDefault();
        modal.style.display = "block";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    function isRatingSelected() {
        var ratingOptions = document.getElementsByName("rating");
        for (var i = 0; i < ratingOptions.length; i++) {
            if (ratingOptions[i].checked) {
                return true;
            }
        }
        return false;
    }

    function submitFeedback() {
        if (!isRatingSelected()) {
            alert('Please select a rating before submitting your feedback.');
            return;
        }
        alert('Feedback submitted. Thank you!');
        modal.style.display = "none";
        window.location.href = 'rnr.php';
    }
</script>

</body>
</html>