<?php

require_once 'Conexion.php';
require_once 'Bitacora.php';
require_once 'Reserva.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//------------ Login  Y  Registro -------------//
$co = new Conexion(Constantes::$IP, Constantes::$USUARIO, Constantes::$PASS, Constantes::$BBDD);
$info = getdate();
$mensa = $info['hours'] . ' : ' . $info['minutes'] . ' : ' . $info['seconds'] . '  ' . $info['mday'] . '/' . $info['mon'] . '/' . $info['year'] . ' ';


//--------------- LOGIN ----------------------//
if (isset($_REQUEST['aceptar'])) {
    if ($_REQUEST['aceptar'] == 'Aceptar') {

        if ($co->comprobarLogin($_REQUEST['correo'], $_REQUEST['pass'])) {
            
            $_SESSION['usuario'] = $_REQUEST['correo'];

            $mensa = $mensa . $_REQUEST['correo'] . ' Se ha logeado';
            Bitacora::guardarArchivo($mensa);

            header("Location: ElegirRol.php");
        } else {
            header("Location: index.php");
        }
    }
    if ($_REQUEST['aceptar'] == 'Nuevo Usuario') {
        header("Location: Registro.php");
    }

    //------- Registro ----------// 
    if ($_REQUEST['aceptar'] == 'Aceptar') {
        $dir_subida = './Imagenes/';
        $fichero_subido = $dir_subida . $_REQUEST['correo'] . '.jpg';

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido)) {
            $co->insertar($_REQUEST['pass'], $_REQUEST['correo'], $_REQUEST['nombre'], $fichero_subido);
            $co->nuevoUsuario($_REQUEST['correo']);
            $mensa = $mensa . $_REQUEST['correo'] . 'Se ha registrado en la BBDD';
            Bitacora::guardarArchivo($mensa);
            header("Location: index.php");
        }
    }
    if ($_REQUEST['aceptar'] == 'Cancelar') {
        header("Location: index.php");
    }
}

//------------------Seleccion de Rol------------------//
if (isset($_REQUEST['enviarRol'])) {
    if ($_REQUEST['enviarRol'] == 'aceptar') {
        $_SESSION['rol'] = $_REQUEST['rol'];
        header("Location: Logueado.php");
    }
}



//---------------- Manejar Bitacora -----------------//
if (isset($_REQUEST['bitacora'])) {
    if ($_REQUEST['bitacora'] == 'borrar Log') {
        Bitacora::LimpiarArchivo();
        header("Location: validado.php");
    }
    if ($_REQUEST['bitacora'] == 'mostrar Log') {
        header("Location: mostrarBitacora.php");
    }
}
//-------------------cerrar sesion ---------------------//
if (isset($_REQUEST['cerrar'])) {
    session_destroy();
    $mensa = $mensa . ' ' . $_SESSION['usuario']->getCorreo() . ' Ha cerrado cerrado sesion.';
    Bitacora::guardarArchivo($mensa);
    header("Location: index.php");
}

if(isset($_REQUEST['reservas'])){
    if($_REQUEST['reservas'] == 'seleccionar'){
       $reservas= $co->devolverReservas($_REQUEST['fecha'],$_REQUEST['aula']);
       $_SESSION['reservas'] = $reservas;
       header("Location: Logueado.php");
    }
    
}