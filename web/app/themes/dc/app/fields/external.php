<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('enlace_generico');

$builder
    ->setLocation('post_type', '==', 'external');

$builder
        ->addUrl('external_url', [
            'label' => 'Enlace externo',
            'instructions' => 'Esta URL sólo debe usarse con el tipo de enlace genérico. Si está presente, el título en portada enlazará a la URL. Si está vacío, el título del post enlazará a la página individual del post.',
            'placeholder' => 'https://contraindicaciones.net/',
        ]);

return $builder;
