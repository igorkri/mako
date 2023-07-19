
// Зменшення висоти хеддера при прокрутці
$(window).bind('scroll', function () {
  var ScrollPos = $(this).scrollTop()

  if (ScrollPos > 0) {
    $('header .logo').css('padding', '14px 0 14px 30px');
    if ($(window).width() < 506) {
      $('header .logo').css('padding', '10px 0 10px 20px');
    }
  } else {
    $('header .logo').css('padding', '29px 0 29px 30px');
    if ($(window).width() < 506) {
      $('header .logo').css('padding', '20px 0 20px 20px');
    }
  }
});

// відкриття вікна послуг
$('#header .services').click(function () {
  $(this).toggleClass('active');
  $('#header .services_block').slideToggle(300);
  if ($(this).hasClass('active')) {
    $('#header .services_block .services_categories .wrapper .category_name').removeClass('hover');
    $('#header .services_block .services_names').removeClass('on');
    $('#header .services_block .services_names .items').remove();
  }
});

// відкриття вікна про нас
$('#header .links .about').click(function () {
  $('#header .links .cloud').toggleClass('active');
});

$(document).keydown(function (event) {
  if (event.keyCode == 27) {
    $('#header .links .cloud').removeClass('active');
  }
});

$(document).mouseup(function (e) {
  if ($('#header .links .cloud').has(e.target).length === 0) {
    $('#header .links .cloud').removeClass('active');
  }
});

// бургер меню
$('#header .call_us .burger').click(function () {
  $(this).toggleClass('active');
  $('#header .services_block').slideToggle(300);
  if ($('#header .order, #header .links, #header .social').hasClass('visible')) {
    $('#header .order, #header .links, #header .social').removeClass('visible').addClass('notVisible');
  }
  else {
    $('#header .order, #header .links, #header .social').removeClass('notVisible').addClass('visible');
  }
});

$(document).mouseup(function (e) { // событие клика по веб-документу
  var header = $("#header");
  var modal = $('#header .order, #header .links, #header .social'); // тут указываем ID элемента
  if (!header.is(e.target) // если клик был не по нашему блоку
    && header.has(e.target).length === 0 && ($(window).width() < 1275)) { // и не по его дочерним элементам
    modal.removeClass('visible').addClass('notVisible');
    $('#header .call_us .burger').removeClass('active');
    $('#header .services_block').slideUp(300);
  }
});

if ($(window).width() < 1275) {
  $('#header .order, #header .links, #header .social').removeClass('visible').addClass('notVisible');
}

$(window).resize(function () {
  if ($(window).width() < 1275) {
    $('#header .order, #header .links, #header .social').removeClass('visible').addClass('notVisible');
  }
  else {
    $('#header .order, #header .links, #header .social').removeClass('notVisible').addClass('visible');
  }
});

if ($(window).width() < 505) {
  $('#header .links').append($('#header .social'));
}

$(window).resize(function () {
  if ($(window).width() < 505) {
    $('#header .links').append($('#header .social'));
  }
});

// заміна назову заголовку
$('#header .services_block .services_categories .category_name').hover(function () {
  if (($(window).width() < 507) || ($(window).width() > 768)) {
    $('#header .services_block .services_categories .category_name').removeClass('hover');
    $(this).addClass('hover');
  }
  let name = $(this).find('p').html();
  $('#header .services_block .services_names .title h6').html(name);
  $('#header .services_block .services_names').addClass('on');
});


// заміна блоку послуг
if ($(window).width() > 768) {
  $('#header .services_block .services_categories .wrapper').hover(function () {
    $('#header .services_block .services_names .items').remove();
    $(this).find('.items').clone().appendTo('#header .services_block .services_names').css('display', 'flex');
  });
}


if ($(window).width() < 769) {
  $('#header .services_block .services_categories .wrapper').on('click', function () {
    $('#header .services_block .services_names .items').remove();
    $(this).find('.items').clone().appendTo('#header .services_block .services_names').css('display', 'flex');
  });
}


$('#header .services_block .services_categories .category_name').click(function () {
  if (($(window).width() > 506) && ($(window).width() < 769)) {
    $(this).siblings('.items').slideToggle(250);
  }
});

$(window).resize(function () {
  if (($(window).width() > 506) && ($(window).width() < 769)) {
    $('#header .services_block .services_categories .category_name').removeClass('hover');
  }
});

