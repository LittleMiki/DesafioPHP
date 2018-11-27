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
            $co = new Conexion(Constantes::$IP, Constantes::$USUARIO, Constantes::$PASS, Constantes::$BBDD);
            $info = getdate();
            $aulas= $co->devolverAulas();
            $fechaMinima = $info['year'].'-'.$info['mon'].'-'.$info['mday'];
            $a = $_SESSION['usuario'];
            $co = new Conexion('localhost', 'daw206', 'daw206', 'desafioPHP');
            $u = $co->devolverUsuario($a);
            echo '<h1>Bienvenido ' . $u->getCorreo() . '</h1> ';
            echo "<div> <img src='".$u->getFoto()."'></div>";
            echo "<input type='date' name='calendario' min='".$fechaMinima."' value='".$fechaMinima."'>";
            echo "<select>";
            for($i=0;$i<count($aulas);$i++){
                echo "<option>".$aulas[$i]."</option>";
            }
            echo "</select>";
        ?>
    </body>
</html>
