<?php  
/**
 * Sample implementation of the Custom Header feature.
 *
 * You can add an optional custom header image to header.php like so ...
 *
function theme_hlportfolio_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

}
	<?php endif; // End header image check. ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package hlportfolio
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses hlportfolio_header_style()
 */

function theme_hlportfolio() {
	
	add_theme_support( 'custom-logo', array(
		'flex-width' => true,
	) );

}
add_action( 'after_setup_theme', 'theme_hlportfolio' );
?>