<?php

    include('public/backend/conexao.php');

    // Start session if not started. We don't protect the cars listing page — it's public.
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/scss/main.css">
    <title>Cars</title>
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
                        <li><a href="booking.php">Booking</a></li>
                        <li><a href="index.php#about-us">About us</a></li>
                        <li><a href="index.php#contact-area">Contact</a></li>
                    </ul>
                </nav>
            </div>

            <?php
                // Ensure session is started (should already be above but keep defensive).
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION['id'])) {
                    echo "<div class='login-account-content'><a href='profile.php'><button class='sign-in-upper-button'> Conta </button></a></div>";
                } else {
                    echo "<div class='login-account-content'><a href='signin.php'><button class='sign-in-upper-button'> Sign In </button></a></div>";
                }
            ?>


            <!-- <div class="login-account-content">
                <a href="signin.php"><button class="sign-in-upper-button"> Sign In </button></a>
            </div> -->
        </div>
    </header>
    <section>

        <div class="main-content">

            <!-- lista de veiculos da rent a car -->
            <div class="cars-content">
                <div class="text-cars-area">
                    <h1>Our Vehicles Fleet</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="fleet-cars-content">

                    <?php

                        // Consulta para buscar os alunos mais recentes (por exemplo, os últimos 10 inseridos)
                        $carros = "SELECT idCarro, marcaCarro, modeloCarro, lugaresCarro, portasCarro, bagagemCarro, categoriaCarro, precoCarro, imagemCaminho FROM carros ORDER BY idCarro"; 

                        $sql_carros = $mysqli->query($carros);

                    ?>

                    <?php
                        if ($sql_carros -> num_rows > 0) {
                            while ($row = $sql_carros -> fetch_assoc()) {
                                echo "
                                    <div class='car-card'>

                                        <img src='public/backend/{$row['imagemCaminho']}' alt='' style='width: 350px;'>

                                        <h2>{$row['marcaCarro']}</h2>

                                        <div class='car-card-details'>
                                            <span><i class='fa-solid fa-user'></i>{$row['lugaresCarro']}</span>
                                            <span><i class='fa-solid fa-suitcase'></i>{$row['bagagemCarro']}</span>
                                            <span><i class='fa-solid fa-door-closed'></i>{$row['portasCarro']}</span>
                                            <span><i class='fa-solid fa-car'></i>{$row['categoriaCarro']}</span>
                                        </div>

                                        <div class='car-card-price'>
                                            <div class='car-rent-price'>
                                                <span>Daily rent from</span>
                                                <h2>{$row['precoCarro']} kzs</h2>
                                            </div>
                                            <form action='rent.php' method='get'>
                                                <input type='hidden' name='idCarro' value='{$row['idCarro']}'>
                                                <input type='hidden' name='marcaCarro' value='{$row['marcaCarro']}'>
                                                <input type='hidden' name='modeloCarro' value='{$row['modeloCarro']}'>
                                                <input type='hidden' name='precoCarro' value='{$row['precoCarro']}'>
                                                <button type='submit' class='rent-now-button'> Book now </button>
                                            </form>
                                            <!--
                                            <button class='rent-now-button'> Rent now </button>
                                            -->
                                        </div>
                                        
                                    </div>
                                ";
                            }
                        }
                    ?>
                    
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
                <a href="index.php">Home</a>
                <a href="cars.php">Cars</a>
                <a href="#">Booking</a>
                <a href="index.php#about-us">About us</a>
                <a href="index.php#contact-area">Contact</a>
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