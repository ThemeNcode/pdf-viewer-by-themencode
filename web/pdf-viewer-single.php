<?php
/**
 * Single Viewer template
 *
 * This template is used for pdfviewer post type single page.
 *
 * @since 10.0
 *
 * @package pdf-viewer-by-themencode
 */

$_GET  = filter_input_array( INPUT_GET, FILTER_SANITIZE_STRING );
$_POST = filter_input_array( INPUT_POST, FILTER_SANITIZE_STRING );

// Get settings.
$get_pvfw_global_settings = get_option( 'pvfw_csf_options' );
$get_pvfw_single_settings = get_post_meta( get_the_ID(), 'tnc_pvfw_pdf_viewer_fields', true );

$file        = $get_pvfw_single_settings['file'];
$encode_file = base64_encode( $get_pvfw_single_settings['file'] );


//retrieve options
$find         = ( $get_pvfw_single_settings['find'] == '0' ) ? 'off' : 'on';
$pagenav      = ( $get_pvfw_single_settings['pagenav'] == '0' ) ? 'off' : 'on';
$share        = ( $get_pvfw_single_settings['share'] == '0' ) ? 'off' : 'on';
$zoom         = ( $get_pvfw_single_settings['zoom'] == '0' ) ? 'off' : 'on';
$logo         = ( $get_pvfw_single_settings['logo'] == '0' ) ? 'off' : 'on';
$print        = ( $get_pvfw_single_settings['print'] == '0' ) ? 'off' : 'on';
$open         = ( $get_pvfw_single_settings['open'] == '0' ) ? 'off' : 'on';
$download     = ( $get_pvfw_single_settings['download'] == '0' ) ? 'off' : 'on';
$fullscreen   = ( $get_pvfw_single_settings['fullscreen'] == '0' ) ? 'off' : 'on';
$current_view = ( $get_pvfw_single_settings['current_view'] == '0' ) ? 'off' : 'on';
$rotate       = ( $get_pvfw_single_settings['rotate'] == '0' ) ? 'off' : 'on';
$handtool     = ( $get_pvfw_single_settings['handtool'] == '0' ) ? 'off' : 'on';
$doc_prop     = ( $get_pvfw_single_settings['doc_prop'] == '0' ) ? 'off' : 'on';
$toggle_menu  = ( $get_pvfw_single_settings['toggle_menu'] == '0' ) ? 'off' : 'on';
$toggle_left  = ( $get_pvfw_single_settings['toggle_left'] == '0' ) ? 'off' : 'on';
$scroll       = ( $get_pvfw_single_settings['scroll'] == '0' ) ? 'off' : 'on';
$spread       = ( $get_pvfw_single_settings['spread'] == '0' ) ? 'off' : 'on';



$tnc_pvfw_look       = $get_pvfw_single_settings['appearance-select-type'];
$tnc_pvfw_theme      = $get_pvfw_single_settings['appearance-select-theme'];

$logo_image_url         = $get_pvfw_global_settings['general-logo']['url'];
$custom_css             = $get_pvfw_global_settings['custom-css'];
$viewer_language        = $get_pvfw_single_settings['language'];
$get_return_link_text   = $get_pvfw_global_settings['general-return-text'];
$default_scroll_setting = $get_pvfw_single_settings['default_scroll'];
$default_spread_setting = $get_pvfw_single_settings['default_spread'];
$return_link            = $get_pvfw_single_settings['return-link'];

if( empty( $viewer_language ) ){
  $viewer_language        = 'en-US';
}

if( empty( $default_scroll_setting ) ){
  $default_scroll_setting        = '0';
}

if( empty( $default_spread_setting ) ){
  $default_spread_setting        = '0';
}

if( isset( $default_scroll_setting ) && ! empty( $default_scroll_setting ) ){
  $default_scroll   = $default_scroll_setting;
} else {
  $default_scroll   = '0';
}

if( isset( $default_spread_setting ) && ! empty( $default_spread_setting ) ){
  $default_spread   = $default_spread_setting;
} else {
  $default_spread   = '0';
}

switch ($tnc_pvfw_look) {
  case 'select-theme':
  $style_theme = $tnc_pvfw_theme.'.css';
  break;

  default:
    $style_theme = 'midnight-calm.css';
    break;
}

