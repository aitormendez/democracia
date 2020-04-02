import anime from 'animejs';

export default {
  init() {
    // JavaScript to be fired on all pages

    let hamb = $('.hamburger');


    // Menús desplegables
    // --------------------------------------------------------------------

    let menu = {
      desplegado: true,
      plegar() {
        anime({
          targets: '.nav-primary li',
          translateX: -200,
          delay: anime.stagger(30),
        });
        anime({
          targets: '.brand',
          translateX: -200,
        });
        this.desplegado = false;
      },
      desplegar() {
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
          hamb.removeClass('is-active');
        } else if (direction === 'up') {
          menu.desplegar();
          hamb.addClass('is-active');
        }

        if (currY >= 1) {
          // banner.removeClass('full');
        } else {
          // banner.addClass('full');
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
        $(this).removeClass('is-active');
        console.log(menu.desplegado);
      } else if (menu.desplegado == false) {
        menu.desplegar();
        $(this).addClass('is-active');
        console.log(menu.desplegado);
      }
    });

    // En front-page

    if (document.body.classList.contains('home')) {
      console.log('home');
    }




  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
