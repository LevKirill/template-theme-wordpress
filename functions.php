<?php
  /**
   * ProfiService functions and definitions
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */

  require_once( get_template_directory() . '/functions/scripts.php' );

  //Додавання меню на сайт
  register_nav_menus(array(
      'top_menu' => 'Menu Header',
      'top_menu_mob' => 'Menu Header Mobile',
      'bottom_menu_services' => 'Menu Services',
      'bottom_menu_about_us' => 'Menu About Us',
  ));

  //Add Polylang string translation support
  require_once( get_template_directory() . '/functions/polylang-translation.php' );

  //Add HTML after document
  require_once( get_template_directory() . '/functions/add-html-after-document.php' );

  //Увімкнення налаштування сторінки
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Контакти',
        'menu_title'	=> 'Налаштування сайту',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Що ми ремонтуємо',
        'menu_title'	=> 'Що ми ремонтуємо',
        'menu_slug'		=> 'partner_what_we_repair',
        'parent_slug' 	=> 'theme-general-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Наши преимущества',
        'menu_title'	=> 'Наши преимущества',
        'menu_slug'		=> 'our_advantages',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Спливаюче вікно',
        'menu_title'	=> 'Спливаюче вікно',
        'menu_slug'		=> 'popup',
        'parent_slug'	=> 'theme-general-settings',
    ));
  }

//умовний тег перевірки батьківської сторінки start
  function is_subpage() {
    global $post;
    if (is_page() && $post->post_parent) {
      return $post->post_parent;
    } else {
      return false;
    }
  }
  //умовний тег перевірки батьківської сторінки end

