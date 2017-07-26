<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class HomeFields extends CustomFields {

    public $callbacks = [
        'profile',
        'about'
    ];

    public $hideEditorOn = [
        'templates/front-page.php'
    ];

    protected function profile() {
        $codeLinkIcons = [
            'github' => 'Github',
            'codepen' => 'Codepen'
        ];

        $socialLinkIcons = [
            'email' => 'Email',
            'linkedin' => 'Linked In',
            'spotify' => 'Spotify',
            'instagram' => 'Instagram',
            'code' => 'Code'
        ];

        $fields = [
            Field::make('image', 'avatar', 'Avatar')->set_type('image'),
            Field::make('text', 'name', 'Name'),
            Field::make('text', 'role', 'Role'),
            Field::make('text', 'location', 'Location'),
            Field::make('complex', 'code_links', 'Code Links')
                ->set_layout('tabbed-vertical')
                ->set_max(2)
                ->add_fields('Link', [
                    Field::make('select', 'Icon')->add_options($codeLinkIcons),
                    Field::make('text', 'Link URL'),
                    Field::make('text', 'Link Domain Name'),
                    Field::make('text', 'Link Path Name')
                ]),
            Field::make('complex', 'social_links', 'Social Links')
                ->set_layout('tabbed-vertical')
                ->set_max(5)
                ->add_fields('Link', [
                    Field::make('select', 'Icon')->add_options($socialLinkIcons),
                    Field::make('text', 'Link URL'),
                    Field::make('text', 'Link Text')
                ])
        ];

        return Container::make('post_meta', 'Profile')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }

    protected function about() {
        $skillIcons = [
            'globe' => 'Globe',
            'javascript' => 'Javascript',
            'php' => 'PHP'
        ];

        $fields = [
            Field::make('complex', 'resume', 'Resume')
                ->set_layout('tabbed-vertical')
                ->set_max(3)
                ->add_fields('Job', [
                    Field::make('text', 'Job Date'),
                    Field::make('text', 'Job Role'),
                    Field::make('text', 'Job Link URL'),
                    Field::make('text', 'Job Link Text')
                ]),
            Field::make('complex', 'skills', 'Skills')
                ->set_layout('tabbed-vertical')
                ->set_max(3)
                ->add_fields('Skill', [
                    Field::make('text', 'Skill Level'),
                    Field::make('text', 'Skill Name'),
                    Field::make('select', 'Skill Icon')->add_options($skillIcons),
                    Field::make('complex', 'skill_keywords', 'Skill Keywords')
                        ->add_fields('Keyword', [
                            Field::make('text', 'Keyword')
                        ])
                ])
        ];

        return Container::make('post_meta', 'about')
            ->show_on_post_type('page')
            ->show_on_template('templates/front-page.php')
            ->add_fields($fields);
    }
}

$homeFields = new HomeFields();