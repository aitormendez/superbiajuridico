// import owlCarousel from 'owl.carousel/dist/owl.carousel.min';
/* eslint-disable no-unused-vars */
import TweenMax from 'gsap/src/minified/TweenMax.min';
import Power0 from 'gsap/src/minified/TweenMax.min';
import Power1 from 'gsap/src/minified/TweenMax.min';
import ScrollMagic from 'scrollmagic/scrollmagic/uncompressed/ScrollMagic';
import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js';
// import 'gsap/src/minified/plugins/ScrollToPlugin.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';
import Glide from '@glidejs/glide';

export default {
  init() {
    // JavaScript to be fired on the home page


    var viewportWidth = $(window).width();
    if (viewportWidth >= 600) {
      // añadir y quitar clase "peq" en banner cuando scroll
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 1) {
          $('.logotipo').removeClass('mediano');
          $('.anagrama').addClass('fadeout');
          $('.anagrama').removeClass('fadein');
          $('.banner').removeClass('med');
        } else {
          $('.logotipo').addClass('mediano');
          $('.anagrama').removeClass('fadeout');
          $('.anagrama').addClass('fadeinfadeout');
          $('.banner').addClass('med');
        }
      });

      // Scrollmagic: Foto cabecera

      var controller = new ScrollMagic.Controller();

      var cabeceraTl = new TimelineMax();
      cabeceraTl
        .to('#slide01 .bcg img', 1, {
          y: 100,
          ease: Power0.easeInOut,
        })
        .to('#slide01 .texto .texto', 0.7, {
          y: -400,
          autoAlpha: 0,
          ease: Power0.easeInOut,
        }, 0)
        .from('#slide01 .pregunta .pregunta', 0.7, {
          y: 200,
          autoAlpha: 0,
          ease: Power0.easeInOut,
        }, 0);

      var cabeceraScene = new ScrollMagic.Scene({
          triggerElement: '#slide01',
          triggerHook: 0,
          offset: -190,
        })
        .setClassToggle('#slide01 .marco', 'claro')
        .setTween(cabeceraTl)
        .addTo(controller);


    } // ! viewport width


    var glide = new Glide('.glide', {
      type: 'carousel',
      gap: 15,
      peek: {
        before: 50,
        after: 50,
      },
    })

    glide.mount()



  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
/* eslint-enable */
