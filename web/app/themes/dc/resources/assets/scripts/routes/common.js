import anime from 'animejs';

export default {
  init() {
    // JavaScript to be fired on all pages

    $('.hamburger').click(function() {
      $(this).toggleClass('is-active');
      menu.plegar();
    });

    // Menús desplegables
    // --------------------------------------------------------------------

    let menu = {
      desplegado: false,
      plegar() {
        let left;
        if (this.desplegado == true) {
          left = 0;
          this.desplegado = false;
        } else if (this.desplegado == false){
          left = 200;
          this.desplegado = true;
        }
        console.log(this.desplegado);
        anime({
          targets: '.nav-primary li',
          translateX: left,
          delay: anime.stagger(30),
        });
        anime({
          targets: '.brand',
          translateX: left,
        });
      },
    }




  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
