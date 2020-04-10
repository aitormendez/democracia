/* eslint-disable no-unused-vars */
import Plyr from 'plyr';
console.log('vimeo');

const videos = $('.un-video');

videos.each(function(){
  new Plyr($(this), {
    captions: {active: true},
  });
});


