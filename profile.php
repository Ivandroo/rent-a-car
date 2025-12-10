<?php

    include('public/backend/conexao.php');
    include('public/backend/protect.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/scss/main.css">
    <title>Log In</title>
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
            
            <div class="login-account-content">
                <a href="signin.php"><button class="sign-in-upper-button"> Sign In </button></a>
            </div>
        </div>
    </header>

    <section>
        <div class="main-content">
            <!-- area de Cadastro -->
            <div class="contact-content" id="contact-area">
                <div class="contact-area">
                    <h2>Profile account</h2>

                    <p><h5>Nome: </h5> <?php echo $_SESSION['nome'] ?> </p>
                    <p><h5>Email: </h5> <?php echo $_SESSION['email'] ?> </p>
                    <p><h5>n Bi: </h5> <?php echo $_SESSION['nBilhete'] ?> </p>

                    <input type="submit" value=" Editar " class="send-message-button" name="Editar">
                    <a href="public/backend/logout.php"><button class="sign-in-upper-button"> Log out </button></a>

                    
                    <!-- <form action="" method="post">
                        <input type="text" name="nome" id="" placeholder="Your Name" required>
                        <input type="text" name="bilhete" id="" placeholder="Your Id Number" required>
                        <input type="tel" name="telemovel" id="" placeholder="Your Phone Number" required>
                        <input type="email" name="email" id="" placeholder="Your Email" required>
                        <input type="password" name="senha" id="" placeholder="Your Password" required>
                        
                        <input type="submit" value=" Log In " class="send-message-button" name="submit">
                    </form>
                    <a href="signin.php"> Do you already have an account? </a> -->
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