// polyfill es6 features to be compatible with old browsers
require('babel-polyfill');

// import local dependencies
import { docReady } from './utils/docReady';
// import { propPath } from './utils/propPath';
import FormsController from './formsController';
import ProjectsSlider from './projectsSlider';
// import ProjectViewer from './projectViewer';

// event.path polyfill
// propPath();

// recaptcha init
window.recaptchaLoaded = false;
window.recaptchaCB = () => window.recaptchaLoaded = true;

docReady(
    () => new FormsController(),
    () => new ProjectsSlider(),
    // () => window.ProjectViewer = new ProjectViewer()
);