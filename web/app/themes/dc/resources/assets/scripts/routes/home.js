
import Plyr from 'plyr';

export default {
  init() {
    // JavaScript to be fired on the home page

    const player = new Plyr('#player', {captions: {
      active: true,
      autoplay: true,
    }});
    window.player = player;

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
