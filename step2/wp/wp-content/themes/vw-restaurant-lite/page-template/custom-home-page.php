<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent">
  <?php do_action( 'vw_restaurant_lite_above_slider' ); ?>

  <?php if( get_theme_mod('vw_restaurant_lite_slider_hide_show',true) != ''){ ?>
    <section class="slider">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"> 
        <?php $slider_page = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_restaurant_lite_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $slider_page[] = $mod;
            }
          }
          if( !empty($slider_page) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $slider_page,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h2><?php the_title(); ?></h2>
                  <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_restaurant_lite_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_restaurant_lite_slider_excerpt_number','30')))); ?></p>
                  <div class="more-btn">              
                    <a class="button hvr-sweep-to-right" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','vw-restaurant-lite'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','vw-restaurant-lite' );?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;?>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Previous','vw-restaurant-lite' );?></span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_attr_e( 'Next','vw-restaurant-lite' );?></span>
        </a>
      </div>  
      <div class="clearfix"></div>
    </section> 
  <?php }?>
    
  <?php do_action( 'vw_restaurant_lite_below_slider' ); ?>

  <?php /** second section **/ ?>
  <?php if( get_theme_mod('vw_restaurant_lite_belive_post_setting') != ''){ ?>
    <section class="we_belive">
      <div class="container">
        <?php
        $postData1=  get_theme_mod('vw_restaurant_lite_belive_post_setting');
          if($postData1){
          $args = array( 'name' => esc_html($postData1 ,'vw-restaurant-lite'));
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) :
          while ( $query->have_posts() ) : $query->the_post(); ?>
          <div class="row">
            <?php if(has_post_thumbnail()){ 
              $thumb_col = 'col-md-5 col-sm-5';
              $desc_col = 'col-md-7 col-sm-7';
              }else{
                $desc_col = 'col-md-12';
            } ?>
            <div class="<?php echo esc_attr($thumb_col); ?>">
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
            </div>
            <div class="<?php echo esc_attr($desc_col); ?>">
              <h3><q><?php the_title(); ?></q></h3>
              <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_restaurant_lite_string_limit_words( $excerpt,25 ) ); ?></p>
              <div class="clearfix"></div>
              <div><a class="button hvr-sweep-to-right"  href="<?php the_permalink(); ?>"><?php esc_html_e('ABOUT US','vw-restaurant-lite'); ?><span class="screen-reader-text"><?php esc_html_e( 'ABOUT US','vw-restaurant-lite' );?></span></a>
              </div>
            </div>
          </div>
          <?php endwhile; 
          wp_reset_postdata();?>
          <?php else : ?>
             <div class="no-postfound"></div>
           <?php
          endif; } ?>
          <div class="clearfix"></div>
      </div> 
    </section>
  <?php }?>

  <?php do_action( 'vw_restaurant_lite_below_we_belive_section' ); ?>

  <div class="container content-vw">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php the_content(); ?>
    <?php endwhile; // end of the loop. ?>
  </div>
</main>

<?php get_footer(); ?>