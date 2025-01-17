<?php
  /**
   * Template Name: Типи послуг
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_types_services">
    <section class="category_page__back_header page_types_services__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_types_services__container">
      <div class="wrapper">
        <div class="content"><?php the_content();?></div>
        <div class="list_service">
          <?php if( have_rows('List_services') ): ?>
            <?php while( have_rows('List_services') ): the_row();
              $typesRepairs = get_sub_field('item_service_uk');
            ?>
              <div class="item">
                <div class="item__image"><img src="<?php echo $typesRepairs['img'];?>" alt="Types Repairs"></div>
                <h3><?php echo $typesRepairs['title'];?></h3>
                <?php if ($typesRepairs['types_repairs']): ?>
                  <nav class="list_types_repairs">
                    <ul>
                      <?php foreach($typesRepairs['types_repairs'] as $repeater_item): ?>
                        <li>
                          <a href="<?php echo $repeater_item['item_repairs']; ?>"><?php echo $repeater_item['title']; ?></a>
                        </li>
                      <?php endforeach;?>
                    </ul>
                  </nav>
                <?php endif;?>
              </div>
            <?php endwhile; ?>
          <?php endif;?>
        </div>
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
