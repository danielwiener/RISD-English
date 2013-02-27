<?php
/**
 * Template Name: XML Feed
 *
 * Two Column pages for pages that need a wider content column
 *
 * @package RISD-English
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<div class="aside">
	
		<?php get_template_part( 'menu', 'secondary' ); // Loads the menu-secondary.php template.  ?>
		
		<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
	
	</div>

	<?php do_atomic( 'before_content' ); // oxygen_before_content ?>
	
	<div class="content-wrap">

		<div id="content">	

			<?php do_atomic( 'open_content' ); // oxygen_open_content ?>
	
			<div class="hfeed">
	
				<?php if ( have_posts() ) : ?>
	
					<?php while ( have_posts() ) : the_post(); ?>
	
						<?php do_atomic( 'before_entry' ); // oxygen_before_entry ?>
	
						<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">
	
							<?php do_atomic( 'open_entry' ); // oxygen_open_entry ?>
	
							<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
	
							<div class="entry-content">
								
							<?php 	$course_xml = simplexml_load_file(XMLFILE);

							foreach($course_xml->children() as $department) {
								//if($department->NAME == 'ENGLISH DEPT') {
								foreach($department->children() as $course) {
									if( $course->COURSENAME != "" && $department->NAME == 'ENGLISH DEPT '){
										
									preg_match("/(\d{4})([A-Z][A-Z])/", $course->COURSETERM, $results);
									$course_year = $results[1];
									$course_semester = $results[2];
									//ENGL-8900 ENGL-8800- E101
									$course_numbers = array('E101', '8900', '8800', '8888');
									$skip_course_name = preg_match("/ENGL-(.*)-/", $course->COURSENAME, $english_results);
									$course_number = $english_results[1];
									if (in_array($course_number, $course_numbers)) {
									//do nothing	
									} else {
									if ($course_semester == 'FA') {
										$fall_courses[] = $course;
										$fall_year = $course_year;
								} //fall
								if ($course_semester =='WS') {
									$winter_courses[] = $course;
									$winter_year = $course_year;
								} //winter
								if ($course_semester =='SP') {
									$spring_courses[] = $course;
									$spring_year = $course_year;
								} //spring
								}
							}
						}
					}
							?>
								<h2>Fall Semester <?php echo $fall_year; ?></h2>
								<p>ENGL-E101<strong> LITERATURE SEMINAR: DESIGN IN WORDS<br>
									Note: There are approximately 30 sections of this course, per year)
									</strong></p>
								<p>An introduction to literary study that helps students develop the skills necessary for college-level reading, writing, research and critical thinking.  Through exposure to a variety of literary forms and genres, historical periods and critical approaches, students are taught how to read closely, argue effectively and develop a strong writing voice.  The course is reading and writing intensive and organized around weekly assignments.</p><p>Required for graduation for all undergraduates, including transfers, unless waived.</p><p>For the Fall term, freshmen are pre-registered into this course and a small number of seats are available via web registration for upperclassmen. To register for the Spring term, contact the Liberal Arts Office.<br><strong>Credits: 3.00</strong></p><hr />
								
								<?php // Custom sort on the names of the items:
								// usort ($fall_courses, function($a, $b) {
								// 								    return strcmp($a->COURSETITLE, $b->COURSETITLE);
								//}); ?>
									<?php foreach ($fall_courses as $fall_course): ?>
											
										<p><?php echo $fall_course->COURSENAME ?> - <strong><?php echo $fall_course->COURSETITLE ?></strong></p>
										<p><?php echo $fall_course->COURSEDESC; ?>
											<?php if ($fall_course->COURSECREDITS != ''): ?>
												<br><strong>Credits: <?php echo $fall_course->COURSECREDITS ?></strong>
											<?php endif ?>
											</p><hr />
									<?php endforeach; ?><hr />
							<h2>Winter Session <?php echo $winter_year; ?></h2>
							<?php
							// usort ($winter_courses, function($a, $b) {
							// 							return strcmp($a->COURSETITLE, $b->COURSETITLE);
							// 							});
							?>
								<?php foreach ($winter_courses as $winter_course): ?>
									<p><?php echo $winter_course->COURSENAME ?> - <strong><?php echo $winter_course->COURSETITLE ?></strong></p>
									<p><?php echo $winter_course->COURSEDESC; ?>
										<?php if ($winter_course->COURSECREDITS != ''): ?>
											<br><strong>Credits: <?php echo $winter_course->COURSECREDITS ?></strong>
										<?php endif ?></p><hr />
								<?php endforeach; ?><hr />
						<h2>Spring Semester <?php echo $spring_year; ?></h2>
						<?php // usort ($spring_courses, function($a, $b) {
						// 						    return strcmp($a->COURSETITLE, $b->COURSETITLE);
						// 						}); ?>
							<?php foreach ($spring_courses as $spring_course): ?>
								<p><?php echo $spring_course->COURSENAME ?> - <strong><?php echo $spring_course->COURSETITLE ?></strong></p>
								<p><?php echo $spring_course->COURSEDESC; ?>
									<?php if ($spring_course->COURSECREDITS != ''): ?>
										<br><strong>Credits: <?php echo $spring_course->COURSECREDITS ?></strong>
									<?php endif ?></p><hr />
							<?php endforeach; ?>
	
								
							</div><!-- .entry-content -->
	
							<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">[entry-edit-link]</div>' ); ?>
	
							<?php do_atomic( 'close_entry' ); // oxygen_close_entry ?>
	
						</div><!-- .hentry -->
	
						<?php do_atomic( 'after_entry' ); // oxygen_after_entry ?>
	
						<?php do_atomic( 'after_singular' ); // oxygen_after_singular ?>
	
					<?php endwhile; ?>
	
				<?php endif; ?>
	
			</div><!-- .hfeed -->
	
			<?php do_atomic( 'close_content' ); // oxygen_close_content ?>
	
		</div><!-- #content -->
	
		<?php do_atomic( 'after_content' ); // oxygen_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>