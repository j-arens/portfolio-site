<?php

namespace Spine\Scripts\PHP;

class FormHandler {

    public function __construct() {
        add_action('wp_ajax_nopriv_form_submission', [$this, 'handleSubmssion']);
    }

    public function handleSubmission() {
        $submission = 
    }

}

$formHandler = new FormHandler();