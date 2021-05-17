<?php
if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'pvfw_csf_shortcodes';

  //
  // Create a shortcoder
CSF::createShortcoder( $prefix, array(
  'button_title'   => 'Add PDF Viewer',
  'select_title'   => 'Select Type',
  'insert_title'   => 'Insert PDF Viewer',
  'show_in_editor' => true,
  'gutenberg'      => array(
    'title'        => 'PDF Viewer',
    'description'  => 'Use this to Generate PDF Viewer for WordPress Shortcodes',
    'icon'         => 'pdf',
    'category'     => 'media',
    'keywords'     => array( 'shortcode', 'pdf', 'viewer' ),
    'placeholder'  => 'Use the Add PDF Viewer button above to generate shortcode...',
  )
) );

// tnc-pdf-viewer-iframe
CSF::createSection( $prefix, array(
  'title'     => 'Embed a PDF Viewer',
  'view'      => 'normal', 
  'shortcode' => 'pvfw-embed', 
  'fields'    => array(

    array(
      'type'    => 'subheading',
      'content' => 'Basic Options',
    ),

    array(
      'type'    => 'callback',
      'function' => 'tnc_pvfw_create_viewer_url_callback',
    ),

    array(
      'id'          => 'viewer_id',
      'type'        => 'select',
      'title'       => esc_html__( 'Select Viewer to Embed', 'pdf-viewer-by-themencode' ),
      'subtitle'    => esc_html__( 'Search using the viewer title', 'pdf-viewer-by-themencode' ),
      'placeholder' => esc_html__( 'Select a Viewer', 'pdf-viewer-by-themencode' ),
      'chosen'      => true,
      'ajax'        => true,
      'options'     => 'posts',
      'query_args'  => array(
        'post_type' => 'pdfviewer'
      )
    ),


    array(
      'id'    => 'width',
      'type'  => 'text',
      'title' => 'Width',
      'default'=> '100%',
    ),

    array(
      'id'    => 'height',
      'type'  => 'text',
      'title' => 'Height',
      'default' => '800'
    ),

    array(
      'id'    => 'iframe_title',
      'type'  => 'text',
      'title' => 'iFrame Title',
    ),

    array(
      'id'    => 'page',
      'type'  => 'text',
      'title' => 'Jump to page',
    ),
  )

) );

  // pvfw-link
  CSF::createSection( $prefix, array(
    'title'     => esc_html__( 'Link to a PDF Viewer', 'pdf-viewer-by-themencode' ),
    'view'      => 'normal', 
    'shortcode' => 'pvfw-link', 
    'fields'    => array(

      array(
        'type'    => 'subheading',
        'content' => 'Basic Options',
      ),

      array(
        'type'    => 'callback',
        'function' => 'tnc_pvfw_create_viewer_url_callback',
      ),

      array(
        'id'          => 'viewer_id',
        'type'        => 'select',
        'title'       => esc_html__( 'Select Viewer to Link to', 'pdf-viewer-by-themencode' ),
        'subtitle'    => esc_html__( 'Search using the viewer title', 'pdf-viewer-by-themencode' ),
        'placeholder' => esc_html__( 'Select a Viewer', 'pdf-viewer-by-themencode' ),
        'chosen'      => true,
        'ajax'        => true,
        'options'     => 'posts',
        'query_args'  => array(
          'post_type' => 'pdfviewer'
        )
      ),

      array(
        'id'    => 'text',
        'type'  => 'text',
        'title' => 'Link Text',
        'default'=> 'Open PDF',
      ),

      array(
        'id'    => 'class',
        'type'  => 'text',
        'title' => 'Link CSS Class',
        'default' => 'pdf-viewer-link-single'
      ),

      array(
        'id'          => 'target',
        'type'        => 'select',
        'title'       => 'Link Target',
        'placeholder' => 'Select Link Target',
        'options'     => array(
          '_blank'  => 'New Tab',
          '_parent'  => 'Same Tab',
        ),
        'default'     => '_parent'
      ),

      array(
        'id'    => 'page',
        'type'  => 'text',
        'title' => 'Jump to page',
      ),
    )

  ) );

}