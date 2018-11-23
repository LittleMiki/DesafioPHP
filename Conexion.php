<?php

require_once 'Constantes.php';
require_once 'Usuario.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexion
 *
 * @author daw206
 */
class Conexion {

    private $ip;
    private $usuario;
    private $pass;
    private $bbdd;

    function __construct($ip, $usuario, $pass, $bbdd) {
        $this->ip = $ip;
        $this->usuario = $usuario;
        $this->pass = $pass;
        $this->bbdd = $bbdd;
    }

    function insertar($pass, $correo,$nombre,$foto) {
        // $foto = $this->convertirFoto($img);
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "INSERT INTO ".Constantes::$TABLAusuarios."(`correo`, `pass`, `nombre`, `foto`) VALUES ('" . $correo . "','" . $pass . "','".$nombre."','".$foto."')";
        $conexion->query($sentencia);
        unset($conexion);
    }

    function borrar($correo) {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "DELETE FROM `" . CONSTANTES::$Tobjetos . "` WHERE `id` =" . $correo . "";
        $conexion->query($sentencia);
        unset($conexion);
    }

    function comprobarLogin($correo, $pass) {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $stmt = $conexion->prepare("SELECT * FROM " . Constantes::$TABLAusuarios . " where correo=? and pass=? ");
        $stmt->bind_param("ss", $correo, $pass);
        $stmt->execute();
        $stmt->bind_result($correoBBDD, $passBBDD);
        // $sentencia = "SELECT * FROM `".Constantes::$TABLAusuarios."` where `correo`='" . $correo . "'";
        $valido = false;
        
        if ($stmt->fetch()) {
            $valido = true;
        }
        $stmt->close();
        $conexion->close();
        unset($conexion);
        return $valido;
    }

    function devolverUsuario($correo) {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $u = null;
        $sentencia = "SELECT * FROM `" . Constantes::$TABLAusuarios . "` where `correo`= '" . $correo . "'";
        if ($resultado = $conexion->query($sentencia)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $u = new Usuario($fila[0], $fila[1],$fila[2],$fila[3]);
            }
            mysqli_free_result($resultado);
            $conexion->close();
            unset($conexion);
            return $u;
        }
    }

    function devolverRoles($correo) {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "SELECT `descripcion` FROM `" . Constantes::$TusuarioRol . "`,`" . Constantes::$TRol . "`,`" . Constantes::$TABLAusuarios . "` WHERE " . Constantes::$TusuarioRol . ".IdRol=" . Constantes::$TRol . ".id and " . Constantes::$TusuarioRol . ".CorreoUsusario=" . Constantes::$TABLAusuarios . ".correo and usuario.correo = '" . $correo . "'";
        $roles = [];
        if ($resultado = $conexion->query($sentencia)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $roles[] = $fila[0];
            }
        }

        $conexion->close();
        unset($conexion);
        return $roles;
    }

    function devolverObjetos() {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "SELECT * FROM `" . CONSTANTES::$Tobjetos . "`";
        $objetos = [];
        if ($resultado = $conexion->query($sentencia)) {
            while ($fila = mysqli_fetch_array($resultado)) {
                $objetos[] = new Objeto($fila[0], $fila[1], $fila[2]);
            }
        }

        $conexion->close();
        unset($conexion);
        return $objetos;
    }

    function modificarOBjeto($id, $cantidad) {
        $id = (int) $id;
        $cantidad = (int) $cantidad;
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "UPDATE `" . CONSTANTES::$Tobjetos . "` SET `cantidad` =" . $cantidad . " WHERE `id`=" . $id;
        $conexion->query($sentencia);
        unset($conexion);
    }

    function nuevoUsuario($correo) {
        $conexion = new mysqli($this->ip, $this->usuario, $this->pass, $this->bbdd);
        $sentencia = "INSERT INTO `" . Constantes::$TusuarioRol . "`(`id`, `CorreoUsuario`, `idRol`) VALUES (null,'" . $correo . "',1)";
        $conexion->query($sentencia);
        unset($conexion);
    }

    function convertirFoto($img) {
        $image = imagecreatefromjpeg($img);
        ob_start();
        $jpg = ob_get_contents();
        ob_end_clean();
        $jpg = str_replace('##', '##', mysql_escape_string($jpg));
        return $jpg;
    }

}
