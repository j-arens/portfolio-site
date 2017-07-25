<?php

namespace Spine\scripts\php;

class FormHandler {

    private $recipient = 'arens.joshua@sbcglobal.net';

    public function configMail() {
        add_filter('wp_mail_content_type', function($type) {return 'text/html';});
        add_filter('wp_mail_from_name', function() {return 'Portfolio Site';});
        add_filter('wp_mail_from', function() {return 'wordpress@' . $_SERVER['HTTP_HOST'];});
    }

    public function registerFormRoutes() {
        add_action('rest_api_init', function() {
            register_rest_route('forms/v1', '/submit', [
                'methods' => 'POST',
                'callback' => [$this, 'handleSubmission']
            ]);
        });
    }

    public function handleSubmission(\WP_REST_Request $req) {
        $formValues = $req->get_json_params();

        if (empty($formValues)) {
            return new \WP_Error('validation_error', 'No form values sent.', 400);
        }

        
        $this->sendMail($formValues);

        $res = new \WP_REST_Response('Form submitted.');
        $res->status_code(200);
        return $res;
        
    }

    private function sendMail($data) {
        wp_mail($this->recipient, 'New Form Submission', $this->emailTemplate($data));
    }

    private function emailTemplate($data) {
        $body = array_reduce($data, function($input) {
            return '<p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">' . $input['name'] . ': ' . $input['value'] . '</p>';
        });

        return include get_template_directory() . '/templates/email/form-submission.php';
    }
}

$formHandler = new FormHandler();
$formHandler->configMail();
$formHandler->registerFormRoutes();