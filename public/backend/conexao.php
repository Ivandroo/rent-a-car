<?php

    $user = 'root';
    $pass = '';
    $db = 'rent_a_car';
    $host = 'Localhost';

    $mysqli = new mysqli($host, $user, $pass, $db);

    if($mysqli->error){
        die("falha na conexão " . $mysqli->error);
    }

?>