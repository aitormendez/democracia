<?php

namespace App;

use StoutLogic\AcfBuilder\FieldsBuilder;

acf_add_options_page([
    'page_title' => get_bloginfo('name') . ' theme options',
    'menu_title' => __('Options', 'sage'),
    'menu_slug'  => 'theme-options',
    'capability' => 'edit_theme_options',
    'position'   => '999',
    'autoload'   => true
]);

$options = new FieldsBuilder('theme_options');

$options
    ->setLocation('options_page', '==', 'theme-options');

$options
->addTab('hero', ['placement' => 'left'])
    ->addRadio('tipo_de_contenido', [
        'label' => 'Tipo de contenido para la sección Hero',
        'instructions' => 'Indica el tipo de contenido de la sección Hero en portada',
        'choices' => [
            'imagen' => __('Image', 'sage'),
            'video' => __('Video', 'sage'),
        ],
        'default_value' => 'video',
        'layout' => 'vertical',
        'return_format' => 'value',
    ])
    ->addImage('hero_img_vert', [
        'label' => 'Imagen vertical',
        'instructions' => 'Se utilizará en dispositivos de orientación vertical',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
    ])
        ->conditional('tipo_de_contenido', '==', 'imagen')
    ->addImage('hero_img_horiz', [
        'label' => 'Imagen horizontal',
        'instructions' => 'Se utilizará en dispositivos de orientación horizontal',
        'return_format' => 'array',
        'preview_size' => 'medium',
        'library' => 'all',
    ])
        ->conditional('tipo_de_contenido', '==', 'imagen')
    ->addText('hero_video', [
        'label' => 'Hero video (Vimeo)',
        'instructions' => 'Introduce el identificador del vídeo en Vimeo (algo así: 152570988)',
    ])
        ->conditional('tipo_de_contenido', '==', 'video')
    ->addLink('hero_link', [
        'label' => 'Enlace de portada',
        'instructions' => 'Las imágenes de la sección hero en portada serán enlaces hacia una página. Elige aquí la página que enlazan',
        'return_format' => 'array',
    ])
        ->conditional('tipo_de_contenido', '==', 'imagen')
  ;

return $options;
