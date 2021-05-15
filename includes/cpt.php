<?php

/**
 * @Author: Abdul Awal
 * @Date:   2021-05-10 01:24:14
 * @Last Modified by:   Abdul Awal
 * @Last Modified time: 2021-05-13 17:13:05
 */

if ( ! function_exists('tnc_pvfw_pdf_post_type') ) {

// Register Custom Post Type
function tnc_pvfw_pdf_post_type() {

	$labels = array(
		'name'                  => _x( 'PDF Viewer', 'Post Type General Name', 'pdf-viewer-by-themencode' ),
		'singular_name'         => _x( 'PDF Viewer', 'Post Type Singular Name', 'pdf-viewer-by-themencode' ),
		'menu_name'             => __( 'PDF Viewer', 'pdf-viewer-by-themencode' ),
		'name_admin_bar'        => __( 'PDF Viewer', 'pdf-viewer-by-themencode' ),
		'archives'              => __( 'PDF Viewer Archives', 'pdf-viewer-by-themencode' ),
		'attributes'            => __( 'PDF Viewer Attributes', 'pdf-viewer-by-themencode' ),
		'parent_item_colon'     => __( 'Parent PDF Viewer:', 'pdf-viewer-by-themencode' ),
		'all_items'             => __( 'All PDF Viewers', 'pdf-viewer-by-themencode' ),
		'add_new_item'          => __( 'Add New PDF Viewer', 'pdf-viewer-by-themencode' ),
		'add_new'               => __( 'Add New', 'pdf-viewer-by-themencode' ),
		'new_item'              => __( 'New PDF Viewer', 'pdf-viewer-by-themencode' ),
		'edit_item'             => __( 'Edit PDF Viewer', 'pdf-viewer-by-themencode' ),
		'update_item'           => __( 'Update PDF Viewer', 'pdf-viewer-by-themencode' ),
		'view_item'             => __( 'View PDF Viewer', 'pdf-viewer-by-themencode' ),
		'view_items'            => __( 'View PDF Viewer', 'pdf-viewer-by-themencode' ),
		'search_items'          => __( 'Search PDF Viewer', 'pdf-viewer-by-themencode' ),
		'not_found'             => __( 'Not found', 'pdf-viewer-by-themencode' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'pdf-viewer-by-themencode' ),
		'featured_image'        => __( 'Featured Image', 'pdf-viewer-by-themencode' ),
		'set_featured_image'    => __( 'Set featured image', 'pdf-viewer-by-themencode' ),
		'remove_featured_image' => __( 'Remove featured image', 'pdf-viewer-by-themencode' ),
		'use_featured_image'    => __( 'Use as featured image', 'pdf-viewer-by-themencode' ),
		'insert_into_item'      => __( 'Insert into PDF Viewer', 'pdf-viewer-by-themencode' ),
		'uploaded_to_this_item' => __( 'Uploaded to this PDF Viewer', 'pdf-viewer-by-themencode' ),
		'items_list'            => __( 'PDF Viewers list', 'pdf-viewer-by-themencode' ),
		'items_list_navigation' => __( 'PDF Viewers list navigation', 'pdf-viewer-by-themencode' ),
		'filter_items_list'     => __( 'Filter PDF Viewers list', 'pdf-viewer-by-themencode' ),
	);
	$args = array(
		'label'                 => __( 'PDF Viewer', 'pdf-viewer-by-themencode' ),
		'description'           => __( 'PDF Viewer items', 'pdf-viewer-by-themencode' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 10,
		'menu_icon'             => plugins_url() . '/' . PVFW_LITE_PLUGIN_DIR . '/images/pdf-viewer-icon-white.svg',
		'show_in_admin_bar'     => false,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'pdfviewer', $args );

		if( get_option( 'tnc_pvfw_permalink_flushed' ) != '1' ){
			flush_rewrite_rules();
			update_option( 'tnc_pvfw_permalink_flushed', '1', true );
		}
}
add_action( 'init', 'tnc_pvfw_pdf_post_type', 0 );

}