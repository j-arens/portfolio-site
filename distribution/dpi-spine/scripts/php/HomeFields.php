<?php

namespace Spine\scripts\php;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

class HomeFields extends CustomFields {

    public $callbacks = [
        'profile'
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
}

$homeFields = new HomeFields();