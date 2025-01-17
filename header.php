<?php
  /**
   * The header for our theme
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */
  $phones = get_field('contacts_phone', 'option');
  $messengers = get_field('messengers', 'option');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>"/>
  <meta name="viewport" content="width=device-width"/>
  <meta name="description" content="<?php bloginfo('description') ?>"/>
  <?php wp_head(); ?>
  <script type="application/ld+json">
    {
      "@context": "https://schema.org/",
      "@type": "Organization",
      "name": "<?php pll_e('Назва організації'); ?>",
      "url": "<?php echo get_site_url() . pll__('slug'); ?>",
      "logo": "<?php echo get_template_directory_uri(); ?>/img/logo.png",
      "telephone": "<?php pll_e('Телефон'); ?>",
      "image": [
        "<?php echo get_site_url() ?>/wp-content/uploads/2024/10/camera-repair-full-4.webp",
        "<?php echo get_site_url() ?>/wp-content/uploads/2024/10/camera-repair-full-27.webp",
        "<?php echo get_site_url() ?>/wp-content/uploads/2024/10/camera-repair-full-32.webp",
        "<?php echo get_site_url() ?>/wp-content/uploads/2024/10/camera-repair-full-34.webp"
      ],
      "address": {
        "@type": "PostalAddress",
        "addressLocality": "<?php pll_e('Київ'); ?>",
        "addressCountry": "<?php pll_e('Україна'); ?>",
        "addressRegion": "<?php pll_e('Київська область'); ?>",
        "postalCode": "<?php pll_e('Індекс'); ?>",
        "streetAddress": "<?php pll_e('Адреса'); ?>"
      },
      "sameAs": [
        "<?php echo $messengers['instagram']; ?>",
        "<?php echo $messengers['facebook']; ?>"
      ]
    }
  </script>
  <!-- Google tag (gtag.js) -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXL9R8GRL0"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'G-XXL9R8GRL0');
  </script>
  <meta name="google-site-verification" content="fj6s0LOPU7XZkfaA4y8Bx-pcdpKfL4JdTSDEHrUMvnU"/>
  <!-- Meta Pixel Code -->
  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod ?
              n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
          'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '554833247193676');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=554833247193676&ev=PageView&noscript=1"
    /></noscript>
  <!-- End Meta Pixel Code -->
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start':
              new Date().getTime(), event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-M98PNN6');</script>
  <!-- End Google Tag Manager -->
</head>
<body itemtype="https://schema.org/WebPage" id="link-top" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript>
  <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M98PNN6"
          height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
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
      <svg class="header__contacts--icon_phone">
        <use xlink:href="<?= get_template_directory_uri(); ?>/img/sprite.svg?ver_1.2#icon-phone"></use>
      </svg>
      <ul class="header__contacts--phone">
        <?php
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
             href="viber://chat?number=%2B<?php echo preg_replace('![^0-9]+!', '', $messengers['viber']); ?>"></a>
        </li>
        <li>
          <a class="icon-telegram" target="_blank"
             href="https://t.me/<?php echo $messengers['telegram']; ?>"></a>
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
<script>
  $('.header__contacts--icon_phone').on('click', function(e){
    e.preventDefault();
    $('.header__contacts--phone').toggleClass('active');
  });
  if ($(window).width() > 1024) {
    $('.mobile_navigation').remove();
  } else {
    $('.header__nav').remove();
  }
</script>
