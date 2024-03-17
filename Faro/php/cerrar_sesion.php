<?php
    session_start();
    session_destroy();
    header("location: http://localhost/Faro/index.php");
?>