<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('metadatos_proyecto');

$builder
    ->setLocation('post_type', '==', 'project');

$builder
    ->addTab('Metadatos', ['placement' => 'left'])
        ->addWysiwyg('ficha', [
            'label' => __('Ficha técnica', 'sage'),
            'instructions' => '',
            'tabs' => 'all',
            'toolbar' => 'basic',
            'media_upload' => 0,
            'delay' => 0,
        ])
        ->addDatePicker('fecha_proyecto', [
            'label' => 'Fecha',
            'instructions' => 'Fecha de realización del proyecto. Hay que elegir una fecha concreta, aunque en el tema puede que sólo se muestre el año',
            'required' => 1,
            'display_format' => 'd/m/Y',
            'return_format' => 'd/m/Y',
            'first_day' => 1,
        ]);

return $builder;
