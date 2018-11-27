<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reserva
 *
 * @author daw206
 */
class Reserva {
    private $hora;
    private $correo;
    private $clase;
    private $fecha;
    
    
    function __construct($hora, $correo, $clase, $fecha) {
        $this->hora = $hora;
        $this->correo = $correo;
        $this->clase = $clase;
        $this->fecha = $fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getClase() {
        return $this->clase;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setClase($clase) {
        $this->clase = $clase;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }


            
}
