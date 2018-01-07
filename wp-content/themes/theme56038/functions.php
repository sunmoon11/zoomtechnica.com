<?php
/**
 * Cherry Wizard and Cherry Data Manager add-ons.
 */

// Assign register plugins function to appropriate filter.
add_filter( 'cherry_theme_required_plugins',     'cherry_child_register_plugins' );

// Assign options filter to apropriate filter.
add_filter( 'cherry_data_manager_export_options', 'cherry_child_options_to_export' );

// Assign option id's filter to apropriate filter.
add_filter( 'cherry_data_manager_options_ids',    'cherry_child_options_ids' );

// Assign cherry_child_menu_meta to aproprite filter.
add_filter( 'cherry_data_manager_menu_meta',      'cherry_child_menu_meta' );

// Customize a cherry shortcodes.
add_filter( 'custom_cherry4_shortcodes',          '__return_true' );

/**
 * Register required plugins for theme.
 *
 * Plugins registered by this function will be automatically installed by Cherry Wizard.
 *
 * Notes:
 * - Slug parameter must be the same with plugin key in array
 * - Source parameter supports 3 possible values:
 *   a) cherry    - plugin will be downloaded from cherry plugins repository
 *   b) wordpress - plugin will be downloaded from wordpress.org repository
 *   c) path      - plugin will be downloaded by provided path
 *
 * @param  array $plugins Default array of required plugins (empty).
 * @return array          New array of required plugins.
 */
function cherry_child_register_plugins( $plugins ) {

	$plugins = array(
		'contact-form-7' => array(
			'name'   => __( 'Contact Form 7', 'child-theme-domain' ),
			'slug'   => 'contact-form-7',
			'source' => 'wordpress',
		),
		'cherry-shortcodes' => array(
			'name'   => __( 'Cherry Shortcodes', 'child-theme-domain' ),
			'slug'   => 'cherry-shortcodes',
			'source' => 'cherry-free',
		),
		'cherry-shortcodes-templater' => array(
			'name'   => __( 'Cherry Shortcodes Templater', 'child-theme-domain' ),
			'slug'   => 'cherry-shortcodes-templater',
			'source' => 'cherry-free',
		),
		'cherry-portfolio' => array(
			'name'   => __( 'Cherry Portfolio', 'child-theme-domain' ),
			'slug'   => 'cherry-portfolio',
			'source' => 'cherry-free',
		),
		'cherry-testimonials' => array(
			'name'   => __( 'Cherry Testimonials', 'child-theme-domain' ),
			'slug'   => 'cherry-testimonials',
			'source' => 'cherry-free',
		),
		'cherry-team' => array(
			'name'   => __( 'Cherry Team', 'child-theme-domain' ),
			'slug'   => 'cherry-team',
			'source' => 'cherry-free',
		),
        'cherry-services' => array(
			'name'   => __( 'Cherry Services', 'child-theme-domain' ),
			'slug'   => 'cherry-services',
			'source' => 'cherry-free',
		),
		'cherry-social' => array(
			'name'   => __( 'Cherry Social', 'child-theme-domain' ),
			'slug'   => 'cherry-social',
			'source' => 'cherry-free',
		),
		'cherry-mega-menu' => array(
			'name'   => __( 'Cherry Mega Menu', 'child-theme-domain' ),
			'slug'   => 'cherry-mega-menu',
			'source' => 'cherry-free',
		),
		'motopress-cherryframework4' => array(
			'name'   => __( 'MotoPress and CherryFramework 4 Integration', 'child-theme-domain' ),
			'slug'   => 'motopress-cherryframework4',
			'source' => 'cherry-free',
		),
		'motopress-content-editor' => array(
			'name'   => __( 'MotoPress Content Editor', 'child-theme-domain' ),
			'slug'   => 'motopress-content-editor',
			'source' => 'cherry-premium',
		),
		'motopress-slider' => array(
			'name'   => __( 'MotoPress Slider', 'child-theme-domain' ),
			'slug'   => 'motopress-slider',
			'source' => 'cherry-premium',
		),
        'mailchimp-for-wp' => array(
           'name'   => 'MailChimp for WordPress',
           'slug'   => 'mailchimp-for-wp',
           'source' => 'wordpress',
          ),
        
	);

	return $plugins;
}

