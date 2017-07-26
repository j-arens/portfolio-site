<div id="js-viewer" class="viewer">
    <header class="viewer__header">
        <button class="viewer__control" data-action="CLOSE">
            <?= get_template_part('svg/x') ?>
            Close   
        </button>
    </header>
    <div class="viewer__spinner">
        <svg class="spinner__icon js-viewer-spinner" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <circle class="spinner__circle" cx="12" cy="12" r="10"></circle>
        </svg>
    </div>
    <iframe class="viewer__frame js-viewer-frame" src=""></iframe>
</div>