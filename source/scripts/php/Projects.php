<?php

namespace Spine\scripts\php;

class Projects {

    /**
    * Get theme screenshot
    */
    private function getThumbnail(array $themes, $slug) {
        if (array_key_exists($slug, $themes)) {
            return $themes[$slug]->get_screenshot();
        }

        return '//source.unsplash.com/collection/158642/500x500';
    }

    /**
    * Remove the current site(portfolio) from sites list
    */
    private function extractPortfolio(array $sites) {
        $portfolioID = get_current_blog_id();

        return array_filter($sites, function($site) use ($portfolioID) {
            return $site->blog_id != $portfolioID;
        });
    }

    /**
    * Get all sites and format
    */
    public function getProjects() {
        $sites = get_sites(['order' => 'DESC', 'public' => 1]);
        $themes = wp_get_themes();

        if (empty($sites)) {
            return [];
        }

        return array_map(function($site) use ($themes) {
            $themeSlug = get_blog_option($site->blog_id, 'stylesheet');

            return [
                'name' => wp_trim_words(get_blog_option($site->blog_id, 'blogname'), 3, '...'),
                'type' => wp_trim_words(get_blog_option($site->blog_id, 'blogdescription'), 3, '...'),
                'thumbnail' => $this->getThumbnail($themes, $themeSlug),
                'link' => get_blog_option($site->blog_id, 'siteurl ')
            ];

        }, $this->extractPortfolio($sites));
    }
}