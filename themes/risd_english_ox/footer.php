<?php
/**
 * Footer Template
 *
 * The footer template is generally used on every page of your site. Nearly all other
 * templates call it somewhere near the bottom of the file. It is used mostly as a closing
 * wrapper, which is opened with the header.php file. It also executes key functions needed
 * by the theme, child themes, and plugins. 
 *
 * @package Oxygen
 * @subpackage Template
 */
?>
				
				<?php if (is_front_page()): ?>
				<div id="sidebar-secondary" class="sidebar"> 
					<br /><br /><hr />
					<h3><a href="/curriculum">Literary Arts and Studies</a></h3>	
				<p>The Department of Literary Arts and Studies aims to provide:</p>

					    <p>An outstanding education in literary studies and creative writing that is historically and culturally diverse and representative of the main forms of inquiry and critique integral to a well-rounded education.</p>

					    <p>The possibility for focused study in various areas/fields of literature and writing.
					    Opportunities for students to deepen and enrich their studio practice by offering courses focusing on the interaction of visual art, design, literature, and writing.</p></div>
				<?php else: ?>
				<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>
				<?php endif; ?>
				</div><!-- .content-wrap -->

				<?php do_atomic( 'close_main' ); // oxygen_close_main ?>

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // oxygen_after_main ?>

		<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>		

		<?php do_atomic( 'before_footer' ); // oxygen_before_footer ?>

		<div id="footer">

			<?php do_atomic( 'open_footer' ); // oxygen_open_footer ?>
			
			<div id="footer-content" class="footer-content">
				
				<?php echo apply_atomic_shortcode( 'footer_content', hybrid_get_setting( 'footer_insert' ) ); ?>
				
			</div>
				
			<?php get_template_part( 'menu', 'subsidiary' ); // Loads the menu-subsidiary.php template.  ?>

			<?php do_atomic( 'footer' ); // oxygen_footer ?>

			<?php do_atomic( 'close_footer' ); // oxygen_close_footer ?>

		</div><!-- #footer -->

		<?php do_atomic( 'after_footer' ); // oxygen_after_footer ?>
		
		</div><!-- .wrap -->

	</div><!-- #container -->

	<?php do_atomic( 'close_body' ); // oxygen_close_body ?>
	
	<?php wp_footer(); // wp_footer ?>

</body>
</html>