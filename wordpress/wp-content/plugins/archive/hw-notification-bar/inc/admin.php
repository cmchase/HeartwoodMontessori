<?php
/**
 * Admin page for the plugin
 */

/**
 * Settings Page
 */
function hw_notification_settings_page() {
	add_submenu_page( 'options-general.php', esc_html__( 'HW Notification Bar', 'hw-notification' ), esc_html__( 'HW Notification Bar', 'hw-notification' ), 'manage_options', 'hw-notification-options', 'hw_notification_settings_page_content' );
}
add_action( 'admin_menu', 'hw_notification_settings_page' );

/**
 * Settings Page Content
 */
function hw_notification_settings_page_content() {
	require HW_NOTIFICATION_DIR . 'inc/settings-page.php';
}

/**
 * Enqueue scripts and styles.
 */
function hw_notification_admin_scripts( $hook ) {

	if( 'settings_page_hw-notification-options' == $hook ) {

		/**
		 * Enqueue JS files
		 */

		// Cookie
		wp_enqueue_script( 'hw-notification-cookie', HW_NOTIFICATION_URI . 'js/cookie.js', array( 'jquery' ) );

		// Easytabs
		wp_enqueue_script( 'hw-notification-hashchange', HW_NOTIFICATION_URI . 'js/hashchange.js', array( 'jquery' ) );
		wp_enqueue_script( 'hw-notification-easytabs', HW_NOTIFICATION_URI . 'js/easytabs.js', array( 'jquery', 'hw-notification-hashchange' ) );

		// Admin JS
		wp_enqueue_script( 'hw-notification-admin', HW_NOTIFICATION_URI . 'js/admin.js', array( 'jquery' ) );

		/**
		 * Enqueue CSS files
		 */

		// Admin Style
		wp_enqueue_style( 'hw-notification-admin-style', HW_NOTIFICATION_URI . 'css/admin.css' );

	}

}
add_action( 'admin_enqueue_scripts', 'hw_notification_admin_scripts' );

/**
 * Contextual Help
 */
function hw_notification_contextual_help() {

	// Plugin Data
	$plugin    = hw_notification_plugin_data();
	$AuthorURI = $plugin['AuthorURI'];
	$PluginURI = $plugin['PluginURI'];
	$Name      = $plugin['Name'];

	// Current Screen
	$screen = get_current_screen();

	// Help Strings
	$content_support = '<p>';
	$content_support .= sprintf( __( '%1$s is a project of %2$s. You can reach us via contact page.', 'hw-notification' ), $Name, '<a href="http://designorbital.com/">DesignOrbital</a>' );
	$content_support .= '<p>';

	// Plugin reference help screen tab.
	$screen->add_help_tab( array(

			'id'         => 'hw-notification-support',
			'title'      => __( 'Plugin Support', 'hw-notification' ),
			'content'    => $content_support,

		)
	);

	// Help Sidebar
	$sidebar = '<p><strong>' . __( 'For more information:', 'hw-notification' ) . '</strong></p>';
	if ( ! empty( $AuthorURI ) ) {
		$sidebar .= '<p><a href="' . esc_url( $AuthorURI ) . '" target="_blank">' . __( 'Plugin Author', 'hw-notification' ) . '</a></p>';
	}
	if ( ! empty( $PluginURI ) ) {
		$sidebar .= '<p><a href="' . esc_url( $PluginURI ) . '" target="_blank">' . __( 'Plugin Official Page', 'hw-notification' ) . '</a></p>';
	}
	$screen->set_help_sidebar( $sidebar );

}
add_action( 'load-settings_page_hw-notification-options', 'hw_notification_contextual_help' );

/**
 * Plugin Settings
 */
