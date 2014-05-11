<?php
include_once 'functions/wp_enqueue_script.php';
include_once 'functions/loop.php';
include_once 'functions/images.php';
include_once 'functions/related-link.php';
include_once 'functions/kicker.php';
include_once 'functions/interviews.php';
include_once 'functions/resources.php';
include_once 'functions/theme-options.php';


// Variables
$tdir = get_template_directory_uri();
define('TDIR', $tdir);

$root = get_template_directory();
define('ROOT', $root);

// Includes Path
$inc = $root . '/inc/';
define('INC', $inc);

// The Common Grid — used in multiple places
$grid = 'col-lg-7 col-md-7 col-sm-7';
define('GRID', $grid);

// Hide WP Admin Bar
add_filter('show_admin_bar', '__return_false');


// WP Theme Supports
add_theme_support( 'post-formats', array( 'aside', 'gallery', 'image',  'video', 'audio', 'chat', 'status', 'quote', 'link') );
add_theme_support( 'infinite-scroll', array(
	'type'			 		 => 'click',
	'container' 		 => 'entry-box',
	'render'  		 	 => 'loop',
	'footer' => 'page'
) );
add_theme_support( 'post-thumbnails' );

// Register a Menu
function edex_register_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'edex_register_menu' );



add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
	if( in_array('current-menu-item', $classes) ){
		$classes[] = 'active ';
	}
	return $classes;
}



if (!is_admin()) {
	// If Logged In, Add DRAFTS to Query
	if ( is_user_logged_in() ) {
		add_action( 'pre_get_posts', 'add_my_post_status_to_query' );
		function add_my_post_status_to_query( $query ) {
			if ( is_home() && $query->is_main_query() || is_feed())
				$query->set(
					'post_status', array('publish', 'pending', 'draft', 'future', 'private', 'inherit')
				);
			return $query;
		}
	}

}



function edex_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Widgets', 'edex' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Appears on the blog.', 'edex' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'edex_widgets_init' );





function edex_get_link_url() {
	$has_url = get_the_post_format_url();
	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}




// Entry Meta
if ( ! function_exists( 'edex_entry_meta' ) ) :
function edex_entry_meta($id) {

	$tweet = get_the_title() . ' by @' . get_the_author_meta('twitter') . ' ' . get_permalink() . '?btn-twitter';
	echo '<a data-msg="'. rawurlencode($tweet) .'" class="btn btn-xs btn-default btn-twitter" href="twitter://post?message='. rawurlencode($tweet) .'">Tweet</a> ';
  edex_entry_date();

	echo ' <a class="hidden" href="http://edex.com" rel="author">Jeremy Zilar</a>';

	if ( is_user_logged_in() ) {
		$edit = get_edit_post_link($id);
		echo '<a href="'.$edit.'" class="btn-edit btn btn-xs btn-primary">edit</a>';
	}

	if (is_single()){
		// Translators: used between list items, there is a space after the comma.
		$tag_list = get_the_tag_list( '', __( ', ', 'twentythirteen' ) );
		if ( $tag_list ) {
			echo ' <span class="tags-links pull-right">' . $tag_list . '</span>';
		}
	}
}
endif;




// CATEGORY
function edex_category(){
  if (!is_category()) {
    foreach((get_the_category()) as $category) {
      if ($category->cat_name !== 'Uncategorized') {
        echo ' <a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'</a> ';
      }
    }
  }
}




// DATE
if ( ! function_exists( 'edex_entry_date' ) ) :
function edex_entry_date( $echo = true ) {
  $date = '<a class="date" href="'.get_permalink().'" title="'.the_title_attribute( 'echo=0' ).'" rel="bookmark"><time class="dt-published published entry-date rel_time" datetime="'.get_the_date('c').'">'.get_the_time('g:i a').' (<span>'.get_the_time('F j, Y g:i a').'</span>)</time></a>';
  echo $date;
  return $date;
}
endif;


// Archive Head
function get_archive_head(){
	if (is_category()) {
		$cat = get_query_var('cat');
		$category=get_category($cat);
		$desc = ($category->description !== '') ? '<span>— </span>' . $category->description : '';
		echo <<<EOF
			<div class="archive-hed col-lg-7 col-md-8 col-sm-9 col-md-offset-2 col-sm-offset-3">
				<p><strong>$category->name</strong> $desc</p>
			</div>
EOF;
	}
}


// Custom Page Gallery
function edex_page_gallery($post){
	echo <<<EOF
	<div class="row">
		<div class="col-lg-10 col-sm-12 col-sm-offset-0 col-lg-offset-1">
EOF;

		if (shortcode_exists( 'gallery' )) {
			// echo do_shortcode('[gallery]');
			if ( gallery_shortcode($post->ID) ){
				$pattern = get_shortcode_regex();
				$matches = array();
				preg_match("/$pattern/s", get_the_content(), $matches); //just finds the first one
				echo do_shortcode($matches[0]);
			}
			// echo do_shortcode('[gallery link="none" ids="69,71,70,72,73,75,74,76,77,79,78,80,81,83,82"]');
		}

		echo <<<EOF
		</div>
	</div>
EOF;
}


function remove_shortcode_from($content) {
  $content = strip_shortcodes( $content );
  return $content;
}

add_filter( 'wp_title', 'baw_hack_wp_title_for_home' );
function baw_hack_wp_title_for_home( $title )
{
  if( empty( $title ) && ( is_home() || is_front_page() ) ) {
    return __( get_bloginfo( 'name' ), 'theme_domain' ) . ' | ' . get_bloginfo( 'description' );
  }
  return $title;
}

// Add Fields to User Profiles
function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['gplus'] = 'Google+ URL';

	// Remove old fields
	unset($profile_fields['aim']);

	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');

?>