// Register plugin for TGM activator.
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'cherry_child_tgmpa_register' );
function cherry_child_tgmpa_register() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 */
	$plugins = array(
		array(
			'name'     => __( 'Contact Form 7', 'child-theme-domain' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Shortcodes', 'child-theme-domain' ),
			'slug'     => 'cherry-shortcodes',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Shortcodes Templater', 'child-theme-domain' ),
			'slug'     => 'cherry-shortcodes-templater',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Portfolio', 'child-theme-domain' ),
			'slug'     => 'cherry-portfolio',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Testimonials', 'child-theme-domain' ),
			'slug'     => 'cherry-testimonials',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Team', 'child-theme-domain' ),
			'slug'     => 'cherry-team',
			'source'   => 'cherry-free',
			'required' => false,
		),
        array(
			'name'     => __( 'Cherry Services', 'child-theme-domain' ),
			'slug'     => 'cherry-services',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Social', 'child-theme-domain' ),
			'slug'     => 'cherry-social',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'Cherry Mega Menu', 'child-theme-domain' ),
			'slug'     => 'cherry-mega-menu',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'MotoPress CherryFramework4', 'child-theme-domain' ),
			'slug'     => 'motopress-cherryframework4',
			'source'   => 'cherry-free',
			'required' => false,
		),
		array(
			'name'     => __( 'MotoPress Content Editor', 'child-theme-domain' ),
			'slug'     => 'motopress-content-editor',
			'source'   => CHILD_DIR . '/assets/includes/plugins/motopress-content-editor.zip',
			'required' => false,
		),
		array(
			'name'     => __( 'MotoPress Slider', 'child-theme-domain' ),
			'slug'     => 'motopress-slider',
			'source'   => CHILD_DIR . '/assets/includes/plugins/motopress-slider.zip',
			'required' => false,
		),
        array(
           'name'         => 'MailChimp for WordPress', 
           'slug'         => 'mailchimp-for-wp', 
           'required'     => true,
          ),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 */
	$config = array(
		'default_path' => '',                      // Default absolute path to pre-packaged plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
		'strings'      => array(
			'page_title'                      => __( 'Install Recommended Plugins', 'child-theme-domain' ),
			'menu_title'                      => __( 'Install Plugins', 'child-theme-domain' ),
			'installing'                      => __( 'Installing Plugin: %s', 'child-theme-domain' ), // %s = plugin name.
			'oops'                            => __( 'Something went wrong with the plugin API.', 'child-theme-domain' ),
			'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
			'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
			'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
			'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
			'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
			'return'                          => __( 'Return to Recommended Plugins Installer', 'child-theme-domain' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'child-theme-domain' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %s', 'child-theme-domain' ), // %s = dashboard link.
			'nag_type'                        => 'updated',
		)
	);

	tgmpa( $plugins, $config );

}

/**
 * Pass own options to export (for example if you use thirdparty plugin and need to export some default options).
 *
 * WARNING #1
 * You should NOT totally overwrite $options_ids array with this filter, only add new values.
 *
 * @param  array $options Default options to export.
 * @return array          Filtered options to export.
 */
function cherry_child_options_to_export( $options ) {

	/**
	 * Example:
	 *
	 * $options[] = 'woocommerce_default_country';
	 * $options[] = 'woocommerce_currency';
	 * $options[] = 'woocommerce_enable_myaccount_registration';
	 */

	return $options;
}

/**
 * Pass some own options (which contain page ID's) to export function,
 * if needed (for example if you use thirdparty plugin and need to export some default options).
 *
 * WARNING #1
 * With this filter you need pass only options, which contain page ID's and it's would be rewrited with new ID's on import.
 * Standrd options should passed via 'cherry_data_manager_export_options' filter.
 *
 * WARNING #2
 * You should NOT totally overwrite $options_ids array with this filter, only add new values.
 *
 * @param  array $options_ids Default array.
 * @return array              Result array.
 */
function cherry_child_options_ids( $options_ids ) {

	/**
	 * Example:
	 *
	 * $options_ids[] = 'woocommerce_cart_page_id';
	 * $options_ids[] = 'woocommerce_checkout_page_id';
	 */

	return $options_ids;
}

/**
 * Pass additional nav menu meta atts to import function.
 *
 * By default all nav menu meta fields are passed to XML file,
 * but on import processed only default fields, with this filter you can import your own custom fields.
 *
 * @param  array $extra_meta Ddditional menu meta fields to import.
 * @return array             Filtered meta atts array.
 */
function cherry_child_menu_meta( $extra_meta ) {

	/**
	 * Example:
	 *
	 * $extra_meta[] = '_cherry_megamenu';
	 */

	return $extra_meta;
}



/**
 * Customizations.
 */

// Include custom assets.
add_action( 'wp_enqueue_scripts',             'themeXXXX_include_custom_assets' );

// Print a `totop` button on frontend.
add_action( 'cherry_footer_after',            'themeXXXX_print_totop_button' );

// Adds a new theme option - `totop` button.
add_filter( 'cherry_general_options_list',    'themeXXXX_add_totop_option' );

// Changed a `Breadcrumbs` output format.
add_filter( 'cherry_breadcrumbs_custom_args', 'themeXXXX_breadcrumbs_wrapper_format' );

// Modify a comment form.
add_filter( 'comment_form_defaults',          'themeXXXX_modify_comment_form' );

// Removed standard wpcf7-loader.
add_filter( 'wpcf7_ajax_loader',              '__return_empty_string' );