$(window).resize(function () {
  if (($(window).width() < 507) || ($(window).width() > 768)) {
    $('#header .services_block .services_categories .wrapper .items').slideUp(0);
  }
});

// поява вікна в послугах при <506
$('#header .services_block .services_categories .category_name').click(function () {
  if ($(window).width() < 506) {
    $('#header .services_block .services_names').css('left', '0');
  }
});

$('#header .services_block .services_names .title img').click(function () {
  if ($(window).width() < 506) {
    $('#header .services_block .services_names').css('left', '100%');
  }
});

$(document).keydown(function (event) {
  if ($(window).width() > 1275) {
    if (event.keyCode == 27) {
      $('#header .services').removeClass('active');
      $('#header .services_block').slideUp(300);
    }
  }
});

$(document).mouseup(function (e) {
  if ($(window).width() > 1275) {
    if ($('#header .services_block, #header .services').has(e.target).length === 0) {
      $('#header .services').removeClass('active');
      $('#header .services_block').slideUp(300);
    }
  }
});

// закриття модального вікна по кліку по фону
$(document).mouseup(function (e) { // событие клика по веб-документу
  var dark_background = $("#dark_background");
  var modal_window = $("#dark_background .modal_window, #dark_background .modal_cart"); // тут указываем ID элемента
  if (!modal_window.is(e.target) // если клик был не по нашему блоку
    && modal_window.has(e.target).length === 0) { // и не по его дочерним элементам
    dark_background.removeClass('active');
    modal_window.addClass('dn'); // скрываем его
  }
});

// відкриття модального вікна "зателефонуйте нам"
$('#header .call_us .call_button').click(function () {
  $('#dark_background').addClass('active');
  $('#dark_background #call_us_window').removeClass('dn');
});

$('#dark_background #call_us_window .close').click(function () {
  $('#dark_background #call_us_window').addClass('dn');
  $('#dark_background').removeClass('active');
});

// відкриття модального вікна "записатись"
$('#header .order .sign_up').click(function () {
  $('#dark_background').addClass('active');
  $('#dark_background #sign_up_window').removeClass('dn');
});

$('#dark_background #sign_up_window .close').click(function () {
  $('#dark_background #sign_up_window').addClass('dn');
  $('#dark_background').removeClass('active');
});

// вибір салона в вікні "записатись"
$('#dark_background form .choose_salon').click(function () {
  $(this).find('.drop').slideToggle(300);
});

$('#dark_background form .choose_salon .drop span').click(function () {
  let choose_salon = $(this).html();
  $('#dark_background form .choose_salon input').val(choose_salon);
});

// модальне вікно "Кошик"
$('#header .order .cart').click(function () {
  $.ajax({
    url: '/product/cart',
    type: 'post',
    data: {},
    success: function (data) {
      $('.body_cart').html(data);
    },
    error: function () {
      // $.pjax.reload({ container: '#all-page' });
    }
  });
  $('#dark_background').addClass('active');
  $('#dark_background #cart_window').removeClass('dn');
});


$('#dark_background #cart_window .head .close').click(function () {
  $('#dark_background #cart_window').addClass('dn');
  $('#dark_background').removeClass('active');
});

$('#dark_background #cart_window .body_cart .goods .item .delete').click(function () {
  $(this).closest('.item').remove();
});

$('#dark_background #cart_window .body_cart .foot .clear_cart').click(function () {
  $('#dark_background #cart_window .body_cart .goods .item').remove();
});

$('#dark_background #cart_window .body_cart .goods .item .delete, #dark_background #cart_window .body_cart .foot .clear_cart').click(function () {
  if ($('#dark_background #cart_window .body_cart .goods .item').length == 0) {
    $('#dark_background #cart_window .body_cart .empty_cart').css('left', '0');
  }
});