function hw_notification_settings() {

	// Register plugin settings
	register_setting( 'hw_notification_options_group', 'hw_notification_options', 'hw_notification_options_validate' );

	/** Config Section */
	add_settings_section( 'hw_notification_section_config', __( 'Configuration', 'hw-notification' ), 'hw_notification_section_config_cb', 'hw_notification_section_config_page' );
	add_settings_field( 'hw_notification_field_enable', __( 'Enable', 'hw-notification' ), 'hw_notification_field_enable_cb', 'hw_notification_section_config_page', 'hw_notification_section_config' );
	add_settings_field( 'hw_notification_field_button_display', __( 'Display Button', 'hw-notification' ), 'hw_notification_field_display_button_cb', 'hw_notification_section_config_page', 'hw_notification_section_config' );

	/** Content Section */
	add_settings_field( 'hw_notification_field_notification_type', __( 'Notification Type', 'hw-notification' ), 'hw_notification_field_notification_type_cb', 'hw_notification_section_content_page', 'hw_notification_section_content' );
	add_settings_section( 'hw_notification_section_content', __( 'Notification Content', 'hw-notification' ), 'hw_notification_section_content_cb', 'hw_notification_section_content_page' );
	add_settings_field( 'hw_notification_field_notification', __( 'Notification', 'hw-notification' ), 'hw_notification_field_notification_cb', 'hw_notification_section_content_page', 'hw_notification_section_content' );
	add_settings_field( 'hw_notification_field_button_label', __( 'Button Label', 'hw-notification' ), 'hw_notification_field_button_label_cb', 'hw_notification_section_content_page', 'hw_notification_section_content' );
	add_settings_field( 'hw_notification_field_button_link', __( 'Button Link', 'hw-notification' ), 'hw_notification_field_button_link_cb', 'hw_notification_section_content_page', 'hw_notification_section_content' );


	// add_settings_field( 'hw_notification_field_notification_link', __( 'Notification Link', 'hw-notification' ), 'hw_notification_field_notification_link_cb', 'hw_notification_section_content_page', 'hw_notification_section_content' );

	// /** Typography Section */
	// add_settings_section( 'hw_notification_section_typography', __( 'Typography', 'hw-notification' ), 'hw_notification_section_typography_cb', 'hw_notification_section_typography_page' );
	// add_settings_field( 'hw_notification_field_notification_font', __( 'Notification Font', 'hw-notification' ), 'hw_notification_field_notification_font_cb', 'hw_notification_section_typography_page', 'hw_notification_section_typography' );
	// add_settings_field( 'hw_notification_field_button_font', __( 'Button Font', 'hw-notification' ), 'hw_notification_field_button_font_cb', 'hw_notification_section_typography_page', 'hw_notification_section_typography' );

}
add_action( 'admin_init', 'hw_notification_settings' );

/**
 * Boolean Yes | No
 */
function hw_notification_boolean() {
	return array (
		1 => __( 'Yes', 'hw-notification' ),
		0 => __( 'No', 'hw-notification' )
	);
}

/**
 * Google Web Fonts
 *
 * This function should be synchronized with (or derived from)
 * `hw_notification_google_fonts_skeleton` function in `inc/extras.php`
 *
 * @return array|string
 */
function hw_notification_google_fonts( $key = '' ) {

	$google_fonts = array(
		'abril-fatface'           => 'Abril Fatface',
		'abeezee'                 => 'ABeeZee',
		'actor'                   => 'Actor',
		'allerta'                 => 'Allerta',
		'alike'                   => 'Alike',
		'arizonia'                => 'Arizonia',
		'arvo'                    => 'Arvo',
		'average'                 => 'Average',
		'average-sans'            => 'Average Sans',
		'bitter'                  => 'Bitter',
		'bree-serif'              => 'Bree Serif',
		'cabin'                   => 'Cabin',
		'cardo'                   => 'Cardo',
		'clicker-script'          => 'Clicker Script',
		'cookie'                  => 'Cookie',
		'crimson-text'            => 'Crimson Text',
		'dancing-script'          => 'Dancing Script',
		'didact-gothic'           => 'Didact Gothic',
		'domine'                  => 'Domine',
		'droid-sans'              => 'Droid Sans',
		'droid-serif'             => 'Droid Serif',
		'eb-garamond'             => 'EB Garamond',
		'enriqueta'               => 'Enriqueta',
		'fjalla-one'              => 'Fjalla One',
		'gentium-book-basic'      => 'Gentium Book Basic',
		'gentium-basic'           => 'Gentium Basic',
		'grand-hotel'             => 'Grand Hotel',
		'gravitas-one'            => 'Gravitas One',
		'great-vibes'             => 'Great Vibes',
		'habibi'                  => 'Habibi',
		'josefin-slab'            => 'Josefin Slab',
		'lato'                    => 'Lato',
		'ledger'                  => 'Ledger',
		'libre-baskerville'       => 'Libre Baskerville',
		'lobster'                 => 'Lobster',
		'lora'                    => 'Lora',
		'lustria'                 => 'Lustria',
		'merriweather'            => 'Merriweather',
		'merriweather-sans'       => 'Merriweather Sans',
		'monda'                   => 'Monda',
		'montserrat'              => 'Montserrat',
		'mouse-memoirs'           => 'Mouse Memoirs',
		'muli'                    => 'Muli',
		'neuton'                  => 'Neuton',
		'nobile'                  => 'Nobile',
		'noto-sans'               => 'Noto Sans',
		'noto-serif'              => 'Noto Serif',
		'nunito'                  => 'Nunito',
		'offside'                 => 'Offside',
		'old-standard-tt'         => 'Old Standard TT',
		'open-sans'               => 'Open Sans',
		'oswald'                  => 'Oswald',
		'oxygen'                  => 'Oxygen',
		'paytone-one'             => 'Paytone One',
		'pt-mono'                 => 'PT Mono',
		'pt-sans'                 => 'PT Sans',
		'pt-sans-narrow'          => 'PT Sans Narrow',
		'pt-serif'                => 'PT Serif',
		'playfair-display'        => 'Playfair Display',
		'pontano-sans'            => 'Pontano Sans',
		'quattrocento'            => 'Quattrocento',
		'quattrocento-sans'       => 'Quattrocento Sans',
		'raleway'                 => 'Raleway',
		'rambla'                  => 'Rambla',
		'roboto'                  => 'Roboto',
		'roboto-slab'             => 'Roboto Slab',
		'rokkitt'                 => 'Rokkitt',
		'rufina'                  => 'Rufina',
		'sanchez'                 => 'Sanchez',
		'shadows-into-light'      => 'Shadows Into Light',
		'shadows-into-light-two'  => 'Shadows Into Light Two',
		'sintony'                 => 'Sintony',
		'source-serif-pro'        => 'Source Serif Pro',
		'source-sans-pro'         => 'Source Sans Pro',
		'titillium-web'           => 'Titillium Web',
		'ubuntu'                  => 'Ubuntu',
		'varela'                  => 'Varela',
		'varela-round'            => 'Varela Round',
		'vollkorn'                => 'Vollkorn',
		'yanone-kaffeesatz'       => 'Yanone Kaffeesatz',
	);

	if( ! empty( $key ) ) {
		return $google_fonts[$key];
	}

	return $google_fonts;

}


