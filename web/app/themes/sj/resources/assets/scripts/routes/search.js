import 'infinite-scroll/dist/infinite-scroll.pkgd';
// eslint-disable-next-line no-unused-vars
import InfiniteScroll from 'infinite-scroll/dist/infinite-scroll.pkgd';

export default {
  init() {

    // Infinite scroll
    // https://infinite-scroll.com/#getting-started

    var inf = $('.main').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: 'article',
      history: false,
      hideNav: '.nav-links',
    });
// eslint-disable-next-line no-unused-vars
    inf.on('request.infiniteScroll', function(event, path) {
      // eslint-disable-next-line
      $('.content').append("<div class='loading'><div class='cuadro c-1'></div><div class='cuadro c-2'></div><div class='cuadro c-3'></div><div class='cuadro c-4'></div>");
      $('.loading').toggleClass('visible');
    });
// eslint-disable-next-line no-unused-vars
    inf.on('load.infiniteScroll', function(event, response, path) {
      $('.loading').toggleClass('visible');
      $('.loading').remove();
    });
  },
};
