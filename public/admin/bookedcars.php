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
    <title>Booking</title>
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
                        <li><a href="indexadmin.php">Home</a></li>
                        <li><a href="carsadmin.php">Cars</a></li>
                        <li><a href="">Booking</a></li>
                    </ul>
                </nav>
            </div>
            <div class="login-account-content">
                <?php

                    if (!isset($_SESSION)) {
                        # code...
                        echo "
                            <div class='login-account-content'>
                                <a href='signin.php'><button class='sign-in-upper-button'> Sign In </button></a>
                            </div>
                        ";
                    } else {
                        echo "
                            <div class='login-account-content'>
                                <a href='profile.php'><button class='sign-in-upper-button'> Conta </button></a>
                            </div>
                        ";
                    }
                ?>
                <!-- <a href="signin.html"><button class="sign-in-upper-button"> Sign In </button></a> -->
            </div>
        </div>
    </header>

    <section>
        <div class="main-content">

            <!-- lista de veiculos alugados -->
            <div class="cars-content">
                <div class="text-cars-area">
                    <h1>My cars bookeds</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="fleet-cars-content">

                    <?php
                        // Buscar todas as reservas
                        $sql_in = "SELECT id, carro_id, usuario_id, data_inicio, data_fim, status, criado_em FROM reservas";
                        $result = $mysqli->query($sql_in);

                        if ($result && $result->num_rows > 0) {
                            // Percorrer cada reserva e buscar dados relacionados (usuário e carro)
                            while ($row = $result->fetch_assoc()) {
                                $id_user = $row['usuario_id'];
                                $id_car = $row['carro_id'];

                                // Buscar dados do utilizador (usar aliases para nomes consistentes)
                                $user_sql = "SELECT nomeUsuario AS nome, emailUsuario AS email, telemovelUsuario AS telemovel, nBilheteUsuario AS nBilhete FROM usuarios WHERE idUsuario = '$id_user'";
                                $stmt_user = $mysqli->query($user_sql);
                                $dados_user = $stmt_user ? $stmt_user->fetch_assoc() : [];
                                $nome_usuario = $dados_user['nome'] ?? '—';
                                $email_usuario = $dados_user['email'] ?? '—';
                                $contacto_usuario = $dados_user['telemovel'] ?? '—';

                                // Buscar dados do carro (usar aliases)
                                $car_sql = "SELECT marcaCarro AS marca, modeloCarro AS modelo, precoCarro AS preco, imagemCaminho AS imagem FROM carros WHERE idCarro = '$id_car'";
                                $stmt_car = $mysqli->query($car_sql);
                                $dados_car = $stmt_car ? $stmt_car->fetch_assoc() : [];
                                $marca = $dados_car['marca'] ?? '—';
                                $modelo = $dados_car['modelo'] ?? '—';
                                $preco = $dados_car['preco'] ?? '—';
                                $path = $dados_car['imagem'] ?? '';

                                // Renderizar o cartão da reserva
                                echo "
                                    <div class='car-card'>
                                        <img src='../backend/{$path}' alt='' style='width: 350px;'>
                                        <h2>{$marca} {$modelo}</h2>
                                        <div class='car-card-rent'>
                                            <p><strong>Nome:</strong> {$nome_usuario}</p>
                                            <p><strong>Email:</strong> {$email_usuario}</p>
                                            <p><strong>Contacto:</strong> {$contacto_usuario}</p>
                                            <p><strong>De:</strong> {$row['data_inicio']} <strong>Para:</strong> {$row['data_fim']}</p>
                                            <p><strong>Status:</strong> {$row['status']}
                                        </div>
                                        <div class='car-card-price'>";

                                                // Renderizar botões conforme o status da reserva
                                                if ($row['status'] == 'reservado') {
                                                    echo "
                                                        <form method='post' action='../backend/general.php'>
                                                            <input type='hidden' name='id' value='{$row['id']}'>
                                                            <input type='submit' name='confirm' value='Confirm' class='rent-now-button'>
                                                            <input type='submit' name='cancel' value='Cancel' class='cancel-button'>
                                                        </form>
                                                    ";
                                                } else if ($row['status'] == 'alugado') {
                                                    echo "
                                                        <form method='post' action='../backend/general.php'>
                                                            <input type='hidden' name='id' value='{$row['id']}'>
                                                            <input type='submit' name='complete' value='Complete' class='rent-now-button'>
                                                        </form>
                                                    ";
                                                }

                                                echo "
                                        </div>
                                    </div>
                                ";
                            }
                        } else {
                            echo "Não existem carros reservados!!";
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