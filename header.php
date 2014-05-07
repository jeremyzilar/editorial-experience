<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

	<meta name="keywords" content="Content Strategy, Design, Blogging, The New York Times, Jeremy Zilar" />
	<meta name="description" content="Notes and Writings by Jeremy Zilar" />

  <link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Typekit -->
  <!-- Registered with jc [at] juliettecezzar.com -->
	<script type="text/javascript" src="//use.typekit.net/pzy6bux.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>


	<link rel="me" href="https://twitter.com/jeremyzilar" />

	<!-- RSS -->
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

  <?php wp_head(); ?>

  <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<!-- All good things start here -->

<body <?php body_class(); ?>>
  <?php include(INC . 'navbar.php'); ?>
  <?php
  if (is_front_page()) {
    include 'head.php';
    include 'interviews.php';
  }
  if (is_home() || is_single()) {
    include 'head.php';
  }

   ?>
