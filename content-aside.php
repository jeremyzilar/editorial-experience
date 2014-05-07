<div class="<?php echo GRID; ?>">

  <div class="entry-content">
    <?php edex_the_kicker(); ?>
    <?php echo the_content(); ?>
    <?php echo get_related(); ?>
  </div><!-- .entry-content -->

  <footer class="entry-meta">
    <?php edex_entry_meta($post->ID); ?>
  </footer><!-- .entry-meta -->
</div>
