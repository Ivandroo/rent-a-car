<?php

include('../backend/conexao.php');
include('../backend/protect.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../scss/main.css">
    <title>Admin</title>
</head>
<body>
    <header>
        <div class="upper-content">
            <div class="contacts-content">
                <span><img src="../assets/svg/circle-phone.png" alt=""> +208 333 9206</span>
                <span><img src="../assets/svg/circle-envelope.png" alt=""> rentacar@gmail.com</span>
                <span><img src="../assets/svg/clock.png" alt=""> Mon - Fri 08.00 - 16.00</span>
            </div>
            <div class="social-media-content">
                <a href="#"><img src="../assets/svg/facebook.png" alt=""></a>
                <a href="#"><img src="../assets/svg/instagram-circle.png" alt=""></a>
                <a href="#"><img src="../assets/svg/tiktok-circle.png" alt=""></a>
                <a href="#"><img src="../assets/svg/twitter-alt-circle.png" alt=""></a>
            </div>
        </div>
        <div class="main-content">
            <div class="logo-content">
                <h1>Rent a Car</h1>
            </div>
            <div class="nav-content">
                <nav class="nav-menu">
                    <ul class="nav-menu-group">
                        <li><a href="indexadmin.html">Home</a></li>
                        <li><a href="carsadmin.php">Cars</a></li>
                        <li><a href="booking.php">Booking</a></li>
                    </ul>
                </nav>
            </div>
            <div class="login-account-content">
                <?php
                    // Ensure session is started before checking session variables
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }

                    if (isset($_SESSION['id'])) {
                        echo "<div class='login-account-content'><a href='profile.php'><button class='sign-in-upper-button'> Conta </button></a></div>";
                    } else {
                        echo "<div class='login-account-content'><a href='signin.php'><button class='sign-in-upper-button'> Sign In </button></a></div>";
                    }
                ?>
                
                <!-- <a href="signin.html"><button class="sign-in-upper-button"> Sign In </button></a> -->
                 
            </div>
        </div>
    </header>
    <section>
        <div class="main-content">

            <!-- lista de veiculos da rent a car -->
            <div class="cars-content">
                <div class="text-cars-area">
                    <h1>Last Vehicles Posted</h1>
                    <p>Admin Dashboard</p>
                </div>
                <div class="fleet-cars-content">
                    <div class="car-card">
                        
                        <img src="../assets/images/car-1.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$20</h2>
                            </div>
                            <button class="rent-now-button"> Rent Now </button>
                        </div>
                        
                    </div>
                    <div class="car-card">

                        <img src="../assets/images/car-2.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$15</h2>
                            </div>
                            <button class="rent-now-button"> Rent Now </button>
                        </div>
                        
                    </div>
                    <div class="car-card">

                        <img src="../assets/images/car-3.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$32</h2>
                            </div>
                            <button class="rent-now-button"> Rent Now </button>
                        </div>
                        
                    </div>
                    
                </div>
            </div>

            <!-- lista de veiculos alugados -->
            <div class="cars-content">
                <div class="text-cars-area">
                    <h1>My cars bookeds</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="fleet-cars-content">
                    <div class="car-card">
                        
                        <img src="../assets/images/car-1.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$20</h2>
                            </div>
                            <button class="rent-now-button"> See Details </button>
                        </div>
                        
                    </div>
                    <div class="car-card">

                        <img src="../assets/images/car-2.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$15</h2>
                            </div>
                            <button class="rent-now-button"> See Details </button>
                        </div>
                        
                    </div>
                    <div class="car-card">

                        <img src="../assets/images/car-3.jpg" alt="">

                        <h2>Sedan Car</h2>

                        <div class="car-card-details">
                            <span><i class="fa-solid fa-user"></i> 5</span>
                            <span><i class="fa-solid fa-suitcase"></i> 2</span>
                            <span><i class="fa-solid fa-door-closed"></i> 4</span>
                            <span><i class="fa-solid fa-car"></i> SUV</span>
                        </div>

                        <div class="car-card-price">
                            <div class="car-rent-price">
                                <span>Daily rent from</span>
                                <h2>$32</h2>
                            </div>
                            <button class="rent-now-button"> See details </button>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>

    <footer>
        <!-- terminar o footer -->
         <div class="footer-content">
            <div class="footer-box-content">
                <h2>Developed by: </h2> 
                <span>Evandro António</span><br>
                <span><i class="fa-solid fa-envelope"></i> Evandroa@gmail.com</span><br>
                <span><i class="fa-solid fa-phone"></i> +244 947 657 405</span>
                <div class="social-media-icons">
                    <a href="https://www.instagram.com/iv_androoo?igsh=MTFjZndqaWMxd2tnbA%3D%3D&utm_source=qr" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="https://github.com/Ivandroo" target="_blank"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
            <div class="footer-box-content">
                <h2>Quick Links</h2>
                <a href="index.html">Home</a>
                <a href="cars.html">Cars</a>
                <a href="#">Booking</a>
                <div class="footer-links">
                    <a href="#" target="_blank">Privacy Policy</a>
                    <a href="#" target="_blank">Terms of Service</a>
                </div>
                <span class="copy">© 2024 Rent a Car. All rights reserved.</span>
            </div>
            <div class="footer-box-content">
                <h2>Contact Us</h2>
                <span><i class="fa-solid fa-envelope"></i> rentacar@gmail.com</span><br>
                <span><i class="fa-solid fa-phone"></i> +208 333 9206</span>
                <div class="social-media-icons">
                    <a href="" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                    <a href="" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <a href="" target="_blank"><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
            
         </div>
    </footer>
</body>
</html>