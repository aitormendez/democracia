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


  },
};
