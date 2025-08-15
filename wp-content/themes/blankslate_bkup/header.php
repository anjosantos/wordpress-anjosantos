<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

<!--FONTS-->
<link rel='stylesheet' href='/wp-includes/css/merged-styles.css' type='text/css' media='all' />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="branding">
	<div id="site-title"><h1><a href="https://www.anjosantos.com/" title="CBAS" rel="home"><img src="/wp-content/uploads/2018/02/logo-small.png"></img></a></h1></div></section>
<nav id="menu" role="navigation">
<?php wp_nav_menu( array( 'items_wrap' => my_nav_wrap(),
						 'theme_location' => 'main-menu') ); ?>
<div id="search">
	<form role="search" method="get" id="searchform" class="searchform" action="https://www.anjosantos.com/">
		<div><i id="searchicon" class="fa fa-search"></i>
			<input type="text" name="search" id="s" value="Search" onfocus="if (this.value == 'Search') this.value = '';" onblur="if (this.value == '') this.value = 'Search';">
		</div>
	</form>
</div>
</nav>
</header>
<div id="container">