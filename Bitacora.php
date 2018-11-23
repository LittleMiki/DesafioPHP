<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Bitacora
 *
 * @author Miki
 */
class Bitacora {

    public static $nombre_archivo = "log.txt";

    public static function guardarArchivo($mensa) {
        $file = fopen(self::$nombre_archivo, "a");
        fwrite($file, $mensa . PHP_EOL);
        fclose($file);
    }

    public static function LimpiarArchivo() {
        $file = fopen(self::$nombre_archivo, "w");
        fclose($file);
    }

    public static function leerArchivo() {
        $cad='';
        $file = fopen(self::$nombre_archivo, "r");
        while (!feof($file)) {
            $cad = $cad. fgets($file) . "<br />";
        }
        fclose($file);
        return $cad;
    }

}
