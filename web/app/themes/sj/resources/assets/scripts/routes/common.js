export default {
  init() {
    // JavaScript to be fired on all pages
    $(document).ready(function() {

      $('.css-transitions-only-after-page-load').each(function(index, element) {
        setTimeout(function() {
          $(element).removeClass('css-transitions-only-after-page-load')
        }, 30);
      });

      $('#hamb').click(function() {
        $(this).toggleClass('closed open');
        $('#busc').toggleClass('visible invisible');
        $('#solapa').toggleClass('closed open');
      });

      $('#busc').click(function() {
        $(this).toggleClass('closed open');
        $('#buscar').toggleClass('closed open');
      });
      $('#filtro').click(function() {
        $(this).toggleClass('closed open');
        $('#solapa-filtro').toggleClass('closed open');
      });

    });




  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
