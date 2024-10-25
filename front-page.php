<?php
  /**
   * The home page
   *
   * @package WordPress
   * @subpackage Profi Service
   * @since Profi Service 1.0
   *
   */
  get_header();
  $messengers = get_field('messengers', 'option');
?>
  <main>
    <section class="main_screen wow">
      <div class="background wow"></div>
      <div class="wrapper">
        <h1 class="main_screen__title">
          <span class="wow animate__fadeIn"><?php pll_e('Професійний'); ?></span>
          <span class="wow animate__fadeIn"><?php pll_e('ремонт'); ?></span>
          <span class="wow animate__fadeIn"><?php pll_e('фототехніки'); ?></span>
        </h1>
        <p class="main_screen__desc wow animate__fadeIn">
          <?php pll_e('Діагностика'); ?> <span><?php pll_e('безкоштовно'); ?>!</span>
        </p>
        <a href="https://t.me/<?php echo $messengers['telegram'];?>" target="_blank"
           class="main_screen__btn wow animate__fadeInUp"><?php pll_e('Отримати безкоштовну консультацію');
          ?></a>
      </div>
    </section>
    <section id="linkAboutUs" class="about_us">
      <div class="wrapper">
        <div class="about_us__container wow animate__bounceInRight">
          <h2 class="about_us__container--title about_us__container--h2"><?php pll_e('Про нас'); ?></h2>
          <h3 class="about_us__container--title about_us__container--h3"><?php pll_e('Сервісний центр ПрофіСервіс');
            ?></h3>
          <h4 class="about_us__container--title about_us__container--h4"><?php pll_e('Ремонт фото і відео техніки');
            ?></h4>
          <div class="about_us__container--desc">
            <p><?php pll_e('Ми є вузькопрофільним сервісним центром, ми спеціалізуємося виключно на ремонті фотоапаратів, ремонті спалахів, студійного світла і ремонті відеокамер.'); ?></p>
            <p><?php pll_e('Завдяки цьому наші інженери мають великий досвід і технічну ремонтну базу для виконання ремонтних робіт вищої категорії складності.'); ?></p>
          </div>
        </div>
        <div class="about_us__gallery">
          <div class="about_us__gallery--image about_us__gallery--image-1 wow animate__bounceInLeft">
            <img src="<?php echo get_template_directory_uri(); ?>/img/about-us/img-about-us-1.webp" alt="Image Camera">
          </div>
          <div class="about_us__gallery--image about_us__gallery--image-2 wow animate__bounceInLeft">
            <img src="<?php echo get_template_directory_uri(); ?>/img/about-us/img-about-us-2.webp" alt="Image Lens">
          </div>
        </div>
      </div>
    </section>
    <section class="services">
      <div class="wrapper">
        <h2 class="services__title wow animate__fadeInDown"><?php pll_e('Послуги'); ?></h2>
        <div class="services__container">
          <h3 class="services__container--subtitle wow animate__fadeInLeft"><?php pll_e('Що ми ремонтуємо'); ?></h3>
          <div class="services__container--desc wow animate__fadeInUp">
            <p><?php pll_e('Ми не прагнемо робити все!'); ?></p>
            <p><?php pll_e('Ми ремонтуємо виключно фото і відео техніку і робимо це добре!'); ?></p>
          </div>
          <?php
            $repeaterRepair = pll__('types_repairs_uk');
            if (have_rows($repeaterRepair, 'option')): ?>
              <ul class="services__container--items wow animate__fadeInRight">
                <?php while (have_rows($repeaterRepair, 'option')): the_row(); ?>
                  <li><?php the_sub_field('item_repair', 'option'); ?></li>
                <?php endwhile; ?>
              </ul>
            <?php endif; ?>
        </div>
        <ul class="services__gallery">
          <?php $i = 1;
            while (have_rows('photos', 'option')): the_row();
              if ($i == 1) {
                $wowClass = 'Down';
              } else if ($i == 2) {
                $wowClass = 'Left';
              } else if ($i == 3) {
                $wowClass = 'Up';
              } else if ($i == 4) {
                $wowClass = 'Down';
              } else if ($i == 5) {
                $wowClass = 'Down';
              }
              ?>
              <li class="wow animate__fadeIn<?php echo $wowClass; ?>"><img src="<?php
                  the_sub_field('img_repairs', 'option'); ?>"
                                                                           alt="Images
            Services"></li>
              <?php $i++;
            endwhile; ?>
        </ul>
      </div>
    </section>
    <section class="stages_work">
      <div class="wrapper">
        <h2 class="stages_work__title"><?php pll_e('Етапи роботи'); ?></h2>
        <h3 class="stages_work__subtitle"><?php pll_e('Як ми працюємо'); ?></h3>
        <nav class="stages_work__items">
          <ul>
            <li>
              <span></span>
              <p><?php pll_e('Ви отримуєте безкоштовну консультацію майстра по телефону.'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('Ви приїжджаєте в наш офіс (або пересилаєте техніку Новою поштою), майстер проводить безкоштовну діагностику'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('Узгодження вартості ремонту і термінів'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('Виконання ремонтних робіт в озвучені терміни.'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('Ми повідомляємо вас про готовність вашої техніки'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('При видачі ви перевіряєте повну справність вашої апаратури'); ?></p>
            </li>
            <li>
              <span></span>
              <p><?php pll_e('Оплата. Ми видаємо вам квитанцію, гарантію до 6 місяців (підприємствам пакет документів для бухгалтерії).'); ?></p>
            </li>
          </ul>
          <script>
            $(document).ready(function () {
              $(".stages_work__items p").html(function (index, text) {
                return text.replace(new RegExp("безкоштовну", 'g'), "<span>безкоштовну</span>")
              });
              $(".stages_work__items p").html(function (index, text) {
                return text.replace(new RegExp("бесплатную", 'g'), "<span>бесплатную</span>")
              });
            });
            // Отримуємо потрібний елемент
            let element = document.querySelector('.stages_work__items ul');
            let elementLi_1 = document.querySelector('.stages_work__items ul li:nth-child(1)');
            let elementLi_2 = document.querySelector('.stages_work__items ul li:nth-child(2)');
            let elementLi_3 = document.querySelector('.stages_work__items ul li:nth-child(3)');
            let elementLi_4 = document.querySelector('.stages_work__items ul li:nth-child(4)');
            let elementLi_5 = document.querySelector('.stages_work__items ul li:nth-child(5)');
            let elementLi_6 = document.querySelector('.stages_work__items ul li:nth-child(6)');
            let elementLi_7 = document.querySelector('.stages_work__items ul li:nth-child(7)');

            let Visible = function (target) {
              // Усі позиції елемента
              let targetPosition = {
                      top: window.pageYOffset + target.getBoundingClientRect().top,
                      left: window.pageXOffset + target.getBoundingClientRect().left,
                      right: window.pageXOffset + target.getBoundingClientRect().right,
                      bottom: window.pageYOffset + target.getBoundingClientRect().bottom
                    },
                    // Отримуємо позиції вікна
                    windowPosition = {
                      top: window.pageYOffset,
                      left: window.pageXOffset,
                      right: window.pageXOffset + document.documentElement.clientWidth,
                      bottom: window.pageYOffset + document.documentElement.clientHeight
                    }

              if (targetPosition.bottom > windowPosition.top && // Якщо позиція нижньої частини елемента більша за позицію верхньої частини вікна, то елемент видно зверху
                    targetPosition.top < windowPosition.bottom && // Якщо позиція верхньої частини елемента менша за позицію нижньої частини вікна, то елемент видно знизу
                    targetPosition.right > windowPosition.left && // Якщо позиція правого боку елемента більша за позицію лівої частини вікна, то елемент видно зліва
                    targetPosition.left < windowPosition.right) { // Якщо позиція лівого боку елемента менша за позицію правої частини вікна, то елемент видно праворуч
                // Якщо елемент повністю видно, то запускаємо такий код
                target.classList.add('active');
              }
            }

            // Запускаємо функцію під час прокручування сторінки
            window.addEventListener('scroll', function () {
              Visible(element);
              Visible(elementLi_1);
              Visible(elementLi_2);
              Visible(elementLi_3);
              Visible(elementLi_4);
              Visible(elementLi_5);
              Visible(elementLi_6);
              Visible(elementLi_7);
            });

            // А також запустимо функцію відразу. А то раптом, елемент спочатку видно
            Visible(element);
            Visible(elementLi_1);
            Visible(elementLi_2);
            Visible(elementLi_3);
            Visible(elementLi_4);
            Visible(elementLi_5);
            Visible(elementLi_6);
            Visible(elementLi_7);
          </script>
        </nav>
      </div>
    </section>
    <section class="work_results">
      <div class="wrapper">
        <h2 class="work_results__title wow animate__fadeInLeft"><?php pll_e('Результати роботи'); ?></h2>
        <h3 class="work_results__subtitle wow animate__fadeInLeft"><?php pll_e('Що ви отримуєте в результаті'); ?></h3>
        <nav class="work_results__items">
          <ul>
            <li class="wow animate__fadeInLeft icon-gears">
              <p><?php pll_e('Повністю справну техніку в найкоротші терміни.'); ?></p></li>
            <li class="wow animate__fadeInUp icon-regular-handshake">
              <p><?php pll_e('Виконання ремонтних робіт тільки після вашої згоди!'); ?></p></li>
            <li class="wow animate__fadeInDown icon-support-outline">
              <p><?php pll_e("Ви можете завжди  дізнатися про стадію ремонту зв'язавшись з нами."); ?></p></li>
            <li class="wow animate__fadeInRight icon-calendar-check">
              <p><?php pll_e('Гарантія погоджених термінів і вартості.'); ?></p></li>
          </ul>
        </nav>
      </div>
    </section>
    <section id="linkOurAdvantages" class="our_advantages">
      <div class="wrapper">
        <h2 class="our_advantages__title wow animate__fadeInLeftBig"><?php pll_e('Чому ми'); ?>?</h2>
        <h3 class="our_advantages__subtitle wow animate__fadeInLeft"><?php pll_e('Наші переваги'); ?></h3>
        <?php if (have_rows(pll__('list_advantages_uk'), 'option')):
          $i = 1;
          $direction = 'Left';
          ?>
          <nav class="our_advantages__items">
            <ul>
              <?php while (have_rows(pll__('list_advantages_uk'), 'option')): the_row();
                $title = get_sub_field('title', 'option');
                $content = get_sub_field('desc', 'option');
                if ($i == 2) {
                  $direction = 'Down';
                } elseif ($i == 3) {
                  $direction = 'Up';
                } elseif ($i == 4) {
                  $direction = 'Right';
                }
                ?>
                <li class="wow animate__bounceIn<?php echo $direction; ?>">
                  <h3><?php echo $title; ?></h3>
                  <div class="content"><?php echo $content; ?></div>
                </li>
                <?php $i++; endwhile; ?>
            </ul>
          </nav>
        <?php endif; ?>
      </div>
    </section>
    <section class="home_blog">
      <div class="wrapper">
        <h2 class="home_blog__title wow animate__fadeInLeft"><?php pll_e('Необхідно знати'); ?></h2>
        <h3 class="home_blog__subtitle wow animate__fadeInLeftBig"><?php pll_e('Блог'); ?></h3>
        <div class="home_blog__container">
          <?php
            global $post;
            $i = 1;
            $classNew = '';
            $postslist = get_posts(array('posts_per_page' => 3, 'category' => 'blog'));
            foreach ($postslist as $post) {
              setup_postdata($post);
              if ($i == 1) {
                $classNew = 'LeftBig';
              } else if ($i == 2) {
                $classNew = 'UpBig';
              } else if ($i == 3) {
                $classNew = 'RightBig hide_mobile';
              }
              ?>
              <div class="home_blog__container--new wow animate__fadeIn<?php echo $classNew; ?>">
                <div class="image_new"><?php the_post_thumbnail(); ?></div>
                <div class="short_desc">
                  <h3><?php the_title(); ?></h3>
                  <div class="excerpt"><?php the_excerpt(); ?></div>
                  <a href="<?php the_permalink(); ?>" class="more"><?php pll_e('Читати'); ?></a>
                </div>
              </div>
              <?php
              $i++;
            }
            $category_id = get_category_link(pll__('ID категорії блог'));
          ?>
          <div class="home_blog__container--link_more_news">
            <a href="<?php echo $category_id; ?>"><?php pll_e('Всі статті'); ?></a>
          </div>
          <?php wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
    <section class="questions">
      <div class="wrapper">
        <h2 class="questions__title wow animate__bounceInDown"><?php pll_e('Маєте запитання?'); ?></h2>
        <div class="questions__container">
          <h3 class="questions__container--subtitle  wow animate__bounceInLeft"><?php pll_e("Зв'яжіться з нами!"); ?></h3>
          <a href="https://t.me/<?php echo $messengers['telegram'];?>" target="_blank"
             class="questions__container--btn  wow animate__bounceInRight"><?php pll_e('Отримати безкоштовну консультацію'); ?></a>
        </div>
      </div>
    </section>
  </main>
  <script>
    //    Removing a slash from an anchor link
    let anchorLink = document.querySelectorAll('a[href^="/#link"]');
    for (let i = 0; i < anchorLink.length; i++) {
      anchorLink[i].href = anchorLink[i].getAttribute('href').slice(1);
    }

    // Smooth scrolling to the anchor when navigating from another page
    let myHash = location.hash; //get the hash value
    location.hash = ''; //clear the hash
    if (myHash[1] !== undefined) { //check if there is any value in the hash
      $('html, body').animate({scrollTop: $(myHash).offset().top - 100}, 500); //scrolling in half a second
    }
  </script>
<?php
  get_footer();
