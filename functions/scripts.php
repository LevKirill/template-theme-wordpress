<?php
  // Видалення старої версії jQuery і завантаження сумісної версії
  function my_update_jquery()
  {
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.7.1.min.js', true, '');
      wp_enqueue_script('jquery');
    }
    wp_enqueue_style('era-style', get_stylesheet_uri(), array(), '1_01');
    wp_style_add_data('era-style', 'rtl', 'replace');
    if (is_front_page()) {
      wp_enqueue_style('era-homeCss', get_template_directory_uri() . '/css/home.css?ver_1.01', array(), '');
    } else {
      wp_enqueue_style('era-homeCss', get_template_directory_uri() . '/css/pages.css?ver_1.01', array(), '');
    }
    wp_enqueue_script('era-wow', get_template_directory_uri() . '/js/wow.min.js', array(), '', false);
    wp_enqueue_script('era-fancybox', get_template_directory_uri() . '/js/fancybox.umd.js', array(), '', false);
    wp_enqueue_script('era-mainJs', get_template_directory_uri() . '/js/main.min.js?ver_1.01', array(), '', true);
  }

  add_action('wp_enqueue_scripts', 'my_update_jquery');
  //Добавление миниатюр к записи
  if (!function_exists('mytheme_setup')):
    function mytheme_setup()
    {
      add_theme_support('post-thumbnails');
      set_post_thumbnail_size(1200, 9999);
    }
  endif;
  add_action('after_setup_theme', 'mytheme_setup');
