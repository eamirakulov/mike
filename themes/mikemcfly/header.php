<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width">

	<title><?php bloginfo('name'); ?></title>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,900,900i" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>

	<script src="<?php bloginfo('template_url'); ?>/js/scotchPanels.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/jquery.cookie.js"></script>

	<script type="text/javascript">
		$(document).on('ready', function(){
			cookiesPolicyBar();
			var easyPanel = $('#scotch-panel').scotchPanel({
				useCSS: false,
	            containerSelector: 'body',
	            direction: 'right',
	            duration: 300,
	            transition: 'ease',
	            distanceX: '80%',
	            enableEscapeKey: true,
	            beforePanelOpen: function() {
                   	$('.toggle-panel img').hide();
                },
                afterPanelOpen: function() {
                   	$('.toggle-panel span').show();
                },
                beforePanelClose: function() {
                   	$('.toggle-panel span').hide();
                },
                afterPanelClose: function() {
                   	$('.toggle-panel img').show();
                },

	        });

	        $('.toggle-panel').click(function() {
	            easyPanel.toggle();
	            return false;
	        }); 

	        $('.mobile-menu').click(function() {
	        	easyPanel.close();
	        });
		});

		function cookiesPolicyBar(){
		    // Check cookie 
		    if ($.cookie('policy_cookie') != "active") $('.notification').show(); 
		    //Assign cookie on click
		    $('#close').on('click',function(){
		        $.cookie('policy_cookie', 'active', { expires: 30 });
		        $('.notification').fadeOut();
		    });
		}
	</script>
	<?php wp_head(); ?>

</head>
	<body class="<?php echo the_slug(); ?>">
		<!--[if lt IE 8]><p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a>.</p><![endif]-->
		<div id="scotch-panel">
			<div class="inner">
				<div class="logo"><img src="<?php bloginfo('template_url'); ?>/img/logo.svg"></div>
			</div>
			<?php wp_nav_menu( array( 
				'theme_location' => 'mobile-menu',
				'container_class' => 'mobile-menu',
				'link_before' => '<span>',
				'link_after' => '</span>'
			) ); ?>
		</div>
		<header>
			<div class="container">
				<?php wp_nav_menu( array( 
					'theme_location' => 'header-menu',
					'container_class' => 'main-menu',
					'link_before' => '<span>',
					'link_after' => '</span>'
				) ); ?>
			</div>

			<a href="#" class="toggle-panel"><img src="<?php bloginfo('template_url'); ?>/img/hamb.svg"><span>X</span></a>
		</header>

		<main>
			<div class="notification">
				<span>This website uses cookies.</span>
				<a href="#" id="close">Accept</a>
				<a href="<?php bloginfo('url'); ?>/privacy-policy">See Policy</a>
			</div>