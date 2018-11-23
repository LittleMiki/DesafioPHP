<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            require_once 'Conexion.php';
            require_once 'Usuario.php';
            session_start();
            $a = $_SESSION['usuario'];
            echo '<h1>Bienvenido ' . $a->getCorreo() . '</h1> ';
        ?>
    </body>
</html>
