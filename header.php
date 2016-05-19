<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
		<link href="http://cdn.jsdelivr.net/jquery.slick/1.3.11/slick.css" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Italianno&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Hind:400,300,500,600,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/kartta.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/panorama.css">
		<!--[if lt IE 9]>
		<script src = "https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src = "https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

		<script src="<?php bloginfo('template_directory'); ?>/360panorama/jquery.pano.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/bootstrap/js/bootstrap.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/slick/slick/slick.min.js"></script>
		<script>
		  $(document).ready(function(){
		    $('.nav-content .menu li a').on('click', function(event){
		      if($(this).siblings().hasClass('sub-menu')){
			event.preventDefault();
		      } 
		    });
		  });
		</script>
		<?php wp_head(); ?>	</head>	<body <?php body_class(); ?>>
<div class="whole-page-wrapper">
		<div class="container-fluid nav-background">
			<div class="row nav-content">
			  <div class="col-xs-2" id="logo">
				<a href="http://www.vsks.net/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/kirjaseura_logo.jpg"></a>
			  </div>
			  <div class="col-xs-10 hidden-xs hidden-sm">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
			  </div>
			  <div class="col-xs-1 visible-xs visible-sm  col-xs-push-10 col-sm-push-10 dropdown">
				<i class="fa fa-bars fa-3x dropdown-toggle" data-toggle="dropdown"></i>
				    <ul class="dropdown-menu">
					<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    				    </ul>
			  </div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			  <div class="col-xs-12 wide-element">
				<div class="header image">
					<a href="<?php echo get_home_url() ?>">
					  <img class="banner-img" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Viipuri-portaali" />
					  <h1><span id="first">Viipuri</span></h1>
					  <h2><span id="second">-portaali</span></h2>
					</a>
				</div>
			  </div>
			</div>
		</div>
		<div class="container">