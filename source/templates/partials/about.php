<?php use Spine\scripts\php\About; ?>

<div class="about">
    <div class="work about__section">
        <p class="about__title">Work Experience</p>
        <hr class="about__hr">
        <ul class="about__list">
            <?php foreach(About::getJobs() as $job) { ?>
                <li class="about__item">
                    <p class="about__item-meta"><?= $job['job_date'] ?></p>
                    <p class="about__item-title">
                        <span class="about__item-icon"><?= get_template_part('svg/case') ?></span>
                        <?= $job['job_role'] ?>
                    </p>
                    <a href="<?= $job['job_link_url'] ?>" class="about__item-link"><?= $job['job_link_text'] ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="skills about__section">
        <p class="about__title">Areas of Skill</p>
        <hr class="about__hr">
        <ul class="about__list">
            <?php foreach(About::getSkills() as $skill) { ?>
                <li class="about__item">
                    <p class="about__item-meta"><?= $skill['skill_level'] ?></p>
                    <p class="about__item-title">
                        <span class="about__item-icon"><?= get_template_part('svg/' . $skill['skill_icon']) ?></span>
                        <?= $skill['skill_name'] ?>
                    </p>
                    <ul class="about__item-skills">
                        <?php foreach($skill['skill_keywords'] as $keyword) { ?>
                            <li class="about__item-skill"><?= $keyword['keyword'] ?></li>
                        <?php } ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>