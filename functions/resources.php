<?php

add_action('init', 'cptui_register_my_cpt_resource');
function cptui_register_my_cpt_resource() {
register_post_type('resource', array(
'label' => 'Resources',
'description' => '',
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'capability_type' => 'page',
'map_meta_cap' => true,
'hierarchical' => false,
'rewrite' => array('slug' => 'resource', 'with_front' => true),
'query_var' => true,
'exclude_from_search' => true,
'supports' => array('title','revisions'),
'labels' => array (
  'name' => 'Resources',
  'singular_name' => 'Resource',
  'menu_name' => 'Resources',
  'add_new' => 'Add Resource',
  'add_new_item' => 'Add New Resource',
  'edit' => 'Edit',
  'edit_item' => 'Edit Resource',
  'new_item' => 'New Resource',
  'view' => 'View Resource',
  'view_item' => 'View Resource',
  'search_items' => 'Search Resources',
  'not_found' => 'No Resources Found',
  'not_found_in_trash' => 'No Resources Found in Trash',
  'parent' => 'Parent Resource',
)
) ); }






add_action( 'add_meta_boxes', 'resource_details_add' );
function resource_details_add() {
  $types = array( 'resource' );
  foreach( $types as $type ) {
    add_meta_box( 'resource_id', 'Details', 'resource', $type, 'normal', 'high' );
  }

}

function resource( $post )
{
	$values = get_post_custom( $post->ID );
	$desc = isset( $values['resource_desc'] ) ? esc_attr( $values['resource_desc'][0] ) : '';
	$url = isset( $values['resource_url'] ) ? esc_attr( $values['resource_url'][0] ) : '';
	wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
	?>
	<style type="text/css" media="screen">
	  #resource_box{}
	  #resource_box label,
	  #resource_box input,
	  #resource_box small{}
	  #resource_box label{
	    padding:0 2px;
	  }
    #resource_source{
      width:30%;
    }
    #resource_desc{
      height:100px;
    }
    #resource_desc,
    #resource_url{
      width:100%;
    }
    #resource_box small{
      padding:0 3px;
      color:#999;
    }
	</style>

	<div id="resource_box">
  	<p>
  		<label for="resource_bio">Description</label><br />
      <textarea name="resource_desc" id="resource_desc"><?php echo $desc; ?></textarea>
  		<small>e.g. Chief Creative Officer, The New York Times</small>
  	</p>

    <p>
      <label for="resource_url">Site URL</label><br />
      <input type="text" name="resource_url" id="resource_url" value="<?php echo $url; ?>" /><br />
      <small>e.g. http://silencematters.com</small>
    </p>
	</div><!-- #resources_box -->
	<?php
}


add_action( 'save_post', 'resource_save' );
function resource_save( $post_id )
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
	if( isset( $_POST['resource_desc'] ) )
		update_post_meta( $post_id, 'resource_desc', wp_kses( $_POST['resource_desc'], $allowed ) );

  if( isset( $_POST['resource_url'] ) )
    update_post_meta( $post_id, 'resource_url', wp_kses( $_POST['resource_url'], $allowed ) );
}


?>
