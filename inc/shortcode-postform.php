				 
				  <form action="<?php the_permalink(); ?>" id="contactForm" method="post">

						<button class="sub " type="submit" id="submit">Order Now</button>


						<input type="hidden" name="intextextra" id="intextextra" value="true" />

						
					</form>
					function hlpostform( $atts, $content=null ) {
	$a = shortcode_atts( array(
		'data-percent' => '100',
		'data-color' => '20df6e',
		), $atts );
	$result =  '<div class="wrapper_canvas">';
	$result .='<canvas class="myCircle" data-percent="' . esc_attr($a['data-percent']) . '" data-color="' . esc_attr($a['data-color']) . '" width="500" height="500"></canvas>';
	$result .= '<span></span></div>';
	return force_balance_tags( $result );
}
add_shortcode( 'hlpostform', 'hlpostform' );