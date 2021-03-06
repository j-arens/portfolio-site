<?php

namespace Spine\scripts\php;

class FormHandler {

    private $recaptchaSiteKey = '6Ldx3ikUAAAAADA4FiEGLuQKssZdjAsKphpNHXpx';
    private $recipient = 'arens.joshua@sbcglobal.net';

    /**
    * Setup wordpress mail config options
    */
    public function configMail() {
        add_filter('wp_mail_content_type', function($type) {return 'text/html';});
        add_filter('wp_mail_from_name', function() {return 'Portfolio Site';});
        add_filter('wp_mail_from', function() {return 'wordpress@' . $_SERVER['HTTP_HOST'];});
    }

    /**
    * Register rest api form routes
    */
    public function registerFormRoutes() {
        add_action('rest_api_init', function() {
            register_rest_route('forms/v1', '/submit', [
                'methods' => 'POST',
                'callback' => [$this, 'handleSubmission']
            ]);
        });
    }

    /**
    * Validate recaptcha responses
    */
    private function validateRecaptcha($recaptchaRes) {
        if (!$recaptchaRes) return false;

        $recaptchaValid = wp_remote_post('https://www.google.com/recaptcha/api/siteverify', [
            'body' => [
                'secret' => $this->recaptchaSiteKey,
                'response' => $recaptchaRes
            ]
        ]);

        if (is_wp_error($recaptchaValid) || !json_decode($recaptchaValid['body'])->success) {
            return false;
        }

        return true;
    }

    /**
    * Route and validate form submissions, rest route callback
    */
    public function handleSubmission(\WP_REST_Request $req) {
        $params = $req->get_json_params();

        if (!$this->validateRecaptcha($params['recaptchaRes'])) {
            return new \WP_Error('recaptcha_invalid', 'Recaptcha Invalid', 409);
        }

        if (!empty($params) && array_key_exists('formValues', $params)) {
            wp_mail($this->recipient, 'New Form Submission', $this->emailTemplate($params['formValues']));
            return new \WP_REST_Response('Form Submitted');
        }
        
        return new \WP_Error('validation_error', 'No foram values sent.', 400);
    }

    /**
    * Generate email body and template
    */
    private function emailTemplate($data) {
        $body = array_reduce($data, function($prevInput, $curInput) {
            return $prevInput . '<p style="font-family:sans-serif;font-size:14px;font-weight:normal;margin:0;Margin-bottom:2px;">' . $curInput['name'] . ': ' . $curInput['value'] . '</p>' . PHP_EOL;
        });

        $email = '<!DOCTYPE html>
            <html>
                <head>
                    <meta name="viewport" content="width=device-width">
                    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                    <title>New Online Donation</title>
                    <style type="text/css">
                        @media only screen and (max-width: 620px) {
                        table[class=body] h1 {
                            font-size: 28px !important;
                            margin-bottom: 10px !important; }
                        table[class=body] p,
                        table[class=body] ul,
                        table[class=body] ol,
                        table[class=body] td,
                        table[class=body] span,
                        table[class=body] a {
                            font-size: 16px !important; }
                        table[class=body] .wrapper,
                        table[class=body] .article {
                            padding: 10px !important; }
                        table[class=body] .content {
                            padding: 0 !important; }
                        table[class=body] .container {
                            padding: 0 !important;
                            width: 100% !important; }
                        table[class=body] .main {
                            border-left-width: 0 !important;
                            border-radius: 0 !important;
                            border-right-width: 0 !important; }
                        table[class=body] .btn table {
                            width: 100% !important; }
                        table[class=body] .btn a {
                            width: 100% !important; }
                        table[class=body] .img-responsive {
                            height: auto !important;
                            max-width: 100% !important;
                            width: auto !important; }}
                        @media all {
                        .ExternalClass {
                            width: 100%; }
                        .ExternalClass,
                        .ExternalClass p,
                        .ExternalClass span,
                        .ExternalClass font,
                        .ExternalClass td,
                        .ExternalClass div {
                            line-height: 100%; }
                        .apple-link a {
                            color: inherit !important;
                            font-family: inherit !important;
                            font-size: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                            text-decoration: none !important; }
                        .btn-primary table td:hover {
                            background-color: #34495e !important; }
                        .btn-primary a:hover {
                            background-color: #34495e !important;
                            border-color: #34495e !important; } }
                    </style>
                </head>
                <body class="" style="background-color:#f6f6f6;font-family:sans-serif;-webkit-font-smoothing:antialiased;font-size:14px;line-height:1.4;margin:0;padding:0;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;">
                    <table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background-color:#f6f6f6;width:100%;">
                        <tr>
                            <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                            <td class="container" style="font-family:sans-serif;font-size:14px;vertical-align:top;display:block;max-width:960px;padding:10px;width:100%;Margin:0 auto !important;">
                            <div class="content" style="box-sizing:border-box;display:block;Margin:0 auto;max-width:100%;padding:10px;">
                            <span class="preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;mso-hide:all;visibility:hidden;width:0;">New Form Submission</span>
                            <table class="main" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;background:#fff;border-radius:3px;width:100%;">
                                <tr>
                                    <td class="wrapper" style="font-family:sans-serif;font-size:14px;vertical-align:top;box-sizing:border-box;padding:20px;">
                                        <table border="0" cellpadding="0" cellspacing="0" style="border-collapse:separate;mso-table-lspace:0pt;mso-table-rspace:0pt;width:100%;">
                                            <tr>
                                                <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">
                                                    <p style="font-family:sans-serif;font-size:24px;font-weight:normal;margin:0;Margin-bottom:24px;">Here are the details:</p>
                                                    ' . $body . '
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="font-family:sans-serif;font-size:14px;vertical-align:top;">&nbsp;</td>
                    </tr>
                    </table>
                </body>
            </html>';
        
        return $email;
    }
}

$formHandler = new FormHandler();
$formHandler->configMail();
$formHandler->registerFormRoutes();