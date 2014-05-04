<section id="head" class="">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 col-lg-offset-1">

        <?php
          $args = array( 'post_type' => 'interview', 'posts_per_page' => -1 );
          $loop = new WP_Query( $args );
          while ( $loop->have_posts() ) : $loop->the_post();
            $name = get_the_title();
            $interview_bio = get_post_meta( get_the_ID(), 'interview_bio', true );
            $interview_twitter = get_post_meta( get_the_ID(), 'interview_twitter', true );
            echo <<<EOF
            <div class="interview col-lg-4">
              <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
              <h3><a href="$interview_twitter" title="$name">$name</a></h3>
              <p class="bio">$interview_bio</p>
              <p class="twitter"><a href="$interview_twitter">$interview_twitter</a></p>
            </div>
EOF;
          endwhile;
        ?>


        <div class="row">
          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Chris Johansen</h3>
            <p class="bio">VP of Product, BuzzFeed</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Josh Klenert</h3>
            <p class="bio">VP, Design &amp; UX, Huffington Post</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Paul Ford </h3>
            <p class="bio">Content Strategist, Writer, Programmer</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Tom Bodkin</h3>
            <p class="bio">Chief Creative Officer, The New York Times</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Jeremy Zilar</h3>
            <p class="bio">Content Strategist/Blog Specialist, The New York Times</p>
            <p class="twitter"><a href="https://twitter.com/jeremyzilar/">@jeremyzilar</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Alex Breuer</h3>
            <p class="bio">Creative Director, Guardian News and Media</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>David Sleight</h3>
            <p class="bio">Creative Director, UX and Product Designer, Developer</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Jeanette Abbink</h3>
            <p class="bio"> Founder and Creative Director, Rational Beauty</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Richard Turley</h3>
            <p class="bio"> Creative Director, Bloomberg Businessweek</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Renda Morton</h3>
            <p class="bio"> Founding Designer, Rookie</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Mandy Brown</h3>
            <p class="bio">Cofounder, Editorially</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Michael Renaud</h3>
            <p class="bio">Creative Director, Pitchfork</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Thomas Alberty</h3>
            <p class="bio">Design Director, New York Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Steve Motzenbecker</h3>
            <p class="bio">Director of Design &amp; User Experience, NYmag.com</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Stella Bugbee</h3>
            <p class="bio">Editorial Director, The Cut</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Devin Pedzwater</h3>
            <p class="bio">Creative Director, Vanity Fair Italia</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Jeffrey Zeldman</h3>
            <p class="bio">Founder and Executive Creative Director, Happy Cog</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Will Hudson</h3>
            <p class="bio">Codirector, It’s Nice That</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>David Jacobs and Natalie Podrazik</h3>
            <p class="bio">Cofounders and Developers, 29th Street Publishing</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Tim Moore</h3>
            <p class="bio">Founder and Designer, Letter to Jane</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Andrea Fella</h3>
            <p class="bio">Design Director, Paper Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Andrea Fella</h3>
            <p class="bio">Design Director, Paper Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Michele Outland</h3>
            <p class="bio">Creative Director, Gather Journal</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Justin Thomas Kay</h3>
            <p class="bio">Creative Director, Doubleday &amp; Cartwright</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Omar Sosa</h3>
            <p class="bio">Cofounder and Art Director, Apartamento Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>Cathy Olmedillas</h3>
            <p class="bio">Founding Editor, Anorak Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>

          <div class="interview col-lg-4">
            <img src="http://placehold.it/150x150/999999/333333/" class="img-responsive" alt="" />
            <h3>David Yun</h3>
            <p class="bio">Cofounder and Cocreative Director, WAX Magazine</p>
            <p class="twitter"><a href="https://twitter.com/NAME/">@name</a></p>
          </div>





        </div>
      </div>
    </div>
    <h2>Interviews</h2>

  </div>
</section>
