<?php use Spine\scripts\php\Projects;

    $Projects = new Projects();
    $allProjects = $Projects->getProjects();
    $projectChunks = array_chunk($allProjects, 4);

    function generateSlide($projects, $i) {
        ?>
            <li class="projects__slide js-projects-slide" style="left: <?= ($i * 100) . '%' ?>">
                <?php foreach($projects as $project) { ?>
                    <div class="projects__item">
                        <a class="projects__link" href="<?= $project['link'] ?>" target="_blank" rel="noopener" data-action="VIEW">
                            <figure class="projects__window">
                                <span class="projects__screenshot" style="background-image: url(<?= $project['thumbnail'] ?>)"></span>
                                <span class="projects__link-meta">
                                    <p class="projects__link-text">View Project</p>
                                    <?= get_template_part('svg/browser-link') ?>
                                </span>
                            </figure>
                        </a>
                        <p class="projects__name"><?= $project['name'] ?></p>
                        <p class="projects__type"><?= $project['type'] ?></p>
                    </div>
                <?php } ?>
            </li>
        <?php
    }

?>

<div id="js-projects" class="projects">
    <p class="projects__title">Recent Projects</p>
    <hr class="projects__hr">
    <ul class="projects__slider">
        <?php array_walk($projectChunks, 'generateSlide') ?>
    </ul>
     <nav class="projects__nav">
        <button class="projects__control projects__control--is-disabled" data-action="PREV">
            <?= get_template_part('svg/chevron-left') ?>
        </button>
        <ul class="projects__anchors">
            <?php for($i = 0; $i < count($projectChunks); $i++) { ?>
                <?php if ($i === 0): ?>
                    <li class="projects__anchor projects__anchor--is-active" data-action="ANCHOR" data-anchorIndex="<?= $i ?>"></li>
                <?php else: ?>
                    <li class="projects__anchor" data-action="ANCHOR" data-anchorIndex="<?= $i ?>"></li>
                <?php endif; ?>
            <?php } ?>
        </ul>
        <button class="projects__control <?= count($allProjects) <= 4 ? 'projects__control--is-disabled' : '' ?>" data-action="NEXT">
            <?= get_template_part('svg/chevron-right') ?>
        </button>
    </nav>
</div>