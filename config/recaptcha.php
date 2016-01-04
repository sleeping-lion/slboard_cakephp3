<?php
/**
 * Recaptcha Default Configuration
 *
 * @author   cake17
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://blog.cake-websites.com/
 */
return [
    'Recaptcha' => [
        // Register API keys at https://www.google.com/recaptcha/admin
        'sitekey' => '6Lf-nwITAAAAAJRZPOcMMQboPfa-jWV7UjC28o1F',
        'secret' => '6Lf-nwITAAAAAIz6bf0HnKxk3k8aceXLSXAiHsxl',
        // reCAPTCHA supported 40+ languages listed
        // here: https://developers.google.com/recaptcha/docs/language
        'lang' => 'en',
        // either light or dark
        'theme' => 'light',
        // either image or audio
        'type' => 'image',
    ]
];
