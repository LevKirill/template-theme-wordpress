<?php
  get_header(); ?>
<main class="category_page">
  <section class="category_page__back_header">
    <div class="wrapper">
      <h1 class="wow animate__fadeInLeft"><?php
          echo single_cat_title('', false);
        ?></h1>
    </div>
  </section>
  <section class="category_page__content" role="main">
    <div class="wrapper">
      <?php if (have_posts()) : ?>
        <div class="items" itemscope="itemscope" itemtype="https://schema.org/Blog">
          <?php while (have_posts()) : the_post(); ?>
            <div class="item">
              <div class="image_new" itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                <?php the_post_thumbnail(); ?>
              </div>
              <div class="short_desc">
                <h3 itemprop="headline"><?php the_title(); ?></h3>
                <div class="excerpt" itemprop="description"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>" class="more" itemprop="mainEntityOfPage"><?php pll_e('Читати'); ?></a>
              </div>
            </div>
          <?php endwhile;
            global $wp_query;
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $max_pages = $wp_query->max_num_pages;
            if ($paged < $max_pages) {
              echo '<div id="loadmore" style="text-align:center;">
                      <a href="#" data-max-pages="' . $max_pages . '" data-paged="' . $paged .
                          '" class="btn btn-warning mt-3">' . pll__('Завантажити ще') . '</a>';
            }
            $paged++;
            wp_reset_query();
          ?>
        </div>
      <?php endif; ?>
      <?php if (category_description()): ?>
        <div class="seo_text">
          <div class="wrapper"><?php echo category_description();?></div>
        </div>
      <?php endif; ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>
