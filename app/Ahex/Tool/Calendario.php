<?php

namespace App\Ahex\Tool;

class Calendario
{
    public static $meses = [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'septiembre',
       10 => 'octubre',
       11 => 'noviembre',
       12 => 'diciembre',
    ];

    public static $dias = [
        0 => 'domingo',
        1 => 'lunes',
        2 => 'martes',
        3 => 'miercoles',
        4 => 'jueves',
        5 => 'viernes',
        6 => 'sabado',
    ];

    public static function anio($ultimos_digitos = false)
    {
        return $ultimos_digitos ? date('y') : date('Y');
    }

    public static function mes($nombre = false)
    {
        return $nombre ? self::nombreMes( date('m') ) : date('m');
    }

    public static function dia($nombre = false)
    {
        return $nombre ? self::nombreDia( date('d') ) : date('d');
    }

    public static function nombreMes($clave)
    {
        return self::$meses[ $clave ];
    }

    public static function nombreDia($clave)
    {
        return self::$dias[ $clave ];
    }

    public static function codigoDiaMes()
    {
        return self::dia() . self::mes();
    }

    public static function instanciaMes()
    {
        return (object) [
            'clave' => self::mes(),
            'nombre' => self::mes(true),
        ];
    }
}
