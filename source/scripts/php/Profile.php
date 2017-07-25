<?php

namespace Spine\scripts\php;

class Profile {

    /**
    * Avatar
    */
    public static function getAvatar() {
        $imgID = carbon_get_the_post_meta('avatar');

        $imgSRC = wp_get_attachment_image_src($imgID, 'medium');

        if (empty($imgSRC)) {
            return 'https://source.unsplash.com/random/250x250';
        }

        return $imgSRC[0];
    }

    /**
    * Name
    */
    public static function getName() {
        $name = carbon_get_the_post_meta('name');

        if (!$name) {
            return 'John Doe';
        }

        return $name;
    }

    /**
    * Role
    */
    public static function getRole() {
        $role = carbon_get_the_post_meta('role');

        if (!$role) {
            return 'Being Awesome';
        }

        return $role;
    }

    /**
    * Location
    */
    public static function getLocation() {
        $location = carbon_get_the_post_meta('location');

        if (!$location) {
            return 'Cooltown, MI';
        }

        return $location;
    }

    /**
    * Code links
    */
    public static function getCodeLinks() {
        $codeLinks = carbon_get_the_post_meta('code_links', 'complex');

        if (empty($codeLinks)) {
            return [];
        }

        return $codeLinks;
    }

    /**
    * Social links
    */
    public static function getSocialLinks() {
        $socialLinks = carbon_get_the_post_meta('social_links', 'complex');

        if (empty($socialLinks)) {
            return [];
        }

        return $socialLinks;
    }

}