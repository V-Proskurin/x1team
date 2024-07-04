<?php
/**
 * Template Post Type: post
 *
 * @version 5.3.1
 */

get_header('unity');
?>

<style>

html {
  margin: 0 !important;
  padding: 0 !important;
}
.py-5 {
  padding: 0 !important;
  margin: 0 !important;
  max-width: 100% !important;
  height: 100svh !important;
}
.content-area {
  width: 100%;
  height: 100%;
}
html .row {
  margin: 0 !important;
  width: 100% !important;
  height: 100% !important;
  padding: 0 !important;
}
html .row .col-lg-9 {
    flex: 0 0 auto;
    width: 100% !important;
    height: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
}

.site-main,
.entry-content,
#unity-container,
#unity-canvas {
    width: 100% !important;
    height: 100% !important;

}

</style>




  <div id="content" class="site-content <?= bootscore_container_class(); ?> py-5 mt-4">
    <div id="primary" class="content-area">
      <div class="row">
        <div class="<?= bootscore_main_col_class(); ?>">
          <main id="main" class="site-main">
            <header class="entry-header">
              <?php the_post(); ?>
              <?php bootscore_post_thumbnail(); ?>
            </header>

            <div class="entry-content">
              <?php the_content(); ?>
            </div>

          </main>

        </div>
      </div>
    </div>
  </div>



  <script>
    setTimeout( function () {
        document.getElementById("unity-canvas").requestFullscreen()
    }, 15000)

</script>

</body>
<?php

// get_footer();
