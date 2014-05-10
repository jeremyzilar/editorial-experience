<section id="head" class="">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-10 col-lg-offset-1">
        <div class="row">
          <div class="col-sm-4 col-md-3">
            <img src="<?php echo TDIR; ?>/img/book/edex-cover.gif" class="img-responsive" alt="" />
          </div>
          <div class="col-sm-8 col-md-9">
            <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <p class="lead"><?php bloginfo( 'description' ); ?></p>
            <p class="blurb"><?php echo get_option("edex_book_copy"); ?></p>
            <p><a class="btn btn-md btn-buy" href="http://www.amazon.com/dp/1592538959/?tag=themapstrsch-20" role="button">Buy the Book</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