// Modify the columns on the `Posts` and `Pages` screen.
add_filter( 'manage_posts_columns',           'themeXXXX_add_thumbnail_column_header' );
add_filter( 'manage_pages_columns',           'themeXXXX_add_thumbnail_column_header' );
add_action( 'manage_posts_custom_column' ,    'themeXXXX_add_thumbnail_column_data', 10, 2 );
add_action( 'manage_pages_custom_column' ,    'themeXXXX_add_thumbnail_column_data', 10, 2 );


function themeXXXX_include_custom_assets() {
	// Get the theme prefix.
	$prefix = cherry_get_prefix();

	wp_enqueue_script( $prefix . 'script', CHILD_URI . '/assets/js/script.js', array( 'jquery' ), '1.0', true );
}

function themeXXXX_print_totop_button() {

	if ( 'true' != cherry_get_option( 'to_top_button', 'true' ) ) {
		return;
	}

	$mobile_class = '';

	if ( wp_is_mobile() ) {
		$mobile_class = 'mobile-back-top';
	}

	printf( '<div id="back-top" class="%s"><a href="#top"></a></div>', $mobile_class );
}

function themeXXXX_add_totop_option( $args ) {
	$args['to_top_button'] = array(
		'type'        => 'switcher',
		'title'       => __( 'To Top', 'child-theme-domain' ),
		'description' => __( 'Display to top button?', 'child-theme-domain' ),
		'value'       => 'true',
	);

	return $args;
}

function themeXXXX_breadcrumbs_wrapper_format( $args ) {
	$args['wrapper_format'] = '<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">%s</div>
			<div class="col-md-12 col-sm-12">%s</div>
		</div>
	</div>';

	return $args;
}

function themeXXXX_modify_comment_form( $args ) {
	$args = wp_parse_args( $args );

	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req      = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$html_req = ( $req ? " required='required'" : '' );
	$html5    = 'html5' === $args['format'];
	$commenter = wp_get_current_commenter();

	$args['label_submit'] = __( 'Submit comment', 'child-theme-domain' );

	$args['fields']['author'] = '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' . __( 'Name:', 'child-theme-domain' ) . '" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />';

	$args['fields']['email'] = '<p class="comment-form-email"><input id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' placeholder="' . __( 'E-mail:', 'child-theme-domain' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' /></p>';

	$args['fields']['url'] = '<p class="comment-form-url"><input id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' placeholder="' . __( 'Website:', 'child-theme-domain' ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>';

	$args['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="' . __( 'Comment:', 'child-theme-domain' ) . '" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true" required="required"></textarea></p>';

	return $args;
}

function themeXXXX_add_thumbnail_column_header( $post_columns ) {
	return array_merge( $post_columns, array( 'thumbnail' => '<span class="dashicons dashicons-format-image"></span><span class="screen-reader-text">' . __( 'Featured Image', 'child-theme-doamin' ) . '</span>' ) );
}

function themeXXXX_add_thumbnail_column_data( $column, $post_id ) {

	if ( 'thumbnail' !== $column ) {
		return;
	}

	$post_type = get_post_type( $post_id );

	if ( ! in_array( $post_type, array( 'post', 'page' ) ) ) {
		return;
	}

 $thumb = get_the_post_thumbnail( $post_id, array( 50, 50 ) );
 echo empty( $thumb ) ? '&mdash;' : $thumb;
}


/**
 * Google Analytics
 */
add_filter( 'cherry_general_options_list', 'themeXXXX_new_settings' );
function themeXXXX_new_settings( $options ) {
	$new_options = array(
		'google_analytics' => array(
		'type'        => 'textarea',
		'title'       => __( 'Google Analytics Code', 'themeXXXX' ),
		'description' => __( 'You can paste your Google Analytics or other tracking code in this box. This will be automatically added to the footer.', 'themeXXXX' ),
		'value'       => '',
	)
 );
 $options = array_merge( $options, $new_options );

 return $options;
}

add_filter( 'wp_footer', 'themeXXXX_google_analytics', 9999 );
function themeXXXX_google_analytics () {
	if ( cherry_get_option( 'google_analytics' ) ) {
		echo '<script>'.cherry_get_option( 'google_analytics' ).'</script>';
	}
}

add_filter( 'cherry_default_footer_info_format', 'theme3746_footer_info_format' );

function theme3746_footer_info_format(){
 //return '&copy; %1$s <span>.</span> %3$s';
 return '%2$s &copy; %1$s '. __('All Rights Reserved', 'theme3746').' <span>|</span> %3$s';
}


/**
 * thirdparty plugin defaults
 */
add_filter('cherry_data_manager_export_options', 'theme3746_child_options_to_export');
function theme3746_child_options_to_export( $options ) {
  
  $options[] = 'mc4wp_lite_form';
   $options[] = 'mc4wp_default_form_id';
   $options[] = 'mc4wp_form_stylesheets';

 return $options;
}