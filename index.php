<?php

    include('public/backend/conexao.php');
    //include('public/backend/protect.php');

?>

<!DOCTYPE html>
<html lang="En">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/scss/main.css">
    <title>Rent a car</title>
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
                        <li><a href="#about-us">About us</a></li>
                        <li><a href="#contact-area">Contact</a></li>
                    </ul>
                </nav>
            </div>

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

            <!-- <div class="login-account-content">
                <a href="signin.php"><button class="sign-in-upper-button"> Sing In </button></a>
            </div> -->
        </div>
    </header>
    <section>

        <!-- apresentacao principal do site -->
        <div class="main-content">

            <div class="upper-content">

                <div class="text-content">

                    <h2>Plan your trip now</h2>
                    <h1>Explore the world with comfortable car </h1>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Delectus maxime modi, alias fugit reprehenderit optio ad est ut consequuntur tempore voluptate voluptatibus veritatis magnam reiciendis animi fugiat earum dicta non!</p>
                    <div class="buttons-content">
                        <button class="book-now-button"> Book Now </button>
                        <button class="learn-more-button"> Learn More </button>
                    </div>
                </div>
                <div class="image-content">
                    <img src="public/assets/images/pngwing.com.png" alt="">
                </div>
            </div>

            <!-- lista de veiculos da rent a car -->
            <div class="cars-content">

                <div class="text-cars-area">
                    <h1>Our Vehicles Fleet</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>

                <div class="fleet-cars-content">

                    <?php

                        // Consulta para buscar os alunos mais recentes (por exemplo, os últimos 10 inseridos)
                        $carros = "SELECT idCarro, marcaCarro, modeloCarro, lugaresCarro, portasCarro, bagagemCarro, categoriaCarro, precoCarro, imagemCaminho FROM carros ORDER BY idCarro DESC LIMIT 3"; 

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
                                            <span><i class='fa-solid fa-user'></i> {$row['lugaresCarro']}</span>
                                            <span><i class='fa-solid fa-suitcase'></i> {$row['bagagemCarro']}</span>
                                            <span><i class='fa-solid fa-door-closed'></i> {$row['portasCarro']}</span>
                                            <span><i class='fa-solid fa-car'></i> {$row['categoriaCarro']}</span>
                                        </div>

                                        <div class='car-card-price'>
                                            <div class='car-rent-price'>
                                                <span>Daily rent from</span>
                                                <h2>{$row['precoCarro']} kzs</h2>
                                            </div>
                                            <button class='rent-now-button'> Rent now </button>
                                        </div>
                                        
                                    </div>
                                ";
                            }
                        }
                    ?>
                    
                </div>
            </div>

            <!-- informacoes sobre a rent a car -->
            <div class="rentacar-info-area" id="about-us">
                <div class="rentacar-upper-info">
                    <div class="rentacar-info">
                        <h1>Why Choose Us?</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                    </div>
                    <div class="rentacar-info">
                        <h2>About us</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore exercitationem suscipit enim possimus ab et sint hic voluptatum inventore excepturi harum dolorem vel blanditiis minus quod, similique culpa dolorum cupiditate!</p>
                    </div>
                </div>
                <div class="rentacar-lower-info">
                    <div class="rentacar-box-info">
                        <h1>150+</h1>
                        <span>Cars for Rent</span>
                    </div>
                    <div class="rentacar-box-info">
                        <h1>100+</h1>
                        <span>Repair Shops</span>
                    </div>
                    <div class="rentacar-box-info">
                        <h1>200+</h1>
                        <span>Professional Drivers</span>
                    </div>
                    <div class="rentacar-box-info">
                        <h1>10+</h1>
                        <span>Years of Experience</span>
                    </div>
                </div>
            </div>

            <div class="rentacar-services-content">
                <div class="services-box-content">
                    <div class="services-box">
                        <div class="services-box-logo">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                        <div class="services-box-text">
                            <h2>First class services</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                        </div>
                    </div>
                    <div class="services-box">
                        <div class="services-box-logo">
                            <i class="fa-solid fa-road"></i>
                        </div>
                        <div class="services-box-text">
                            <h2>24/7 Road Assistence</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                        </div>
                    </div>
                </div>

                <div class="services-box-content">
                    <div class="services-box">
                        <img src="public/assets/images/pngwing.com (1).png" alt="">
                    </div>
                </div>
                <div class="services-box-content">
                    <div class="services-box">
                        
                        <div class="services-box-text">
                            <h2>Quality at minimun expense</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                        </div>
                        <div class="services-box-logo">
                            <i class="fa-solid fa-ticket"></i>
                        </div>
                    </div>
                    <div class="services-box">
                        <div class="services-box-text">
                            <h2>Free pick-up & drop-off</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                        </div>
                        <div class="services-box-logo">
                            <i class="fa-solid fa-magnifying-glass-location"></i>
                        </div>
                    </div>
                </div>
                
            </div>

            <!-- area de contacto -->
            <div class="contact-content" id="contact-area">
                <div class="contact-area">
                    <h2>Need Help? Contact Us</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                    <form action="" method="post">
                        <input type="text" name="" id="" placeholder="Your Name" required>
                        <input type="email" name="" id="" placeholder="Your Email" required>
                        <textarea name="message" id="message" cols="30" rows="5" placeholder="Your Message" required></textarea>
                        <input type="submit" value=" Send Message " class="send-message-button">
                    </form>
                </div>
                <div class="contact-image">
                    <img src="public/assets/images/3634312.jpg" alt="">
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
                <a href="index.html#about-us">About us</a>
                <a href="index.html#contact-area">Contact</a>
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