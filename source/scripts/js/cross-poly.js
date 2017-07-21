'use-strict';

import anime from 'animejs';

export function crossPoly() {
    anime({
        targets: '.svg-icon__crosspoly',
        rotateZ: '1turn',
        scale: [1, 0.7, 1.1, 0.93],
        duration: 25000,
        loop: true,
        direction: 'alternate'
    });
}