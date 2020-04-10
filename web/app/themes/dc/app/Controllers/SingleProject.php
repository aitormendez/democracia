<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleProject extends Controller
{
    public function formatosSingleProject()
    {
        global $post;
        $output = '';
        $terms = get_the_terms($post->ID, 'project_format');

        foreach ($terms as $term) {
            $link = get_term_link( $term->slug, 'project_format' );
            $output .= '<a class="d-block mr-1 mb-1" href="' . $link . '">' . $term->name . '</a>';
        }

        return $output;
    }
}





