<?php
/**
 * Singular Template
 *
 * This is the default singular template.  It is used when a more specific template can't be found to display
 * singular views of posts (any post type).
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
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
	
	                          
							<h1 class="faculty-title entry-title"><?php echo get_post_meta($post->ID, '_dw_first_name', $single=true) ?> <?php the_title(); ?></h1>	
	
	
							<div class="entry-content">
								<?php if ( current_theme_supports( 'get-the-image' ) ) {

									get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'faculty-portrait', 'image_class' => 'alignleft', 'width' => 158, 'attachment' => false, 'default_image' => get_stylesheet_directory_uri() . '/images/default_portrait_medium_placeholder.gif' ) );							

								} ?>
								<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', hybrid_get_parent_textdomain() ) ); ?>
								
								<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', hybrid_get_parent_textdomain() ), 'after' => '</p>' ) ); ?>
								
							</div><!-- .entry-content -->
	
						</div><!-- .hentry -->
	
					<?php endwhile; ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->

	
		</div><!-- #content -->
	
		<div id="sidebar-secondary" class="sidebar">

			<div id="full-time-faculty" class="widget"><div class="widget-wrap widget-inside"><h3 class="widget-title"><a href="/faculty">Full Time Faculty</a></h3><ul>
				<?php $args = array(
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
					);
					$fulltime_query = new WP_Query(	$args );
					while ( $fulltime_query->have_posts() ) : $fulltime_query->the_post();
					?>
			<li class="cat-post-item">
				<a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Read More about <?php the_title(); ?>"><?php echo get_post_meta($post->ID, "_dw_first_name", true); ?>  <?php the_title(); ?></a> </li>
				<?php endwhile; ?>
				</ul></div></div>
				<div id="senior-lecturers" class="widget"><div class="widget-wrap widget-inside"><h3 class="widget-title"><a href="/faculty">Senior Lecturers</a></h3><ul>
					<?php $args = array(
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
						);
						$senior_query = new WP_Query(	$args );
						while ( $senior_query->have_posts() ) : $senior_query->the_post(); ?>
				<li class="cat-post-item">
					<a class="post-title" href="<?php the_permalink(); ?>" rel="bookmark" title="Read More about <?php the_title(); ?>"><?php echo get_post_meta($post->ID, "_dw_first_name", true); ?>  <?php the_title(); ?></a></li>
					<?php endwhile; ?>
					</ul></div>
					</div></div> <!-- sidebar -->
	

<?php get_footer(); // Loads the footer.php template. ?>