<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('block_vimeo');

$builder
    ->setLocation('block', '==', 'acf/vimeo');

$builder
    ->addText('vimeo_id', [
        'label' => 'Vimeo ID',
        'instructions' => 'Especifica el ID del vídeo en Vimeo. Por ej. 152570988',
        'placeholder' => '152570988',
    ]);

return $builder;
