<section id="head" class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">
        <div class="row">

          <?php
            $counter = 0;
            $items = wp_get_nav_menu_items( 'interviews' );
            $interviews = array();
            foreach ($items as $item) {
              $n = $item->object_id;
              $interviews[] = $n;
            }

            // print_r($items);
            // print_r($interviews);
            $args = array( 'post_type' => 'interview', 'post__in' => $interviews, 'orderby' => 'post__in', 'posts_per_page' => -1 );
            $loop = new WP_Query( $args );
            while ( $loop->have_posts() ) : $loop->the_post();
              $name = get_the_title();

              $interview_bio = get_post_meta( get_the_ID(), 'interview_bio', true );
              if (!empty($interview_bio)) {
                $interview_bio = '<p class="bio">'.$interview_bio.'</p>';
              }

              $interview_twitter_url = get_post_meta( get_the_ID(), 'interview_twitter', true );
              $interview_twitter_handle = str_replace('http://twitter.com/','', $interview_twitter_url);
              $interview_twitter_handle = str_replace('https://twitter.com/','', $interview_twitter_handle);
              if (!empty($interview_twitter_url)) {
                $interview_twitter = '<p class="twitter"><a href="'.$interview_twitter_url.'">@'.$interview_twitter_handle.'</a></p>';
              }

              $interview_url = get_post_meta( get_the_ID(), 'interview_url', true );
              if (empty($interview_url)) {
                $interview_url = $interview_twitter_url;
              }
              $interview_name = '<h3><a href="'.$interview_url.'" title="'.$name.'">'.$name.'</a></h3>';
              if (empty($interview_twitter) || empty($interview_url)) {
                $interview_name = '<h3>'.$name.'</h3>';
              }

              if (has_post_thumbnail( $post->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                $image = $image[0];
              } else {
                $image = TDIR . '/img/bear.jpg';
              }



              echo <<<EOF
              <div class="interview col-lg-4">
                <img src="$image" class="img-responsive" alt="" />
                $interview_name
                $interview_bio
                $interview_twitter
              </div>
EOF;

              if(++$counter % 3 === 0){
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
