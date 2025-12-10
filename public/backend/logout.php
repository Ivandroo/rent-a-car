<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    session_destroy();

    // Redirect user to the site homepage after logout
    echo "<script> alert('Logout feito com sucesso!'); window.location.href = '../../index.php';</script>";

    // echo "
    //         <script> window.alert('Logout feito com sucesso!') </script>
    //     ";

    // header('Location: ../../index.php');

?>