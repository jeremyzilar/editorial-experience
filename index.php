<?php get_header(); ?>

<div id="blog">
	<?php loop(); ?>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-5">
			<div class="navigation"><p><?php posts_nav_link(); ?></p></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
