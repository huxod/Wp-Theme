<?php
function do_send_message() {
	function wpdocs_set_html_mail_content_type() {
		return 'text/html';
	}
	$name = ( isset( $_POST['hlp_contact_name'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_name'] ) ) : "";
	$address = ( isset( $_POST['hlp_contact_address'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_address'] ) ) : "";
	$email = ( isset( $_POST['hlp_contact_email'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_email'] ) ) : "";
	$subject = ( isset( $_POST['hlp_contact_subject'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_subject'] ) ) : "";
	$messages = ( isset( $_POST['hlp_contact_message'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_message'] ) ) : "";
	$phone = ( isset( $_POST['hlp_contact_phone'] ) && $hlp_form_count == $form_submited ) ? htmlspecialchars( stripslashes( $_POST['hlp_contact_phone'] ) ) : "";


    //send email  wp_mail( $to, $subject, $message, $headers, $attachments ); ex:
	add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );

	$name = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $name ) ) );
	$address = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $address ) ) );
	$email = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $email ) ) );
	$subject = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $subject ) ) );
	$message = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $message ) ) );
	$phone = strip_tags( preg_replace( '/<[^>]*>/', '', preg_replace( '/<script.*<\/[^>]*>/', '', $phone ) ) );

	if ( isset( $_POST['hlp_contact_name']) && isset( $_POST['hlp_contact_email']) && isset( $_POST['hlp_contact_message']) ) {

		$to  =  get_option( 'admin_email' );
		$message =  $subject."\r\n".$messages;
		$body = '<body><h3>'.$subject.'</h3><h4>'.$messages.'</h4></body>';
		$headers[] = 'From: H.L Portfolio <'.$email.'>';
		$headers[] = 'Cc: '.$name.' <'.$to.'>';
		//$headers[] = 'Cc: iluvwp@wordpress.org';  note you can just use a simple email address
		wp_mail( $to, $subject , $body, $headers);
		remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
	}

}
	if ( isset( $_POST['hlp_contact_name']) && isset( $_POST['hlp_contact_email']) && isset( $_POST['hlp_contact_message']) ) {
do_send_message();
}
?>