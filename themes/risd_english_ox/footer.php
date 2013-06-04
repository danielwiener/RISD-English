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
					<?php 
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('front_page_introduction') ) : ?>

						<!-- Sidebar fallback content -->

					<?php endif; // End Dynamic Sidebar exhibitions_summary ?></div>
					<?php elseif( 'faculty' == get_post_type() ): ?>
					<!-- do nothing -->
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
	<script type="text/javascript">

	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-40325017-1']);
	  _gaq.push(['_trackPageview']);

	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();

	</script>

</body>
</html>