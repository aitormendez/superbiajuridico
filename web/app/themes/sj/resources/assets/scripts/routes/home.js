/* eslint-disable no-unused-vars */
import Glide, { Controls, Autoplay, Keyboard } from '@glidejs/glide/dist/glide.modular.esm';
import { createPopper } from '@popperjs/core/lib/popper-lite.js';
import flip from '@popperjs/core/lib/modifiers/flip';
import preventOverflow from '@popperjs/core/lib/modifiers/preventOverflow';

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

    const button = document.querySelector('.marca-js');
    const tooltip = document.querySelector('#tooltip');

    createPopper(button, tooltip, {
      modifiers: [preventOverflow, flip],
    });


  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
/* eslint-enable */
