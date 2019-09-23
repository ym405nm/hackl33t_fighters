<?php
/*
Template Name: 100% width content
Description: A Page Template with a 100% width of content withour sidebar.
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
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div  id="post-<?php the_ID(); ?>" <?php post_class(array('post','page', 'bgpng')); ?> >
				<div class="title bgpng col-md-12 col-xs-12 col-sm-12" >
					<h2><?php the_title(); ?></h2>
				</div>
				<div class="post-inner">
					<div class="entry">
   						<?php
   						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
   							?>
   						<div class="postthumb">

   						 <?php the_post_thumbnail('thumbnail');  ?>
   					 </div>
   						 <?php
   						}
   						?>
						<?php the_content(); ?>
						<?php wp_link_pages(); ?>
						<?php comments_template(); ?>
					</div>
				</div>
				<div class="bottom bgpng">
				</div>
			</div><!-- //post -->
			<?php endwhile;?>
				<div id="nav">
					<ul>
						<li><?php previous_comments_link(); ?></li>
						<li><?php next_comments_link(); ?></li>
					</ul>
				</div>
			<?php else : ?>
				<h2>Not found</h2>
			<?php  endif; ?>
		</div><!-- / Content -->

	</div><!-- / container -->
<?php get_footer(); ?>
