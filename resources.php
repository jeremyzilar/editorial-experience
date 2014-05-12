<?php
/*
Template Name: Resources
*/

get_header(); ?>

<section id="resources" class="">
  <div class="container">
      <div class="row">
        <h2 class="heading">Resources</h2>
        <div class="col-sm-6 col-sm-offset-3">
          <p class="blurb"><em>To be an editorial designer today means being prepared to learn continuously and relentlessly. Here are some of our recommended resources for ongoing education, which we'll add to and update over time.</em></p>
        </div>
        </div>
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
              echo <<<EOF
              <div class="row">
              <div class="col-sm-3 col-md-2 col-md-offset-1">
                <h4>$term->name</h4>
              </div>
              <div class="col-sm-9 col-lg-8">

                <div class="row resource-group">
EOF;
              // echo'<h4>'.$term->name.'</h4>';
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
                if (strlen($resource_url) > 40) {
                  $resource_url_short = substr($resource_url,0,40).'...';
                } else {
                  $resource_url_short = $resource_url;
                }

                $resource_html = '<p class="url">&#8594; <a href="'.$resource_url.'"><span>'. $resource_url_short .'</span></a></p>';

                $resource_name = '<h5><img src="http://www.google.com/s2/favicons?domain='.$resource_url.'"/><a href="'.$resource_url.'" title="'.$name.'">'.$name.'</a></h5>';

                echo <<<EOF
                <div class="resource col-sm-6">
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
            echo '</div>';
            echo '</div>';
            echo '</div>';
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
