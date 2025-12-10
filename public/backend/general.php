<?php

    include('../backend/conexao.php');
    include('../backend/protect.php');

    //add car
    if (isset($_POST['add_car'])) {

        echo "
        <script> window.alert('botão adicionar carro clicado'); </script>
        ";

        //codigo roubado, para ser testado e modificado
        if (!isset($_SESSION)) {
        
            echo "<script>alert('Por favor, faça login para adicionar eventos.'); window.location.href = '../../login.php';</script>";
            // header("Location: ../indexs/login.html");

        } else {
            $arquivo = $_FILES['imagem'];
            
            if ($arquivo['error']) {
                die("Falha ao enviar arquivo");
            }

            if ($arquivo['size'] > 2097152) {
                die("Arquivo muito grande! Max: 2MB");
            }

            $pasta = "uploads/";
            $nomeDoArquivo = $arquivo['name'];
            $novoNomeDoArquivo = uniqid();
            $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

            if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
                die("Tipo de arquivo não aceito");
            }

            $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
            $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

            if($deu_certo) {
                // Receber os dados do formulário
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $lugares = $_POST['lugares'];
                $bagagem = $_POST['bagagem'];
                $portas = $_POST['portas'];
                $categoria = $_POST['categoria'];
                $renda = $_POST['rent'];

                // Inserir os dados no banco de dados
                $sql = "INSERT INTO carros (marcaCarro, modeloCarro, lugaresCarro, portasCarro, bagagemCarro, categoriaCarro, precoCarro, imagemCarro, imagemCaminho) VALUES ('$marca', '$modelo', '$lugares', '$portas', '$bagagem', '$categoria', '$renda', '$novoNomeDoArquivo.$extensao', '$path')";

                $add_sql = $mysqli -> query($sql);
                
                if ($add_sql) {
                    // header("Location: ../indexs/main.html");
                    echo "<script>alert('Carro adicionado com sucesso!'); window.location.href = '../admin/carsadmin.php';</script>";
                    
                } else {
                    echo "Erro ao adicionar carro: " . mysqli_error($mysqli);
                }
            } else {
                echo "Erro ao fazer upload da imagem.";
            }
        }
    }

    if (isset($_POST['confirm'])) {

        $id = intval($_POST['id']);

        $int_sql = "UPDATE reservas SET status = 'alugado' WHERE id = $id";
        $stmt_int_sql = $mysqli -> query($int_sql);

        if ($stmt_int_sql) {
            # code...
            echo "<script> window.alert ('Status mudado com sucesso!!') </script>";
            echo "<script> window.location.href='../admin/bookedcars.php' </script>";
        }

        
    }

    if (isset($_POST['complete'])) {
        $id = intval($_POST['id']);
    }

?>