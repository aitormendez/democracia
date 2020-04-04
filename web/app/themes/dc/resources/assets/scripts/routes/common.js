import anime from 'animejs';
import Plyr from 'plyr';

export default {
  init() {
    // JavaScript to be fired on all pages
    // let brand = document.querySelector('.brand');
    // brand.addEventListener('mouseenter', console.log('brand'));

    let hamb = $('.hamburger');


    // Menús desplegables
    // --------------------------------------------------------------------

    let menu = {
      desplegado: true,
      plegar() {
        hamb.removeClass('is-active');
        anime({
          targets: '.nav-primary li',
          translateX: -200,
          delay: anime.stagger(30),
          easing: 'easeInElastic(1, 1)',
          duration: 500,
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
        if (direction === 'down') {
          menu.plegar();
        } else if (direction === 'up') {
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
        console.log(menu.desplegado);
      }
    });

    // Logo Democracia
    // ----------------

     let
      logo = $('.logo');

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
      setTimeout(function(){
        logoDemo.esconder(3000);
        menu.plegar();
      },3000);
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






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
