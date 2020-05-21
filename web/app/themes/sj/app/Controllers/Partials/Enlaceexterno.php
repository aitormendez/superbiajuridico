<?php

namespace App\Controllers\Partials;

trait Enlaceexterno
{
    public static function getEnlaceExterno()
    {
        return get_field('enlace_externo');
    }
}
