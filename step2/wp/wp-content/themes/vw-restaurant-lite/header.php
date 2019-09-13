<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package VW Restaurant Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-restaurant-lite' ) ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header>
  <a class="screen-reader-text skip-link" href="#maincontent"><?php esc_html_e( 'Skip to content', 'vw-restaurant-lite' ); ?></a> 

  <div class="topheader">
    <div class="container">
      <div class="row">
        <div class="top-contact col-lg-6 col-md-6">
          <?php if( get_theme_mod( 'vw_restaurant_lite_contact','' ) != '') { ?>
            <span class="call"><i class="fa fa-phone" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_restaurant_lite_contact','')); ?></span>
           <?php } ?>
        </div>   
        <div class="top-email col-lg-6 col-md-6">
          <?php if( get_theme_mod( 'vw_restaurant_lite_email','' ) != '') { ?>
            <span class="email"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo esc_html( get_theme_mod('vw_restaurant_lite_email','') ); ?></span>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <button class="toggleMenu toggle"><?php esc_html_e('Menu','vw-restaurant-lite'); ?></button>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="logo col-lg-2 col-md-2">
          <?php if( has_custom_logo() ){ vw_restaurant_lite_the_custom_logo();
           }else{ ?>                        
          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
          <?php $description = get_bloginfo( 'description', 'display' );
          if ( $description || is_customize_preview() ) : ?> 
            <p class="site-description"><?php echo esc_html($description); ?></p>       
          <?php endif; }?>
        </div>
        <div class="menubox col-lg-8 col-md-8">
          <nav class="nav">
            <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
          </nav>
        </div>
        <div class="col-lg-2 col-md-2">
          <?php dynamic_sidebar( 'social-icon' ); ?>
        </div>
      </div>
    </div>
  </div>
</header>

  <?php if ( is_singular() && has_post_thumbnail() ) : ?>
    <?php
      $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'vw-restaurant-lite-post-image-cover' );
      $post_image = $thumb['0'];
    ?>
    <div class="header-image bg-image" style="background-image: url(<?php echo esc_url( $post_image ); ?>)">

      <?php the_post_thumbnail( 'vw-restaurant-lite-post-image' ); ?>

    </div>

  <?php elseif ( get_header_image() ) : ?>
  <div class="header-image bg-image" style="background-image: url(<?php header_image(); ?>)">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
      <img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
    </a>
  </div>
  <?php endif; // End header image check. ?>