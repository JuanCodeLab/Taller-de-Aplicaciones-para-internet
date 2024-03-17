<?php

    include 'conexion.php';

    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Correo = $_POST['Correo'];
    $Pass = $_POST['Pass'];

    //Metodo de Encripcion :D
    $Password = hash('sha512', $Password);

    $query = "INSERT INTO usuarios(Nombre, Apellido, Correo, Pass)
                VALUES('$Nombre', '$Apellido', '$Correo', '$Pass')";

    //Verificacion de existencia.
    $verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE Correo='$Correo' ");

        if(mysqli_num_rows($verificar_correo) > 0){
            echo'
            <script>
            alert("Este correo ya esta registrado, intenta con otro diferente");
            window.location = "http://localhost/Faro/subnueva.html";
            </script>';
            exit();
        }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar)
    {
        echo '
        <script>
            alert("Bienvenido a nuestra maravillosa comunidad");
            window.location = "http://localhost/Faro/index.php";
        </script>';
    } 
    else 
    {
        echo '
        <script>
            alert("Intentelo denuevo porfavor, usuario no almacenado");
            window.location = "http://localhost/Faro/index.php";
        </script>';
    }
?>