<?php
require_once 'Conexion.php';
require_once 'Bitacora.php';
session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//------------ Login  Y  Registro -------------//
$co= new Conexion('localhost','daw206','daw206','desafioPHP');
$info = getdate();
$mensa = $info['hours'].' : '.$info['minutes'].' : '.$info['seconds'].'  '.$info['mday'].'/'.$info['mon'].'/'.$info['year'].' ';


//--------------- LOGIN ----------------------//
if (isset($_REQUEST['aceptar'])) {
    if ($_REQUEST['aceptar'] == 'Aceptar') {

        if ($co->comprobarLogin($_REQUEST['correo'], $_REQUEST['pass'])) {
            $u = null;
            $u = $co->devolverUsuario($_REQUEST['correo']);
            $_SESSION['usuario'] = $u;

            $mensa = $mensa.$u->getCorreo() . ' Se ha logeado';
            Bitacora::guardarArchivo($mensa);

            header("Location: ElegirRol.php");
        }else{
            header("Location: index.php");
        }
    }
    if ($_REQUEST['aceptar'] == 'Nuevo Usuario') {
        header("Location: Registro.php");
    }

    //------- Registro ----------// 
    if ($_REQUEST['aceptar'] == 'Aceptar') {
        $co->insertar($_REQUEST['pass'], $_REQUEST['correo'],$_REQUEST['nombre'],$_REQUEST[]);
        $co->nuevoUsuario($_REQUEST['correo']);
        $mensa =$mensa. $u->getCorreo() . 'Se ha registrado en la BBDD';
        Bitacora::guardarArchivo($mensa);
        header("Location: index.php");
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

//-----------------Modificar Objetos------------------//.
if (isset($_REQUEST['enviarObjeto'])) {
    if ($_REQUEST['enviarObjeto'] == 'Borrar') {
        // $co = new Conexion('localhost', 'root', '', 'DesafioPHP');
        $mensa = $mensa.'Se ha borrado un objeto con id : ' . $_REQUEST['id'];
        $co->borrar($_REQUEST['id']);

        Bitacora::guardarArchivo($mensa);
        header("Location: validado.php");
    }
    if ($_REQUEST['enviarObjeto'] == 'Modificar') {

        $_SESSION['objeto'] = new Objeto($_REQUEST['id'], $_REQUEST['objt'], $_REQUEST['cantidad']);
        header("Location: modificar.php");
    }
    if ($_REQUEST['enviarObjeto'] == 'Cancelar') {
        if (isset($_SESSION['objeto'])) {
            unset($_SESSION['objeto']);
        }
        header("Location: validado.php");
    }
    if ($_REQUEST['enviarObjeto'] == 'Aceptar') {
        //  $co = new Conexion('localhost', 'root', '', 'DesafioPHP');
        $o = $_SESSION['objeto'];
        $c = $_REQUEST['cantidad'];
        $co->modificarOBjeto($o->getId(), $c);

        $mensa =$mensa. 'Objeto :' . $o->getNombre() . ' se ha modificado';
        Bitacora::guardarArchivo($mensa);

        unset($_SESSION['objeto']);
        header("Location: validado.php");
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
if(isset($_REQUEST['cerrar'])){
    session_destroy();
    $mensa = $mensa.' '.$_SESSION['usuario']->getCorreo().' Ha cerrado cerrado sesion.';
    Bitacora::guardarArchivo($mensa);
    header("Location: index.php");
}