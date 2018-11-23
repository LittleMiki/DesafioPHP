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

    function __construct($correo, $pass) {
        $this->correo = $correo;
        $this->pass = $pass;
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

}

