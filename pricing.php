<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>R&R Car Rental</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <link rel="stylesheet" href="pricing.css">
</head>
<body>




   <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
       <a class="navbar-brand" href="#">
           <img src="logo.png" alt="R&R Logo" height="30">
       </a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" href="navbarNav">
           <ul class="navbar-nav ml-auto">
               <li class="nav-item">
                   <a class="nav-link" href="rnr.php#home">Home</a>
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
                   <a class="nav-link" href="rnr.php#contact">Contact</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="rnr.php#about">About Us</a>
               </li>
               <li class="nav-item">
                    <?php
                    session_start();
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




   <header class="header">
       <div class="header-overlay">
           <div class="container text-center">
               <h1>Pricing and Deals</h1>
           </div>
         
           <div class="container pricing-boxes">
               <div class="row">
                   <div class="col-md-3">
                       <div class="pricing-box">
                           <img src="toyota-rush.png" alt="Toyota Rush">
                           <h2>₱ 2,500</h2>
                           <h3>Toyota Rush</h3>
                           <ul>
                               <li>Compact SUV</li>
                               <li>7 passengers</li>
                               <li>Efficient and reliable gasoline engine</li>
                               <li>Automatic</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="pricing-box">
                           <img src="mitsubishi-xpander.png" alt="Mitsubishi Xpander">
                           <h2>₱ 2,500</h2>
                           <h3>Mitsubishi Xpander</h3>
                           <ul>
                               <li>Compact MPV</li>
                               <li>7 passengers</li>
                               <li>Efficient gasoline engine</li>
                               <li>Automatic</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="pricing-box">
                           <img src="mitsubishi-mirage.png" alt="Mitsubishi Mirage G4">
                           <h2>₱ 1,500</h2>
                           <h3>Mitsubishi Mirage G4</h3>
                           <ul>
                               <li>Subcompact sedan</li>
                               <li>Up to 5 passengers</li>
                               <li>Fuel-efficient gasoline engine</li>
                               <li>Automatic</li>
                           </ul>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="pricing-box">
                           <img src="toyota-wigo.png" alt="Toyota Wigo">
                           <h2>₱ 1,200</h2>
                           <h3>Toyota Wigo</h3>
                           <ul>
                               <li>Subcompact hatchback</li>
                               <li>Up to 5 passengers</li>
                               <li>Fuel-efficient gasoline engine</li>
                               <li>Automatic</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header>




   <footer class="footer text-center">
       <p>&copy; 2024 R&R Car Rental</p>
   </footer>




</body>
</html>