// Слайдер "Акційні пропозиції"
$(document).ready(function () {
  var time = 2;
  var $bar,
    $slick,
    isPause,
    tick,
    percentTime;

  $slick = $('#promotional_offers .slider_block .slider');
  $slick.slick({
    dots: false,
    arrows: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 505,
        settings: {
          dots: true,
          arrows: false
        }
      }
    ]
  });

  $bar = $('#promotional_offers .slider_block .slider-progress .progress');

  $('#promotional_offers .slider_block .slider').on({
    mouseenter: function () {
      isPause = true;
    },
    mouseleave: function () {
      isPause = false;
    }
  })

  function startProgressbar() {
    resetProgressbar();
    percentTime = 0;
    isPause = false;
    tick = setInterval(interval, 20);
  }

  function interval() {
    if (isPause === false) {
      percentTime += 1 / (time + 0.1);
      $bar.css({
        width: percentTime + "%"
      });
      if (percentTime >= 100) {
        $slick.slick('slickNext');
        startProgressbar();
      }
    }
  }


  function resetProgressbar() {
    $bar.css({
      width: 0 + '%'
    });
    clearTimeout(tick);
  }

  startProgressbar();

});

// Слайдер "Популярні послуги"
if ($(window).width() < 506) {
  $('#popular_services .services_block').slick({
    dots: true,
    arrows: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 506,
        settings: "unslick"
      }
    ]
  });
}

$(window).resize(function () {
  if ($(window).width() < 506) {
    $('#popular_services .services_block').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      mobileFirst: true,
      responsive: [
        {
          breakpoint: 506,
          settings: "unslick"
        }
      ]
    });
  }
});

// сторінка service.html
// налаштування висоти відео
$(function () {
  $('#service_description .cont iframe').height($('#service_description .cont iframe').width() * 0.56);

  $(window).resize(function () {
    $('#service_description .cont iframe').height($('#service_description .cont iframe').width() * 0.56);
  });
});

// сторінка service.html
// галерея
$('#gallery').slick({
  dots: false,
  arrows: false,
  centerMode: true,
  autoplay: true,
  swipeToSlide: true,
  autoplaySpeed: 3000,
  variableWidth: true
});

// сторінка contacts.html
// налаштування висоти карти
$(function () {
  $('#contacts .cont .half iframe').height($('#contacts .cont .half iframe').width() * 0.5);

  $(window).resize(function () {
    $('#contacts .cont .half iframe').height($('#contacts .cont .half iframe').width() * 0.5);
  });
});

// сторінка team.html
// галерея
$('#team_gallery').slick({
  dots: false,
  arrows: false,
  centerMode: true,
  autoplay: true,
  swipeToSlide: true,
  autoplaySpeed: 3000,
  variableWidth: true
});

// сторінка videos.html
// налаштування висоти відео
$(function () {
  $('#video_gallery .block .video iframe').height($('#video_gallery .block .video iframe').width() * 0.56);

  $(window).resize(function () {
    $('#video_gallery .block .video iframe').height($('#video_gallery .block .video iframe').width() * 0.56);
  });
});

// сторінка blog.html
// налаштування висоти блогів
$(function () {
  $('#blog .block .item').height($('#blog .block .item').width());

  $(window).resize(function () {
    $('#blog .block .item').height($('#blog .block .item').width());
  });
});

// сторінка catalog.html
// зняти checked з усіх
$('#catalog .content .filters .head .you_choose .clear').click(function () {
  $("#catalog .content .filters .checkboxes_block label input").prop('checked', false);
});

// сторінка catalog.html
// налаштування висоти товарів
$(function () {
  $('#catalog .content .goods .item .img').height($('#catalog .content .goods .item .img').width());

  $(window).resize(function () {
    $('#catalog .content .goods .item .img').height($('#catalog .content .goods .item .img').width());
  });
});

// сторінка catalog.html
// фільтри
$('#filter_button').click(function () {
  $('#catalog .content .filters').slideDown(300);
});

$('#catalog .content .filters .top_panel .close').click(function () {
  $('#catalog .content .filters').slideUp(250);
});

if ($(window).width() <= 768) {
  var filter_button = $('#filter_button').offset();
  $('#catalog .content .filters').offset(filter_button);
}

