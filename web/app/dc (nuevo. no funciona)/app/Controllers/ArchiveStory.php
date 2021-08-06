<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveStory extends Controller
{
    public static function getEnlaceExterno()
    {
        return get_field('external_url');
    }

}
