<?php
  add_action('wp_enqueue_scripts', 'true_loadmore_scripts');
  function true_loadmore_scripts()
  {
    wp_enqueue_script('jquery'); // в TwentyTwentyOne он не подключен по умолчанию
    wp_register_script(
        'true_loadmore',
        get_stylesheet_directory_uri() . '/js/' . pll__('loadmore-uk') . '.min.js',
        array('jquery'),
        time() // не кэшируем файл, убираем эту строчку после завершение разработки
    );
    wp_localize_script(
        'true_loadmore',
        'misha',
        array('ajax_url' => admin_url('admin-ajax.php'))
    );
    wp_enqueue_script('true_loadmore');
  }

  add_action('wp_ajax_loadmore', 'true_loadmore');
  add_action('wp_ajax_nopriv_loadmore', 'true_loadmore');
  function true_loadmore()
  {
    $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;
    $paged++;
    $args = array(
        'paged' => $paged,
        'post_status' => 'publish'
    );
    query_posts($args);
    while (have_posts()) : the_post(); ?>
      <div class="item">
        <div class="image_new"><?php the_post_thumbnail(); ?></div>
        <div class="short_desc">
          <h3><?php the_title(); ?></h3>
          <div class="excerpt"><?php the_excerpt(); ?></div>
          <a href="<?php the_permalink(); ?>" class="more"><?php pll_e('Читати'); ?></a>
        </div>
      </div>
    <?php endwhile;
    die;
  }
