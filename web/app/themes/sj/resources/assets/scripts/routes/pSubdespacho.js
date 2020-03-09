var InfiniteScroll = require('infinite-scroll');
import tippy from 'tippy.js';

export default {
  init() {

    // TOOLTIPS
    // ------------------

    const ttSj = document.querySelectorAll('.marca-sj');
    const templateSj = document.getElementById('template-sj');
    if (ttSj.length > 0) {
      tippy(ttSj, {
        content: templateSj.innerHTML,
        animation: 'scale',
      });
    }

    const ttQj = document.querySelectorAll('.marca-qj');
    const templateQj = document.getElementById('template-qj');
    if (ttQj.length > 0) {
      tippy(ttQj, {
        content: templateQj.innerHTML,
        animation: 'scale',
      });
    }


    // infinite-scroll
    // -----------------------------------------------

    let buttonCont = $('.button-container');

    let main = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.nav-links a',
      append: '.infinite-scroll-item',
      history: false,
      hideNav: '.nav-links',
      button: '.view-more-button',
      status: '.page-load-status',
    });

    function onPageLoad() {
      console.log(main.loadCount);
      console.log('main.loadCount');
      if ( main.loadCount == 1 ) {
        main.option({
          loadOnScroll: false,
        });
        buttonCont.removeClass('d-none');
        main.off( 'load', onPageLoad );
      }
    }

    main.on( 'load', onPageLoad );

    main.on( 'last', function() {
      buttonCont.hide();
    });

    main.on('append', function() {
      const ttSj = document.querySelectorAll('.marca-sj');
      const ttQj = document.querySelectorAll('.marca-qj');
      if (ttSj.length > 0) {
        tippy(ttSj, {
          content: templateSj.innerHTML,
          animation: 'scale',
        });
      }
      if (ttQj.length > 0) {
        tippy(ttQj, {
          content: templateQj.innerHTML,
          animation: 'scale',
        });
      }
    });

  },
};
