<?php

namespace Spine\scripts\php;

class About {

    public static function getJobs() {
        $jobs = carbon_get_the_post_meta('resume', 'complex');

        if (empty($jobs)) {
            return [];
        }

        return $jobs;
    }

    public static function getSkills() {
        $skills = carbon_get_the_post_meta('skills', 'complex');

        if (empty($skills)) {
            return [];
        }

        return $skills;
    }
}