<?php
/**
 * Template Name: Homepage Template
 */

    $components = [
        'profile',
        'resume'
    ];

    if (empty($components)) {
        print '<p>Uh oh, there aren\'t any homepage components!</p>';
        exit();
    };

    foreach($components as $comp) {
        get_template_part('partials/' . $comp);
    }

?>
