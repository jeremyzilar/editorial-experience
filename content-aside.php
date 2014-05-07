<?php
  // echo "string";
  $source = get_post_meta( get_the_ID(), 'related_link_source', true );
  $url = get_post_meta( get_the_ID(), 'related_link_url', true );
	$related = '<p class="via"><img src="http://www.google.com/s2/favicons?domain='.$url.'"/><a class="u-in-reply-to" rel="in-reply-to" href="'.$url.'" title="'.$source.'"><strong>'.$source.'</strong> '.substr($url,0,35).'...';$url.'</a></p>';
	$p = get_permalink();
	$c = get_the_content();
?>
<div class="<?php echo GRID; ?>">
	<?php
		edex_the_kicker();
		echo wpautop($c);
		echo get_related();
	?>
  <footer class="entry-meta">
    <?php edex_entry_meta($post->ID); ?>
  </footer><!-- .entry-meta -->
</div>
