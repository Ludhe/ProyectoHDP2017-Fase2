(function ($) {

  'use strict';

  Drupal.behaviors.customBehavior = {
    // perform jQuery as normal in here
  };


  $(function () {
    $('.sliding-panel-button,.sliding-panel-fade-screen,.sliding-panel-close').on('click touchstart', function (e) {
      $('.block-menu,.sliding-panel-fade-screen').toggleClass('is-visible');
      e.preventDefault();
    });
  });

  $('#block-druppio-monopage-search #edit-submit').click(function () {
    $('#block-druppio-monopage-search').addClass('open');
    $('#block-druppio-monopage-search .form-actions input').attr('style', 'pointer-events: inherit;');
  });


  $(function () {
    var menu = $('body');
    menu.addClass('arrow-down');
    $(window).bind('scroll', function () {
      if ($(window).scrollTop() > menu.offset().top) {
        menu.addClass('scrolled-down');
      }
      else {
        menu.removeClass('scrolled-down');
      }
    });

    $('a.page-scroll').bind('click', function (event) {
      var $ele = $(this);
      $('html, body').stop().animate({
        scrollTop: ($($ele.attr('href')).offset().top - 60)
      }, 1450, 'easeInOutExpo');
      event.preventDefault();
    });
  });


  $(function () {
    $(window).resize(function () {
      var div_width = $('.views_slideshow_cycle_teaser_section').width();
      $('.views_slideshow_cycle_teaser_section').height(div_width);
    });
  });


})(jQuery);
