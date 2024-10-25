<?php
  /**
   * Template Name: Часті питання
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_faq">
    <section class="category_page__back_header page_faq__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_faq__container">
      <div class="wrapper">
        <h2 class="page_faq__container--title"><?php pll_e('Нас часто запитують');?></h2>
        <h3 class="page_faq__container--subtitle"><?php pll_e('Відповідаємо');?>:</h3>
        <div class="page_faq__container--block">
          <?php the_content();?>
        </div>
      </div>
    </section>
    <script>
      $('.page_faq__container--block > .wp-block-list > li').on('click', function () {
        $(this).toggleClass('active');
      });
    </script>
  </main>
<?php
  get_footer();
