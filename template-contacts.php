<?php
  /**
   * Template Name: Контакти
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
  $phones = get_field('contacts_phone', 'option');
  $messengers = get_field('messengers', 'option');
  $howFind = get_field('how_find', 'option');
  $novaPost = get_field('nova_post', 'option');
?>
  <main class="site_main page_contacts">
    <section class="category_page__back_header page_contacts__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_contacts__container">
      <div class="wrapper">
        <div class="content">
          <div class="block block_1">
            <h2 class="content__title"><?php pll_e('Як нас знайти?');?></h2>
            <h3 class="content__subtitle"><?php pll_e('Ремонт фотоапаратів');?></h3>
            <?php
              if ($howFind) {
                echo '<ul class="list_address">';
                foreach ($howFind['Steps'] as $step) {
                  echo '<li>' . $step[pll__('step_uk')] . '</li>';
                }
                echo '</ul>';
                echo '<a href="' . $howFind['link_google_maps'] . '" class="link_google_map" target="_blank" rel="nofollow">
                        <svg>
                          <use xlink:href="' . get_template_directory_uri() . '/img/sprite.svg#google-maps"></use>
                        </svg>
                        <span>Google Maps</span>
                      </a>';
                echo '<p class="desc">' . pll__("Ремонт фотоапаратів, об'єктивів, спалахів, відеокамер, студійного світла Київ (Україна)") .
                    '</p>';
              }
            ?>
          </div>
          <div class="block block_2">
            <h2 class="content__title"><?php pll_e("Зв'яжіться з нами");?></h2>
            <h3 class="content__subtitle"><?php pll_e('Номери телефонів');?></h3>
            <?php if($phones): ?>
              <ul class="list_phones">
                <li>
                  <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $phones['main_phone']); ?>">
                    +38&nbsp;<?php echo $phones['main_phone'];?>
                  </a>
                </li>
                <?php if ($phones['additional_phones']): ?>
                  <?php foreach($phones['additional_phones'] as $repeater_item): ?>
                    <li>
                      <a href="tel:+38<?php echo preg_replace('![^0-9]+!', '', $repeater_item['additional_phone']); ?>">
                        +38&nbsp;<?php echo $repeater_item['additional_phone'];?>
                      </a>
                    </li>
                  <?php endforeach;?>
                <?php endif;?>
              </ul>
            <?php endif;?>
            <?php if($messengers): ?>
              <div class="list_messengers">
                <div class="list_messengers__icons">
                  <a href="viber://chat?number=<?php echo $messengers['viber'] ?>" class="icon-viber" target="_blank"></a>
                  <a href="https://t.me/<?php echo $messengers['telegram'] ?>" class="icon-telegram" target="_blank"></a>
                </div>
                <p>&dash;&nbsp;<?php pll_e("ви можете також зв'язатися з нами в меседжерах"); ?></p>
              </div>
            <?php endif;?>
          </div>
          <div class="block block_3">
            <h2 class="content__title"><?php pll_e('Як ми працюємо?');?></h2>
            <h3 class="content__subtitle"><?php pll_e('Графік роботи');?></h3>
            <p>
              <span><?php pll_e('Пн-Пт: з 11:00 до 18:00');?></span>
              <?php pll_e("Ви можете зв'язатися з нами зручним для вас способом");?>
            </p>
          </div>
          <div class="block block_4">
            <h2 class="content__title"><?php pll_e('Нова пошта');?></h2>
            <h3 class="content__subtitle"><?php pll_e('Дані для відправки техніки в ремонт');?></h3>
            <p>
              <span><?php pll_e('Нова пошта');?></span>
              <?php if($novaPost){
                echo $novaPost[pll__('departments_uk')];
              }?>
            </p>
            <?php if($novaPost){
              echo '<a href="#" class="link_nova_post icon-novapost" target="_blank"><span>' . pll__('Нова пошта') . '</span></a>';
            }?>
          </div>
          <script>
            $('.link_nova_post').on('click', function (event) {
              event.preventDefault();
              $('.popup_back_nova_post').addClass('active');
            });
          </script>
        </div>
        <div class="map">
          <div class="map__container">
            <?php
              if ($howFind) {
                echo $howFind['iframe_google_maps'];
              }
            ?>
          </div>
        </div>
      </div>
    </section>
	  <?php if (get_field('seo-text')): ?>
        <div class="seo_text">
          <div class="wrapper"><?php the_field('seo-text');?></div>
        </div>
      <?php endif; ?>
  </main>
<?php
  get_footer();
