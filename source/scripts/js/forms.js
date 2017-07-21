'use-strict';

export function formsWrap() {
    const wrapper = document.getElementById('js-forms');
    const toggles = document.querySelectorAll('.js-forms-toggle');

    const state = {
        active: false
    }

    function toggleFormsWrap() {
        if (state.active) {
            wrapper.querySelectorAll('form').forEach(form => form.classList.remove('form--is-active'));
        }

        wrapper.classList.toggle('forms--is-visible');

        state.active = !state.active;
    }

    function toggleForm(formclass) {
        if (!formclass) return;

        const selectedForm = wrapper.querySelector(`.${formclass}`);

        if (selectedForm) {
            selectedForm.classList.add('form--is-active');
        }
    }

    function handleToggle() {
        toggleFormsWrap();
        toggleForm(this.dataset.formclass);
    }

    try {
        toggles.forEach(toggle => toggle.addEventListener('click', handleToggle));
    } catch(e) {
        console.error('FORMS_WRAP: Unable to bind events!', e);
    }

}