import anime from 'animejs';

export default class ProjectViewer {

    constructor() {
        this.state = {
            active: false,
            root: null,
            frame: null,
            spinner: null,
            spinning: false,
            anim: {
                rotate: null,
                stroke: null
            }
        }

        this.cacheDom();
        this.bindEvents();
        this.loadSpinnerAnim();
    }

    handleActions(e) {
        const action = e.target.dataset.action;

        if (!action) return;

        switch(action) {
            case 'CLOSE':
                this.close();
                break;
        }
    }

    toggleSpinner() {
        if (!this.state.spinner) return;

        if (this.state.spinning) {
            this.state.anim.rotate.pause();
            this.state.anim.stroke.pause();
            this.state.spinning = false;
        } else {
            this.state.anim.rotate.play();
            this.state.anim.stroke.play();
            this.state.spinning = true;
        }
    }

    toggleFrame(action) {
        switch(action) {
            case 'open':
                this.state.frame.classList.add('viewer--is-active');
                this.toggleSpinner();
                break;
            case 'close':
                this.state.frame.classList.remove('viewer--is-active');
                break;
        }
    }

    open(src) {
        if (!src) return;

        this.state.root.classList.add('viewer--is-active');
        
        if (!this.state.spinning) {
            this.toggleSpinner();
        }

        document.body.classList.add('viewer-open');
        this.state.frame.src = src;

        this.state.active = true;
    }

    close() {
        if (!this.state.active) return;

        this.state.root.classList.remove('viewer--is-active');
        this.toggleFrame('close');
        document.body.classList.remove('viewer-open');

        this.state.active = false;
    }

    loadSpinnerAnim() {
        if (!this.state.spinner) return;

        const spinnerCircle = this.state.spinner.firstElementChild;

        this.state.anim.rotate = anime({
            targets: spinnerCircle,
            rotate: '1turn',
            easing: 'linear',
            duration: 2000,
            loop: true,
            autoplay: false
        });

        this.state.anim.stroke = anime({
            targets: spinnerCircle,
            strokeDashoffset: [anime.setDashoffset, 0],
            easing: 'linear',
            duration: 1000,
            loop: true,
            direction: 'alternate',
            autoplay: false
        });
    }

    cacheDom() {
        this.state.root = document.getElementById('js-viewer');
        this.state.frame = this.state.root.querySelector('.js-viewer-frame');
        this.state.spinner = this.state.root.querySelector('.js-viewer-spinner');
    }

    bindEvents() {
        try {
            this.state.root.addEventListener('click', this.handleActions.bind(this));
            this.state.frame.addEventListener('load', this.toggleFrame.bind(this, 'open'));
        } catch(err) {
            console.error('PROJECT_VIEWER: Unable to bind events!', err);
        }
    }
}