<?php 

    $socialLinks = [
        [
            'link' => '#',
            'link_text' => 'jarens@diocesan.com',
            'icon' => 'email'
        ],
        [
            'link' => '#',
            'link_text' => 'linkedin.com/in/j-arens',
            'icon' => 'linkedin'
        ],
        [
            'link' => '//open.spotify.com/user/interllarco',
            'link_text' => 'open.spotify.com/user/interllarco',
            'icon' => 'spotify'
        ],
        [
            'link' => '//instagram.com/jrsteetboys',
            'link_text' => 'instagram.com/jrsteetboys',
            'icon' => 'instagram'
        ],
        [
            'link' => '#',
            'link_text' => 'Source code for this site',
            'icon' => 'code'
        ]
    ];

?>

<section class="card profile">
    <div class="profile__person">
        <figure class="profile__avatar">
            <img src="https://source.unsplash.com/random/250x250" alt="mugshot" class="profile__img">
        </figure>
        <h1 class="profile__name">Name Here</h1>
        <h2 class="profile__tagline">Position Here</h2>
        <p class="profile__location">The Location</p>
    </div>
    <div class="profile__contact">
        <button class="btn btn-primary profile__btn js-forms-toggle" data-formclass="js-hire-me">
            Button 1
        </button>
        <button class="btn btn-secondary profile__btn js-forms-toggle" data-formclass="js-contact-me">
            Button 2
        </button>
    </div>
    <div class="profile__code-links">
        <a href="//codepen.io/j-arens/" target="_blank" rel="noopener" class="profile__code-link">
            <span class="profile__link-icon">
                <?= get_template_part('svg/codepen') ?>
            </span>
            <span class="profile__link-meta-container">
                <p class="profile__link-domain">codepen.com/</p>
                <p class="profile__link-path">j-arens</p>
            </span>
        </a>
        <a href="//github.com/j-arens" target="_blank" rel="noopener" class="profile__code-link">
            <span class="profile__link-icon">
                <?= get_template_part('svg/github') ?>
            </span>
            <span class="profile__link-meta-container">
                <p class="profile__link-domain">github.com/</p>
                <p class="profile__link-path">j-arens</p>
            </span>
        </a>
    </div>
    <ul class="profile__social-links">
        <?php foreach($socialLinks as $link) { ?>
            <li class="profile__social-link-item">
                <a href="<?= $link['link'] ?>" class="profile__social-link">
                    <span class="profile__link-icon">
                        <?= get_template_part('svg/' . $link['icon']) ?>
                    </span>
                    <?= $link['link_text'] ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</section>