/**
* Notification types
*/
function hw_notification_types( $key = '' ) {

	$types = array(
		'hw-notification-danger'    => 'Alert',
		'hw-notification-info'   => 'Info',
		'hw-notification-success'  => 'Positive',
	);

	if( ! empty( $key ) ) {
		return $types[$key];
	}

	return $types;
}

/**
 * Plugin Settings Validation
 */
function hw_notification_options_validate( $input ) {

	// Enable
	if ( ! array_key_exists( $input['enable'], hw_notification_boolean() ) ) {
		 $input['enable'] = hw_notification_option_default( 'enable' );
	}

	// Display Button
	if ( ! array_key_exists( $input['display_button'], hw_notification_boolean() ) ) {
		 $input['display_button'] = hw_notification_option_default( 'display_button' );
	}

	// Notification
	$input['notification'] = wp_kses( stripslashes( $input['notification'] ), array() );

	// Notification Link
	if( filter_var( $input['notification_link'], FILTER_VALIDATE_URL ) ) {
		$input['notification_link'] = esc_url_raw( $input['notification_link'] );
	} else {
		$input['notification_link'] = '';
	}

	// Button Label
	$input['button_label'] = wp_kses( stripslashes( $input['button_label'] ), array() );

	// Button Link
	if( filter_var( $input['button_link'], FILTER_VALIDATE_URL ) ) {
		$input['button_link'] = esc_url_raw( $input['button_link'] );
	} else {
		$input['button_link'] = '';
	}

	// Notification Font
	if ( ! array_key_exists( $input['notification_font'], hw_notification_google_fonts() ) ) {
		 $input['notification_font'] = hw_notification_option_default( 'notification_font' );
	}

	// Button Font
	if ( ! array_key_exists( $input['button_font'], hw_notification_google_fonts() ) ) {
		 $input['button_font'] = hw_notification_option_default( 'button_font' );
	}

	// return validated array
	return $input;

}

/**
 * Config Section Callback
 */
function hw_notification_section_config_cb() {
	echo '<div class="do-section-desc">
	  <p class="description">'. __( 'Configure notification bar by using the following settings.', 'hw-notification' ) .'</p>
	</div>';
}

/* Enable Callback */
function  hw_notification_field_enable_cb() {

	$items = hw_notification_boolean();

	echo '<select id="enable" name="hw_notification_options[enable]">';
	foreach( $items as $key => $val ) {
	?>
    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, hw_notification_option( 'enable' ) ); ?>><?php echo esc_html( $val ); ?></option>
    <?php
	}
	echo '</select>';
	echo '<div><code>'. __( "Select 'Yes' to enable notification bar", 'hw-notification' ) .'</code></div>';

}

