<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R&R Car Rental</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="FAQs.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="R&R Logo" height="50">
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
                    <a class="nav-link" href="service.php">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cars.php">Cars</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing.php">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <?php
                    session_start();
                    if (isset($_SESSION['username'])) {
                        echo '<a class="nav-link btn btn-danger" href="logout.php">Logout</a>';
                    } else {
                        echo '<a class="nav-link btn btn-warning" href="signn.php">Sign Up</a>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>

    <div class="faq-section">
        <h1>Frequently Asked Questions</h1>
        
        <div class="faq-item">
            <button class="faq-question">1. What are your rates for rental?</button>
            <div class="faq-answer">
                <p>Our rate depends on your destination. Please let us know where you plan to go, and we can provide you with a specific quote.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <button class="faq-question">2. Where is the pickup point?</button>
            <div class="faq-answer">
                <p>The pickup point is located at Jollibee Golden City in front of Shell Gasoline Station, Santa Rosa Laguna, along the highway.</p>
            </div>
        </div>
        
        <div class="faq-item">
            <button class="faq-question">3. What are the requirements for renting a vehicle?</button>
            <div class="faq-answer">
                <p>You need to provide the following:<br>
                    1. 2 primary IDs (driver's license and UMID or Passport)<br>
                    2. Meralco bill
                </p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">4. How can I secure a reservation?</button>
            <div class="faq-answer">
                <p>After sending the complete requirements, you can process a 500 pesos reservation fee to secure the dates. This fee will be deducted from the total rate upon full payment.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">5. When is the full payment due?</button>
            <div class="faq-answer">
                <p>The full payment is due upon the pickup of the unit.</p>
            </div>
        </div>

        <div class="faq-item">
            <button class="faq-question">6. How can I send the reservation fee?</button>
            <div class="faq-answer">
                <p>You can send the reservation fee via GCash or through bank transfer using the provided QR code.</p>
            </div>
        </div>
        
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var questions = document.querySelectorAll(".faq-question");
            
            questions.forEach(function(question) {
                question.addEventListener("click", function() {
                    var answer = this.nextElementSibling;
                    
                    if (answer.style.maxHeight) {
                        answer.style.maxHeight = null;
                    } else {
                        var activeAnswers = document.querySelectorAll(".faq-answer");
                        activeAnswers.forEach(function(activeAnswer) {
                            activeAnswer.style.maxHeight = null;
                        });
                        
                        answer.style.maxHeight = answer.scrollHeight + "px";
                    }
                });
            });
        });
    </script>
</body>
</html>
