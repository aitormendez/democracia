<?php
/**
 * Plugin Name: dc-CPT
 * Description: CPT para dc
 * Author: Aitor Méndez
 * Author URI: https://e451.net
 * Text Domain: dc-CPT
 * Domain Path: /languages
 */


add_action( 'init', function() {

  load_textdomain('dc-CPT', WPMU_PLUGIN_DIR . '/' .plugin_basename( dirname( __FILE__ ) ) . '/languages/' . get_locale() . '.mo');

  // Noticia cpt (story)
  // --------------------------------------------------------------------------------

  $labels_story = [
    'name'                  => _x( 'Noticias', 'Post Type General Name', 'dc-CPT' ),
  	'singular_name'         => _x( 'Noticia', 'Post Type Singular Name', 'dc-CPT' ),
  	'menu_name'             => __( 'Noticias', 'dc-CPT' ),
  	'name_admin_bar'        => __( 'Noticia', 'dc-CPT' ),
  	'archives'              => __( 'Archivo de noticias', 'dc-CPT' ),
  ];

  $cols_story = [
    'post_author' => [
      'title'      => 'Post author',
      'post_field' => 'post_author',
    ],
  ];

  $filters_story = [

  ];

  $supports_story = [
    'author',
    'title',
    'editor',
    'excerpt',
    'thumbnail',
  ];

  register_extended_post_type( 'story',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_story,
      'admin_cols'   => $cols_story,
      'admin_filters'=> $filters_story,
      'supports'     => $supports_story,
    ],
    [
      'slug' => 'stories'
    ]
  );

  // CV cpt (cv)
  // --------------------------------------------------------------------------------

  $supports_cv = [
    'title',
    'editor',
  ];

  $cols_cv = [
    'exhibition' => [
      'title'    => __('Exposición', 'dc-cpt'),
      'taxonomy' => 'exhibition'
    ],
    'collective' => [
      'title'    => __('Colectivo', 'dc-cpt'),
      'taxonomy' => 'collective'
    ],
    'fecha' => [
			'title'       => __('Fecha', 'dc-cpt'),
			'post_field'  => 'post_date',
      'date_format' => 'd/m/Y'
    ],
  ];

  $filters_cv = [
    'exhibition' => [
      'title'    => __('Exposición', 'dc-cpt'),
      'taxonomy' => 'exhibition'
    ],
    'collective' => [
      'title'    => __('Colectivo', 'dc-cpt'),
      'taxonomy' => 'collective'
    ],
    'fecha' => [
			'title'       => __('Fecha', 'dc-cpt'),
			'post_field'  => 'post_date',
      'date_format' => 'd/m/Y'
    ],
  ];


  register_extended_post_type( 'cv',
    [
      'show_in_rest' => true,
      'show_in_feed' => false,
      // 'labels'       => $labels_story,
      'admin_cols'   => $cols_cv,
      'admin_filters'=> $filters_cv,
      'supports'     => $supports_cv,
      'exclude_from_search' => true,
    ],
    [
      'singular' => 'CV',
      'plural'   => 'CV items',
      'slug'     => 'cv'
    ]
  );

  // Proyectos cpt (project)
  // --------------------------------------------------------------------------------

  $cols_project = [
    'project_format' => [
      'title'    => __('Formato', 'dc-cpt'),
      'taxonomy' => 'project_format'
    ],
    'collective' => [
      'title'    => __('Collective', 'dc-cpt'),
      'taxonomy' => 'collective'
    ],
    'fecha_proyecto' => [
			'title'       => 'Fecha proyecto',
			'meta_key'    => 'fecha_proyecto',
			'date_format' => 'd/m/Y'
		],
  ];

  $filters_project = [
    'project_format' => [
      'title'    => __('Formato', 'dc-cpt'),
      'taxonomy' => 'project_format'
    ],
    'collective' => [
      'title'    => __('Colectivo', 'dc-cpt'),
      'taxonomy' => 'collective'
    ],
  ];

  $supports_project = [
    'title',
    'editor',
    'thumbnail',
    'excerpt',
  ];

  $labels_project = [
    'name'                  => _x( 'Proyectos', 'Post Type General Name', 'dc-CPT' ),
  	'singular_name'         => _x( 'Proyecto', 'Post Type Singular Name', 'dc-CPT' ),
  	'menu_name'             => __( 'Proyectos', 'dc-CPT' ),
  	'name_admin_bar'        => __( 'Proyecto', 'dc-CPT' ),
  	'archives'              => __( 'Archivo de proyectos', 'dc-CPT' ),
  ];

  register_extended_post_type( 'project',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_project,
      'admin_cols'   => $cols_project,
      'admin_filters'=> $filters_project,
      'supports'     => $supports_project,
    ]
  );

  // Enlace externo cpt (external)
  // --------------------------------------------------------------------------------

  $labels_external = [
    'name'                  => _x( 'Enlaces', 'Post Type General Name', 'dc-CPT' ),
  	'singular_name'         => _x( 'Enlace', 'Post Type Singular Name', 'dc-CPT' ),
  	'menu_name'             => __( 'Enlaces', 'dc-CPT' ),
  	'name_admin_bar'        => __( 'Enlace', 'dc-CPT' ),
  	'archives'              => __( 'Archivo de enlaces', 'dc-CPT' ),
  ];

  $supports_external = [
    'title',
    'editor',
    'thumbnail',
  ];

  $cols_external = [
    'external_type' => [
      'title'    => __('Tipo de enlace', 'dc-cpt'),
      'taxonomy' => 'external_type'
    ],
    'external_lang' => [
      'title'    => __('Idioma del enlace', 'dc-cpt'),
      'taxonomy' => 'external_lang'
    ],
  ];

  $filters_external = [
    'external_type' => [
      'title'    => __('Tipo de enlace', 'dc-cpt'),
      'taxonomy' => 'external_type'
    ],
    'external_lang' => [
      'title'    => __('Idioma del enlace', 'dc-cpt'),
      'taxonomy' => 'external_lang'
    ],
  ];

  register_extended_post_type( 'external',
    [
      'show_in_rest' => true,
      'show_in_feed' => true,
      'labels'       => $labels_external,
      'admin_cols'   => $cols_external,
      'admin_filters'=> $filters_external,
      'supports'     => $supports_external,
    ]
  );

  // Project format taxonomy
  // --------------------------------------------------------------------------------

  register_extended_taxonomy( 'project_format',
  [
    'project',
  ],
  [
    'meta_box' => 'simple',
    'hierarchical' => false,
  ],
  [
    'singular' => __( 'Formato', 'dc-cpt' ),
    'plural'   => __( 'Formatos', 'dc-cpt' ),
  ]
);

  // Colectivo taxonomy
  // --------------------------------------------------------------------------------

  register_extended_taxonomy( 'collective',
    [
      'cv',
      'project',
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Colectivo', 'dc-cpt' ),
      'plural'   => __( 'Colectivos', 'dc-cpt' ),
    ]
  );

  // Exhibition taxonomy
  // --------------------------------------------------------------------------------

  register_extended_taxonomy( 'exhibition',
    [
      'cv',
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Exposición', 'dc-cpt' ),
      'plural'   => __( 'Exposiciones', 'dc-cpt' ),
    ]
  );

  // Tipo de enlace taxonomy
  // --------------------------------------------------------------------------------

  register_extended_taxonomy( 'external_type',
    [
      'external',
    ],
    [
      'meta_box' => 'radio',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Tipo de enlace', 'dc-cpt' ),
      'plural'   => __( 'Tipos de enlace', 'dc-cpt' ),
      'slug'     => 'link-type',
    ]
  );


  // Idioma del enlace taxonomy
  // --------------------------------------------------------------------------------

  register_extended_taxonomy( 'external_lang',
    [
      'external',
    ],
    [
      'meta_box' => 'simple',
      'hierarchical' => false,
    ],
    [
      'singular' => __( 'Idioma del enlace', 'dc-cpt' ),
      'plural'   => __( 'Idiomas del enlace', 'dc-cpt' ),
      'slug'     => 'link-lang',
    ]
  );


}, 0 );
