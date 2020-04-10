import 'lightgallery/dist/js/lightgallery';
import 'lightgallery/modules/lg-fullscreen';
import 'lightgallery/modules/lg-zoom';

export default {
  init() {


    $('.lightbox').lightGallery({
      selector: 'a',
      mode: 'lg-slide',
      preload: 2,
      download: false,
      thumbContHeight: 60,
      hideBarsDelay: 1000,
    });


  },
};
