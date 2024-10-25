<?php
  /**
   * Template Name: Види ремонту
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_types_services page_types_repairs">
    <section class="category_page__back_header page_types_services__back_header page_types_repairs__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_types_repairs__container">
      <div class="breadcrumbs wrapper">
        <a href="<?php echo get_permalink($post->post_parent); ?>" class="icon-arrow-left">
          <span><?php pll_e('Всі послуги');?></span>
        </a>
      </div>
      <div class="wrapper">
        <div class="page_types_repairs__container--block">
          <div class="content">
            <h2 class="content__title"><?php the_title();?></h2>
            <?php the_content();?>
          </div>
          <div class="image"><?php echo get_the_post_thumbnail('', 'large') ?></div>
        </div>
      </div>
    </section>
  </main>
<?php
  get_footer();
