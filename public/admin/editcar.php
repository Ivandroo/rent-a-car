<?php

include('../backend/conexao.php');
include('../backend/protect.php');

$idCarro = intval($_GET['idCarro']);

$sql = "SELECT * FROM carros WHERE idCarro ='$idCarro'";
$sql_stmt = $mysqli -> query($sql);

$car = $sql_stmt -> fetch_assoc();

if(!isset($_SESSION)) 
{

    session_start();

}

$_SESSION['marca'] = $car['marcaCarro'];
$_SESSION['modelo'] = $car['modeloCarro'];
$_SESSION['renda'] = $car['precoCarro'];

if(isset($_POST['edit_car'])) {

    if(!isset($_GET['idCarro'])) {
        header('Location: car.php');
        exit();
    }

    if( mysqli_num_rows($sql_stmt) > 0) {

        $arquivo = $_FILES['imagem'];

        if ($arquivo['error']) {
            die("Falha ao enviar arquivo");
        }

        if ($arquivo['size'] > 2097152) {
            die("Arquivo muito grande! Max: 2MB");
        }

        $pasta = "../backend/uploads/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
            die("Tipo de arquivo não aceito");
        }

        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

        if($deu_certo) {

            $marca = mysqli_real_escape_string($mysqli, $_POST['marca']);
            $modelo = mysqli_real_escape_string($mysqli, $_POST['modelo']);
            $categoria = mysqli_real_escape_string($mysqli, $_POST['categoria']);
            $lugares = mysqli_real_escape_string($mysqli, $_POST['lugares']);
            $portas = mysqli_real_escape_string($mysqli, $_POST['portas']);
            $bagagem = mysqli_real_escape_string($mysqli, $_POST['bagagem']);
            $renda = mysqli_real_escape_string($mysqli, $_POST['rent']);

            // Inserir os dados no banco de dados
            $update = "UPDATE carros SET marcaCarro='$marca', modeloCarro='$modelo', lugaresCarro='$lugares', portasCarro='$portas', bagagemCarro='$bagagem', categoriaCarro='$categoria', precoCarro='$renda', imagemCarro='$novoNomeDoArquivo.$extensao', imagemCaminho='$path' WHERE idCarro=$idCarro ";

            $add_sql = $mysqli -> query($update);
            
            if ($add_sql) {
                // header("Location: ../indexs/main.html");
                echo "<script>alert('Carro Editado com sucesso!'); window.location.href = 'carsadmin.php';</script>";
                
            } else {
                echo "Erro ao adicionar carro: " . mysqli_error($mysqli);
            }

        }  else {
            echo "<script>alert('Erro ao adicionar Carro!'); window.location.href = 'carsadmin.php';</script>";
        }
    } else {
        echo "<script>alert('Carro não existente!'); window.location.href = 'carsadmin.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../scss/main.css">
    <title>Add car</title>
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
                        <li><a href="bookedcars.php">Booking</a></li>
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
                    <h2>Edit car</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem.</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="text" name="marca" id="" placeholder="Marca" value="<?php echo htmlspecialchars( $_SESSION['marca']) ?>" required>
                        <input type="text" name="modelo" id="" placeholder="Modelo" value="<?php echo htmlspecialchars( $_SESSION['modelo']) ?>" required>
                        <input type="file" name="imagem" id="imagem">

                        <fieldset>
                            <label for="lugares">Lugares</label>
                            <select name="lugares" id="lugares" required>
                                <option value="2">2</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="7+">7+</option>
                            </select>
                            <label for="portas">Portas</label>
                            <select name="portas" id="portas" required>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <label for="bagagem">Bagagem</label>
                            <select name="bagagem" id="bagagem" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="+4">+4</option>
                            </select>
                            <label for="categoria">Categoria</label>
                            <select name="categoria" id="categoria" required>
                                <option value="SUV">SUV</option>
                                <option value="sedan">Sedan</option>
                                <option value="Pik-up">Pick-up</option>
                                <option value="Minivan">Minivan</option>
                            </select>
                        </fieldset>
                        <input type="number" name="rent" id="" placeholder="Daily rent" value="<?php echo htmlspecialchars( $_SESSION['renda']) ?>" required>
                        
                        <input type="submit" value=" Edit car " class="send-message-button" name="edit_car">
                    </form>
                </div>
                <div class="contact-image">
                    <img src="../assets/images/3634312.jpg" alt="">
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