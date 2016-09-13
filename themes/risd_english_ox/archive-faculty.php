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
		
		<?php // get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>
	
	<div class="content-wrap">	

		<div id="content">
	
			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	             <?php
					global $wp_query;
					$args = array_merge( $wp_query->query,
						array(
							'orderby'         	=> 'title',
							'order'           	=> 'ASC',
							'posts_per_page'	=> -1,
							'tax_query' => array(
									array(
										'taxonomy' => 'faculty_category',
										'field' => 'slug',
										'terms' => 'full-time'
									)
								),
						   
						)	
					); 
				 	query_posts( $args ); ?>
				<?php if ( have_posts() ) : ?>
						<h2>Full Time Faculty</h2>
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							
							<div class="entry-header">
								<?php if ( get_post_meta($post->ID, "_dw_first_name", true) ): ?>
									<?php $dw_first_name = get_post_meta($post->ID, "_dw_first_name", true); ?>
									<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo $dw_first_name . '  ' . the_title(); ?>" rel="bookmark"><?php echo $dw_first_name; ?> <?php the_title(); ?></a></h2>
								<?php else: ?>
									<div class="alert alert-block">
								    <!-- <a class="close" data-dismiss="alert" href="#">×</a> --><!-- Need to add bootstrap js and more classes to get this to work                                                                                  -->
								    <h4 class="alert-heading">Warning!</h4>
								     Add  first name to the first name field.
								    </div>
								   
								<?php endif ?> 
							</div>
								
							<div class="entry-summary">
									<?php if ( current_theme_supports( 'get-the-image' ) ) {

										get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'portrait-thumbnail', 'image_class' => 'alignleft', 'width' => 75, 'height' => 90, 'attachment' => false, 'default_image' => get_stylesheet_directory_uri() . '/images/default_portrait_placeholder.gif' ) );							

									} ?>  
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_parent_textdomain() ), 'after' => '</p>' ) ); ?>
								
							</div>
								
							<a class="read-more" href="<?php the_permalink(); ?>">Read About <?php echo $dw_first_name . ' ' . get_the_title() ?> &rarr;</a>						
	
						</div><!-- .hentry -->	
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
			<div class="hfeed">
	             <?php
					global $wp_query;
					$args = array_merge( $wp_query->query,
						array(
							'orderby'         	=> 'title',
							'order'           	=> 'ASC',
							'posts_per_page'	=> -1,
							'tax_query' => array(
									array(
										'taxonomy' => 'faculty_category',
										'field' => 'slug',
										'terms' => 'senior-lecturer'
									)
								),
						   
						)	
					); 
				 	query_posts( $args ); ?>
				<?php if ( have_posts() ) : ?>
					
					<br clear="both" />
					<hr />
						<h2>Senior Lecturers</h2>
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">		
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							
							<div class="entry-header">
								<?php if ( get_post_meta($post->ID, "_dw_first_name", true) ): ?>
									<?php $dw_first_name = get_post_meta($post->ID, "_dw_first_name", true); ?>
									<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php echo $dw_first_name . '  ' . the_title(); ?>" rel="bookmark"><?php echo $dw_first_name; ?> <?php the_title(); ?></a></h2>
								<?php else: ?>
									<div class="alert alert-block">
								    <!-- <a class="close" data-dismiss="alert" href="#">×</a> --><!-- Need to add bootstrap js and more classes to get this to work                                                                                  -->
								    <h4 class="alert-heading">Warning!</h4>
								     Add  first name to the first name field.
								    </div>
								   
								<?php endif ?> 
							</div>
								
							<div class="entry-summary">
									<?php if ( current_theme_supports( 'get-the-image' ) ) {

										get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'portrait-thumbnail', 'image_class' => 'alignleft', 'width' => 75, 'height' => 90, 'attachment' => false, 'default_image' => get_stylesheet_directory_uri() . '/images/default_portrait_placeholder.gif' ) );							

									} ?>  
								<?php the_excerpt(); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_parent_textdomain() ), 'after' => '</p>' ) ); ?>
								
							</div>
								
							<a class="read-more" href="<?php the_permalink(); ?>">Read About <?php echo $dw_first_name . ' ' . get_the_title() ?> &rarr;</a>						
	
						</div><!-- .hentry -->	
	
					<?php endwhile; ?>
	
				<?php else : ?>
	
					<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>
	
				<?php endif; ?>
					<br clear="both" />
					<hr />
						<h2>Part Time Faculty</h2>
					<p>For an LAS faculty list that includes part time faculty members, please visit: <a href=" http://www.risd.edu/academics/las/faculty/" title="Faculty | Literary Arts + Studies | Academic Departments | RISD"> http://www.risd.edu/academics/las/faculty/</a></p>
			</div><!-- .hfeed -->

	
		</div><!-- #content -->
	


<?php get_footer(); // Loads the footer.php template. ?>