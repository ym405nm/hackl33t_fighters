<?php
/**
 * The template part for displaying grid layout
 *
 * @package VW Restaurant Lite 
 * @subpackage vw_restaurant_lite
 * @since VW Restaurant Lite 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>    
    <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
    <?php if(get_theme_mod('vw_restaurant_lite_toggle_postdate',true)==1){ ?>
  	 <div class="date-box"><?php the_time( get_option( 'date_format' ) ); ?></div>
    <?php } ?>
    <div class="box-image">
      <?php 
        if(has_post_thumbnail()) { 
          the_post_thumbnail(); 
        }
      ?>
    </div>
    <div class="new-text">
      <?php the_excerpt();?>
    </div>	
  	<div class="cat-box">
  	  <?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>
  	</div>  	
    <div class="clearfix"></div>
  </article>
</div>