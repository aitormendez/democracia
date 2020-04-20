<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

$builder = new FieldsBuilder('block_video_plyr');

$builder
    ->setLocation('block', '==', 'acf/vimeo');

$builder
    ->addRadio('video_provider', [
        'label' => __('Video provider', 'sage'),
        'required' => 1,
        'choices' => [
            'vimeo' => 'vimeo',
            'youtube' => 'youtube',
        ],
        'other_choice' => 0,
        'save_other_choice' => 0,
        'layout' => 'vertical',
        'return_format' => 'value',
    ])
    ->addText('vimeo_id', [
        'label' => 'Vimeo ID',
        'instructions' => 'Especifica el ID del vídeo en Vimeo o YouTube. Por ej. 152570988 o QUTKA47y6ig',
        'placeholder' => '152570988',
    ]);

return $builder;
