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
            <form enctype="multipart/form-data" method="POST" action="Controlador.php">
                <label>Correo:</label> <input type="email" name="correo" value="" placeholder="Introduce tu correo">
                <label>Nombre:</label><input type="text" name="nombre" value="" placeholder="Nombre">
                <label>Pass:</label><input type="password" name="pass" value="">
                <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                <label>Imagen de Perfil:</label> <input name="imagen" type="file" /><br>
                <input type="submit" name="aceptar" value="Aceptar">
                <input type="submit" name="aceptar" value="Cancelar"> 
            </form>
        </div>
    </body>
</html>
