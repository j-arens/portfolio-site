<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>

    <!-- warn IE users to upgrade to a better browser -->
    <script>
        if (!(window.ActiveXObject) && 'ActiveXObject' in window) {
            document.body.insertAdjacentHTML(
                'afterbegin', 
                '<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://outdatedbrowser.com/">upgrade your browser</a> to view this site properly.<p>'
            );
        }
    </script>

    <!--  feature detect mix-blend-mode  -->
    <script>
      if ('mixBlendMode' in document.body.style) {
          document.body.classList.add('supports-mixBlendMode');
      }
    </script>

    <?= get_template_part('svg/topography') ?>
    <div class="wrap" role="document">
      <main class="main">
        <?php load_template(Spine\scripts\php\template()->main()); ?>
      </main>
    </div>
    <?= get_template_part('partials/form-wrap') ?>
    <?= wp_footer(); ?>
  </body>
</html>
