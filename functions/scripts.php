<?php
  // Удаление старой версии jQuery и загрузка совместимой версии
  function my_update_jquery()
  {
    if (!is_admin()) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', true, '', false);
      wp_enqueue_script('jquery');
    }
    wp_enqueue_style('era-style', get_stylesheet_uri(), array(), '1_01');
    wp_style_add_data('era-style', 'rtl', 'replace');

    if (is_front_page()) {
      wp_enqueue_style('era-homeCss', get_template_directory_uri() . '/css/home.css', array(), '');
    } else {
      wp_enqueue_style('era-homeCss', get_template_directory_uri() . '/css/pages.css', array(), '');
    }

//    if (is_front_page() || is_page(39)) {
//      wp_enqueue_script('era-slick', get_template_directory_uri() . '/js/slick.min.js', array(), '', true);
//    }

    wp_enqueue_script('era-mainJs', get_template_directory_uri() . '/js/main.js', array(), '1_02', true);
  }

  add_action('wp_enqueue_scripts', 'my_update_jquery');
