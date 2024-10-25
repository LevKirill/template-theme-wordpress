<?php
  /**
   * Додаємо .html у кінець URL постійних сторінок
   * Щоб код почав працювати вам потрібно скинути правила ЧПУ, для цього
   * зайдіть у налаштування ЧПУ і просто натисніть ЗБЕРЕГТИ.
   */
// якщо у вас у ЧПУ не вказано слеш на кінці, то цей фільтр можна відключити,
// для цього закоментуйте наступний рядок.
  add_filter('user_trailingslashit', 'noPage_slash', 66, 2);
  function noPage_slash($string, $type)
  {
    global $wp_rewrite;
    if ($wp_rewrite->using_permalinks() && $wp_rewrite->use_trailing_slashes == true && $type == 'page') {
      return untrailingslashit($string);
    }
    return $string;
  }

// додаємо '.html' в структуру ЧПУ для page типа
  add_action('init', 'htmlPage_permalink', -1);
  function htmlPage_permalink()
  {
    global $wp_rewrite;
    if (!strpos($wp_rewrite->get_page_permastruct(), '.html')) {
      $wp_rewrite->page_structure = $wp_rewrite->page_structure . '.html';
    }
  }
