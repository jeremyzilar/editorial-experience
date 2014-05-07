<?php include 'resources.php'; ?>
<?php include 'authors.php'; ?>

  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <?php $curYear = date('Y'); ?>
        	<p><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a> <span class="copyright">&#169;</span> copyright <?php echo $curYear; ?></p>
        </div>
      </div>
    </div>
  </section>

<?php wp_footer(); ?>

</body>
</html>
