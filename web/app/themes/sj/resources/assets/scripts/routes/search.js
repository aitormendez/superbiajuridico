var InfiniteScroll = require('infinite-scroll');

export default {
  init() {

    // Infinite scroll
    // https://infinite-scroll.com/#getting-started

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


  },
};
