<?php

    $forms = [
        'hire-form'
    ];

?>

<div id="js-forms" class="forms">
    <button class="forms__toggle btn btn-primary js-forms-toggle">
        <?= get_template_part('svg/x') ?>
        Close
    </button>
    <?php 
        foreach($forms as $form) {
            get_template_part('partials/' . $form);
        } 
    ?>
</div>