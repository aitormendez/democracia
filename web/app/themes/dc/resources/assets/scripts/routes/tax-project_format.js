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
  },
};
