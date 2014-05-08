<?php if (is_front_page()) {
  include 'authors.php';
} ?>

  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <?php $curYear = date('Y'); ?>
        	<p><a href="<?php bloginfo( 'url' ); ?>"><strong><?php bloginfo( 'name' ); ?></strong></a> <span class="copyright">&#169;</span> <?php echo $curYear; ?> Sue Apfelbaum and Juliette Cezzar</p>

        </div>
      </div>
    </div>
  </section>

<?php wp_footer(); ?>

</body>
</html>
