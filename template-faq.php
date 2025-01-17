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
          <?php if( have_rows('faq') ):?>
            <ul class="wp-block-list" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
              <?php while ( have_rows('faq') ) : the_row();?>
                <li itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
                  <span itemprop="name"><?php the_sub_field('entity');?></span>
                  <ul class="wp-block-list" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
                    <li itemprop="text"><?php the_sub_field('answer');?></li>
                  </ul>
                </li>
              <?php endwhile;?>
            </ul>
          <?php endif;?>
        </div>
      </div>
    </section>
    <script>
      $('.page_faq__container--block > .wp-block-list > li').on('click', function () {
        $(this).toggleClass('active');
      });
      $(function () {
        $('html').attr('itemscope', '').attr('itemtype', 'https://schema.org/FAQPage');
      });
    </script>
	  <?php if (get_field('seo-text')): ?>
        <div class="seo_text">
          <div class="wrapper"><?php the_field('seo-text');?></div>
        </div>
      <?php endif; ?>
  </main>
<?php
  get_footer();
