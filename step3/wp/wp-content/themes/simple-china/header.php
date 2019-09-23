<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> >

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />

	<?php
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function theme_slug_render_title() {
	?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
		}
		add_action( 'wp_head', 'theme_slug_render_title' );
	}
	?>
	<?php  if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_enqueue_script("jquery"); ?>
	<?php wp_head(); ?>

</head>
<body  <?php body_class(); ?> >

<div id="wrapper">
	<div id="header">
		<div id="head">
			<div class="hederimage" style="background:url(<?php header_image(); ?>);"></div>
			<div id="topmenu">
					<nav class="navbar navbar-default" role="navigation" style="margin-top:0px;">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only"><?php _e('Toggle navigation', 'china-theme'); ?></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

						</div>

								<?php
										wp_nav_menu( array(
												'menu'              => 'primary',
												'theme_location'    => 'primary',
												'depth'             => 2,
												'container'         => 'div',
												'container_class'   => 'collapse navbar-collapse',
								'container_id'      => 'bs-example-navbar-collapse-1',
												'menu_class'        => 'nav navbar-nav',
												'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
												'walker'            => new wp_bootstrap_navwalker())
										);
								?>

						</div>
				</nav>
			</div>
		</div>
		<div id="logo">
			<div id="logo-inner" class="bgpng" style="background:url(<?php echo get_template_directory_uri(); ?>/images/logo.png)">
				<h1><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</div>
			<div id="logo-r" class="bgpng" style="background:url(<?php echo get_template_directory_uri(); ?>/images/logo-r.png);">&nbsp;</div>
		</div>
		<a id="feed" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'china-theme'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" /></a>

	</div><!-- / Header-->
