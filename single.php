<?php
  /**
   * The template for displaying all single posts and attachments
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   */

  get_header();
  $categories = get_the_category();
  ?>

    <main class="single_page" role="main" itemscope itemtype="https://schema.org/BlogPosting">
      <meta content="<?php echo get_page_link();?>" itemprop="mainEntityOfPage">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <section class="category_page__back_header single_page__back_header<?php echo (get_field('title_image')) ?
                      ' before" style="background-image: url(' . get_field('title_image') . ')': '';?>">
        <div class="wrapper">
          <h1 class="wow animate__fadeInLeft" itemprop="headline"><?php the_title(); ?></h1>
        </div>
      </section>
        <span class="entry-date" style="position: absolute; opacity: 0; left: -9999px;">
          <time class="published"
                datetime="<?php echo get_the_date('Y-m-j') . 'T' . get_the_time('H:m:s') . '+00:00';?>"
                itemprop="datePublished"><?php the_date();?></time>
          <time class="updated" datetime="<?php echo get_the_modified_date('Y-m-j') . 'T' . get_the_modified_time('H:m:s') . '+00:00';
          ?>" itemprop="dateModified"><?php the_modified_date();?></time>
        </span>
      <section class="single_post">
        <div class="breadcrumbs wrapper">
          <a href="<?php if ( ! empty( $categories ) ) {echo esc_url( get_category_link( $categories[0]->term_id ) );} ?>"
             class="icon-arrow-left">
            <span><?php pll_e('Повернутись до Блогу');?></span>
          </a>
        </div>
        <div class="wrapper single_post__content" itemprop="articleBody">
          <?php the_content(); ?>
        </div>
      </section>
      <?php endwhile; endif; ?>
    </main>

<?php
  get_footer();

