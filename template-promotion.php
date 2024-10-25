<?php
  /**
   * Template Name: Акції
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_promotion">
    <section class="category_page__back_header page_promotion__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_promotion__container">
      <div class="wrapper">
        <?php if (have_rows('repeater_action')): ?>
          <div class="items">
            <?php while (have_rows('repeater_action')) : the_row();
              $titleAction = str_replace(array(" ", chr(0xC2) . chr(0xA0)), ' ',
                  html_entity_decode(get_sub_field('title')));
              ?>
              <div class="item">
                <div class="banner">
                  <img src="<?php the_sub_field('banner'); ?>"
                       alt="Banner <?php echo $titleAction; ?>">
                </div>
                <h2 class="title"><?php the_sub_field('title'); ?></h2>
                <p class="dates"><?php the_sub_field('start'); ?>&nbsp;&ndash; <?php the_sub_field('end'); ?></p>
                <p class="desc"><?php the_sub_field('desc'); ?></p>
                <a href="<?php the_sub_field('link_action'); ?>" class="more"><?php pll_e('Деталі'); ?></a>
              </div>
            <?php endwhile; ?>
          </div>
        <?php else : ?>
          <div class="not_action">
            <p><?php pll_e("Поки акцій немає, але вони скоро з'являться."); ?></p>
          </div>
        <?php endif; ?>
      </div>
      <?php if (get_field('seo-text')): ?>
        <div class="seo_text">
          <div class="wrapper"><?php the_field('seo-text');?></div>
        </div>
      <?php endif; ?>
    </section>
  </main>
<?php
  get_footer();
