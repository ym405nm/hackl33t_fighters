<?php
/**
 * The template part for displaying single post content
 *
 * @package VW Restaurant Lite 
 * @subpackage vw_restaurant_lite
 * @since VW Restaurant Lite 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>  
	<div class="single-post">
		<h1><?php the_title();?></h1>
		<div class="metabox">

			<?php if(get_theme_mod('vw_restaurant_lite_toggle_postdate',true)==1){ ?>
				<span class="entry-date"><i class="fas fa-calendar-alt"></i><?php echo get_the_date(); ?></span>
			<?php } ?>

			<?php if(get_theme_mod('vw_restaurant_lite_toggle_author',true)==1){ ?>
		      <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a></span>
		    <?php } ?>

		    <?php if(get_theme_mod('vw_restaurant_lite_toggle_comments',true)==1){ ?>
		      <i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','vw-restaurant-lite'), __('0 Comments','vw-restaurant-lite'), __('% Comments','vw-restaurant-lite')); ?></span>
		    <?php } ?>

		</div>
		<?php if(has_post_thumbnail()) { ?>
			<hr>
			<div class="feature-box">	
				<?php the_post_thumbnail(); ?>
			</div>
			<hr>					
		<?php } 
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'vw-restaurant-lite' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'vw-restaurant-lite' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
			
		if ( is_singular( 'attachment' ) ) {
			// Parent post navigation.
			the_post_navigation( array(
				'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'vw-restaurant-lite' ),
			) );
		} elseif ( is_singular( 'post' ) ) {
			// Previous/next post navigation.
			the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next page', 'vw-restaurant-lite' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'vw-restaurant-lite' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous page', 'vw-restaurant-lite' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'vw-restaurant-lite' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );
		}

		echo '<div class="clearfix"></div>';

		the_tags(); 

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}?>
	</div>
</article>