import 'infinite-scroll/dist/infinite-scroll.pkgd';
// eslint-disable-next-line no-unused-vars
import InfiniteScroll from 'infinite-scroll/dist/infinite-scroll.pkgd';

export default {
  init() {

    // Infinite scroll
    // https://infinite-scroll.com/#getting-started

    $('.main').infiniteScroll({
      // options
      path: '.nav-previous a',
      append: 'article',
      history: false,
      loadOnScroll: true,
      scrollThreshold: 1500,
      hideNav: '.nav-links',
    });


  },
};
