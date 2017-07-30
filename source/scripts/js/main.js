// polyfill es6 features to be compatible with old browsers
require('babel-polyfill');

// import local dependencies
import { docReady } from './utils/docReady';
import FormsController from './formsController';
import ProjectsSlider from './projectsSlider';

if (document.body.classList.contains('error404')) {
    console.log('404');
} else {
    docReady(
        () => new FormsController(),
        () => new ProjectsSlider()
    );
}