//display functions
function tnc_pvfw_viewer_display_share( $p_share ) {
  if( $p_share == 'off' ){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_download( $p_download ) {
  if($p_download == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_print($p_print){
  if($p_print == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_zoom($p_zoom){
  if($p_zoom == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_fullscreen($p_fullscreen){
  if($p_fullscreen == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_open($p_open){
  if($p_open == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_logo($p_logo){
  if($p_logo == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_pagenav($p_pagenav){
  if($p_pagenav == 'off'){
    echo "display: none";
  } 
}
function tnc_pvfw_viewer_display_find($p_find){
  if($p_find == 'off'){
    echo "display: none";
  }
}
function tnc_pvfw_viewer_display_current_view($p_current_view){
  if($p_current_view == 'off'){
    echo "display: none";
  }
}
function tnc_pvfw_viewer_display_rotate($p_rotate){
  if($p_rotate == 'off'){
    echo "display: none";
  }
}
function tnc_pvfw_viewer_display_handtool($p_handtool){
  if($p_handtool == 'off'){
    echo "display: none";
  }
}
function tnc_pvfw_viewer_display_doc_prop($p_doc_prop){
  if($p_doc_prop == 'off'){
    echo "display: none";
  }
}
function tnc_pvfw_viewer_display_toggle_menu($p_toggle_menu){
  if($p_toggle_menu == 'off'){
    echo "display: none";
  }
}

function tnc_pvfw_viewer_display_toggle_left($p_toggle_left){
  if($p_toggle_left == 'off'){
    echo "display: none";
  }
}

function tnc_pvfw_viewer_display_scroll($p_scroll){
  if($p_scroll == 'off'){
    echo "display: none";
  }
}

function tnc_pvfw_viewer_display_spread($p_spread){
  if($p_spread == 'off'){
    echo "display: none";
  }
}

if( function_exists( 'wfam_has_access' ) ){
  $divide_file_url      = explode( "uploads", $file );
  $get_requested_file   = $divide_file_url[1];

  $file_requested = tnc_pvfw_generate_file_array( $get_requested_file );

  if( ! wfam_has_access( $file_requested ) ){
    $get_wfam_heading  = $get_pvfw_single_settings['wfam-error-heading'];
    $get_wfam_content  = $get_pvfw_single_settings['wfam-error-content'];
    $get_wfam_btn_text = $get_pvfw_single_settings['wfam-error-btn-text'];
    $get_wfam_btn_url   = $get_pvfw_single_settings['wfam-error-btn-url'];

    if( empty( $get_wfam_heading ) ){
      $get_wfam_heading = esc_html__( 'SORRY', 'pdf-viewer-by-themencode' );
    }

    if( empty( $get_wfam_content ) ){
      $get_wfam_content = esc_html__( 'You do not have permission to view this file, please contact us if you think this was by a mistake.', 'pdf-viewer-by-themencode' );
    }

    if( empty( $get_wfam_btn_text ) ){
      $get_wfam_btn_text = esc_html__( 'Go To Homepage', 'pdf-viewer-by-themencode' );
    }

    if( empty( $get_wfam_btn_url ) ){
      $get_wfam_btn_url = home_url();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="google" content="notranslate">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?php echo esc_html__( get_option( 'tnc_pvfw_favicon' ), 'pdf-viewer-by-themencode' ); ?>">
  <title><?php echo esc_html_e( "Permission Denied", $domain = 'pdf-viewer-by-themencode' ); ?> - <?php bloginfo( 'name' ); ?></title>
  <meta property="og:image" content="<?php if( has_post_thumbnail( get_the_ID() )){ echo get_the_post_thumbnail_url('full' ); } else { echo apply_filters( 'tnc_pvfw_facebook_share_thumb_url', plugins_url().'/'.PVFW_LITE_PLUGIN_DIR.'/images/thumb.png' ); } ?>">
  <meta name="twitter:card" content="summary_large_image">
  <style type="text/css">
    .pvfw-not-allowed{
      margin: 100px auto;
      text-align: center;
      font-family: arial;
    }
    .pvfw-not-allowed h1{
      font-size: 10em;
      margin: 0;
      color: #999;
      text-shadow: 0px 0px 5px #eee;
    }
    .pvfw-not-allowed p{
      font-size: 15px;
    }
    .pvfw-not-allowed a.tnc-go-home-btn{
      padding: 15px 30px;
      text-decoration: none;
      display: inline-block;
      border: 2px solid #999;
      color: #333;
      font-weight: bold;
      margin-top: 30px;
    }

    @media only screen and (max-width: 600px){
      .pvfw-not-allowed h1{
        font-size: 5em;
      }
    }
  </style>

  <?php do_action( 'tnc_pvfw_not_allowed_head' ); ?>

</head>
<body <?php body_class(); ?> >
  <div class='pvfw-not-allowed'>
    <h1><?php echo $get_wfam_heading; ?></h1>
    <p><?php echo $get_wfam_content; ?></p>
    <a class='tnc-btn tnc-go-home-btn' href='<?php echo $get_wfam_btn_url; ?>'><?php echo $get_wfam_btn_text; ?></a>
  </div>
</body>
</html>

<?php
    die();
  }
}
?>
<!DOCTYPE html>
<!--
Copyright 2012 Mozilla Foundation

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.

Adobe CMap resources are covered by their own copyright but the same license:

    Copyright 1990-2015 Adobe Systems Incorporated.

See https://github.com/adobe-type-tools/cmap-resources
-->
<html dir="ltr" mozdisallowselectionprint>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="google" content="notranslate">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo esc_html__( get_option( 'tnc_pvfw_favicon' ), 'pdf-viewer-by-themencode' ); ?>">
    <title><?php echo get_the_title(); ?> - <?php bloginfo('name'); ?></title>
  
    <meta property="og:image" content="<?php if( has_post_thumbnail( get_the_ID() )){ echo get_the_post_thumbnail_url(get_the_ID(), 'full'); } else { echo apply_filters( 'tnc_pvfw_facebook_share_thumb_url', plugins_url().'/'.PVFW_LITE_PLUGIN_DIR.'/images/thumb.png' ); } ?>">
    <meta name="twitter:card" content="summary_large_image">

    <link rel="resource" type="application/l10n" href="<?php echo plugins_url() . '/' . PVFW_LITE_PLUGIN_DIR . '/web/locale/locale.properties';  ?>" >

    <style type="text/css">
        #tnc-share{
          display: none;
          position: absolute !important;
          margin-top: 32px;
          left: 100px;
          padding: 4px 2px;
        }
        .logo_text a img {
          max-width: 120px;
        }
        .s-btn-style{
          border: 0;
          border-radius: 4px;
          moz-border-radius: 4px;
          color: #ffffff;
          padding: 8px 20px;
          font-weight: bold;
          background: #0a772b;
          margin: 10px 0;
        }
        .r-btn-style{
          border: 0;
          border-radius: 4px;
          moz-border-radius: 4px;
          color: #ffffff;
          padding: 8px 20px;
          font-weight: bold;
          background: #d20808;
          margin: 10px 0;
        }
        .send-to-friend h3{
          text-align: center;
          margin: 10px 0;
        }
        .send-to-friend input[type="text"], .send-to-friend input[type="email"]{
          margin: 10px 0;
          padding: 5px 10px;
          border: 1px solid #eee;
          width: 90%;
          max-width: 100%;
        }
        .send-to-friend textarea{
          margin: 10px 0;
          padding: 5px 10px;
          border: 1px solid #eee;
          width: 90%;
          max-width: 100%;
        }
        .email-result{
          margin: 10px 0;
          text-align: center;
          font-weight: bold;
        }
        @media only screen and (max-width: 380px){
          #tnc-share{
            left: 0px;
            top:0px;
          }
        }
        @media only screen and (max-width: 900px){
          .logo_text {
            display: none;
          }
        }
        #overlayContainer{
          top:0;
          left: 0;
        }
        @media print{
          #overlayContainer{
            display: none;
          }
        }
        html .secondaryToolbarButton:before {
            display: none!important;
        }
        html .secondaryToolbarButton {
            padding-left: 0px!important;
        }
        html .secondaryToolbarButton {
            text-align: center!important;
        }
        <?php echo $custom_css; ?>
    </style>

    <?php do_action( 'wp_head' ); ?>
    <?php do_action( 'tnc_pvfw_head' ); ?>
  </head>
  <body <?php body_class('loadingInProgress'); ?> tabindex="1">
    <div id="outerContainer">

      <div id="sidebarContainer">
        <div id="toolbarSidebar">
          <div id="toolbarSidebarLeft">
            <div class="splitToolbarButton toggled">
              <button id="viewThumbnail" class="toolbarButton toggled" title="Show Thumbnails" tabindex="2" data-l10n-id="thumbs">
                 <span data-l10n-id="thumbs_label">Thumbnails</span>
              </button>
              <button id="viewOutline" class="toolbarButton" title="Show Document Outline (double-click to expand/collapse all items)" tabindex="3" data-l10n-id="document_outline">
                 <span data-l10n-id="document_outline_label">Document Outline</span>
              </button>
              <button id="viewAttachments" class="toolbarButton" title="Show Attachments" tabindex="4" data-l10n-id="attachments">
                 <span data-l10n-id="attachments_label">Attachments</span>
              </button>
              <button id="viewLayers" class="toolbarButton" title="Show Layers (double-click to reset all layers to the default state)" tabindex="5" data-l10n-id="layers">
                 <span data-l10n-id="layers_label">Layers</span>
              </button>
            </div>
          </div>
          <div id="toolbarSidebarRight">
            <div id="outlineOptionsContainer" class="hidden">
              <div class="verticalToolbarSeparator"></div>
              <button id="currentOutlineItem" class="toolbarButton" disabled="disabled" title="Find Current Outline Item" tabindex="6" data-l10n-id="current_outline_item">
                <span data-l10n-id="current_outline_item_label">Current Outline Item</span>
              </button>
            </div>
          </div>
        </div>
        <div id="sidebarContent">
          <div id="thumbnailView">
          </div>
          <div id="outlineView" class="hidden">
          </div>
          <div id="attachmentsView" class="hidden">
          </div>
          <div id="layersView" class="hidden">
          </div>
        </div>
        <div id="sidebarResizer"></div>
      </div>  <!-- sidebarContainer -->

      <div id="mainContainer">
        <div style="<?php tnc_pvfw_viewer_display_find($find); ?>" class="findbar hidden doorHanger" id="findbar">
          <div id="findbarInputContainer">
            <input id="findInput" class="toolbarField" title="Find" placeholder="Find in document…" tabindex="91" data-l10n-id="find_input">
            <div class="splitToolbarButton">
              <button id="findPrevious" class="toolbarButton findPrevious" title="Find the previous occurrence of the phrase" tabindex="92" data-l10n-id="find_previous">
                <span data-l10n-id="find_previous_label">Previous</span>
              </button>
              <div class="splitToolbarButtonSeparator"></div>
              <button id="findNext" class="toolbarButton findNext" title="Find the next occurrence of the phrase" tabindex="93" data-l10n-id="find_next">
                <span data-l10n-id="find_next_label">Next</span>
              </button>
            </div>
          </div>

          <div id="findbarOptionsOneContainer">
            <input type="checkbox" id="findHighlightAll" class="toolbarField" tabindex="94">
            <label for="findHighlightAll" class="toolbarLabel" data-l10n-id="find_highlight">Highlight all</label>
            <input type="checkbox" id="findMatchCase" class="toolbarField" tabindex="95">
            <label for="findMatchCase" class="toolbarLabel" data-l10n-id="find_match_case_label">Match case</label>
          </div>

          <div id="findbarOptionsTwoContainer">
            <input type="checkbox" id="findEntireWord" class="toolbarField" tabindex="96">
            <label for="findEntireWord" class="toolbarLabel" data-l10n-id="find_entire_word_label">Whole words</label>
            <span id="findResultsCount" class="toolbarLabel hidden"></span>
          </div>

          <div id="findbarMessageContainer">
            <span id="findMsg" class="toolbarLabel"></span>
          </div>
        </div>  <!-- findbar -->

        <div id="secondaryToolbar" class="secondaryToolbar hidden doorHangerRight">
          <div id="secondaryToolbarButtonContainer">
            <button style="<?php tnc_pvfw_viewer_display_fullscreen($fullscreen); ?>" id="secondaryPresentationMode" class="secondaryToolbarButton presentationMode visibleLargeView" title="Switch to Presentation Mode" tabindex="51" data-l10n-id="presentation_mode">
              <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
            </button>

            <button style="<?php tnc_pvfw_viewer_display_open($open); ?>" id="secondaryOpenFile" class="secondaryToolbarButton openFile visibleLargeView" title="Open File" tabindex="52" data-l10n-id="open_file">
              <span data-l10n-id="open_file_label">Open</span>
            </button>

            <button style="<?php tnc_pvfw_viewer_display_print($print); ?>" id="secondaryPrint" class="secondaryToolbarButton print visibleMediumView" title="Print" tabindex="53" data-l10n-id="print">
              <span data-l10n-id="print_label">Print</span>
            </button>

            <button style="<?php tnc_pvfw_viewer_display_download($download); ?>" id="secondaryDownload" class="secondaryToolbarButton download visibleMediumView" title="Download" tabindex="54" data-l10n-id="download">
              <span data-l10n-id="download_label">Download</span>
            </button>

            <a style="<?php tnc_pvfw_viewer_display_current_view($current_view); ?>" href="#" id="secondaryViewBookmark" class="secondaryToolbarButton bookmark visibleSmallView" title="Current view (copy or open in new window)" tabindex="55" data-l10n-id="bookmark">
              <span data-l10n-id="bookmark_label">Current View</span>
            </a>

            <div class="horizontalToolbarSeparator visibleLargeView"></div>

            <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" id="firstPage" class="secondaryToolbarButton firstPage" title="Go to First Page" tabindex="56" data-l10n-id="first_page">
              <span data-l10n-id="first_page_label">Go to First Page</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" id="lastPage" class="secondaryToolbarButton lastPage" title="Go to Last Page" tabindex="57" data-l10n-id="last_page">
              <span data-l10n-id="last_page_label">Go to Last Page</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button style="<?php tnc_pvfw_viewer_display_rotate($rotate); ?>" id="pageRotateCw" class="secondaryToolbarButton rotateCw" title="Rotate Clockwise" tabindex="58" data-l10n-id="page_rotate_cw">
              <span data-l10n-id="page_rotate_cw_label">Rotate Clockwise</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_rotate($rotate); ?>" id="pageRotateCcw" class="secondaryToolbarButton rotateCcw" title="Rotate Counterclockwise" tabindex="59" data-l10n-id="page_rotate_ccw">
              <span data-l10n-id="page_rotate_ccw_label">Rotate Counterclockwise</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button style="<?php tnc_pvfw_viewer_display_handtool($handtool); ?>" id="cursorSelectTool" class="secondaryToolbarButton selectTool toggled" title="Enable Text Selection Tool" tabindex="60" data-l10n-id="cursor_text_select_tool">
              <span data-l10n-id="cursor_text_select_tool_label">Text Selection Tool</span>
            </button>

            <button style="<?php tnc_pvfw_viewer_display_handtool($handtool); ?>" id="cursorHandTool" class="secondaryToolbarButton handTool" title="Enable Hand Tool" tabindex="61" data-l10n-id="cursor_hand_tool">
              <span data-l10n-id="cursor_hand_tool_label">Hand Tool</span>
            </button>

            <div class="horizontalToolbarSeparator"></div>

            <button style="<?php tnc_pvfw_viewer_display_scroll($scroll); ?>" id="scrollVertical" class="secondaryToolbarButton scrollModeButtons scrollVertical toggled" title="Use Vertical Scrolling" tabindex="62" data-l10n-id="scroll_vertical">
              <span data-l10n-id="scroll_vertical_label">Vertical Scrolling</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_scroll($scroll); ?>" id="scrollHorizontal" class="secondaryToolbarButton scrollModeButtons scrollHorizontal" title="Use Horizontal Scrolling" tabindex="63" data-l10n-id="scroll_horizontal">
              <span data-l10n-id="scroll_horizontal_label">Horizontal Scrolling</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_scroll($scroll); ?>" id="scrollWrapped" class="secondaryToolbarButton scrollModeButtons scrollWrapped" title="Use Wrapped Scrolling" tabindex="64" data-l10n-id="scroll_wrapped">
              <span data-l10n-id="scroll_wrapped_label">Wrapped Scrolling</span>
            </button>

            <div class="horizontalToolbarSeparator scrollModeButtons"></div>

            <button style="<?php tnc_pvfw_viewer_display_spread($spread); ?>" id="spreadNone" class="secondaryToolbarButton spreadModeButtons spreadNone toggled" title="Do not join page spreads" tabindex="66" data-l10n-id="spread_none">
              <span data-l10n-id="spread_none_label">No Spreads</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_spread($spread); ?>" id="spreadOdd" class="secondaryToolbarButton spreadModeButtons spreadOdd" title="Join page spreads starting with odd-numbered pages" tabindex="67" data-l10n-id="spread_odd">
              <span data-l10n-id="spread_odd_label">Odd Spreads</span>
            </button>
            <button style="<?php tnc_pvfw_viewer_display_spread($spread); ?>" id="spreadEven" class="secondaryToolbarButton spreadModeButtons spreadEven" title="Join page spreads starting with even-numbered pages" tabindex="68" data-l10n-id="spread_even">
              <span data-l10n-id="spread_even_label">Even Spreads</span>
            </button>

            <div class="horizontalToolbarSeparator spreadModeButtons"></div>

            <button style="<?php tnc_pvfw_viewer_display_doc_prop($doc_prop); ?>" id="documentProperties" class="secondaryToolbarButton documentProperties" title="Document Properties…" tabindex="69" data-l10n-id="document_properties">

              <span data-l10n-id="document_properties_label">Document Properties…</span>
            </button>
          </div>
        </div>  <!-- secondaryToolbar -->

        <div class="toolbar">
          <div id="toolbarContainer">
            <div id="toolbarViewer">
              <div id="toolbarViewerLeft">
                <button style="<?php tnc_pvfw_viewer_display_toggle_left($toggle_left); ?>" id="sidebarToggle" class="toolbarButton" title="Toggle Sidebar" tabindex="11" data-l10n-id="toggle_sidebar">
                  <span data-l10n-id="toggle_sidebar_label">Toggle Sidebar</span>
                </button>
                <div class="toolbarButtonSpacer"></div>
                <button style="<?php tnc_pvfw_viewer_display_find($find); ?>" id="viewFind" class="toolbarButton" title="Find in Document" tabindex="12" data-l10n-id="findbar">
                  <span data-l10n-id="findbar_label">Find</span>
                </button>
                <div style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" class="splitToolbarButton hiddenSmallView">
                  <button class="toolbarButton pageUp" title="Previous Page" id="previous" tabindex="13" data-l10n-id="previous">
                    <span data-l10n-id="previous_label">Previous</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button class="toolbarButton pageDown" title="Next Page" id="next" tabindex="14" data-l10n-id="next">
                    <span data-l10n-id="next_label">Next</span>
                  </button>
                </div>

                <input style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" type="number" id="pageNumber" class="toolbarField pageNumber" title="Page" value="1" size="4" min="1" tabindex="15" data-l10n-id="page">
                <span style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" id="numPages" class="toolbarLabel"></span>
                <span class="social_icon_d" id="open_slink" style="<?php tnc_pvfw_viewer_display_share($share); ?>"></span>
                
                <div class="tnc_social_share" id="tnc-share" style="display: none;">
                  <?php
                    function pagelink(){
                      $pageURL = 'http';
                      if ( isset( $_SERVER["HTTPS"] ) && strtolower( $_SERVER["HTTPS"] ) == "on" ) {
                        $pageURL .= "s";
                      }
                      $pageURL .= "://";
                      if ($_SERVER["SERVER_PORT"] != "80") {
                        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                      } else {
                      $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                      }
                      return $pageURL;
                    }
                    $share_url = pagelink();
                  ?>
                    <ul>
                      <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo esc_html($share_url); ?>" target="_blank" class="tnc_fb">Facebook</a></li>
                      <li><a href="https://twitter.com/intent/tweet?url=<?php echo esc_html($share_url); ?>&text=I Liked this pdf" target="_blank" class="tnc_tw">Twitter</a></li>
                      <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_html($share_url); ?>" target="_blank" class="tnc_lin">Linkedin</a></li>
                      <li><a href="https://api.whatsapp.com/send?text=<?php echo esc_html($share_url); ?>" target="_blank" class="tnc_whatsapp">WhatsApp</a></li>
                      <li><a href="#sendtofriend" rel="modal:open" class="tnc_email">Email</a></li>
                    </ul>
                </div>
              </div>
              <div id="toolbarViewerRight">
                <div style="<?php tnc_pvfw_viewer_display_logo($logo); ?>" class="logo_block"><h3 class="logo_text"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $logo_image_url; ?>" class="tnc_logo_image" /></a></h3></div>

                <button style="<?php tnc_pvfw_viewer_display_fullscreen($fullscreen); ?>" id="presentationMode" class="toolbarButton presentationMode hiddenLargeView" title="Switch to Presentation Mode" tabindex="31" data-l10n-id="presentation_mode">
                  <span data-l10n-id="presentation_mode_label">Presentation Mode</span>
                </button>

                <button style="<?php tnc_pvfw_viewer_display_open($open); ?>" id="openFile" class="toolbarButton openFile hiddenLargeView" title="Open File" tabindex="32" data-l10n-id="open_file">
                  <span data-l10n-id="open_file_label">Open</span>
                </button>

                <button style="<?php tnc_pvfw_viewer_display_print($print); ?>" id="print" class="toolbarButton print hiddenMediumView" title="Print" tabindex="33" data-l10n-id="print">
                  <span data-l10n-id="print_label">Print</span>
                </button>

                <button style="<?php tnc_pvfw_viewer_display_download($download); ?>" id="download" class="toolbarButton download hiddenMediumView" title="Download" tabindex="34" data-l10n-id="download">
                  <span data-l10n-id="download_label">Download</span>
                </button>
                <a style="<?php tnc_pvfw_viewer_display_current_view($current_view); ?>" href="#" id="viewBookmark" class="toolbarButton bookmark hiddenSmallView" title="Current view (copy or open in new window)" tabindex="35" data-l10n-id="bookmark">
                  <span data-l10n-id="bookmark_label">Current View</span>
                </a>

                <div class="verticalToolbarSeparator hiddenSmallView"></div>

                <button style="<?php tnc_pvfw_viewer_display_toggle_menu($toggle_menu); ?>" id="secondaryToolbarToggle" class="toolbarButton" title="Tools" tabindex="36" data-l10n-id="tools">
                  <span data-l10n-id="tools_label">Tools</span>
                </button>
              </div>
              <div style="<?php tnc_pvfw_viewer_display_zoom($zoom); ?>" id="toolbarViewerMiddle">
                <div class="splitToolbarButton">
                  <button id="zoomOut" class="toolbarButton zoomOut" title="Zoom Out" tabindex="21" data-l10n-id="zoom_out">
                    <span data-l10n-id="zoom_out_label">Zoom Out</span>
                  </button>
                  <div class="splitToolbarButtonSeparator"></div>
                  <button id="zoomIn" class="toolbarButton zoomIn" title="Zoom In" tabindex="22" data-l10n-id="zoom_in">
                    <span data-l10n-id="zoom_in_label">Zoom In</span>
                   </button>
                </div>
                <span id="scaleSelectContainer" class="dropdownToolbarButton">
                  <select id="scaleSelect" title="Zoom" tabindex="23" data-l10n-id="zoom">
                    <option id="pageAutoOption" title="" value="auto" selected="selected" data-l10n-id="page_scale_auto">Automatic Zoom</option>
                    <option id="pageActualOption" title="" value="page-actual" data-l10n-id="page_scale_actual">Actual Size</option>
                    <option id="pageFitOption" title="" value="page-fit" data-l10n-id="page_scale_fit">Page Fit</option>
                    <option id="pageWidthOption" title="" value="page-width" data-l10n-id="page_scale_width">Page Width</option>
                    <option id="customScaleOption" title="" value="custom" disabled="disabled" hidden="true"></option>
                    <option title="" value="0.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 50 }'>50%</option>
                    <option title="" value="0.75" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 75 }'>75%</option>
                    <option title="" value="1" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 100 }'>100%</option>
                    <option title="" value="1.25" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 125 }'>125%</option>
                    <option title="" value="1.5" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 150 }'>150%</option>
                    <option title="" value="2" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 200 }'>200%</option>
                    <option title="" value="3" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 300 }'>300%</option>
                    <option title="" value="4" data-l10n-id="page_scale_percent" data-l10n-args='{ "scale": 400 }'>400%</option>
                  </select>
                </span>
              </div>
            </div>
            <div id="loadingBar">
              <div class="progress">
                <div class="glimmer">
                </div>
              </div>
            </div>
          </div>
        </div>

        <menu type="context" id="viewerContextMenu">
          <menuitem id="contextFirstPage" label="First Page"
                    data-l10n-id="first_page"></menuitem>
          <menuitem id="contextLastPage" label="Last Page"
                    data-l10n-id="last_page"></menuitem>
          <menuitem style="<?php tnc_pvfw_viewer_display_rotate($rotate); ?>" id="contextPageRotateCw" label="Rotate Clockwise"
                    data-l10n-id="page_rotate_cw"></menuitem>
          <menuitem style="<?php tnc_pvfw_viewer_display_rotate($rotate); ?>" id="contextPageRotateCcw" label="Rotate Counter-Clockwise"
                    data-l10n-id="page_rotate_ccw"></menuitem>
        </menu>

        <div id="viewerContainer" tabindex="0">
          <div id="viewer" class="pdfViewer"></div>
        </div>

        <div id="errorWrapper" hidden='true'>
          <div id="errorMessageLeft">
            <span id="errorMessage"></span>
            <button id="errorShowMore" data-l10n-id="error_more_info">
              More Information
            </button>
            <button id="errorShowLess" data-l10n-id="error_less_info" hidden='true'>
              Less Information
            </button>
          </div>
          <div id="errorMessageRight">
            <button id="errorClose" data-l10n-id="error_close">
              Close
            </button>
          </div>
          <div class="clearBoth"></div>
          <textarea id="errorMoreInfo" hidden='true' readonly="readonly"></textarea>
        </div>
      </div> <!-- mainContainer -->

      <div id="overlayContainer" class="hidden">
        <div id="passwordOverlay" class="container hidden">
          <div class="dialog">
            <div class="row">
              <p id="passwordText" data-l10n-id="password_label">Enter the password to open this PDF file:</p>
            </div>
            <div class="row">
              <input type="password" id="password" class="toolbarField">
            </div>
            <div class="buttonRow">
              <button id="passwordCancel" class="overlayButton"><span data-l10n-id="password_cancel">Cancel</span></button>
              <button id="passwordSubmit" class="overlayButton"><span data-l10n-id="password_ok">OK</span></button>
            </div>
          </div>
        </div>
        <div id="documentPropertiesOverlay" class="container hidden">
          <div class="dialog">
            <div class="row">
              <span data-l10n-id="document_properties_file_name">File name:</span> <p id="fileNameField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_file_size">File size:</span> <p id="fileSizeField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_title">Title:</span> <p id="titleField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_author">Author:</span> <p id="authorField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_subject">Subject:</span> <p id="subjectField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_keywords">Keywords:</span> <p id="keywordsField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creation_date">Creation Date:</span> <p id="creationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_modification_date">Modification Date:</span> <p id="modificationDateField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_creator">Creator:</span> <p id="creatorField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_producer">PDF Producer:</span> <p id="producerField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_version">PDF Version:</span> <p id="versionField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_page_count">Page Count:</span> <p id="pageCountField">-</p>
            </div>
            <div class="row">
              <span data-l10n-id="document_properties_page_size">Page Size:</span> <p id="pageSizeField">-</p>
            </div>
            <div class="separator"></div>
            <div class="row">
              <span data-l10n-id="document_properties_linearized">Fast Web View:</span> <p id="linearizedField">-</p>  
            </div>
            <div class="buttonRow">
              <button id="documentPropertiesClose" class="overlayButton"><span data-l10n-id="document_properties_close">Close</span></button>
            </div>
          </div>
        </div>
        <div id="printServiceOverlay" class="container hidden">
          <div class="dialog">
            <div class="row">
              <span data-l10n-id="print_progress_message">Preparing document for printing…</span>
            </div>
            <div class="row">
              <progress value="0" max="100"></progress>
              <span data-l10n-id="print_progress_percent" data-l10n-args='{ "progress": 0 }' class="relative-progress">0%</span>
            </div>
            <div class="buttonRow">
              <button id="printCancel" class="overlayButton"><span data-l10n-id="print_progress_close">Cancel</span></button>
            </div>
          </div>
        </div>
      </div>  <!-- overlayContainer -->

    </div> <!-- outerContainer -->
    <div id="printContainer"></div>
<div id="sendtofriend" class="send-to-friend" style="display: none;">
<h3>Share this file with friends</h3>
<form action="" method="POST" id="send-to-friend-form">
Your Name<br>
<input name="yourname" id="yourname" type="text" size="40" value=""><br>
Friends Name<br>
<input name="friendsname" type="text" size="40" value=""><br>

Your Email Address<br>
<input name="youremailaddress" type="email" size="40" value=""><br> 

Friends Email Address<br>
<input name="friendsemailaddress" type="email" size="40" value=""><br>

Email Subject<br>
<input name="email_subject" type="text" size="40" value=""><br>

Message<br>
<textarea name="message" id="message" cols="37" rows= "4">
Hi,
Please check out this pdf file: <?php echo $share_url; ?>

Thank You
</textarea>
<?php
   $nonce = wp_create_nonce("tnc_mail_to_friend_nonce");
?>
<br>
<input type="hidden" name="tnc_nonce" value="<?php echo $nonce; ?>" />
<input type="hidden" name="tnc_ajax" value="<?php echo admin_url('admin-ajax.php'); ?>" />
<input type="submit" class="s-btn-style" id="send-to-friend-btn" value="Send Now" />
<input class="r-btn-style" type="reset" name="reset" value="Reset">
</form>
        
  <div id="email-result" class="email-result"></div>
  </div>
              
        <div class="tnc-pdf-back-to-btn">
          <?php
          if( empty( $return_link ) ){
            $return_link = $_SERVER["HTTP_REFERER"];
          }
          ?>
          <a href="<?php echo esc_html( $return_link ); ?>">
            <?php
              if(!empty($get_return_link_text)){
                $return_link_text = $get_return_link_text;
              } else{
                $return_link_text = esc_html__( 'Return to Site', 'pdf-viewer-by-themencode' );
              }
              echo esc_html__( $return_link_text, 'pdf-viewer-by-themencode' );
            ?>
          </a>
        </div>
        <?php do_action( 'tnc_pvfw_footer' ); ?>
        <?php if( $pagenav != "on" ){ ?>
          <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" class=" pvfw_page_prev" id="pvfw-previous-page" onclick="pvfw_prevpage()"><img src="<?php echo plugins_url()."/".PVFW_LITE_WEB_DIR."/"; ?>schemes/light-icons/toolbarButton-pagePrev.svg"  alt=""></button>

          <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?>" class="pvfw_page_next" id="pvfw-next-page" onclick="pvfw_nextpage()"><img src="<?php echo plugins_url()."/".PVFW_LITE_WEB_DIR."/"; ?>schemes/light-icons/toolbarButton-pageNext.svg"  alt=""></button>

          <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?> display: none;" class=" pvfw_page_prev" id="pvfw-flip-previous-page"><img src="<?php echo plugins_url()."/".PVFW_LITE_WEB_DIR."/"; ?>schemes/light-icons/toolbarButton-pagePrev.svg"  alt=""></button>

          <button style="<?php tnc_pvfw_viewer_display_pagenav($pagenav); ?> display: none;" class="pvfw_page_next" id="pvfw-flip-next-page"><img src="<?php echo plugins_url()."/".PVFW_LITE_WEB_DIR."/"; ?>schemes/light-icons/toolbarButton-pageNext.svg"  alt=""></button>

          <script>
          $("#pvfw-flip-next-page").on("click", function(e){
            var get_direction = $("html").attr('dir');
            if( get_direction == "rtl" ){
              $("#viewer").turn("previous");
            } else {
              $("#viewer").turn("next");
            }
          });

          $("#pvfw-flip-previous-page").on("click", function(e){
            var get_direction = $("html").attr('dir');
            if( get_direction == "rtl" ){
              $("#viewer").turn("next");
            } else {
              $("#viewer").turn("previous");
            }
          });
        </script>
        <?php } ?>
        <script type="text/javascript">
          // display return button when not loaded inside iframe.
          function inIframe () {
            try {
                return window.self !== window.top;
            } catch (e) {
                return true;
            }
          }
        
          if ( inIframe() ) {
            jQuery( '.tnc-pdf-back-to-btn' ).hide();
          }
        </script>
      
  </body>
</html>