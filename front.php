<?php
/*
Template Name: Homepage
*/
get_header();
include 'head.php';

if (have_posts()) {
  while (have_posts()) {
    the_post();?>
    <section id="about">
      <div class="container">
        <?php edex_page_gallery($post);  ?>
        <div class='row'>
          <div class="col-sm-6 col-sm-offset-3">
            <article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>>
              <header class="entry-header">
                <h3 class="entry-title"><?php the_title(); ?></h3>
              </header><!-- .entry-header -->

              <div class="entry-content">
                <?php
                  add_filter('the_content', 'remove_shortcode_from');
                  the_content();
                  remove_filter('the_content', 'remove_shortcode_from')
                ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>blog/" title="Read the Blog" class="btn btn-md btn-blog btn-primary">Read the Blog</a>
              </div><!-- .entry-content -->

            </article>
          </div>
        </div>
      </div>
    </section>
    <?php 
  }
  // include TDIR . '/nextprev.php';
} else {
  get_template_part( 'content', 'none' );
}

include 'interviews.php';

get_footer();

?>
