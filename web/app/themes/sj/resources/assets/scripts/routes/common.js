export default {
  init() {
    // JavaScript to be fired on all pages

      // banner nav retractril

      let
        w = $(window),
        banner = $('.banner'),
        viewportWidth = w.width(),
        lastY = w.scrollTop();

      $('#flecha-1').click(function() {
        $([document.documentElement, document.body]).animate({
          scrollTop: $('.slider').offset().top,
        }, 500);
      });

      if (viewportWidth >= 600) {
        w.scroll(function() {
          let
            currY = w.scrollTop(),
            direction = (currY > lastY) ? 'down' : 'up';
          if (direction === 'down') {
            banner.addClass('offcanvas');
          } else if (direction === 'up') {
            banner.removeClass('offcanvas');
          }

          if (currY >= 1) {
            banner.removeClass('full');
          } else {
            banner.addClass('full');
          }
          lastY = currY;
        });
      } // ! viewport width


      // hamburguesa

      if (viewportWidth <= 1000) {
        $('.hamburger').click(function() {
          $(this).toggleClass('is-active');
          $('#solapa').toggleClass('abierto');
        });
      } else {
        $('.boton-solapa-buscar, .cruz').click(function() {
          $('#buscar').toggleClass('abierto');
        });
      }

      $('.css-transitions-only-after-page-load').each(function(index, element) {
        setTimeout(function() {
          $(element).removeClass('css-transitions-only-after-page-load')
        }, 30);
      });


  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
