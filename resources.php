<section id="resources" class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <h2>Resources</h2>
        <div class="row resource-group">
          <?php
            $taxonomy_objects = get_object_taxonomies( 'resource', 'objects' );

            $menu_items = wp_get_nav_menu_items( 'resources' );
            foreach ($menu_items as $item) {
              $term = get_term( $item->object_id, 'resource' );
              $counter = 0;
              $args = array(
                'post_type' => 'resource',
                'posts_per_page' => -1,
                'tax_query' => array(
              		array(
              			'taxonomy' => 'resource',
                    'field' => 'slug',
              			'terms' => $term->slug
              		)
              	)
              );
              echo'<h4>'.$term->name.'</h4>';
              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();
              // print_r($loop);
                $name = get_the_title();

                $resource_desc = '';
                $resource_desc = get_post_meta( get_the_ID(), 'resource_desc', true );
                if (!empty($resource_desc)) {
                  $resource_desc = '<p class="desc">'.$resource_desc.'</p>';
                }

                $resource_url = '';
                $resource_url = get_post_meta( get_the_ID(), 'resource_url', true );
                $resource_html = '<p class="url"><a href="'.$resource_url.'"><img src="http://www.google.com/s2/favicons?domain='.$resource_url.'"/><span>'.substr($resource_url,0,50).'...';$resource_url.'</span></a></p>';

                $resource_name = '<h5><a href="'.$resource_url.'" title="'.$name.'">'.$name.'</a></h5>';

                echo <<<EOF
                <div class="resource col-lg-6">
                  $resource_name
                  $resource_desc
                  $resource_html
                </div>
EOF;
                if ($loop->post_count == $loop->current_post+1) {
                  echo '</div>';
                  echo '<div class="row resource-group">';
                }
                if(++$counter % 2 === 0){
                  echo '</div>';
                  echo '<div class="row">';
                }
              endwhile;
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