/* Display Button */
function  hw_notification_field_display_button_cb() {

	$items = hw_notification_boolean();

	echo '<select id="enable" name="hw_notification_options[display_button]">';
	foreach( $items as $key => $val ) {
	?>
    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, hw_notification_option( 'display_button' ) ); ?>><?php echo esc_html( $val ); ?></option>
    <?php
	}
	echo '</select>';
	echo '<div><code>'. __( "Select 'Yes' to display button", 'hw-notification' ) .'</code></div>';

}

/**
 * Content Section Callback
 */
function hw_notification_section_content_cb() {
	echo '<div class="do-section-desc">
	  <p class="description">'. __( 'Customize notification content by using the following settings.', 'hw-notification' ) .'</p>
	</div>';
}

/**
 * Notification Callback
 */
function hw_notification_field_notification_cb() {

	echo '<input type="text" id="notification" name="hw_notification_options[notification]" value="'. esc_attr( hw_notification_option( 'notification' ) ) .'" />';
	echo '<div><code>'. __( 'Enter your notification message.', 'hw-notification' ) .'</code></div>';

}

/**
 * Notification Link Callback
 */
function hw_notification_field_notification_link_cb() {

	echo '<input type="text" id="notification_link" name="hw_notification_options[notification_link]" value="'. esc_attr( hw_notification_option( 'notification_link' ) ) .'" />';
	echo '<div><code>'. __( 'Enter your notification link.', 'hw-notification' ) .'</code></div>';

}

/**
 * Button Label Callback
 */
function hw_notification_field_button_label_cb() {

	echo '<input type="text" id="button_label" name="hw_notification_options[button_label]" value="'. esc_attr( hw_notification_option( 'button_label' ) ) .'" />';
	echo '<div><code>'. __( 'Enter your button label.', 'hw-notification' ) .'</code></div>';

}

/**
 * Button Link Callback
 */
function hw_notification_field_button_link_cb() {

	echo '<input type="text" id="button_link" name="hw_notification_options[button_link]" value="'. esc_attr( hw_notification_option( 'button_link' ) ) .'" />';
	echo '<div><code>'. __( 'Enter your button link.', 'hw-notification' ) .'</code></div>';

}

/**
*	Notiication type
*/

function  hw_notification_field_notification_type_cb() {

	$items = hw_notification_types();

	echo '<select id="notification_type" name="hw_notification_options[notification_type]">';
	foreach( $items as $key => $val ) {
	?>
    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, hw_notification_option( 'notification_type' ) ); ?>><?php echo esc_html( $val ); ?></option>
    <?php
	}
	echo '</select>';
	echo '<div><code>'. __( 'Select notification type: Alerts for super important items (red), Info for FYI items (blue) and Positive for good news (green).', 'hw-notification' ) .'</code></div>';
}


/**
 * Typography Section Callback
 */
function hw_notification_section_typography_cb() {
	echo '<div class="do-section-desc">
	  <p class="description">'. __( 'Configure typography by using the following settings.', 'hw-notification' ) .'</p>
	</div>';
}

/* Notification Font Callback */
function  hw_notification_field_notification_font_cb() {

	$items = hw_notification_google_fonts();

	echo '<select id="notification_font" name="hw_notification_options[notification_font]">';
	foreach( $items as $key => $val ) {
	?>
    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, hw_notification_option( 'notification_font' ) ); ?>><?php echo esc_html( $val ); ?></option>
    <?php
	}
	echo '</select>';
	echo '<div><code>'. __( 'Select notification font.', 'hw-notification' ) .'</code></div>';
	echo '<div><code>'. sprintf( __( 'Default: %1$s', 'hw-notification' ), hw_notification_google_fonts( hw_notification_option_default( 'notification_font' ) ) ) .'</code></div>';

}

/* Button Font Callback */
function  hw_notification_field_button_font_cb() {

	$items = hw_notification_google_fonts();

	echo '<select id="button_font" name="hw_notification_options[button_font]">';
	foreach( $items as $key => $val ) {
	?>
    <option value="<?php echo esc_attr( $key ); ?>" <?php selected( $key, hw_notification_option( 'button_font' ) ); ?>><?php echo esc_html( $val ); ?></option>
    <?php
	}
	echo '</select>';
	echo '<div><code>'. __( 'Select button font.', 'hw-notification' ) .'</code></div>';
	echo '<div><code>'. sprintf( __( 'Default: %1$s', 'hw-notification' ), hw_notification_google_fonts( hw_notification_option_default( 'button_font' ) ) ) .'</code></div>';

}
