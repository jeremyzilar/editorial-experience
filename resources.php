<section id="resources" class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <h2>Resources</h2>
        <div class="row">
          <div class="col-lg-6">

            <?php

              $args = array( 'post_type' => 'resource', 'posts_per_page' => -1 );

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

                $resource_name = '<h3><a href="'.$resource_url.'" title="'.$name.'">'.$name.'</a></h3>';

                echo <<<EOF
                <div class="resource">
                  $resource_name
                  $resource_desc
                  $resource_url
                </div>
EOF;
              endwhile;
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
