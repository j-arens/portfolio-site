'use-strict';

export function formsWrap() {

    const wrapper = document.getElementById('js-forms');
    const toggles = document.querySelectorAll('js-forms-toggle');

    const handleToggle = function() {
        if (this.dataset.formClass) {
            wrapper.classList.add('forms--is-visible');
            wrapper.querySelector(this.dataset.formClass).classList.add('form--is-active');   
        } else {
            wrapper.querySelectorAll('form').classList.remove('form--is-active');
            wrapper.classList.remove('forms--is-visible');
        }
    }

    try {
        toggles.forEach(toggle => toggle.addEventListener('click', handleToggle));
    } catch(e) {
        console.error('FORMS_WRAP: Unable to bind events!', e);
    }

}