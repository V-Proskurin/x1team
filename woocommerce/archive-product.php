<?php
get_header();
?>

  <div id="content" class="site-content <?= bootscore_container_class(); ?> pb-5 mt-md-2 mt-4">
    <div id="primary" class="content-area">
      <!-- Hook to add something nice -->
      <?php bs_after_primary(); ?>
      <main id="main" class="site-main">
        
        <div class="row">
          <!-- sidebar -->
          <?php get_sidebar(); ?>
          <!-- row -->
          <div class="<?= bootscore_main_col_class(); ?> position-relative">
            <?php  woocommerce_content(); ?>
          </div>
        </div>
      </main><!-- #main -->
    </div><!-- #primary -->
  </div><!-- #content -->
<?php
get_footer();
