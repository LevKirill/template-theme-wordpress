<?php
  /**
   * The template for displaying all single posts
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
 */

  get_header();
  global $post;
  $parent_title = '';
  $parent_link = '';
  $thumbnail_attributes = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); // повертає масив параметрів мініатюри
  $wrapperImg = (has_post_thumbnail())? ' wrapper_img' : ' wrapper_noImg';
?>
  <main class="site_main page_promotion_child">
    <section class="category_page__back_header page_promotion__back_header">
      <div class="wrapper">
        <h2><?php
            if (is_subpage()) {
              $parent_title = get_the_title($post->post_parent);
              $parent_link = get_permalink($post->post_parent);;
              echo $parent_title;
            } else {
              the_title();
            }
          ?></h2>
      </div>
    </section>
    <section class="page_promotion_child__container">
      <?php if (is_subpage()):?>
        <div class="breadcrumbs wrapper">
            <a href="<?php echo $parent_link;?>" class="icon-arrow-left">
              <span><?php echo pll__('Всі') . ' ' . get_the_title($post->post_parent);?></span>
            </a>
        </div>
      <?php endif;;?>
      <div class="wrapper<?php echo $wrapperImg; ?>">
        <?php if(has_post_thumbnail()):?>
          <div class="image">
            <img src="<?php echo $thumbnail_attributes[0];?>"
                 alt="Banner <?php echo preg_replace('~\x{00a0}~siu',' ',get_the_title());;?>">
          </div>
        <?php endif;?>
        <div class="desc">
          <h1 class="desc__title"><?php the_title();?></h1>
          <?php if (get_field('start_action') && get_field('end_action')): ?>
            <p class="desc__dates"><?php the_field('start_action');?>&nbsp;&ndash; <?php the_field('end_action');?></p>
          <?php endif;?>
          <div class="desc__content"><?php the_content();?></div>
        </div>
      </div>
    </section>
  </main>
<?php
  get_footer();
