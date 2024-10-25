<?php
  /**
   * The header for our theme
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <meta name="description" content="<?php bloginfo('description') ?>"/>
  <?php wp_head(); ?>
</head>
<body id="link-top" <?php body_class(); ?>>
<?php
  //  Перевірка чи ввімкнено модальне вікно
  if (get_field('popup_on', 'option')) {
    //  Таймаут на відкриття модального вікна
    if (!isset($_COOKIE['modal'])) {
      $value = "viewed";
      $modal = setcookie("modal", $value, time() + get_field('popup_show_timeout', 'option'));
    }
  }
?>
<header class="header">
  <div class="wrapper wrapper_contacts">
    <div class="header__logo">
      <?php if (is_front_page()): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo ProfiService">
      <?php else: ?>
        <a href="<?php echo get_home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo ProfiService">
        </a>
      <?php endif; ?>
    </div>
    <a href="#" class="header__nova_post popup_np"><span><? pll_e('Нова пошта'); ?></span><i class="icon-novapost"></i></a>
    <div class="header__contacts">
      <ul class="header__contacts--phone">
        <?php
          $phones = get_field('contacts_phone', 'option');
          $messengers = get_field('messengers', 'option');
          if ($phones):
            ?>
            <li>
              <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $phones['main_phone']); ?>">
                <?php echo $phones['main_phone']; ?>
              </a>
              <?php if ($phones['additional_phones']): ?>
                <ul class="child">
                  <?php foreach ($phones['additional_phones'] as $repeater_item): ?>
                    <li>
                      <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $repeater_item['additional_phone']); ?>">
                        <?php echo $repeater_item['additional_phone']; ?>
                      </a>
                    </li>
                  <?php endforeach; ?>
                </ul>
                <div class="triangle"></div>
              <?php endif; ?>
            </li>
          <?php endif; ?>
      </ul>
      <ul class="header__contacts--messenger">
        <li>
          <a class="icon-viber" target="_blank"
             href="viber://chat?number=%2B<?php echo preg_replace('![^0-9]+!', '', get_field('viber', 'option')); ?>"></a>
        </li>
        <li>
          <a class="icon-telegram" target="_blank"
             href="https://t.me/<?php the_field('telegram', 'option'); ?>"></a>
        </li>
      </ul>
    </div>
    <ul class="header__pll">
      <?php pll_the_languages(array('show_flags' => 0, 'show_names' => 1)); ?>
    </ul>
    <div class="header__hamburger"><i></i><i></i><i></i></div>
  </div>
  <?php
    wp_nav_menu(array('container' => 'nav', 'container_class' => 'wrapper wrapper_nav header__nav',
        'theme_location' => 'top_menu'));
  ?>
  <nav class="mobile_navigation">
    <?php wp_nav_menu(array('container' => false, 'theme_location' => 'top_menu_mob')); ?>
    <ul class="mobile_navigation__phones">
      <li>
        <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $phones['main_phone']); ?>">
          <?php echo $phones['main_phone']; ?>
        </a>
      </li>
      <?php if ($phones['additional_phones']): ?>
        <?php foreach ($phones['additional_phones'] as $repeater_item): ?>
          <li>
            <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $repeater_item['additional_phone']); ?>">
              <?php echo $repeater_item['additional_phone']; ?>
            </a>
          </li>
        <?php endforeach; ?>
      <?php endif; ?>
    </ul>
    <ul class="mobile_navigation__messengers">
      <?php
        if ($messengers['viber']) {
          echo '<li><a class="icon-viber" target="_blank" 
                href="viber://chat?number=%2B' . preg_replace('![^0-9]+!', '', $messengers['viber'])
              . '"></a></li>';
        }
        if ($messengers['telegram']) {
          echo '<li><a class="icon-telegram" target="_blank" 
                href="https://t.me/' . $messengers['telegram'] . '"></a></li>';
        }
        if ($messengers['instagram']) {
          echo '<li><a class="icon-insta" target="_blank" 
                href="' . $messengers['instagram'] . '"></a></li>';
        }
        if ($messengers['facebook']) {
          echo '<li><a class="icon-facebook" target="_blank" 
                href="' . $messengers['facebook'] . '"></a></li>';
        }
      ?>
    </ul>
    <svg xmlns="http://www.w3.org/2000/svg" class="mobile_navigation__close" width="32" height="32" viewBox="0 0 32 32"
         fill="none">
      <path
          d="M17.414 16L24 9.414L22.586 8L16 14.586L9.414 8L8 9.414L14.586 16L8 22.586L9.414 24L16 17.414L22.586 24L24 22.586L17.414 16Z"
          fill="white"/>
    </svg>
  </nav>
</header>
