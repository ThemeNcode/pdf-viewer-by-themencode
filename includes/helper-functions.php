<?php

/**
 * @Author: Abdul Awal
 * @Date:   2021-05-11 00:04:08
 * @Last Modified by:   Abdul Awal
 * @Last Modified time: 2021-05-14 10:04:30
 */

if( ! function_exists( 'tnc_mail_to_friend') ){
	add_action("wp_ajax_tnc_mail_to_friend", "tnc_mail_to_friend");
	add_action("wp_ajax_nopriv_tnc_mail_to_friend", "tnc_mail_to_friend");

	function tnc_mail_to_friend() {

	   if ( !wp_verify_nonce( $_POST['nonce'], "tnc_mail_to_friend_nonce")) {
	      exit("Invalid Request");
	   }

		$uname 		= sanitize_text_field($_POST["yourname"]); 
		$fname 		= sanitize_text_field($_POST["friendsname"]);
		$sname 		= $_SERVER['SERVER_NAME'];
		$uemail 	= sanitize_email($_POST["youremailaddress"]); 
		$femail 	= sanitize_email($_POST["friendsemailaddress"]);
		$message 	= nl2br(sanitize_textarea_field($_POST["message"])); 
		$link 		= $share_url;
		$to 		= $femail;
		$subject 	= sanitize_text_field($_POST['email_subject']);
		$headers 	= "MIME-Version: 1.0" . "\r\n";
		$headers 	.= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers 	.= 'From: '.$uname.' <webmaster@'.$sname.'>' . "\r\n";
		$headers 	.= 'Reply-To:' . $uemail . "\r\n";
		$sendmail 	= mail($to,$subject,$message,$headers);

		if($sendmail){
			$result['type'] = "success";
		} else {
			$result['type'] = "error";
		}

		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
	      $result = json_encode($result);
	      echo $result;
	   }

	   die();
	}

}


if( ! function_exists( 'tnc_pvfw_create_viewer_url_callback' )){
	function tnc_pvfw_create_viewer_url_callback(){
		echo sprintf( esc_html__( 'Please create PDF Viewers using %s (PDF Viewer > Add New) before creating a shortcode.', 'pdf-viewer-by-themencode' ) , '<a href="'.admin_url( '/post-new.php?post_type=pdfviewer', $scheme = 'admin' ).'">this link</a>') ;
	}
}


if( ! function_exists( 'tnc_num_to_text' )){
	// convert 0 or 1 to Show or Hide.
	function tnc_num_to_text($value){
		if($value == '1' || $value == "true"){
			return "Show";
		} else {
			return "Hide";
		}
	}
}

if( ! function_exists( 'tnc_pvfw_generate_file_array' ) ){
	/**
	 * Take requested file url and return array with all the required fields to verify if the user has access.
	 * @param  $get_requested_file the requested file
	 * @return array 
	 */
	function tnc_pvfw_generate_file_array( $get_requested_file ){

		global $wpdb;

		$posts_table = $wpdb->prefix . 'posts';
		
		$uploadDir      = wp_upload_dir();
		$full_url       = $uploadDir['baseurl'] . $get_requested_file;
		$full_path      = $uploadDir['basedir'] . $get_requested_file;
		$fileInfo       = pathinfo($full_path);
		$isResizedImage   = false;

		$file_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM {$posts_table} WHERE guid = %s ", $full_url ) );

		if (empty($file_id)) {

			// Convert resized thumb url's to main file url
			$query_url = preg_replace("/(-\d+x\d+)/", "", $full_url);

			$file_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM {$posts_table} WHERE guid = %s ", $query_url ) );

			if ($file_id) {
			  $isResizedImage = true;
			}
		}

		$file_array = array(
			'id'                => $file_id, 
			'file_url'          => $full_url, 
			'file_path'         => $full_path,
			'is_resized_image'  => $isResizedImage
		);

		return $file_array;
	}
}


/* Filter the single_template with our custom function*/
add_filter('single_template', 'tnc_pvfw_single_pdf_viewer_template');

if( ! function_exists( 'tnc_pvfw_single_pdf_viewer_template' )){
	/**
	 * [tnc_pvfw_single_pdf_viewer_template description]
	 *
	 * @param  [type] $single [description].
	 * @return string template
	 */
	function tnc_pvfw_single_pdf_viewer_template($single) {

	    global $post;

	    if ( $post->post_type == 'pdfviewer' ) {
	    	$viewer_template_file = dirname(__FILE__) .'/../tnc-pdf-viewer-single.php';
	        if ( file_exists( $viewer_template_file ) ) {
	            return $viewer_template_file;
	        }
	    }

	    return $single;

	}
}

