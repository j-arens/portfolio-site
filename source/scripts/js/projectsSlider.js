import anime from 'animejs';

export default class ProjectsSlider {
    /**
     * Init
     */
    constructor() {
        this.state = {
            previousSlide: 0,
            currentSlide: 0,
            root: null,
            slides: null,
            controls: null,
            anchors: null
        }

        this.cacheDom();
        this.bindEvents();
    }

    /**
     * Disable or enable controls
     */
    updateControls() {
        this.state.anchors[this.state.previousSlide].classList.remove('projects__anchor--is-active');
        this.state.anchors[this.state.currentSlide].classList.add('projects__anchor--is-active');

        this.state.controls.forEach(ctrl => ctrl.classList.remove('projects__control--is-disabled'));

        if (this.state.currentSlide === 0) {
            this.state.controls[0].classList.add('projects__control--is-disabled');
        } else if (this.state.currentSlide === (this.state.slides.length - 1)) {
            this.state.controls[1].classList.add('projects__control--is-disabled');
        }
    }

    /**
     * Change the slider to to a new slide by index
     * @param {number} idx 
     */
    toggleSlide(idx = 0) {
        if (!this.state.slides[idx] || idx === this.state.currentSlide) return;

        const slides = this.state.slides;
        const delta = idx > this.state.currentSlide ? idx - this.state.currentSlide : this.state.currentSlide - idx;

        anime({
            targets: slides,
            easing: 'easeOutQuint',
            duration: 250,
            left: (el) => {
                const currentPos = parseInt(el.style.left);

                if (idx < this.state.currentSlide) {
                    return `${currentPos + (delta * 100)}%`;
                } else if (idx > this.state.currentSlide) {
                    return `${currentPos - (delta * 100)}%`
                }

                return '0%';
            }
        });

        this.state.previousSlide = this.state.currentSlide;
        this.state.currentSlide = idx;
        this.updateControls();
    }

    /**
     * Route click events
     * @param {object} e 
     */
    handleAction(e) {
        const action = e.target.dataset.action;

        if (!action) return;

        switch(action) {
            case 'NEXT':
                this.toggleSlide(this.state.currentSlide + 1);
                break;
            case 'PREV':
                this.toggleSlide(this.state.currentSlide - 1);
                break;
            case 'ANCHOR':
                this.toggleSlide(parseInt(e.target.dataset.anchorindex));
                break;
        }
    }

    /**
     * Setup event listeners
     */
    bindEvents() {
        try {
            this.state.root.addEventListener('click', this.handleAction.bind(this));
        } catch(err) {
            console.error('PROJECTS_SLIDER: Unable to binde events!', err);
        }
    }

    /**
     * Cache working nodes
     */
    cacheDom() {
        this.state.root = document.getElementById('js-projects');
        this.state.slides = Array.from(this.state.root.querySelectorAll('.js-projects-slide'));
        this.state.controls = Array.from(this.state.root.querySelectorAll('button[data-action]'));
        this.state.anchors = this.state.root.querySelectorAll('li[data-anchorindex]');
    }
}