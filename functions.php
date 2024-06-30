<?php
  /**
   * era functions and definitions
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */

  require_once( get_template_directory() . '/functions/scripts.php' );

  //Добавление меню на сайт
  register_nav_menus(array(
      'top_menu' => 'Menu Header',
      'bottom_menu' => 'Menu Footer',
  ));
