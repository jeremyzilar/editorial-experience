<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="sidebar" class="col-sm-3 col-sm-offset-1" role="complementary">
		<div class="sidebar-inner">
			<div class="widget-area">
        <div class="widget">
          <h4 class="widget-title">The Book</h4>
          <div class="entry book-promo">
            <a href="http://www.amazon.com/dp/1592538959/?tag=themapstrsch-20"><img src="<?php echo TDIR; ?>/img/book/edex-cover.gif" class="img-responsive" alt="" /></a>
            <p>Conversations, case studies, and essential principles of editorial design across media, authored by Sue Apfelbaum and Juliette Cezzar.</p>
          </div>
		    </div>

        <div class="widget">
          <h4 class="widget-title">The Authors</h4>
          <div class="entry book-promo">
            <p><strong>Sue Apfelbaum / <a href="https://twitter.com/sueapfe">@sueapfe</a></strong> — Writer, editor, listener, eater, observer.  </p>
            <p><strong>Juliette Cezzar / <a href="https://twitter.com/oubliette">@oubliette</a></strong> — Designer,  educator, author and Director of the Communication Design Program at Parsons the New School for Design in New York City.</p>
          </div>
        </div>


				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!-- .widget-area -->
		</div><!-- .sidebar-inner -->
	</div><!-- #tertiary -->
<?php endif; ?>
