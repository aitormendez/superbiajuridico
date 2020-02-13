var InfiniteScroll = require('infinite-scroll');
import tippy from 'tippy.js';

export default {
  init() {

    // TOOLTIPS
    // ------------------

    const tps = document.querySelectorAll('.marca-sj');
    const template = document.getElementById('template');

    tippy(tps, {
      content: template.innerHTML,
    });

    console.log(tps);

    // infinite-scroll
    // -----------------------------------------------

    let buttonCont = $('.button-container');

    let main = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.nav-previous a',
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
      const tps = document.querySelectorAll('.marca-sj');
      tippy(tps, {
        content: template.innerHTML,
      });
    });

  },
};
