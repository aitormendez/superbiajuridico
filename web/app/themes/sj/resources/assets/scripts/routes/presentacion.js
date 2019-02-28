/* eslint-disable no-unused-vars */
import TweenMax from 'gsap/src/minified/TweenMax.min';
import Power0 from 'gsap/src/minified/TweenMax.min';
import Power1 from 'gsap/src/minified/TweenMax.min';
import ScrollMagic from 'scrollmagic/scrollmagic/uncompressed/ScrollMagic';
import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js';
import 'gsap/src/minified/plugins/ScrollToPlugin.min';
import TimelineMax from 'gsap/src/minified/TimelineMax.min';

export default {
  init() {

    $(document).ready(function() {
      var controller = new ScrollMagic.Controller();

      // Foto cabecera

      var cabeceraTl = new TimelineMax();
      cabeceraTl
        .to('#slide01 .bcg', 1.5, {
          y: 300,
          ease: Power0.easeOut,
        });

      var cabeceraScene = new ScrollMagic.Scene({
          triggerElement: '#slide01',
          triggerHook: 0,
          offset: -68,
          duration: 620,
        })
        .setTween(cabeceraTl)
        .addTo(controller);

      // escudo cabecera

      var ecudoTl = new TimelineMax();
      ecudoTl
        .to('#escudo', 1.5, {
          y: 20,
        })
        .to('#escudo', 1.5, {
          autoAlpha: 0,
          ease: Power0.easeOut,
        });

      var escudoScene = new ScrollMagic.Scene({
          triggerElement: '#slide01',
          triggerHook: 0,
          offset: -68,
          duration: 300,
        })
        .setTween(ecudoTl)
        .addTo(controller);

      var entresacadoTl = new TimelineMax();
      entresacadoTl
        .from('#slide03 .entresacado', 0.5, {
          y: 300,
          autoAlpha: 0,
          ease: Power0.easeOut,
        }, 0)
        .to('#slide03 .bcg', 0.5, {
          y: 100,
          ease: Power0.easeInOut,
        }, 0);

      var entresacadoScene = new ScrollMagic.Scene({
          triggerElement: '#slide03',
        })
        .setTween(entresacadoTl)
        .addTo(controller);
    });

  },
};
/* eslint-enable */
