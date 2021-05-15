<?php
/**
 * Register admin menu items
 *
 * Only the import menu register.
 *
 * @since [1.0]
 *
 * @package pdf-viewer-by-themencode
 */

add_action( 'admin_menu', 'tnc_pdf_lite_pdf_menu' );

/**
 * [tnc_pdf_menu description]
 */
function tnc_pdf_lite_pdf_menu() {
    add_submenu_page( 'edit.php?post_type=pdfviewer', 'Import PDF File - PDF Viewer for WordPress', 'Import PDF File', 'upload_files', 'themencode-pdf-viewer-import-file', 'tnc_pdf_lite_import_pdf_file_menu', 4 );
}

/**
 * [tnc_import_pdf_file description]
 */
function tnc_pdf_lite_import_pdf_file_menu() {
    if ( ! current_user_can( 'upload_files' ) )  {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    include dirname( __FILE__ ) . '/import-pdf-file.php';
}