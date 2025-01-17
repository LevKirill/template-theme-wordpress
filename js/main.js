let triangle = document.querySelector('.header__contacts--phone>li>.triangle');
triangle.onclick = function () {
  document.querySelector('.header__contacts--phone>li').classList.toggle('active');
}

let hamburger = document.querySelector('.header__hamburger');
let hamburgerClose = document.querySelector('.header .mobile_navigation__close');
let mobNav = document.querySelector('.header .mobile_navigation');
hamburger.onclick = function () {
  mobNav.classList.add('active');
}
hamburgerClose.onclick = function () {
  mobNav.classList.remove('active');
}

$(function () {
  let newElems = $("<div class='triangle'/>");
  $('.mobile_navigation .menu li.menu-item-has-children').prepend(newElems);
});
$(function () {
  $('.mobile_navigation .menu .triangle').on('click', function () {
    $(this).find('+ a + .sub-menu').toggleClass('active');
    $(this).toggleClass('active');
  });
});

//Header scroll
let scrollpos = window.scrollY;

const header = document.querySelector("header");
const scrollChange = 1;

const add_class_on_scroll = () => header.classList.add("sticky");
const remove_class_on_scroll = () => header.classList.remove("sticky");

function scrollHeader (actionType) {
  window.addEventListener(actionType, function () {
    scrollpos = window.scrollY;

    if (scrollpos >= scrollChange) {
      add_class_on_scroll()
    } else {
      remove_class_on_scroll()
    }
  });
}
scrollHeader('scroll');
scrollHeader('load');

// WOW Animation
let wow = new WOW({
  boxClass: 'wow',
  animateClass: 'animate__animated',
  mobile: false
});
wow.init();

$('.popup_np').on('click', function (event) {
  event.preventDefault();
  $('.popup_back_nova_post').addClass('active');
});

$('.popup_back .close_popup').on('click', function (event) {
  event.preventDefault();
  $('.popup_back_nova_post').removeClass('active');
});

//	Плавне прокручування
$(function () {
  $('a[href^="#link"]').bind('click.smoothscroll', function (e) {
    e.preventDefault();

    let target = this.hash,
          $target = $(target);

    $('html, body').stop().animate({'scrollTop': $target.offset().top - 100},
          {
            duration: 500,
            step: function (progress) {
            }
          }, 'swing');

  });
});

Fancybox.bind("[data-fancybox]", {});

