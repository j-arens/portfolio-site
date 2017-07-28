<?php use Spine\scripts\php\Profile; ?>

<section class="profile card-bp-lg">
    <div class="profile__half card-bp-md">
        <div class="profile__person">
            <figure class="profile__avatar">
                <img src="<?= Profile::getAvatar() ?>" alt="mugshot" class="profile__img">
            </figure>
            <h1 class="profile__name"><?= Profile::getName() ?></h1>
            <h2 class="profile__tagline"><?= Profile::getRole() ?></h2>
            <p class="profile__location"><?= Profile::getLocation() ?></p>
        </div>
        <div class="profile__contact">
            <button class="btn btn-primary profile__btn js-forms-toggle" data-formclass="js-hire-me">
                Hire Me
            </button>
            <button class="btn btn-secondary profile__btn js-forms-toggle" data-formclass="js-contact-me">
                Contact Me
            </button>
        </div>
    </div>
    <div class="profile__half profile__half-links card-bp-md">
        <div class="profile__code-links">
            <?php foreach(Profile::getCodeLinks() as $link) { ?>
                <a href="<?= $link['link_url'] ?>" target="_blank" rel="noopener" class="profile__code-link">
                    <span class="profile__link-icon">
                        <?= get_template_part('svg/' . $link['icon']) ?>
                    </span>
                    <span class="profile__link-meta-container">
                        <p class="profile__link-domain"><?= $link['link_domain_name'] ?></p>
                        <p class="profile__link-path"><?= $link['link_path_name'] ?></p>
                    </span>
                </a>
            <?php } ?>
        </div>
        <ul class="profile__social-links">
            <?php foreach(Profile::getSocialLinks() as $link) { ?>
                <li class="profile__social-link-item">
                    <a href="<?= $link['link_url'] ?>" class="profile__social-link">
                        <span class="profile__link-icon">
                            <?= get_template_part('svg/' . $link['icon']) ?>
                        </span>
                        <?= $link['link_text'] ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>