const carbonHelper = ((templates) => {

    let templateSelector,
        mceEditor;

    const handleChange = (e) => {
        if (!e.target.value || !mceEditor) return;

        const template = e.target.value;

        templates.forEach(templateArr => {
            if (templateArr.includes(template)) {
                window.tinymce.editors[0].hide();
                mceEditor.classList.add('carbon-hide-editor');
            } else {
                mceEditor.classList.remove('carbon-hide-editor');
                window.tinymce.editors[0].show();
            }
        });
    }

    const bindEvents = () => {
        try {
            templateSelector.addEventListener('change', handleChange);
        } catch(e) {
            console.error('CARBON_HELPERS: Unable to bind events!', e);
        }
    }

    const cacheDom = () => {
        templateSelector = document.getElementById('page_template');
        mceEditor = document.getElementById('postdivrich');
    }

    const main = () => {
        cacheDom();
        bindEvents();
    }
    
    const docReady = (...fnx) => {
        if (document.attachEvent ? document.readyState === "complete" : document.readyState !== "loading") {
            fnx.forEach(fn => fn());
        } else {
            document.addEventListener('DOMContentLoaded', () => fnx.forEach(fn => fn()));
        }
    }

    return {
        init() {
            docReady(main);
        }
    }

})(window.carbonTemplates);

carbonHelper.init();