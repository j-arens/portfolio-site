/**
 * event.path / event.composedPath polyfill
 * https://github.com/DieterHolvoet/event-propagation-path/blob/master/propagationPath.js
 */

export function propPath() {

    const polyfill = function() {
        let element = this.target;
        const pathArr = [element];

        if (element === null || element.parentElement === null) {
            return [];
        }

        while(element.parentElement !== null) {
            element = element.parentElement;
            pathArr.unshift(element);
        }

        return pathArr;
    }

    window.Event.prototype.propPath = polyfill;
}