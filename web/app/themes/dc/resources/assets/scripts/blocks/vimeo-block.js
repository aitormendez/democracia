/* eslint-disable no-unused-vars */
import Plyr from 'plyr';
console.log('vimeo');

// new Plyr('.un-video', {
//   captions: {active: true},
// });


const videos = $('.un-video');

videos.each(function(){
  new Plyr($(this), {
    captions: {active: true},
  });
});


