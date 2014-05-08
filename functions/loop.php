<?php

function loop(){
	$i = 0;
	// global $wp_query;
	// echo $wp_query->found_posts;
	// echo $wp_query->request;
	// exit;

	if (have_posts()) {
		while (have_posts()) {
			the_post();
			if (is_page()) { ?>
				<div class="row">
					<div class="col-lg-10 col-sm-12 col-sm-offset-0 col-lg-offset-1">
						<?php
							if (shortcode_exists( 'gallery' )) {
								echo do_shortcode('[gallery]');
							}
						?>
					</div>
				</div>
			<?php }
			get_template_part('content', get_post_format() );
			$i++;
		}
		// include TDIR . '/nextprev.php';
	} else {
		get_template_part( 'content', 'none' );
	}
}

?>
