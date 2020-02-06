/* eslint-disable no-unused-vars */
var InfiniteScroll = require('infinite-scroll');
// import Tooltip from 'tooltip.js/dist/umd/tooltip.js';
// import { createPopper } from '@popperjs/core';

export default {
  init() {

    // TOOLTIPS
    // ------------------

    // let sjNews = $('.marca-sj');

    // sjNews.each(function() {
    //   new Tooltip(this, {
    //     title: 'Superbia Jurídico en los medios',
    //     trigger: 'hover',
    //   });
    // })

    // Infinite scroll
    // https://infinite-scroll.com/#getting-started


    var inf = $('.infinite-scroll-container').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: '.infinite-scroll-item',
      history: false,
      hideNav: '.posts-navigation',
      loadOnScroll: true,
      scrollThreshold: 1500,
    });

    // inf.on('append.infiniteScroll', function(event, response, path, items) {
    //     let sjNews = $('.marca-sj');
    //     sjNews.each(function() {
    //       new Tooltip(this, {
    //         title: 'Superbia Jurídico en los medios',
    //         trigger: 'hover',
    //       });
    //     })
    //   });






  },
};
/* eslint-enable */
