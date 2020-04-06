// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';
import postTypeArchiveProject from './routes/archive-project';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  postTypeArchiveProject,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());

// import then needed Font Awesome functionality
import {
  library,
  dom,
} from '@fortawesome/fontawesome-svg-core';

import {
  faFacebook,
  faTwitter,
} from '@fortawesome/free-brands-svg-icons';

import {
  faCaretRight,
} from '@fortawesome/free-solid-svg-icons';

var faArrowAltDown = {
  prefix: 'fad',
  iconName: 'arrow-alt-down',
  icon: [
    512,
    512,
    [],
    'e001',
    'M83,12 L83,128 L12.1,128 C1.4,128 -4,141 3.6,148.5 L118.5,262.8 C123.2,267.5 130.7,267.5 135.4,262.8 L250.3,148.5 C257.9,140.9 252.5,128 241.8,128 L171,128 L171,12 C171,5.4 165.6,0 159,0 L95,0 C88.4,0 83,5.4 83,12 Z',
  ],
}

var faArrowAltRight = {
  prefix: 'fad',
  iconName: 'arrow-alt-right',
  icon: [
    512,
    512,
    [],
    'e002',
    'M0 304v-96c0-13.3 10.7-24 24-24h200V80.2c0-21.4 25.8-32.1 41-17L441 239c9.4 9.4 9.4 24.6 0 34L265 448.7c-15.1 15.1-41 4.4-41-17V328H24c-13.3 0-24-10.7-24-24z',
  ],
}

library.add(faFacebook, faTwitter, faArrowAltDown, faArrowAltRight, faCaretRight);

dom.watch();
