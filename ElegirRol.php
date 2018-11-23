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
        require_once 'Usuario.php';
        require_once 'Conexion.php';
        session_start();
        $co = new Conexion(Constantes::$IP, Constantes::$USUARIO, Constantes::$PASS, Constantes::$BBDD);
        $u = $_SESSION['usuario'];
        $roles=$co->devolverRoles($u);
        echo " <form name='formulario' method='POST' action='Controlador.php'>  <select name='rol'>";
        for ($i=0; $i< count($roles);$i++){
            echo '<option>'.$roles[$i].'</option>';
        }
        
        echo "</select> <input type='submit' name='enviarRol' value='aceptar'> </form>";
        ?>
    </body>
</html>
