<div class="projects">
    <p class="projects__title">Recent Projects</p>
    <hr class="projects__hr">
    <ul class="projects__slider">
        <li class="projects__slide">
            <div class="projects__item">
                <figure class="projects__window">

                </figure>
                <p class="projects__name">Project 1</p>
                <p class="projects__type">WordPress</p>
            </div>
            <div class="projects__item">
                <figure class="projects__window">

                </figure>
                <p class="projects__name">Project 2</p>
                <p class="projects__type">WordPress</p>
            </div>
            <div class="projects__item">
                <figure class="projects__window">

                </figure>
                <p class="projects__name">Project 3</p>
                <p class="projects__type">WordPress</p>
            </div>
            <div class="projects__item">
                <figure class="projects__window">

                </figure>
                <p class="projects__name">Project 4</p>
                <p class="projects__type">WordPress</p>
            </div>
        </li>
    </ul>
     <nav class="projects__nav">
        <button class="projects__control" data-action="PREV">
            <?= get_template_part('svg/chevron-left') ?>
        </button>
        <ul class="projects__anchors">
            <li class="projects__anchor projects__anchor--is-active"></li>
            <li class="projects__anchor"></li>
            <li class="projects__anchor"></li>
        </ul>
        <button class="projects__control" data-action="NEXT">
            <?= get_template_part('svg/chevron-right') ?>
        </button>
    </nav>
</div>