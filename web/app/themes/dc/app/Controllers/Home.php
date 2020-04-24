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
        $img_portada = get_field('hero_img_vert', 'option');
        $img_portada_srcset = wp_get_attachment_image_srcset($img_portada['ID']);
        $enlace = get_field('hero_link', 'option');

        return '<a href="' . $enlace['url'] . '"><img
            class="img"
            src=" ' . $img_portada['url'] . ' "
            alt=" ' . $img_portada['title'] . ' "
            srcset=" ' . $img_portada_srcset . ' "
            sizes="100vw"
        ></a>';
    }

    public function imgHorizPortada()
    {
        $img_portada = get_field('hero_img_horiz', 'option');
        $img_portada_srcset = wp_get_attachment_image_srcset($img_portada['ID']);
        $enlace = get_field('hero_link', 'option');

        return '<a href="' . $enlace['url'] . '"><img
            class="img"
            src=" ' . $img_portada['url'] . ' "
            alt=" ' . $img_portada['title'] . ' "
            srcset=" ' . $img_portada_srcset . ' "
            sizes="100vw"
        ></a>';
    }
}
