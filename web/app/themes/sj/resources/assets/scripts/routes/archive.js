/* eslint-disable no-unused-vars */
import 'infinite-scroll/dist/infinite-scroll.pkgd';
import InfiniteScroll from 'infinite-scroll/dist/infinite-scroll.pkgd';
import Tooltip from 'tooltip.js/dist/umd/tooltip.js';

export default {
  init() {

    // TOOLTIPS
    // ------------------

    let sjNews = $('.marca-sj');

    sjNews.each(function() {
      new Tooltip(this, {
        title: 'Superbia Jurídico en los medios',
        trigger: 'hover',
      });
    })

    // Infinite scroll
    // https://infinite-scroll.com/#getting-started

    var inf = $('.infinite-scroll-container').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: '.infinite-scroll-item',
      history: false,
      hideNav: '.nav-links',
    });

    inf.on('request.infiniteScroll', function(event, path) {
      // eslint-disable-next-line quotes
        $('.content').append("<div class='loading'><div class='cuadro c-1'></div><div class='cuadro c-2'></div><div class='cuadro c-3'></div><div class='cuadro c-4'></div>");
        $('.loading').toggleClass('visible');
      })
      .on('load.infiniteScroll', function(event, response, path) {
        $('.loading').toggleClass('visible');
        $('.loading').remove();
      })
      .on('append.infiniteScroll', function(event, response, path, items) {
        let sjNews = $('.marca-sj');
        sjNews.each(function() {
          new Tooltip(this, {
            title: 'Superbia Jurídico en los medios',
            trigger: 'hover',
          });
        })
      });

  },
};
/* eslint-enable */
