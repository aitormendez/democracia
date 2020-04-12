import anime from 'animejs';
import Plyr from 'plyr';

export default {
  init() {
    // JavaScript to be fired on all pages

    let
      hamb = $('.hamburger'),
      logo = $('.logo'),
      solapa = $('.solapa');


    // Menús desplegables
    // --------------------------------------------------------------------

    let menu = {
      desplegado: true,
      cambiando: false,
      plegar() {
        hamb.removeClass('is-active');
        anime({
          targets: '.nav-primary li',
          translateX: -200,
          delay: anime.stagger(30),
          easing: 'easeInElastic(1, 1)',
          duration: 500,
          begin: function() {
            menu.cambiando = true;
          },
          complete: function() {
            solapa.addClass('d-sm-none');
            menu.cambiando = false;
          },
        });
        anime({
          targets: '.brand',
          translateX: -200,
          easing: 'easeInElastic(1, 1)',
          duration: 500,
        });
        this.desplegado = false;
      },
      desplegar() {
        hamb.addClass('is-active');
        anime({
          targets: '.nav-primary li',
          translateX: 0,
          delay: anime.stagger(30),
          begin: function() {
            solapa.removeClass('d-sm-none');
            menu.cambiando = true;
          },
          complete: function() {
            menu.cambiando = false;
          },
        });
        anime({
          targets: '.brand',
          translateX: 0,
        });
        this.desplegado = true;
      },
    }


    // Dirección scroll
    let
      w = $(window),
      viewportWidth = w.width(),
      lastY = w.scrollTop();

    if (viewportWidth >= 768) {
      w.scroll(function() {
        let
          currY = w.scrollTop(),
          direction = (currY > lastY) ? 'down' : 'up';
        if (direction === 'down' && menu.cambiando == false) {
          menu.plegar();
        } else if (direction === 'up' && menu.cambiando == false) {
          menu.desplegar();
        }
        lastY = currY;
      });
    } else {
      menu.plegar();
    } // ! viewport width


    // Hamburger
    // -------------------------------------

    hamb.click(function() {
      if (menu.desplegado == true) {
        menu.plegar();
        console.log(menu.desplegado);
      } else if (menu.desplegado == false) {
        menu.desplegar();
      }
    });

    // Logo Democracia
    // ----------------

      $('.brand').hover(
        function(){
          if (logoDemo.cambiando == false) {
            logoDemo.mostrar(300)
          }
        },
        function(){
          if (logoDemo.cambiando == false) {
            logoDemo.esconder(300)
          }
        }
     );


    let logoDemo = {
      cambiando: false,
      esconder(dur) {
        anime({
          targets: '.logo',
          opacity: 0,
          begin: function() {
            this.cambiando = true;
          },
          complete: function() {
            logo.addClass('d-sm-none');
            this.cambiando = false;
          },
          duration: dur,
          easing: 'linear',
        });
        this.visible = false;
      },
      mostrar(dur) {
        anime({
          targets: '.logo',
          opacity: 1,
          begin: function() {
            this.cambiando = true,
            logo.removeClass('d-sm-none');
          },
          complete: function() {
            this.cambiando = false;
          },
          duration: dur,
          easing: 'linear',
        });
      },
    }

    if (document.body.classList.contains('home')) {
      if (viewportWidth >= 768) {
        setTimeout(function(){
          logoDemo.esconder(3000);
        },3000);
      }
      const player = new Plyr('#player', {captions: {
        active: true,
      }});
      /* eslint-disable no-unused-vars */
      player.on('pause', event => {
        menu.desplegar()
      });
      player.on('play', event => {
        menu.plegar()
      });
      /* eslint-enable */
    } else {
      logo.addClass('d-sm-none');
    }

    // solapa buscar
    // -------------------------------------

    let
      solapaBuscar = $('#buscar'),
      cruz = $('.cruz'),
      btnSolapaBusc = $('.boton-solapa-buscar'),
      body = $('body');

    let motorBuscar = {
      desplegado: false,

      desplegar() {
        solapaBuscar.addClass('d-flex');
        solapaBuscar.removeClass('d-none');
        body.addClass('fijo');
        anime({
          targets: '#buscar',
          opacity: 1,
          duration: 1000,
          easing: 'linear',
        });
        this.desplegado = true;
      },
      plegar() {
        anime({
          targets: '#buscar',
          opacity: 0,
          duration: 1000,
          easing: 'linear',
          complete: function() {
            solapaBuscar.removeClass('d-flex');
            solapaBuscar.addClass('d-none');
            body.removeClass('fijo');
          },
        });
        this.desplegado = false;
      },
    }

    btnSolapaBusc.click(function(event) {
      event.preventDefault();
      if (motorBuscar.desplegado == false) {
        motorBuscar.desplegar()
      } else {
        motorBuscar.plegar()
      }
    });

    cruz.click(function(event) {
      event.preventDefault();
      motorBuscar.plegar()
    });



  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
