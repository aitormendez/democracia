var InfiniteScroll = require('infinite-scroll');

export default {
  init() {

      // pintar de blanco el header del article desplegado

      let botonesDesplegar = $('.btn-desplegar');

      function desplegar() {
        botonesDesplegar.parents('article').removeClass('desplegado');
        if ($(this).hasClass('collapsed')) {
          $(this).parents('article').addClass('desplegado');
        } else {
          $(this).parents('article').removeClass('desplegado');
        }
      }

      botonesDesplegar.click(desplegar);

    // infinite-scroll
    // -----------------------------------------------

    let buttonCont = $('.button-container');


    let main = new InfiniteScroll( '.infinite-scroll-container', {
      path: '.nav-previous a',
      append: '.article',
      history: false,
      hideNav: '.nav-links',
      button: '.view-more-button',
      status: '.page-load-status',
      debug: true,
    });

    console.log('lc: ' + main.loadCount);

    function onPageLoad() {
      if ( main.loadCount == 1 ) {
        main.options.loadOnScroll = false;
        buttonCont.removeClass('d-none');
        buttonCont.addClass('d-flex');
        main.off( 'load', onPageLoad );
      }
    }

    function onAppend() {
      botonesDesplegar = $('.btn-desplegar');
      botonesDesplegar.click(desplegar);
    }

    main.on( 'load', onPageLoad );
    main.on( 'append', onAppend );

    main.on( 'last', function() {
      buttonCont.hide();
    });


  },
};
