<?php

    $jobs = [
        [
            'date' => '2015 - present',
            'icon' => 'case',
            'role' => 'Product Designer',
            'link' => '#',
            'link_text' => 'Dropbox'
        ],
        [
            'date' => '2012 - 2015',
            'icon' => 'case',
            'role' => 'Designer / Developer',
            'link' => '#',
            'link_text' => 'Facebook'
        ],
        [
            'date' => '2009 - 2012',
            'icon' => 'case',
            'role' => 'Web Developer',
            'link' => '#',
            'link_text' => 'Google'
        ]
    ];

    $skills = [
        [
            'level' => 'Advanced',
            'skill' => 'HTML & CSS',
            'icon' => 'globe',
            'keywords' => [
                'Semantic',
                'Post CSS',
                'Animations & Transitions'
            ]
        ],
        [
            'level' => 'Intermediate',
            'skill' => 'Javascript',
            'icon' => 'javascript',
            'keywords' => [
                'ES6',
                'Node',
                'React',
                'Webpack & Gulp'
            ]
        ],
        [
            'level' => 'Intermediate',
            'skill' => 'PHP',
            'icon' => 'php',
            'keywords' => [
                'OOP',
                'Composer',
                'WordPress'
            ]
        ],
    ];

?>

<div class="about">
    <div class="work about__section">
        <p class="about__title">Work Experience</p>
        <hr class="about__hr">
        <ul class="about__list">
            <?php foreach($jobs as $job) { ?>
                <li class="about__item">
                    <p class="about__item-meta"><?= $job['date'] ?></p>
                    <p class="about__item-title">
                        <span class="about__item-icon"><?= get_template_part('svg/' . $job['icon']) ?></span>
                        <?= $job['role'] ?>
                    </p>
                    <a href="<?= $job['link'] ?>" class="about__item-link"><?= $job['link_text'] ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="skills about__section">
        <p class="about__title">Areas of Skill</p>
        <hr class="about__hr">
        <ul class="about__list">
            <?php foreach($skills as $skill) { ?>
                <li class="about__item">
                    <p class="about__item-meta"><?= $skill['level'] ?></p>
                    <p class="about__item-title">
                        <span class="about__item-icon"><?= get_template_part('svg/' . $skill['icon']) ?></span>
                        <?= $skill['skill'] ?>
                    </p>
                    <ul class="about__item-skills">
                        <?php foreach($skill['keywords'] as $keyword) { ?>
                            <li class="about__item-skill"><?= $keyword ?></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>