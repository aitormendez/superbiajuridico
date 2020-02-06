/* eslint-disable no-unused-vars */
import Glide, { Controls, Autoplay, Keyboard } from '@glidejs/glide/dist/glide.modular.esm'

export default {
  init() {
    // JavaScript to be fired on the home page


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
