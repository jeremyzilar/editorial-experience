<?php if (is_front_page()) {
  include 'authors.php';
} ?>

  <section id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-10">
          <?php $curYear = date('Y'); ?>
        	<p><a href="<?php bloginfo( 'url' ); ?>"><strong><?php bloginfo( 'name' ); ?></strong></a> <span class="copyright">&#169;</span> <?php echo $curYear; ?> Sue Apfelbaum and Juliette Cezzar <br/> <a>Site by <a href="http://jeremyzilar.com/?=edex">Jeremy Zilar</a></p>
        </div>
      </div>
    </div>
  </section>

<?php wp_footer(); ?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27200315-2', 'editorialexperience.com');
  ga('send', 'pageview');

</script>


</body>
</html>
