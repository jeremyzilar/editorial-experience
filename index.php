<?php get_header(); ?>

<div id="blog">
	<div class="row">

		<div class="<?php echo GRID; ?>">
			<div class="blog-head">
				<h1>Designing the Editorial Experience</h1>
				<h3>News &amp; Insights on Editorial Design Across Media</h3>
				<div class="divider"></div>
			</div>
			<?php loop(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
