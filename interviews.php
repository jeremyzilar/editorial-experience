<section id="interviews" class="">
  <div class="container">
    <div class="row">
      <div class="interviews-block col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
        <h2 class="heading">Interviews and Case Studies with:</h2>
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

              $interview_bio = '';
              $interview_bio = get_post_meta( get_the_ID(), 'interview_bio', true );
              if (!empty($interview_bio)) {
                $interview_bio = '<p class="bio">'.$interview_bio.'</p>';
              }
              $interview_twitter = '';
              $interview_twitter_url = get_post_meta( get_the_ID(), 'interview_twitter', true );
              $interview_twitter_handle = str_replace('http://twitter.com/','', $interview_twitter_url);
              $interview_twitter_handle = str_replace('https://twitter.com/','', $interview_twitter_handle);
              if (!empty($interview_twitter_url)) {
                $interview_twitter = '<p class="twitter"><a href="'.$interview_twitter_url.'">@'.$interview_twitter_handle.'</a></p>';
              }

              $interview_url = '';
              $interview_url = get_post_meta( get_the_ID(), 'interview_url', true );
              if (empty($interview_url)) {
                $interview_url = $interview_twitter_url;
              }
              $interview_name = '<h3><a href="'.$interview_twitter_url.'" title="'.$name.'">'.$name.'</a></h3>';
              if (empty($interview_twitter_url)) {
                $interview_name = '<h3><a href="'.$interview_url.'" title="'.$name.'">'.$name.'</a></h3>';
              }
              if (empty($interview_url) && empty($interview_twitter_url)) {
                $interview_name = '<h3>'.$name.'</h3>';
              }

              $image = '';
              if (has_post_thumbnail( $post->ID ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ) );
                $image = $image[0];
              } else {
                $image = TDIR . '/img/bear.jpg';
              }



              echo <<<EOF
              <div class="interview col-sm-3">
                <img src="$image" class="img-responsive" alt="" />
                <div class="txt">
                  $interview_name
                  $interview_bio
                  $interview_twitter
                </div>
              </div>
EOF;

              if(++$counter % 4 === 0){
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
