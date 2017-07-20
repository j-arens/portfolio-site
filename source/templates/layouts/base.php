<?php

  use Spine\Lib\Template;

 ?>

<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'spine'); ?>
      </div>
    <![endif]-->
    <div class="wrap" role="document">
      <main class="main">
        <?php load_template(template()->main()); ?>
      </main>
    </div>
    <?= wp_footer(); ?>
  </body>
</html>
