var InfiniteScroll = require('infinite-scroll');

export default {
  init() {
    // JavaScript to be fired on the about us page


    // pintar de blanco el header del article desplegado

    let desplegar = $('.btn-desplegar');

    desplegar.click(function() {
      desplegar.parents('article').removeClass('desplegado');
      if ($(this).hasClass('collapsed')) {
        $(this).parents('article').addClass('desplegado');
        console.log('si');
      } else {
        $(this).parents('article').removeClass('desplegado');
        console.log('no');
      }
    });


        // infinite-scroll
    // -----------------------------------------------

    let buttonCont = $('.button-container');

    let main = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.next-link a',
      append: '.article',
      history: false,
      hideNav: '.nav-links',
      button: '.view-more-button',
      status: '.page-load-status',
      debug: true,
    });

    console.log('lc: ' + main.loadCount);

    function onPageLoad() {
      console.log(main.loadCount);
      console.log('main.loadCount');
      if ( main.loadCount == 1 ) {
        main.options.loadOnScroll = false;
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
