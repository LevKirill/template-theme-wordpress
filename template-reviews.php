<?php
  /**
   * Template Name: Відгуки
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
?>
  <main class="site_main page_reviews">
    <section class="category_page__back_header page_reviews__back_header">
      <div class="wrapper">
        <h1 class="wow animate__fadeInLeft"><?php the_title(); ?></h1>
      </div>
    </section>
    <section class="page_reviews__container">
      <div class="wrapper wrapper_content">
        <h2 class="page_reviews__container--title"><?php pll_e('Що про нас кажуть?');?></h2>
        <h3 class="page_reviews__container--subtitle"><?php pll_e('Відгуки про нашу роботу');?>:</h3>
        <div class="page_reviews__container--content">
          <?php the_content();?>
        </div>
      </div>
      <div class="wrapper wrapper__reviews">
        <?php echo do_shortcode("[google-reviews type='grid' max_reviews='20' place_info='true' style='3']"); ?>
        <div class="more_reviews"><button><?php pll_e('Показати більше');?></button></div>
      </div>
      <?php if (get_field('seo-text')): ?>
        <div class="seo_text">
          <div class="wrapper"><?php the_field('seo-text');?></div>
        </div>
      <?php endif; ?>
    </section>
    <script>
      $review = $('.wrapper__reviews .grwp_body .g-review');
      $btnMoreReviews = $('.more_reviews button');
      $addReview = 6;

      $($review).slice(0,$addReview).addClass('active');
      $(function () {
        $($btnMoreReviews).on('click', function() {
          $reviewActive = $('.wrapper__reviews .grwp_body .g-review.active').length;
          $($review).slice($reviewActive, $reviewActive + $addReview).addClass('active');
          if ($review.length - $addReview <= $reviewActive) {
            $('.more_reviews').addClass('disabled');
          }
        });
      });

      $reviewsHeader = $('.wrapper__reviews .grwp_header .grwp_header-inner');
      $(function () {
        $reviewTitle = $("<div class='title_google'></div>")
          .append('<svg><use xlink:href="<?php echo get_template_directory_uri();?>/img/sprite.svg?ver_2#google-logo"></use></svg>')
          .append('<span><?php pll_e('рейтинг');?></span>');
        $reviewLink = $("<div class='google_add_review'></div>")
          .append('<a href="https://search.google.com/local/writereview?placeid=ChIJj1-DgWzO1EARoL5-XaTyEHI" target="_blank"><?php pll_e('Залишити відгук') ?></a>');
        $($reviewsHeader).prepend($reviewTitle);
        $($reviewsHeader).append($reviewLink);
      });

      $('.wrapper__reviews .grwp_header .grwp_header-inner .grwp_overall').html('<?php pll_e('Працює більше ніж 7 років');?>')

      $($review).find(' .gr-inner-header > p > br').remove();

      ($review).each(function (index) {
        $googleLogo = $('<div class="gr-inner-google"></div>')
              .append($(this).find(' .gr-inner-header .gr-google'))
              .append('<p><span>Posted on</span><a href="<?php
                  $googleMap = get_field('how_find', 'option');
                  echo $googleMap['link_google_maps'];
                  ?>" target="_blank">Google</a></p>');
        $(this).append($googleLogo);

        $reviewNameAuthor = $(this).find(' .gr-inner-header > p > a');

        $(this).find(' .gr-inner-header').prepend($reviewNameAuthor);
      });
    </script>
  </main>
<?php
  get_footer();
