<?php

    $forms = [
        'hire-form',
        'contact-form'
    ];

    print '<pre>';
    var_dump($_SERVER['HTTP_HOST']);
    print '</pre>';

?>

<div id="js-forms" class="forms" data-nonce="<?= wp_create_nonce('wp_rest') ?>">
    <button class="forms__toggle btn btn-primary js-forms-toggle">
        <?= get_template_part('svg/x') ?>
        Close
    </button>
    <div class="forms__anchor js-forms-anchor">
        <?php 
            foreach($forms as $form) {
                get_template_part('partials/' . $form);
            } 
        ?>
    </div>
</div>