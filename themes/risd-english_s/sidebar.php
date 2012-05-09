<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package RISD English
 * @since RISD English 1.0
 */
?>
		<div id="secondary"  role="complementary">
			<nav role="navigation" class="site-navigation main-navigation">
				<h1 class="assistive-text"><?php _e( 'Menu', 'risd_english' ); ?></h1>
				<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'risd_english' ); ?>"><?php _e( 'Skip to content', 'risd_english' ); ?></a></div>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav>
		</div><!-- #secondary .widget-area -->
