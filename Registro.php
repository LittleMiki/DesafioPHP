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
        // put your code here
        ?>
        <div>
            <form name="registro" method="POST" action="Controlador.php">
                <input type="email" name="correo" value="" placeholder="Introduce tu correo">
                <input type="text" name="nombre" value="" placeholder="Nombre">
                <input type="password" name="pass" value="">
                <input type="file" name="fecha">
                <input type="submit" name="registro" value="Aceptar">
                <input type="submit" name="registro" value="Cancelar"> 
            </form>
        </div>
    </body>
</html>
