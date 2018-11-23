<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author daw206
 */
class Usuario {

    private $correo;
    private $pass;
    private $nombre;
    private $foto;

    function __construct($correo, $pass, $nombre, $foto) {
        $this->correo = $correo;
        $this->pass = $pass;
        $this->nombre = $nombre;
        $this->foto = $foto;
    }

        function getCorreo() {
        return $this->correo;
    }

    function getPass() {
        return $this->pass;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setPass($pass) {
        $this->pass = $pass;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getFoto() {
        return $this->foto;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }


}

