<?php
/**
 * The template part for displaying content
 *
 * @package VW Restaurant Lite 
 * @subpackage vw_restaurant_lite
 * @since VW Restaurant Lite 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>   
	<div class="box-image">
    <?php 
      if(has_post_thumbnail()) { 
        the_post_thumbnail(); 
      }
    ?>      
    </div>  
  	<h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
    <?php if(get_theme_mod('vw_restaurant_lite_toggle_postdate',true)==1){ ?>
  	 <div class="date-box"><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></div>
    <?php } ?>
  	<div class="new-text">
    	<p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_restaurant_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_restaurant_lite_excerpt_number','30')))); ?></p>
  	</div>	
	<div class="cat-box">
	 <i class="fas fa-folder-open"></i><?php foreach((get_the_category()) as $category) { echo esc_html($category->cat_name) . ' '; } ?>
	</div>	
  <div class="clearfix"></div>
</article>