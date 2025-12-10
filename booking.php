<?php

    include('public/backend/conexao.php');
    // Start session if not started. We need session for user info.
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['id'])) {
        echo "<script> alert('Area de carros reservados.');</script>";
    } else {
        echo "<script> alert('Por favor, faça login para reservar um carro.');</script>";
        echo "<script> window.location.href = 'signin.php';</script>";
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/scss/main.css">
    <title>Booking</title>
</head>
<body>
    <header>
        <div class="upper-content">
            <div class="contacts-content">
                <span><img src="public/assets/svg/circle-phone.png" alt=""> +208 333 9206</span>
                <span><img src="public/assets/svg/circle-envelope.png" alt=""> rentacar@gmail.com</span>
                <span><img src="public/assets/svg/clock.png" alt=""> Mon - Fri 08.00 - 16.00</span>
            </div>
            <div class="social-media-content">
                <a href="#"><img src="public/assets/svg/facebook.png" alt=""></a>
                <a href="#"><img src="public/assets/svg/instagram-circle.png" alt=""></a>
                <a href="#"><img src="public/assets/svg/tiktok-circle.png" alt=""></a>
                <a href="#"><img src="public/assets/svg/twitter-alt-circle.png" alt=""></a>
            </div>
        </div>
        <div class="main-content">
            <div class="logo-content">
                <h1>Rent a Car</h1>
            </div>
            <div class="nav-content">
                <nav class="nav-menu">
                    <ul class="nav-menu-group">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="cars.php">Cars</a></li>
                        <li><a href="">Booking</a></li>
                        <li><a href="index.php#about-us">About us</a></li>
                        <li><a href="index.php#contact-area">Contact</a></li>
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

            <?php

                $id_user = $_SESSION['id'];
                // Buscar todas as reservas
                $sql_in = "SELECT id, carro_id, data_inicio, data_fim, status, criado_em FROM reservas WHERE usuario_id = $id_user";
                $result = $mysqli->query($sql_in);

                if ($result && $result->num_rows > 0) {
                    // Percorrer cada reserva e buscar dados relacionados (usuário e carro)
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <h1> {$row['id']} </h1>
                            <h1> {$row['carro_id']} </h1>
                            <h1> {$row['criado_em']} </h1>
                        ";
                    }
                }

            ?>

            <!-- lista de veiculos alugados -->
            <div class="cars-content">
                <div class="text-cars-area">
                    <h1>My cars bookeds</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="fleet-cars-content">

                    
                    <div class="car-card">
                        
                        <img src="public/assets/images/car-1.jpg" alt="">

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
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
            <div class="footer-box-content">
                <h2>Quick Links</h2>
                <a href="index.html">Home</a>
                <a href="cars.html">Cars</a>
                <a href="#">Booking</a>
                <a href="index.html#about-us">About us</a>
                <a href="index.html#contact-area">Contact</a>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
                <span class="copy">© 2024 Rent a Car. All rights reserved.</span>
            </div>
            <div class="footer-box-content">
                <h2>Contact Us</h2>
                <span><i class="fa-solid fa-envelope"></i> rentacar@gmail.com</span><br>
                <span><i class="fa-solid fa-phone"></i> +208 333 9206</span>
                <div class="social-media-icons">
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
            
         </div>
    </footer>
</body>
</html>