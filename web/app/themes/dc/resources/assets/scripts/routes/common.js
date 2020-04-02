import anime from 'animejs';

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

    // Logo Democracia
    // ----------------

     let
      logo = $('.logo');

      $('.brand').hover(
        function(){
          logoDemo.mostrar();
           console.log('enter');
        },
        function(){
          logoDemo.esconder();
          console.log('sal');
        }
     );


    let logoDemo = {
      visible: true,
      esconder() {
        anime({
          targets: '.logo',
          opacity: 0,
          complete: function() {
            logo.addClass('d-none');
          },
          duration: 300,
          easing: 'linear',
        });
        this.visible = false;
        console.log('escondiendo');
      },
      mostrar() {
        anime({
          targets: '.logo',
          opacity: 1,
          begin: function() {
            logo.removeClass('d-none');
          },
          duration: 300,
          easing: 'linear',
        });
        this.visible = true;
        console.log('mostrando');
      },
    }
    console.log(logoDemo);
    // console.log(brand);



    if (document.body.classList.contains('home')) {
      console.log('home');
    }






  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
