<?php
/**
 * Archive Template
 *
 * The archive template is the default template used for archives pages without a more specific template. 
 *
 * @package Oxygen
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>
	
	<div class="content-wrap">
		
		<?php do_atomic( 'before_content' ); // oxygen_before_content ?>

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							<?php // if ( current_theme_supports( 'get-the-image' ) ) {
							// 								$placeholder_number = rand(1,23);			
							// 								get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'archive-thumbnail', 'image_class' => 'featured', 'attachment' => false, 'width' => 470, 'height' => 140,  'default_image' => get_stylesheet_directory_uri() . '/images/placeholder' .  $placeholder_number . '.jpg'  ) );							
							// 									
							// 							} 
							if (get_post_meta($post->ID, '_dw_external_url', $single = true)) {
								$the_news_link =  get_post_meta($post->ID, '_dw_external_url', $single = true);
						    } else {
								$the_news_link = get_permalink();
							}
						
							$placeholder_number = rand(1,23);?>
								
							<a href="<?php echo $the_news_link; ?>">	
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail('archive-thumbnail', array('class' => 'featured')); 
							}
							else {
								echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/placeholder' .  $placeholder_number . '.jpg" class="featured wp-post-image" />';
							}
							?></a>
	
							<div class="entry-header">		
								<?php //echo apply_atomic_shortcode( 'entry_title', '[entry-title]' );?>
								<h2 class="entry-title"><a href="<?php echo $the_news_link; ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a></h2>
								 
									
								<?php echo apply_atomic_shortcode( 'byline_date', '<div class="byline byline-date">' . __( '[entry-published]', 'oxygen' ) . '</div>' ); ?>
							</div>
	
							<?php // echo apply_atomic_shortcode( 'byline_category', '<div class="byline byline-cat">' . __( '[entry-terms taxonomy="category" before=""]', 'oxygen' ) . '</div>' ); ?>
								
							<div class="entry-summary">
								
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'oxygen' ), 'after' => '</p>' ) ); ?>
								
							</div>
	
							<a class="read-more" href="<?php echo $the_news_link; ?>">Read More &rarr;</a>
	
							<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
			<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>