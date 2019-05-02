// import owlCarousel from 'owl.carousel/dist/owl.carousel.min';
/* eslint-disable no-unused-vars */
import TweenMax from 'gsap/src/minified/TweenMax.min';
import {
  Power0,
  Power1,
  TimelineMax,
  Bounce,
  Elastic,
} from 'gsap/src/minified/TweenMax.min';
import ScrollMagic from 'scrollmagic/scrollmagic/uncompressed/ScrollMagic';
import 'scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';
// import 'scrollmagic/scrollmagic/uncompressed/plugins/debug.addIndicators.js';
// import 'gsap/src/minified/plugins/ScrollToPlugin.min';
import 'gsap/src/minified/plugins/CSSPlugin.min';
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

    //   var controller = new ScrollMagic.Controller();

    //   var cabeceraTl = new TimelineMax();
    //   cabeceraTl
    //     .to('#slide01 .bcg img', 1, {
    //       y: 100,
    //       ease: Power0.easeInOut,
    //     })
    //     .to('#slide01 .texto .texto', 0.7, {
    //       y: -400,
    //       autoAlpha: 0,
    //       ease: Power0.easeInOut,
    //     }, 0)
    //     .from('#slide01 .pregunta .pregunta', 0.7, {
    //       y: 200,
    //       autoAlpha: 0,
    //       ease: Power0.easeInOut,
    //     }, 0);

    //   var cabeceraScene = new ScrollMagic.Scene({
    //       triggerElement: '#slide01',
    //       triggerHook: 0,
    //       offset: -190,
    //     })
    //     .setClassToggle('#slide01 .marco', 'claro')
    //     .setTween(cabeceraTl)
    //     .addTo(controller);


    } // ! viewport width

    // slider portada (glide)
    // -------------------------------

    var glide = new Glide('.glide', {
      type: 'carousel',
      gap: 15,
    })

    glide.mount()

    // flechas. Ojo, se puede mejorar con una clase para el contador:
    // https://stackoverflow.com/a/2679208/2986401

    let flechaIzq = $('.left');
    let flechaDer = $('.right');
    let idleTime = 0;
    let idleInterval = setInterval(timerIncrement, 1000);
    let flechasVisible = false;

    $('.glide').hover(inFunction, outFunction);

    var izquierda = new TimelineMax();
    izquierda
      .to(flechaIzq, 1, {
        x: 100,
        ease: Elastic.easeOut.config(1, 1),
      }, 0)
      .from(flechaIzq, 1, {
        opacity: 0,
        ease: Power1.easeOut,
      }, 0);

      var derecha = new TimelineMax();
      derecha
      .to(flechaDer, 1, {
        x: -100,
        ease: Elastic.easeOut.config(1, 1),
      }, 0)
      .from(flechaDer, 1, {
        opacity: 0,
        ease: Power1.easeOut,
      }, 0);

    function inFunction() {
      izquierda.play();
      derecha.play();
      idleInterval = setInterval(timerIncrement, 1000);
      flechasVisible = true;
      console.log(idleTime);
    }

    function outFunction() {
      izquierda.reverse();
      derecha.reverse();
      idleTime = 0;
      clearInterval(idleInterval);
      idleInterval = false;
      flechasVisible = false;
      console.log('outttt');
    }

    // Resetear idl time al mover el ratón
    $('.glide').mousemove(function (e) {
      idleTime = 0;
      if (idleTime < 2 && flechasVisible == false) {
        izquierda.play();
        derecha.play();
        if (!idleInterval) {
          idleInterval = setInterval(timerIncrement, 1000);
        }
      }
      console.log('moooove');
    });

    function timerIncrement() {
      idleTime = idleTime + 1;
      if (idleTime > 2) {
        izquierda.reverse();
        derecha.reverse();
        flechasVisible = false;
        clearInterval(idleInterval);
        idleInterval = false;
      }
      console.log(idleTime);
    }




  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
/* eslint-enable */
