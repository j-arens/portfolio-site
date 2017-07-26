<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'spine'); ?>
      </div>
    <![endif]-->
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
