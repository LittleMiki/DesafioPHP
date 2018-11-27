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
        require_once 'Reserva.php';
        session_start();
        $co = new Conexion(Constantes::$IP, Constantes::$USUARIO, Constantes::$PASS, Constantes::$BBDD);
        $info = getdate();
        $aulas = $co->devolverAulas();
        $reservas = $_SESSION['reservas'];
        $fechaMinima = $info['year'] . '-' . $info['mon'] . '-' . $info['mday'];
        $a = $_SESSION['usuario'];
        $co = new Conexion('localhost', 'daw206', 'daw206', 'desafioPHP');
        $u = $co->devolverUsuario($a);
        echo '<h1>Bienvenido ' . $u->getCorreo() . '</h1> ';
        echo "<div> <img src='" . $u->getFoto() . "'></div>";

        echo "<form method='POST' action='Controlador.php'>";

        echo "<input type='date' name='fecha' min='" . $fechaMinima . "' value='" . $fechaMinima . "'>";
        echo "<select name='aula'>";
        for ($i = 0; $i < count($aulas); $i++) {
            echo "<option>" . $aulas[$i] . "</option>";
        }
        echo "</select>";
        echo "<input type='text' hidden='' name= 'correo' value='" . $u->getCorreo() . "'>";
        echo "<input type='submit' name= 'reservas' value='seleccionar'>";
        echo "</form>";


        if ($reservas != null) {
            echo "<div align= 'left'>";
            echo "<h3>Horario</h3>";
            for ($i = 0; $i < 6; $i++) {
                echo "<form method = 'POST' action='Controlador.php'>";
                for($e = 0; $e < count($reservas); $e++){
                    if ($reservas[$e]->getHora() == $i){
                        echo "<input type='text' name='correo' value='".$reservas[$e]->getCorreo()."'>";
                    }else{
                        echo "<input type='text' name='correo' value='Libre'>";
                        echo "<input type='submit' name='reservas' value='reservar'>";
                    }
                }
                
                echo "</form>";
            }
            echo "</div>";
        }
        ?>
    </body>
</html>
