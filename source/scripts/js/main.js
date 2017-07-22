// polyfill es6 features to be compatible with old browsers
require('babel-polyfill');

// import local dependencies
import { docReady } from './utils/docReady';
// import { crossPoly } from './cross-poly';
import FormsController from './formsController';

// recaptcha init
window.recaptchaLoaded = false;
window.recaptchaCB = () => window.recaptchaLoaded = true;

// docReady(crossPoly);
docReady(() => new FormsController());