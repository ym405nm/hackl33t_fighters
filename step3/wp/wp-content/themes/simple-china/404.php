<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @subpackage Siple China
 * @since 3.0
 */
?>



<?php get_header(); ?>
<div style="clear:both;"></div>
<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
	<div id="container" class="row">
		<div id="content" class="col-xs-12 col-md-12 col-sm-12">

			<div  id="post-404" class="post" >
				<div class="title bgpng col-md-12 col-xs-12 col-sm-12" >
          <h2><?php _e( '404 Error', 'china-theme' ); ?></h2>
					<h2><?php _e( 'Oops! That page can&rsquo;t be found.', 'china-theme' ); ?></h2>
				</div>
				<div class="post-inner">
					<div class="entry">

            <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></p>

  					<?php get_search_form(); ?>

					</div>
				</div>
				<div class="bottom bgpng">
				</div>
			</div><!-- //post -->

		</div><!-- / Content -->

	</div><!-- / container -->
<?php get_footer(); ?>
