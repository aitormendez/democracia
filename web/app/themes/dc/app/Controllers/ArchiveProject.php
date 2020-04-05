<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveProject extends Controller
{
    public static function anio()
    {
        $date_string = get_field('fecha', false, false);
        $date = new \DateTime($date_string);
        $anio = $date->format('Y');
        return $anio;
    }

    public static function formatos()
    {
        global $post;
        $output = '';
        $terms = get_the_terms($post->ID, 'project_format');

        foreach ($terms as $term) {
            $link = get_term_link( $term->slug, 'project_format' );
            $output .= '<a href=\"' . $link . '\">' . $term->name . '</a>';
        }

        return $output;
    }
}

