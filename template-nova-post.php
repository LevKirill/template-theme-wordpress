<?php
  /**
   * Template Name: Нова пошта
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
  $descNovaPost = get_field('desc_nova_post');
  $howRepaired = get_field('how_repaired');
  $ourAdvantagesNP = get_field('our_advantages');
?>
  <main class="site_main page_types_services page_nova_post">
    <section
        class="category_page__back_header single_page__back_header page_repair_cameras__back_header<?php echo (get_field('title_image')) ?
            ' before" style="background-image: url(' . get_field('title_image') . ')' : ''; ?>">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_nova_post__content">
      <article class="article_profiservice">
        <div class="wrapper">
          <div class="article_profiservice__block article_profiservice__block_desc">
            <h2><?php echo $descNovaPost['title'];?></h2>
            <div class="desc"><?php echo $descNovaPost['desc']; ?></div>
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
      <article class="article_our_services">
        <div class="wrapper">
          <div class="block_title">
            <h3><?php echo $howRepaired['title']; ?></h3>
            <div class="block_title__link">
              <a href="https://t.me/<?php echo $messengers['telegram'];?>" target="_blank">
                <?php pll_e('Отримати безкоштовну консультацію'); ?>
              </a>
            </div>
          </div>
          <ul class="article_our_services__list_desc">
            <?php foreach($howRepaired['items'] as $repeater_item):
              $desc = $repeater_item['desc'];
              ?>
              <li>
                <?php echo $desc;?>
              </li>
            <?php endforeach; ?>
          </ul>
          <script>
            let widthLi = $('.article_our_services__list_desc li'),
                heightLi1, heightLi2, heightLi3;
            heightLi1 = heightLi2 = heightLi3 = 0;

            if ($(window).width() > '1290'){
              $(function () {
                $(widthLi).each(function (index) {
                  if (index === 0 || index === 3) {
                    if (heightLi1 < $(this).height()) {
                      heightLi1 = $(this).height();
                    }
                  } else if (index === 1 || index === 4) {
                    if (heightLi2 < $(this).height()) {
                      heightLi2 = $(this).height();
                    }
                  } else if (index === 2 || index === 5) {
                    if (heightLi3 < $(this).height()) {
                      heightLi3 = $(this).height();
                    }
                  }
                });

                heightLi1 += 28;
                heightLi2 += 28;
                heightLi3 += 28;

                $(widthLi).each(function (index) {
                  if (index === 0 || index === 3) {
                    $(this).css('min-height', heightLi1 + 'px')
                  } else if (index === 1 || index === 4) {
                    $(this).css('min-height', heightLi2 + 'px')
                  } else if (index === 2 || index === 5) {
                    $(this).css('min-height', heightLi3 + 'px')
                  }
                });
              });
            }
          </script>
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
                $imgUrl = get_sub_field('image'); ?>
                <li><img src="<?php echo $imgUrl; ?>" alt="Gallery Our Services"></li>
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
      <article class="article_nova_post_pay">
        <div class="wrapper">
          <h2><?php pll_e('Оплата'); ?></h2>
          <?php if( have_rows('payments') ):?>
            <ul class="items">
              <?php while ( have_rows('payments') ) : the_row();?>
                <li class="icon-check"><p><?php the_sub_field('payment_option');?></p></li>
              <?php endwhile;?>
            </ul>
          <?php endif; ?>
        </div>
      </article>
      <article class="article_our_advantages">
        <div class="wrapper">
          <div class="article_our_advantages__headlines">
            <h2><?php pll_e('Чому Нова Пошта'); ?></h2>
            <h3><?php echo $ourAdvantagesNP['benefits_advantages_title']; ?>:</h3>
          </div>
          <ul class="article_our_advantages__items  article_our_advantages__items--nova_post">
            <?php foreach ($ourAdvantagesNP['benefits_advantages'] as $repeater_item): ?>
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
        </div>
      </article>
    </section>
  </main>
<?php
  get_footer();
