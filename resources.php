<section id="resources" class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <h2>Resources</h2>
        <div class="row">
          <?php

            $taxonomy_objects = get_object_taxonomies( 'resource', 'objects' );
   print_r( $taxonomy_objects);

            $counter = 0;
            $args = array(
              'post_type' => 'resource',
              'posts_per_page' => -1,
              'tax_query' => array(
            		array(
            			'taxonomy' => 'resource',
            			'terms' => 'typography, web-and-mobile-design'
            		)
	            ));

            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
              $name = get_the_title();

              $resource_desc = '';
              $resource_desc = get_post_meta( get_the_ID(), 'resource_desc', true );
              if (!empty($resource_desc)) {
                $resource_desc = '<p class="desc">'.$resource_desc.'</p>';
              }

              $resource_url = '';
              $resource_url = get_post_meta( get_the_ID(), 'resource_url', true );

              $resource_name = '<h4><a href="'.$resource_url.'" title="'.$name.'">'.$name.'</a></h4>';

              echo <<<EOF
              <div class="resource col-lg-6">
                $resource_name
                $resource_desc
                $resource_url
              </div>
EOF;
              if(++$counter % 2 === 0){
                echo '</div>';
                echo '<div class="row">';
              }
            endwhile;
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
