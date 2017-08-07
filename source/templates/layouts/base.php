<!doctype html>
<html <?php language_attributes(); ?>>
  <?php get_template_part('partials/head'); ?>
  <body <?php body_class(); ?>>

    <noscript>
        <p class="browserupgrade">
            You need to have JavaScript enabled to properly view this site.
        </p>
    </noscript>

    <!-- warn IE users to upgrade to a better browser -->
    <script>
        if (!(window.ActiveXObject) && 'ActiveXObject' in window) {
            document.body.insertAdjacentHTML(
                'afterbegin', 
                '<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://outdatedbrowser.com/">upgrade your browser</a> to view this site properly.<p>'
            );
        }
    </script>

    <div class="wrap" role="document">
      <main class="main">
        <?php load_template(Spine\scripts\php\template()->main()); ?>
      </main>
    </div>
    <?= get_template_part('partials/form-wrap') ?>
    <?= wp_footer(); ?>
  </body>
</html>
