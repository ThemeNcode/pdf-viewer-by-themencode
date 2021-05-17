<?php
/**
 * CSF custom fields for pdfviewer post type
 *
 * @package  pdf-viewer-by-themencode
 */

// Control core classes for avoid errors.
if ( class_exists( 'CSF' ) ) {

	$prefix = 'tnc_pvfw_pdf_viewer_fields';

	// Create a metabox.
	CSF::createMetabox(
		$prefix,
		array(
			'title'     => esc_html__( 'PDF Viewer Settings', 'pdf-viewer-by-themencode' ),
			'post_type' => 'pdfviewer',
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => esc_html__( 'Basic Settings', 'pdf-viewer-by-themencode' ),
			'fields' => array(
				array(
					'type'  => 'subheading',
					'title' => esc_html__( 'Basic Settings', 'pdf-viewer-by-themencode' ),
				),

				array(
					'id'         => 'file',
					'type'       => 'upload',
					'title'      => 'PDF File',
					'subtitle'   => esc_html__( 'Select or Upload a PDF File', 'pdf-viewer-by-themencode' ),
					'attributes' => array(
						'required' => 'required',
					),
				),

				array(
					'id'          => 'pagemode',
					'type'        => 'select',
					'title'       => 'Page Mode',
					'placeholder' => 'Select Page Mode',
					'options'     => array(
						'none'        => 'Default',
						'thumbs'      => 'Thumbnails',
						'bookmarks'   => 'Bookmarks',
						'attachments' => 'Attachments',
					),
					'default'     => 'none',
				),

				array(
					'id'          => 'default_zoom',
					'type'        => 'select',
					'title'       => 'Default Zoom',
					'placeholder' => 'Select Default Zoom',
					'options'     => array(
						'auto'        => 'Auto',
						'page-fit'    => 'Page Fit',
						'page-width'  => 'Page Width',
						'page-height' => 'Page Height',
						'75'          => '75%',
						'100'         => '100%',
						'150'         => '150%',
						'200'         => '200%',
					),
					'default'     => 'auto',
				),

				array(
					'id'      => 'default_scroll',
					'type'    => 'select',
					'title'   => 'Default Scrolling Mode',
					'options' => array(
						'0' => 'Vertical',
						'1' => 'Horizontal',
						'2' => 'Wrapped',
						'3' => 'Flip (Premium Feature)',
					),
					'default' => '0',
				),

				array(
					'id'      => 'default_spread',
					'type'    => 'select',
					'title'   => 'Default Spread',
					'options' => array(
						'0' => 'None',
						'1' => 'ODD',
						'2' => 'EVEN',
					),
					'default' => '0',
				),

				array(
					'id'          => 'language',
					'type'        => 'select',
					'title'       => 'Viewer Language',
					'placeholder' => 'Select Language',
					'options'     => array(
						'en-US' => 'en-US',
						'ach'   => 'ach',
						'af'    => 'af',
						'ak'    => 'ak',
						'an'    => 'an',
						'ar'    => 'ar',
						'as'    => 'as',
						'ast'   => 'ast',
						'az'    => 'az',
						'be'    => 'be',
						'bg'    => 'bg',
						'bn-BD' => 'bn-BD',
						'bn-IN' => 'bn-IN',
						'br'    => 'br',
						'bs'    => 'bs',
						'ca'    => 'ca',
						'cs'    => 'cs',
						'csb'   => 'csb',
						'cy'    => 'cy',
						'da'    => 'da',
						'de'    => 'de',
						'el'    => 'el',
						'en-GB' => 'en-GB',
						'en-ZA' => 'en-ZA',
						'eo'    => 'eo',
						'es-AR' => 'es-AR',
						'es-CL' => 'es-CL',
						'es-ES' => 'es-ES',
						'es-MX' => 'es-MX',
						'et'    => 'et',
						'eu'    => 'eu',
						'fa'    => 'fa',
						'ff'    => 'ff',
						'fi'    => 'fi',
						'fr'    => 'fr',
						'fy-NL' => 'fy-NL',
						'ga-IE' => 'ga-IE',
						'gd'    => 'gd',
						'gl'    => 'gl',
						'gu-IN' => 'gu-IN',
						'he'    => 'he',
						'hi-IN' => 'hi-IN',
						'hr'    => 'hr',
						'hu'    => 'hu',
						'hy-AM' => 'hy-AM',
						'id'    => 'id',
						'is'    => 'is',
						'it'    => 'it',
						'ja'    => 'ja',
						'ka'    => 'ka',
						'kk'    => 'kk',
						'km'    => 'km',
						'kn'    => 'kn',
						'ko'    => 'ko',
						'ku'    => 'ku',
						'lg'    => 'lg',
						'lij'   => 'lij',
						'lt'    => 'lt',
						'lv'    => 'lv',
						'mai'   => 'mai',
						'mk'    => 'mk',
						'ml'    => 'ml',
						'mn'    => 'mn',
						'mr'    => 'mr',
						'ms'    => 'ms',
						'my'    => 'my',
						'nb-NO' => 'nb-NO',
						'nl'    => 'nl',
						'nn-NO' => 'nn-NO',
						'nso'   => 'nso',
						'oc'    => 'oc',
						'or'    => 'or',
						'pa-IN' => 'pa-IN',
						'pl'    => 'pl',
						'pt-BR' => 'pt-BR',
						'pt-PT' => 'pt-PT',
						'rm'    => 'rm',
						'ro'    => 'ro',
						'ru'    => 'ru',
						'rw'    => 'rw',
						'sah'   => 'sah',
						'si'    => 'si',
						'sk'    => 'sk',
						'sl'    => 'sl',
						'son'   => 'son',
						'sq'    => 'sq',
						'sr'    => 'sr',
						'sv-SE' => 'sv-SE',
						'sw'    => 'sw',
						'ta'    => 'ta',
						'ta-LK' => 'ta-LK',
						'te'    => 'te',
						'th'    => 'th',
						'tl'    => 'tl',
						'tn'    => 'tn',
						'tr'    => 'tr',
						'uk'    => 'uk',
						'ur'    => 'ur',
						'vi'    => 'vi',
						'wo'    => 'wo',
						'xh'    => 'xh',
						'zh-CN' => 'zh-CN',
						'zh-TW' => 'zh-TW',
						'zu'    => 'zu',
					),
					'default'     => 'en-US',
				),

				array(
					'id'       => 'return-link',
					'type'     => 'text',
					'title'    => esc_html__( 'Return to Site Link', 'pdf-viewer-by-themencode' ),
					'subtitle' => esc_html__( 'Enter the url where the Return to site button on bottom right should link to. Keeping blank will use the previous page link.', 'pdf-viewer-by-themencode' ),
				),
			),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => 'Toolbar Elements',
			'fields' => array(
				array(
					'type'    => 'subheading',
					'content' => 'Want to use Global Settings?',
				),

				array(
					'type'    => 'content',
					'content' => 'Using global settings is only available in <a href="https://codecanyon.net/item/pdf-viewer-for-wordpress/8182815" target="_blank">premium version.</a>',
				),

				array(
					'type'    => 'subheading',
					'content' => esc_html__( 'Toolbar Elements Visibility', 'pdf-viewer-by-themencode' ),
				),

				array(
					'id'         => 'download',
					'type'       => 'switcher',
					'title'      => 'Download',
					'default'    => true,
				),
				array(
					'id'         => 'print',
					'type'       => 'switcher',
					'title'      => 'Print',
					'default'    => true,
				),
				array(
					'id'         => 'fullscreen',
					'type'       => 'switcher',
					'title'      => 'Fullscreen',
					'default'    => true,
				),
				array(
					'id'         => 'zoom',
					'type'       => 'switcher',
					'title'      => 'Zoom',
					'default'    => true,
				),
				array(
					'id'         => 'open',
					'type'       => 'switcher',
					'title'      => 'Open',
					'default'    => true,
				),
				array(
					'id'         => 'pagenav',
					'type'       => 'switcher',
					'title'      => 'Pagenav',
					'default'    => true,
				),
				array(
					'id'         => 'find',
					'type'       => 'switcher',
					'title'      => 'Find',
					'default'    => true,
				),
				array(
					'id'         => 'current_view',
					'type'       => 'switcher',
					'title'      => 'Current View',
					'default'    => true,
				),
				array(
					'id'         => 'share',
					'type'       => 'switcher',
					'title'      => 'Share',
					'default'    => true,
				),
				array(
					'id'         => 'toggle_left',
					'type'       => 'switcher',
					'title'      => 'Toggle Left Menu',
					'default'    => true,
				),
				array(
					'id'         => 'toggle_menu',
					'type'       => 'switcher',
					'title'      => 'Toggle Right Menu',
					'default'    => true,
				),
				array(
					'id'         => 'rotate',
					'type'       => 'switcher',
					'title'      => 'Rotate',
					'default'    => true,
				),
				array(
					'id'         => 'logo',
					'type'       => 'switcher',
					'title'      => 'Logo',
					'default'    => true,
				),
				array(
					'id'         => 'handtool',
					'type'       => 'switcher',
					'title'      => 'Handtool',
					'default'    => true,
				),
				array(
					'id'         => 'scroll',
					'type'       => 'switcher',
					'title'      => 'Scroll',
					'default'    => true,
				),
				array(
					'id'         => 'doc_prop',
					'type'       => 'switcher',
					'title'      => 'Document Properties',
					'default'    => true,
				),
				array(
					'id'         => 'spread',
					'type'       => 'switcher',
					'title'      => 'Spread',
					'default'    => true,
				),
			),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => 'Appearance',
			'fields' => array(

				array(
					'type'    => 'subheading',
					'content' => 'Want to use Global Settings?',
				),

				array(
					'type'    => 'content',
					'content' => 'Using global settings is only available in <a href="https://codecanyon.net/item/pdf-viewer-for-wordpress/8182815" target="_blank">premium version.</a>',
				),


				array(
					'type'    => 'subheading',
					'content' => 'Customize the look of your PDF Viewer Here',
				),

				array(
					'id'          => 'appearance-select-type',
					'type'        => 'select',
					'title'       => esc_html__( 'Do you want to use a Theme or use custom colors?', 'pdf-viewer-by-themencode' ),
					'placeholder' => 'Select an option',
					'options'     => array(
						'select-theme' => 'Theme',
						'custom-color' => 'Custom Color (Premium Feature)',
					),
					'default'     => 'select-theme',
				),

				array(
					'id'          => 'appearance-select-theme',
					'type'        => 'select',
					'title'       => esc_html__( 'Select Theme', 'pdf-viewer-by-themencode' ),
					'placeholder' => 'Select an option',
					'options'     => array(
						'aqua-white'    => 'Aqua White',
						'material-blue' => 'Material Blue',
						'midnight-calm' => 'Midnight Calm',
					),
					'default'     => 'midnight-calm',
					'dependency'  => array( 'appearance-select-type', '==', 'select-theme' ),
				),
			),
		)
	);

	CSF::createSection(
		$prefix,
		array(
			'title'  => 'Privacy/Security',
			'fields' => array(
				array(
					'type'    => 'subheading',
					'content' => 'Need to protect PDF file access to specific pdf files?',
				),

				array(
					'type'    => 'content',
					'content' => '<a href="https://codecanyon.net/item/wp-file-access-manager/26430349" target="_blank">WP File Access Manager</a> can help you to protect each and every pdf files on your website. You can set permissions for each pdf files (as well as any other file type) by user, user role, user login status. Its also compatible with WooCommerce and Paid Memberships Pro plugins.',
				),

				array(
					'type'    => 'content',
					'content' => 'Note: If you\'re using nginx web server, you need to be able to add a rule to your nginx config, otherwise WP File Access Manager won\'t be able to work.',
				),

				array(
					'type'    => 'content',
					'content' => '<a class="button button-primary" href="https://codecanyon.net/item/wp-file-access-manager/26430349" target="_blank">Get WP File Access Manager now!</a>',
				),

				array(
					'type'    => 'subheading',
					'content' => 'Customize Messages Displayed',
				),

				array(
					'type'    => 'content',
					'content' => 'Following settings are only valid when you have WP File Access Manager installed and activated.',
				),

				array(
					'id'         => 'wfam-error-heading',
					'type'       => 'text',
					'title'      => esc_html__( 'Error Heading', 'pdf-viewer-by-themencode' ),
					'attributes' => array(
						'placeholder' => esc_html__( 'SORRY', 'pdf-viewer-by-themencode' ),
					),
				),

				array(
					'id'         => 'wfam-error-content',
					'type'       => 'textarea',
					'title'      => esc_html__( 'Error Content', 'pdf-viewer-by-themencode' ),
					'attributes' => array(
						'placeholder' => esc_html__( 'You do not have permission to view this file, please contact us if you think this was by a mistake.', 'pdf-viewer-by-themencode' ),
					),
				),

				array(
					'id'         => 'wfam-error-btn-text',
					'type'       => 'text',
					'title'      => esc_html__( 'Error Button Text', 'pdf-viewer-by-themencode' ),
					'attributes' => array(
						'placeholder' => esc_html__( 'Go To Homepage', 'pdf-viewer-by-themencode' ),
					),
				),

				array(
					'id'         => 'wfam-error-btn-url',
					'type'       => 'text',
					'title'      => esc_html__( 'Error Button URL', 'pdf-viewer-by-themencode' ),
					'attributes' => array(
						'placeholder' => home_url(),
					),
				),
			),
		)
	);
}
