<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo('title') ?></title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">

    <?php wp_head() ?>
	  
	  <script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', 'UA-186798697-1', 'auto');
	ga('send', 'pageview');
</script>


  </head>


  <body <?php body_class('loading');?>>


  <!-- <div id="loading">
		<?php //include('assets/img/spinner.svg'); ?>
	</div>
  <noscript>
    <script>$('body').removeClass('loading');</script>
  </noscript> -->

    <div id="link-home"></div>
    
    <?php get_template_part('template/top','head');?>

    <div class="header-fixed">
      <?php get_template_part('template/top','head');?>
    </div>
    
    <?php
    if( is_front_page() ) {
      echo do_shortcode('[slider filtro="homepage"]');
    }
    ?>

    <div id="main-content" class="main-content">