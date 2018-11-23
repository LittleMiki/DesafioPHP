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

        <div align="center"> 
            <form name ='formulario' method='POST' action='Controlador.php'>
                Correo :  <input type ='text' name='correo' value='' placeholder='introducir correo'></br>
                Pass :  <input type ='password' name='pass' value='' placeholder='introducir pass'></br>
                <input type ='submit' name='aceptar' value='Aceptar'>
                <input type ='submit' name='aceptar' value='Recuperar Contraseña'>
                <input type ='submit' name='aceptar' value='Nuevo Usuario'>
                <input type ='submit' name='aceptar' value='cancelar'>
            </form>
        </div>
    </body>
</html>
