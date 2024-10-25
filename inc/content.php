<?php while (have_posts()) : the_post(); // то инициализируем каждый пост по порядку ?>
  <div class="item">
    <div class="image_new"><?php the_post_thumbnail(); ?></div>
    <div class="short_desc">
      <h3><?php the_title(); ?></h3>
      <div class="excerpt"><?php the_excerpt(); ?></div>
      <a href="<?php the_permalink(); ?>" class="more"><?php pll_e('Читати'); ?></a>
    </div>
  </div>
<?php endwhile; ?>
