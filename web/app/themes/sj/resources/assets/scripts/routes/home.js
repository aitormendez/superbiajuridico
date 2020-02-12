/* eslint-disable no-unused-vars */
import Glide, { Controls, Autoplay, Keyboard } from '@glidejs/glide/dist/glide.modular.esm';
import tippy from 'tippy.js';

export default {
  init() {
    // JavaScript to be fired on the home page

    // TOOLTIPS
    // ------------------

    let sjNews = $('.marca-sj');

    sjNews.each(function() {
      tippy('[data-tippy-content]', {
        animation: 'scale',
        inertia: true,
      });
    })

    // slider portada
    // -------------------------------
    let viewportWidth = $(window).width();
    if (viewportWidth >= 700) {
      var glide = new Glide('.glide', {
        type: 'carousel',
        autoplay: 500000,
        gap: 15,
      })
      glide.mount({ Controls, Autoplay, Keyboard });
      $(window).trigger('resize', {})
    }



  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
/* eslint-enable */
