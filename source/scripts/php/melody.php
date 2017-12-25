<?php

add_filter('rest_prepare_media', function(WP_REST_Response $res): WP_REST_Response { 
    if (!wp_attachment_is('audio')) {
        return $res;
    }

    $post = $res->data;
    $res->data['artwork'] = get_the_post_thumbnail_url($post['id'], 'medium');
    return $res;
});