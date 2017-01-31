<?php  	
function hlportfolio_form( $atts) {

		require get_template_directory() . '/inc/send.php';

		/* Output form */
		$content = '<form method="post" id="hlp-eform" class="shortcodes"';
		$content .= ' action="" enctype="multipart/form-data">';

		$content .= '<div id="hlp" class="hlp_column">';

		$content .= '<div class="hlp_submit_wrap">';

			$content .= '<div id="hlp_submit" class="hlp_column">';
				$content .= '<div class="hlp_input hlp_input_submit">';
					$content .= '<div class="hlp_eform_name">';
						$content .= '<label for="name">Name: </label>';
						$content .= '<input type="text" value="" name="hlp_contact_name">
					</div>';
					$content .= '<div class="hlp_eform_email">';
						$content .= '<label for="email">Email address: </label>';
						$content .= '<input type="text" value="" name="hlp_contact_email">
					</div>';
					$content .= '<div class="hlp_eform_subject">';
						$content .= '<label for="subject">Subject: </label>';
						$content .= '<input type="text" value="" name="hlp_contact_subject">
					</div>';
					$content .= '<div class="hlp_eform_message">';
						$content .= '<label for="message">Your Message: </label>';
						$content .= '<textarea type="text" value="" name="hlp_contact_message">
					</div>
				</div>	
			</div>';
		$content .= '</div>';
	
	$content .= '<input type="submit" id="hlp_submit_button" value="Send mail" class="hlp_contact_submit btn btn-primary btn-lg btn-block" />';
	$content .= '<div class="clear"></div></div></form>';

return $content ;

}

add_shortcode( 'hlportfolio_form', 'hlportfolio_form' );
?>