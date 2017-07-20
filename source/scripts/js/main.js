// polyfill es6 features to be compatible with old browsers
require('babel-polyfill');

// import local dependencies
import { docReady } from './utils/docReady';

docReady(() => console.log('hi'));