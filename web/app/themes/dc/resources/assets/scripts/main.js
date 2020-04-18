// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import archive from './routes/archive';
import aboutUs from './routes/about';
import singleStory from './routes/single-story';
import singleProject from './routes/single-project';
import postTypeArchiveProject from './routes/archive-project';
import taxProjectFormat from './routes/tax-project_format';
import pageTemplateEdicion from './routes/page-template-edicion';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // About Us page, note the change from about-us to aboutUs.
  aboutUs,
  singleProject,
  postTypeArchiveProject,
  taxProjectFormat,
  singleStory,
  archive,
  pageTemplateEdicion,
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

var faTimes = {
  prefix: 'fal',
  iconName: 'times',
  icon: [
    512,
    512,
    [],
    'e003',
    'M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z',
  ],
}

var faCruz = {
  prefix: 'fad',
  iconName: 'cruz',
  icon: [
    385,
    385,
    [],
    'e004',
    'M385 22.6470588 215.147059 192.5 385 362.352941 362.352941 385 192.5 215.147059 22.6470588 385 0 362.352941 169.853649 192.499292 5.6892762e-14 22.6470588 22.6470588 0 192.500708 169.852233 362.352941 1.13785524e-13 Z',
  ],
}

var faArrowRight = {
  prefix: 'fal',
  iconName: 'arrow-right',
  icon: [
    512,
    512,
    [],
    'e004',
    'M216.464 36.465l-7.071 7.07c-4.686 4.686-4.686 12.284 0 16.971L387.887 239H12c-6.627 0-12 5.373-12 12v10c0 6.627 5.373 12 12 12h375.887L209.393 451.494c-4.686 4.686-4.686 12.284 0 16.971l7.071 7.07c4.686 4.686 12.284 4.686 16.97 0l211.051-211.05c4.686-4.686 4.686-12.284 0-16.971L233.434 36.465c-4.686-4.687-12.284-4.687-16.97 0z',
  ],
}

library.add(faFacebook, faTwitter, faArrowAltDown, faArrowAltRight, faCaretRight, faTimes, faCruz, faArrowRight);

dom.watch();
