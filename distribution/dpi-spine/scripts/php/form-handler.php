<?php

namespace Spine\Scripts\PHP;

class FormHandler {

    public function __construct() {
        add_action('wp_ajax_nopriv_form_submission', [$this, 'handleSubmssion']);
    }

    public function handleSubmission() {
        if (!isset($_POST['formValues'])) return;

        $submissions = json_decode(stripslashes($_POST['formValues']));
        file_put_contents(__DIR__ . 'formSubmission.php', $submission);
    }
}

$formHandler = new FormHandler();