<?php
  /**
   * The template for displaying the footer
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */
  $phones = get_field('contacts_phone', 'option');
  $messengers = get_field('messengers', 'option');
?>
<footer class="footer">
  <div class="wrapper">
    <div class="footer__logo">
      <?php if (is_front_page()): ?>
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="Logo ProfiService">
      <?php else: ?>
        <a href="<?php echo get_home_url(); ?>">
          <img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="Logo ProfiService">
        </a>
      <?php endif; ?>
    </div>
    <div class="footer__services">
      <h2><?php pll_e('Послуги'); ?></h2>
      <?php wp_nav_menu(array('container' => 'nav', 'container_class' => 'footer__services--nav',
          'theme_location' => 'bottom_menu_services')); ?>
    </div>
    <div class="footer__about_us">
      <h2><?php pll_e('Про нас'); ?></h2>
      <?php wp_nav_menu(array('container' => 'nav', 'container_class' => 'footer__about_us--nav',
          'theme_location' => 'bottom_menu_about_us')); ?>
    </div>
    <div class="footer__contacts">
      <h2><?php pll_e('Контакти'); ?></h2>
      <div class="container">
        <ul class="footer__contacts--phones">
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
        <p class="footer__contacts--address"><?php pll_e('Київ, пров. Ярославський 4 (метро Контактна площа)'); ?></p>
        <p class="footer__contacts--working_time"><?php pll_e('Режим роботи'); ?>:<br>
          <?php pll_e('Пн-Пт: з 11:00 до 18:00.'); ?></p>
        <ul class="footer__contacts--messengers">
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
      </div>
    </div>
    <div class="footer__nova_post">
      <a href="<?php echo get_page_link(pll__('ID сторінки "Нова пошта"')); ?>"
         class="header__nova_post"><span><? pll_e('Нова пошта'); ?></span><i class="icon-novapost"></i></a>
    </div>
    <div class="footer__copyright">
      <p>Copyright ©&nbsp;<?php echo date('Y'); ?> <br>ProfiService</p>
    </div>
  </div>
</footer>
<div class="popup_back popup_back_nova_post">
  <?php
    $groupNovaPostLang = pll__('dispatch_nova_post_uk');
    $groupNovaPost = get_field($groupNovaPostLang, 'option');
  ?>
  <div class="popup_block">
    <h2 class="popup_block__title"><?php pll_e('Для відправки Новою поштою'); ?></h2>
    <ul class="popup_block__list">
      <li><span><?php pll_e("Ім'я одержувача"); ?>:</span>
        <ul class="popup_block__list--child">
          <li><?php echo $groupNovaPost['name_recipient']; ?></li>
        </ul>
      </li>
      <li><span><?php pll_e('Адреса відділення Нової пошти'); ?>:</span>
        <ul class="popup_block__list--child">
          <li><?php echo $groupNovaPost['address_branch_nova_post']; ?></li>
        </ul>
      </li>
      <li><span><?php pll_e('Контактний номер'); ?>:</span>
        <ul class="popup_block__list--child">
          <li><?php echo $groupNovaPost['contact_number']; ?></li>
        </ul>
      </li>
    </ul>
    <p class="popup_block__note">*<?php pll_e('Перед відпракою техніки, зателефонуйте нам!'); ?></p>
    <div class="popup_block__go_back"><a href="#" class="close_popup"><?php pll_e('Назад'); ?></a></div>
    <a href="#" class="popup_block__close close_popup">
      <svg class="icon">
        <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#popup-close"></use>
      </svg>
    </a>
  </div>
  <a href="#" class="popup_back__close close_popup"></a>
</div>
<?php if (get_field('popup_on', 'option')): ?>
  <?php if (!isset($_COOKIE['modal'])): ?>
    <div class="popup_back popup_info">
      <?php
        $groupPopupLang = pll__('popup_uk');
        $groupPopupInfo = get_field($groupPopupLang, 'option');
      ?>
      <div class="popup_block">
        <h2 class="popup_block__title"><?php echo $groupPopupInfo['title']; ?></h2>
        <div class="popup_block__desc"><?php echo $groupPopupInfo['desc']; ?></div>
        <a href="#" class="popup_block__close close_popup">
          <svg class="icon">
            <use xlink:href="<?php echo get_template_directory_uri(); ?>/img/sprite.svg#popup-close"></use>
          </svg>
        </a>
      </div>
      <a href="#" class="popup_back__close close_popup"></a>
    </div>
    <script>
      $(document).ready(function(){
        setTimeout(function(){
          $(".popup_info").addClass('active');
        }, <?php the_field('popup_appearance_timeout', 'option');?>000);

        $('.popup_info .close_popup').on('click', function (event) {
          event.preventDefault();
          $('.popup_info').removeClass('active');
        });
      });
    </script>
  <?php endif; ?>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>
