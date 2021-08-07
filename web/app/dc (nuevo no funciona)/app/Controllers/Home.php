<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Home extends Controller
{
    public function heroTipo()
    {
        return get_field('tipo_de_contenido', 'option');
    }

    public function imgVertPortada()
    {
        return get_field('hero_img_vert', 'option')['id'];
    }

    public function imgHorizPortada()
    {
        return get_field('hero_img_horiz', 'option')['id'];
    }

    public function href()
    {
        return get_field('hero_link', 'option')['url'];
    }
}
