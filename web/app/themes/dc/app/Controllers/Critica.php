<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class Critica extends Controller
{
    public function terms()
    {
        return get_terms('external_lang');
    }
}
