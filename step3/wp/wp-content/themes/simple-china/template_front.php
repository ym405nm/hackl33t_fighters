<?php
/*
Template Name: Front Page
Description: A Page Template for front page with slider and widgets.
*/
?>



<?php get_header(); ?>
<div style="clear:both;"></div>

	<div class="home-widgets row">
    <div class="col-xs-12 col-md-4 col-sm-4">
        <?php if ( is_active_sidebar( 'sidebar-f1' ) ) : ?>
        	<div id="primary-sidebar" class="sidebar widget-area" role="complementary">
        		<?php dynamic_sidebar( 'sidebar-f1' ); ?>
        	</div><!-- #primary-sidebar -->
        <?php endif; ?>
  </div>
    <div class="col-xs-12 col-md-4 col-sm-4">
      <?php if ( is_active_sidebar( 'sidebar-f2' ) ) : ?>
        <div id="primary-sidebar" class="sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'sidebar-f2' ); ?>
        </div><!-- #primary-sidebar -->
      <?php endif; ?>
    </div>
    <div class="col-xs-12 col-md-4 col-sm-4">
      <?php if ( is_active_sidebar( 'sidebar-f3' ) ) : ?>
        <div id="primary-sidebar" class="sidebar widget-area" role="complementary">
          <?php dynamic_sidebar( 'sidebar-f3' ); ?>
        </div><!-- #primary-sidebar -->
      <?php endif; ?>
    </div>
  </div>
  <div id="container" class="row">
		<div id="content" class="col-xs-12 col-md-12 col-sm-12">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div  id="post-<?php the_ID(); ?>" <?php post_class(array('post','page', 'bgpng')); ?> >
				<div class="title bgpng col-md-12 col-xs-12 col-sm-12" >
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="post-inner">

					<div class="entry">
            <?php the_content(); ?>

            <div class="row">
              <div class="col-xs-12 col-md-8 col-sm-8">
                <h3>	<?php _e('Recent', 'china-theme'); ?> </h3>
                <ul class="list-group front-recent">
                    <?php
                    $args = array( 'posts_per_page' => 5);

                    $myposts = get_posts( $args );
                    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
                    	<li class="list-group-item">

                    	<div class="">
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <div> <?php the_date(); ?> </div>
                        <div>
                          <div class="pull-left">
                          <?php
                          // check if the post has a Post Thumbnail assigned to it.
                            if ( has_post_thumbnail() ) {
                              the_post_thumbnail(array(100, 100));
                            } ?>
                          </div>
                          <?php the_excerpt(); ?>
                        </div>
                      </div>


                    	</li>
                    <?php endforeach;
                    wp_reset_postdata();?>

                </ul>

              </div>
              <div class="col-xs-12 col-md-4 col-sm-4">
                <?php if ( is_active_sidebar( 'sidebar-fright' ) ) : ?>
                  <div id="primary-sidebar" class="sidebar widget-area" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-fright' ); ?>
                  </div><!-- #primary-sidebar -->
                <?php endif; ?>
              </div>

            </div>



					</div>
				</div>
				<div class="bottom bgpng">
				</div>
			</div><!-- //post -->
			<?php endwhile;?>
			<?php  endif; ?>
		</div><!-- / Content -->

	</div><!-- / container -->
<?php get_footer(); ?>
