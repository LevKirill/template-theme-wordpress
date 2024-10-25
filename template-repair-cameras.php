<?php
  /**
   * Template Name: Ремонт фотоапаратів
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
  $messengers = get_field('messengers', 'option');
?>
  <main class="site_main page_types_services page_repair_cameras">
    <section
        class="category_page__back_header single_page__back_header page_repair_cameras__back_header<?php echo (get_field('title_image')) ?
            ' before" style="background-image: url(' . get_field('title_image') . ')' : ''; ?>">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
        <p class="diagnostics_free wow animate__fadeInLeft" style="animation-delay: 300ms">
          <span><?php pll_e('Діагностика'); ?></span>
          <strong><?php pll_e('безкоштовно!'); ?></strong>
        </p>
      </div>
    </section>
    <section class="page_repair_cameras__content">
      <?php if (get_field('proficervis')):
        $articleProfiservise = get_field('proficervis');
        ?>
        <article class="article_profiservice">
          <div class="wrapper">
            <div class="article_profiservice__block article_profiservice__block_desc">
              <h2><?php the_field('profiservice_title');?></h2>
              <div class="desc"><?php echo $articleProfiservise; ?></div>
            </div>
            <div class="article_profiservice__block article_profiservice__block_advantages">
              <div class="block icon-star-broken-1">
                <p><?php echo pll__('Наш досвід бездоганної роботи') . '&nbsp;&dash; <strong>'
                      . pll__('вже більше 9-ти років') . '</strong>'; ?></p>
              </div>
              <div class="block icon-star-broken-2">
                <p><?php echo pll__('Наша головна мета') . '&nbsp;&dash; <strong>' . pll__('завжди задоволений клієнт')
                      . '</strong>'; ?></p>
              </div>
            </div>
          </div>
        </article>
      <?php endif; ?>
      <article class="article_our_services">
        <div class="wrapper">
          <h2 class="article_our_services__title"><?php pll_e('З чим допоможемо'); ?></h2>
          <div class="block_title">
            <h3><?php the_field('title_our_services'); ?></h3>
            <div class="block_title__link">
              <a href="https://t.me/<?php echo $messengers['telegram'];?>" target="_blank">
                <?php pll_e('Отримати безкоштовну консультацію'); ?>
              </a>
            </div>
          </div>
          <?php if (have_rows('our_services')): ?>
            <ul class="article_our_services__desc">
              <?php while (have_rows('our_services')) : the_row();
                $title = get_sub_field('title');
                $desc = get_sub_field('desc');
                ?>
                <li><strong><?php echo $title; ?></strong>
                  <?php if ($desc): ?>
                    <ul class="child">
                      <li><?php echo $desc; ?></li>
                    </ul>
                  <?php endif; ?>
                </li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
          <?php
            if (get_field('important_remember')):
              if (get_field('important_remember')['title'] || get_field('important_remember')['items']):
                $importantRemember = get_field('important_remember');
                ?>
                <div class="article_our_services__desc_after">
                  <h2 class="title"><?php echo $importantRemember['title'] ?></h2>
                  <?php if ($importantRemember['items']): ?>
                    <ul class="items">
                      <?php foreach ($importantRemember['items'] as $repeater_item): ?>
                        <li><?php echo $repeater_item['item']; ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            <?php endif; ?>
          <?php if (have_rows('our_services_gallery')): ?>
            <ul class="article_our_services__gallery">
              <?php while (have_rows('our_services_gallery')): the_row();
                $imgUrl = get_sub_field('image');
                $imgUrlFull = get_sub_field('image_full');
              ?>
                <li><a href="<?php echo ($imgUrlFull) ? $imgUrlFull : $imgUrl; ?>" data-fancybox="gallery">
                    <img src="<?php echo $imgUrl; ?>" alt="Gallery Our Services">
                  </a></li>
              <?php endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>
        <script>
          let child = $('.article_our_services__desc li .child').length;
          if (child > 0) {
            $('.article_our_services__desc').addClass('col_3');
          } else {
            if ($('.article_our_services__desc > ul > li').length < 6) {
              $('.article_our_services__desc').addClass('col_1');
            } else {
              $('.article_our_services__desc').addClass('col_2');
            }
          }
        </script>
      </article>
      <article class="article_our_advantages">
        <div class="wrapper">
          <div class="article_our_advantages__headlines">
            <h2><?php pll_e('Чому ми'); ?></h2>
            <h3><?php pll_e('Наші переваги'); ?>:</h3>
          </div>
          <?php $listAdvantages = get_field('our_advantages');
            if ($listAdvantages['list_advantages']):?>
              <ul class="article_our_advantages__items">
                <?php foreach ($listAdvantages['list_advantages'] as $repeater_item): ?>
                  <li>
                    <?php if ($repeater_item['title']): ?>
                      <strong><?php echo $repeater_item['title']; ?></strong>
                    <?php endif; ?>
                    <ul>
                      <li><?php echo $repeater_item['desc']; ?></li>
                    </ul>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          <ul class="article_our_advantages__items_after">
            <?php $listAdvantages = get_field('our_advantages');
              if ($listAdvantages['desc_after_advantages']):?>
                <?php foreach ($listAdvantages['desc_after_advantages'] as $repeater_item): ?>
                  <li>
                    <h3 class="title"><?php echo $repeater_item['title']; ?></h3>
                    <div class="desc"><?php echo $repeater_item['desc']; ?></div>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>
          </ul>
        </div>
      </article>
    </section>
  </main>
<?php
  get_footer();
