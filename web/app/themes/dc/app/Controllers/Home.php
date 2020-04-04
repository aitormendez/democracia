<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Home extends Controller
{
    public function heroTipo()
    {
        return get_field('tipo_de_contenido', 'option');
    }
}
