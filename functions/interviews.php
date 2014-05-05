<?php

add_action('init', 'cptui_register_my_cpt_interview');
function cptui_register_my_cpt_interview() {
register_post_type('interview', array(
'label' => 'Interviews',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'page',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'interview', 'with_front' => true),
'query_var' => true,
'exclude_from_search' => true,
'supports' => array('title','revisions','thumbnail'),
'labels' => array (
  'name' => 'Interviews',
  'singular_name' => 'Interview',
  'menu_name' => 'Interviews',
  'add_new' => 'Add Interview',
  'add_new_item' => 'Add New Interview',
  'edit' => 'Edit',
  'edit_item' => 'Edit Interview',
  'new_item' => 'New Interview',
  'view' => 'View Interview',
  'view_item' => 'View Interview',
  'search_items' => 'Search Interviews',
  'not_found' => 'No Interviews Found',
  'not_found_in_trash' => 'No Interviews Found in Trash',
  'parent' => 'Parent Interview',
)
) ); }






add_action( 'add_meta_boxes', 'interview_details_add' );
function interview_details_add() {
  $types = array( 'interview' );
  foreach( $types as $type ) {
    add_meta_box( 'interview_id', 'Details', 'interview', $type, 'normal', 'high' );
  }

}

function interview( $post )
{
	$values = get_post_custom( $post->ID );
	$bio = isset( $values['interview_bio'] ) ? esc_attr( $values['interview_bio'][0] ) : '';
	$url = isset( $values['interview_url'] ) ? esc_attr( $values['interview_url'][0] ) : '';
	$twitter = isset( $values['interview_twitter'] ) ? esc_attr( $values['interview_twitter'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #interview_box{}
	  #interview_box label,
	  #interview_box input,
	  #interview_box small{}
	  #interview_box label{
	    padding:0 2px;
	  }
    #interview_source{
      width:30%;
    }
    #interview_bio,
    #interview_url,
    #interview_twitter{
      width:100%;
    }
    #interview_box small{
      padding:0 3px;
      color:#999;
    }
	</style>

	<div id="interview_box">
  	<p>
  		<label for="interview_bio">Short Bio</label><br />
  		<input type="text" name="interview_bio" id="interview_bio" value="<?php echo $bio; ?>" /><br />
  		<small>e.g. Chief Creative Officer, The New York Times</small>
  	</p>

    <p>
      <label for="interview_url">Site URL</label><br />
      <input type="text" name="interview_url" id="interview_url" value="<?php echo $url; ?>" /><br />
      <small>e.g. http://silencematters.com</small>
    </p>

    <p>
      <label for="interview_twitter">Twitter URL</label><br />
      <input type="text" name="interview_twitter" id="interview_twitter" value="<?php echo $twitter; ?>" /><br />
      <small>e.g. https://twitter.com/jeremyzilar</small>
    </p>
	</div><!-- #interviews_box -->
	<?php
}


add_action( 'save_post', 'interview_save' );
function interview_save( $post_id )
{
	// Bail if we're doing an auto save
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;

	// if our nonce isn't there, or we can't verify it, bail
	if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;

	// if our current user can't edit this post, bail
	if( !current_user_can( 'edit_post' ) ) return;

	// now we can actually save the data
	$allowed = array(
		'a' => array( // on allow a tags
			'href' => array() // and those anchords can only have href attribute
		)
	);

	// Probably a good idea to make sure your data is set
	if( isset( $_POST['interview_bio'] ) )
		update_post_meta( $post_id, 'interview_bio', wp_kses( $_POST['interview_bio'], $allowed ) );

  if( isset( $_POST['interview_twitter'] ) )
    update_post_meta( $post_id, 'interview_twitter', wp_kses( $_POST['interview_twitter'], $allowed ) );

  if( isset( $_POST['interview_url'] ) )
    update_post_meta( $post_id, 'interview_url', wp_kses( $_POST['interview_url'], $allowed ) );
}


?>
