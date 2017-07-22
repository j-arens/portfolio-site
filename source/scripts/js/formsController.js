'use-strict';

import AjaxForm from './utils/ajaxform';
import anime from 'animejs';

export default class FormsController extends AjaxForm {
    /**
     * Init
     */
    constructor() {
        super();

        this.state = {
            active: false,
            spinning: false,
            flashInUse: false,
            form: null,
            toggles: null,
            root: null,
            anchor: null,
            recaptchaLoaded: window.recaptchaLoaded
        }

        this.cacheDom();
        this.bindEvents();
    }

    /**
     * Reset all form values
     */
    resetForms() {
        Array.from(this.state.root.querySelectorAll('form')).forEach(form => form.reset());
    }

    /**
     * Render out a google recaptcha on the current form
     */
    renderRecaptcha() {
        if (!this.state.recaptchaLoaded) return;

        const recaptchaRoot = this.state.form.querySelector('.js-recaptcha-root');

        if (!recaptchaRoot.hasChildNodes()) {
            window.grecaptcha.render(recaptchaRoot, {sitekey: '6Ldx3ikUAAAAADU72JAjpgb6_RSVQ9X2dicy7tiL'});
        }
    }

    /**
     * Show or hide forms within the wrapper
     * @param {string} classname 
     * @param {string} action 
     */
    toggleForm(classname, action) {
        if (!classname && action === 'show') return;

        switch(action) {
            case 'show':
                this.state.form = this.state.root.querySelector(`.${classname}`);
                this.state.form.classList.add('form--is-active');
                this.renderRecaptcha();
                break;
            case 'hide':
                this.state.form.classList.remove('form--is-active');
                this.state.form = null;
                break;
        }
    }

    /**
     * Show or hide the form spinner
     */
    toggleSpinner() {
        if (this.state.spinning) {
            this.state.anchor.removeChild(this.state.root.querySelector('.js-form-spinner'));
            this.state.spinning = false;
        } else {
            this.state.anchor.insertAdjacentHTML('beforeend', `
                <div class="js-form-spinner spinner card">
                    <svg class="spinner__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <circle class="spinner__circle" cx="12" cy="12" r="10"></circle>
                    </svg>
                </div>
            `);

            anime({
                targets: '.spinner__circle',
                rotate: '1turn',
                easing: 'linear',
                duration: 2000,
                loop: true
            });

            anime({
                targets: '.spinner__circle',
                strokeDashoffset: [anime.setDashoffset, 0],
                easing: 'linear',
                duration: 1000,
                loop: true,
                direction: 'alternate'
            });

            this.state.spinning = true;
        }
    }

    /**
     * Show or hide the forms wrap
     * @param {object} e
     */
    toggleContainer(e) {
        if (this.state.active) {

            if (this.state.spinning) { 
                this.toggleSpinner();
            }

            if (this.state.flashInUse) {
                this.flashMessage().remove();
            }

            this.resetForms();
            this.toggleForm('', 'hide');
            this.state.root.classList.remove('forms--is-visible');
            this.state.active = false;
        } else {
            this.state.root.classList.add('forms--is-visible');
            this.toggleForm(e.target.dataset.formclass, 'show');
            this.state.active = true;
        }
    }

    /**
     * Display a custom dialog to the user
     * @param {string} type 
     * @param {string} message 
     */
    flashMessage() {
        
        const append = (type, message) => {
            if (this.state.spinning) {
                this.toggleSpinner();
            }

            if (this.state.flashInUse) {
                this.flashMessage().remove();
            }

            this.state.anchor.insertAdjacentHTML('beforeend', `
                <div class="flash card js-flash">
                    <p class="flash__message flash--${type}">${message}</p>
                </div>
            `);

            this.state.flashInUse = true;
        }

        const remove = () => {
            this.state.anchor.removeChild(this.state.anchor.querySelector('.js-flash'));
            this.state.flashInUse = false;
        }

        return {
            append,
            remove
        }
    }

    /**
     * Map form values into an array of objects
     */
    mapFormValues() {
        if (!this.state.form) return;

        const inputs = Array.from(this.state.form.querySelectorAll('[name]'));

        return inputs.map(input => {
            if (!input.name.includes('recaptcha')) {
                return {
                    name: input.getAttribute('name'),
                    value: input.value
                }
            }
        });
    }

    /**
     * Handle form submissions
     * @param {object} e 
     */
    handleSubmit(e) {
        e.preventDefault();

        this.toggleSpinner();

        const data = this.mapFormValues();
        console.log(data);

        super.send({
            url: '/wp-json/forms/v1/submit',
            nonce: this.state.root.dataset.nonce,
            data: {formValues: data}
        }).then(() => {
            this.flashMessage().append('success', 'Thanks! I\'ll get back to you as soon as I can.');
        }).catch(() => {
            this.flashMessage().append('danger', 'Uh oh, there was an error! Please email me directly at arens.joshua@sbcglobal.net.');
        });
    }

    /**
     * Setup event listeners
     */
    bindEvents() {
        try {
            this.state.toggles.forEach(toggle => toggle.addEventListener('click', this.toggleContainer.bind(this)));
            this.state.root.addEventListener('submit', this.handleSubmit.bind(this));
        } catch(e) {
            console.error('FORMS_CONTROLLER: Unable to bind events!', e);
        }
    }

    /**
     * Cache working nodes
     */
    cacheDom() {
        this.state.root = document.getElementById('js-forms');
        this.state.anchor = this.state.root.querySelector('.js-forms-anchor');
        this.state.toggles = Array.from(document.querySelectorAll('.js-forms-toggle'));
    }
}