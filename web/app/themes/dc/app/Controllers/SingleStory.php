<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleStory extends Controller
{
    public function fecha()
    {
        return [
            'dia'  => get_the_date('j'),
            'mes'  => get_the_date('F'),
            'anio' => get_the_date('Y'),
        ];
    }
}





