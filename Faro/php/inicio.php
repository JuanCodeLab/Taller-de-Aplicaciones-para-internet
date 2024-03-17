<?php

    session_start();

    include 'conexion.php';

    $Correo = $_POST['Correo'];
    $Pass = $_POST['Pass'];

    $validacion = mysqli_query($conexion, "SELECT * FROM usuarios 
    WHERE Correo='$Correo' and Pass='$Pass'");

    //Comentario de validacion
    if(mysqli_num_rows($validacion) > 0){
        $_SESSION['Usuario'] = $Correo;
        echo'
            <script>
            alert("Bienvenido");
            window.location = "http://localhost/Faro/index.php";
            </script>';
        exit();
    }else{
        echo'
            <script>
            alert("Este correo no está registrado o a escrito mal los parametros, intenta denuevo");
            window.location = "http://localhost/Faro/inicio.php";
            </script>';
        exit();
    }
?>