// сторінка catalog.html
// анімація додавання товару до кошика
$('#catalog .content .goods .item .title .cart img').click(function (e) { /* Клік по кнопці "Додати до кошика" */
  var butWrap = $(this).parents('.cart'); /* Запам'ятовуємо врапер кнопки */
  butWrap.append('<img class="animtocart"></img>'); /* Додаємо у враппер об'єкт, який буде анімований і відлітати від кнопки до кошика */
  $('.animtocart').css({ /* Привласнюємо стилі об'єкту та позицію курсору миші */
    'position': 'absolute',
    'dispay': 'block',
    'width': '30px',
    'height': '30px',
    'background': 'no-repeat url(/img/cart_red.svg)',
    'background-size': 'cover',
    'z-index': '9999999999',
    'left': e.pageX - 25,
    'top': e.pageY - 25,
  })
  if ($(window).width() > 1275) {
    var cart = $('#header .order .cart svg').offset(); /* Отримуємо розташування кошика на сторінці, щоб туди полетіла картинка */
  }
  if ($(window).width() <= 1275) {
    var cart = $('#header .call_us .burger').offset(); /* Отримуємо розташування кошика на сторінці, щоб туди полетіла картинка */
  }
  $('.animtocart').animate({ top: cart.top + 'px', left: cart.left + 'px', width: 0, height: 0 }, 800, function () { /* Робимо анімацію польоту картинки від кнопки в кошик і по закінченню видаляємо його */
    $(this).remove();
  });
});

// сторінка product.html
// счетчик товару
$('.minus').click(function () {
  var $input = $(this).parent().find('input');
  var count = parseInt($input.val()) - 1;
  count = count < 1 ? 1 : count;
  $input.val(count);
  $input.change();
  return false;
});
$('.plus').click(function () {
  var $input = $(this).parent().find('input');
  $input.val(parseInt($input.val()) + 1);
  $input.change();
  return false;
});

// сторінка product.html
// слайдер товарів
$('#product .slider').slick({
  dots: true,
  arrows: true
});

// сторінка product.html
// налаштування висоти слайдера
$(function () {
  $('#product .slider .item img').height($('#product .slider').width());

  $(window).resize(function () {
    $('#product .slider .item img').height($('#product .slider').width());
  });
});

// сторінка product.html
// анімація додавання товару до кошика
$('#product_head .pcc .add_to_cart').click(function (e) { /* Клік по кнопці "Додати до кошика" */
  var butWrap = $(this).parents('.pcc'); /* Запам'ятовуємо врапер кнопки */
  butWrap.append('<img class="animtocart"></img>'); /* Додаємо у враппер об'єкт, який буде анімований і відлітати від кнопки до кошика */
  $('.animtocart').css({ /* Привласнюємо стилі об'єкту та позицію курсору миші */
    'position': 'absolute',
    'dispay': 'block',
    'width': '30px',
    'height': '30px',
    'border-radius': '15px',
    'background': 'no-repeat url(/img/add_to_cart.svg)',
    'background-size': 'cover',
    'z-index': '9999999999',
    'left': e.pageX - 25,
    'top': e.pageY - 25,
  })
  if ($(window).width() > 1275) {
    var cart = $('#header .order .cart svg').offset(); /* Отримуємо розташування кошика на сторінці, щоб туди полетіла картинка */
  }
  if ($(window).width() <= 1275) {
    var cart = $('#header .call_us .burger').offset(); /* Отримуємо розташування кошика на сторінці, щоб туди полетіла картинка */
  }
  $('.animtocart').animate({ top: cart.top + 'px', left: cart.left + 'px', width: 0, height: 0 }, 800, function () { /* Робимо анімацію польоту картинки від кнопки в кошик і по закінченню видаляємо його */
    $(this).remove();
  });
});

// specialists
$('#specialists .card').click(function () {
  $('#blur_fond').addClass('on');
  $('#blur_fond .cont').append($(this).clone());
});

$('#blur_fond .close').click(function () {
  $('#blur_fond').removeClass('on');
  $('#blur_fond .cont .card').remove();
  $('#blur_fond .cont .learning_item').remove();
});

// learning
$('#learning .learning_item').click(function () {
  $('#blur_fond').addClass('on');
  $('#blur_fond .cont').append($(this).clone());
});

// order доставка
$('#body_cart .order form input').click(function () {
  if ($('#new_post').prop('checked')) {
    $("#post_select_block").slideDown(250);
  } else {
    $("#post_select_block").slideUp(250);
  }
});

$('#body_cart .order form .post_select').click(function () {
  $('#body_cart .order form .post_select .drop_list').not($(this).find('.drop_list')).slideUp(250);
  $(this).find('.drop_list').slideToggle(250);
});

$('#body_cart .order form .post_select .drop_list span').click(function () {
  let val = $(this).html();
  $(this).closest('.post_select').find('input').val(val);
});
