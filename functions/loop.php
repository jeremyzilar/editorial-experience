<?php
function loop(){
	$i = 0;
	if (have_posts()) {
		while (have_posts()) {
			the_post();
			get_template_part('content', get_post_format() );
			$i++;
		}
		// include TDIR . '/nextprev.php';
	} else {
		get_template_part( 'content', 'none' );
	}
}
?>
