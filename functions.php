<?php

function bakery_setup()
{
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'bakery_setup');

function bakery_enqueue_scripts()
{
  wp_enqueue_style(
    'ress',
    'https://unpkg.com/ress/dist/ress.min.css'
  );

  // CSS
  wp_enqueue_style(
    'bakery-style',
    get_template_directory_uri() . '/css/style.css',
    array('ress'),
    null
  );
  // JavaScript
  wp_enqueue_script(
    'bakery-script',
    get_template_directory_uri() . '/js/main.js',
    array('jquery'),
    null,
    true
  );
}

add_action('wp_enqueue_scripts', 'bakery_enqueue_scripts');

function bakery_register_post_type()
{
  register_post_type(
    'product',
    array(
      'label'         => 'Products',
      'public'        => true,
      'has_archive'   => 'products',
      'rewrite'       => array(
        'slug' => 'products'
      ),
      'menu_position' => 5,
      'supports'      => array(
        'title',
        'editor',
        'thumbnail'
      ),
    )
  );
}

add_action('init', 'bakery_register_post_type');

function bakery_register_taxonomy()
{

  register_taxonomy(
    'product_category',
    'product',
    array(
      'label' => 'Product Categories',
      'hierarchical' => true,
      'public' => true,
      'show_admin_column' => true,
      'rewrite' => array(
        'slug' => 'product-category'
      ),
    )
  );
}
add_action('init', 'bakery_register_taxonomy');
