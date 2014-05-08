<?php get_header(); ?>

<div id="page">
	<div class="row">
		<div class="<?php echo GRID; ?>">
			<?php loop(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>
