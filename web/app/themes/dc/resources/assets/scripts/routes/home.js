
import Plyr from 'plyr';

export default {
  init() {
    // JavaScript to be fired on the home page

    const player = new Plyr('#player', {captions: {
      active: true,
    }});
    window.player = player;

    setTimeout(function(){
      player.play();
      console.log('play');
    },3000);

  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
