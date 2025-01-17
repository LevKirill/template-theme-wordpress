<?php
  /**
   * Template Name: Організація
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_types_services page_organization">
    <section class="category_page__back_header page_types_services__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_types_services__container page_organization__container">
      <div class="wrapper">
        <div class="content"><?php the_content();?></div>
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
