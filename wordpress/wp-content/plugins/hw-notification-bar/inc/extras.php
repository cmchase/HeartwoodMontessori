<?php
/**
 * Custom functions for the plugin
 */

/**
 * Plugin Data
 */
function hw_notification_plugin_data() {
	return get_plugin_data( HW_NOTIFICATION_DIR . 'hw-notification-bar.php' );
}

/**
 * Plugin Options Defaults
 *
 * Sane Defaults Logic
 * Plugin will not save default settings to the database without explicit user action
 * and Plugin will function properly out-of-the-box without user configuration.
 *
 * @param string $option - Name of the option to retrieve.
 * @return mixed
 */
function hw_notification_option_default( $option = 'enable' ) {

	$hw_notification_options_default = array(
		'enable'              => 0,
		'display_button'      => 0,
		'notification'        => "Don't forget about early pickup",
		'notification_link'   => 'http://heartwoodmontessori.com/',
		'button_label'        => 'Read More',
		'button_link'         => 'http://heartwoodmontessori.com/'
	);

	if( isset( $hw_notification_options_default[$option] ) ) {
		return $hw_notification_options_default[$option];
	}

	return '';

}

/**
 * Retrieve the plugin option.
 *
 * @param string $option - Name of the option to retrieve.
 * @return mixed
 */
function hw_notification_option( $option = 'logo' ) {

	$hw_notification_options = apply_filters( 'hw_notification_options', get_option( 'hw_notification_options' ) );

	if( isset( $hw_notification_options[$option] ) ) {
		return $hw_notification_options[$option];
	} else {
		return hw_notification_option_default( $option );
	}

}

/**
 * Google Fonts
 *
 * @return string - Google Fonts URL
 */
function hw_notification_google_fonts_url() {

    // Font Families
    $font_families = array();

    // Headings Font
    $notification_font_skeleton = hw_notification_google_fonts_skeleton( hw_notification_option( 'notification_font' ) );
	$font_families[] = urldecode( $notification_font_skeleton['enqueue'] );

    // Body Font
    $button_font_skeleton = hw_notification_google_fonts_skeleton( hw_notification_option( 'button_font' ) );
    $font_families[] = urldecode( $button_font_skeleton['enqueue'] );

    // Query Args
    $query_args = array(
        'family' => urlencode( implode( '|', $font_families ) ),
        'subset' => urlencode( 'latin,latin-ext' ),
    );

    // Fonts URL
    $fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );

    return $fonts_url;

}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function hw_notification_body_classes( $classes ) {

	// WSNB Class
	if( 1 == hw_notification_option( 'enable' ) ) {
		$classes[] = 'hw-notification';
	}

	return $classes;
}
add_filter( 'body_class', 'hw_notification_body_classes' );

/**
 * Google Fonts Skeleton.
 *
 * 80 Popular Google Fonts
 *
 * @param string $font.
 * @return array
 */
function hw_notification_google_fonts_skeleton( $font = 'raleway' ) {

	$google_fonts_skeleton = array(
		'abril-fatface'           => array( 'font-family' => "'Abril Fatface', cursive;",             'enqueue' => 'Abril+Fatface' ),
		'abeezee'                 => array( 'font-family' => "'ABeeZee', sans-serif;",                'enqueue' => 'ABeeZee:400,400italic' ),
		'actor'                   => array( 'font-family' => "'Actor', sans-serif;",                  'enqueue' => 'Actor' ),
		'allerta'                 => array( 'font-family' => "'Allerta', sans-serif;",                'enqueue' => 'Allerta' ),
		'alike'                   => array( 'font-family' => "'Alike', serif;",                       'enqueue' => 'Alike' ),
		'arizonia'                => array( 'font-family' => "'Arizonia', cursive;",                  'enqueue' => 'Arizonia' ),
		'arvo'                    => array( 'font-family' => "'Arvo', serif;",                        'enqueue' => 'Arvo:400,700,400italic,700italic' ),
		'average'                 => array( 'font-family' => "'Average', serif;",                     'enqueue' => 'Average' ),
		'average-sans'            => array( 'font-family' => "'Average Sans', sans-serif;",           'enqueue' => 'Average+Sans' ),
		'bitter'                  => array( 'font-family' => "'Bitter', serif;",                      'enqueue' => 'Bitter:400,700,400italic' ),
		'bree-serif'              => array( 'font-family' => "'Bree Serif', serif;",                  'enqueue' => 'Bree+Serif' ),
		'cabin'                   => array( 'font-family' => "'Cabin', sans-serif;",                  'enqueue' => 'Cabin:400,700,400italic,700italic' ),
		'cardo'                   => array( 'font-family' => "'Cardo', serif;",                       'enqueue' => 'Cardo:400,400italic,700' ),
		'clicker-script'          => array( 'font-family' => "'Clicker Script', cursive",             'enqueue' => 'Clicker+Script' ),
		'cookie'                  => array( 'font-family' => "'Cookie', cursive;",                    'enqueue' => 'Cookie' ),
		'crimson-text'            => array( 'font-family' => "'Crimson Text', serif;",                'enqueue' => 'Crimson+Text:400,400italic,700,700italic' ),
		'dancing-script'          => array( 'font-family' => "'Dancing Script', cursive;",            'enqueue' => 'Dancing+Script:400,700' ),
		'didact-gothic'           => array( 'font-family' => "'Didact Gothic', sans-serif;",          'enqueue' => 'Didact+Gothic' ),
		'domine'                  => array( 'font-family' => "'Domine', serif;",                      'enqueue' => 'Domine:400,700' ),
		'droid-sans'              => array( 'font-family' => "'Droid Sans', sans-serif;",             'enqueue' => 'Droid+Sans:400,700' ),
		'droid-serif'             => array( 'font-family' => "'Droid Serif', serif;",                 'enqueue' => 'Droid+Serif:400,700,400italic,700italic' ),
		'eb-garamond'             => array( 'font-family' => "'EB Garamond', serif;",                 'enqueue' => 'EB+Garamond' ),
		'enriqueta'               => array( 'font-family' => "'Enriqueta', serif;",                   'enqueue' => 'Enriqueta' ),
		'fjalla-one'              => array( 'font-family' => "'Fjalla One', sans-serif;",             'enqueue' => 'Fjalla+One' ),
		'gentium-book-basic'      => array( 'font-family' => "'Gentium Book Basic', serif;",          'enqueue' => 'Gentium+Book+Basic:400,400italic,700,700italic' ),
		'gentium-basic'           => array( 'font-family' => "'Gentium Basic', serif;",               'enqueue' => 'Gentium+Basic:400,700,400italic,700italic' ),
		'grand-hotel'             => array( 'font-family' => "'Grand Hotel', cursive;",               'enqueue' => 'Grand+Hotel' ),
		'gravitas-one'            => array( 'font-family' => "'Gravitas One', cursive;",              'enqueue' => 'Gravitas+One' ),
		'great-vibes'             => array( 'font-family' => "'Great Vibes', cursive;",               'enqueue' => 'Great+Vibes' ),
		'habibi'                  => array( 'font-family' => "'Habibi', serif;",                      'enqueue' => 'Habibi' ),
		'josefin-slab'            => array( 'font-family' => "'Josefin Slab', serif;",                'enqueue' => 'Josefin+Slab:100,300,400,700,100italic,300italic,400italic,700italic' ),
		'lato'                    => array( 'font-family' => "'Lato', sans-serif;",                   'enqueue' => 'Lato:100,300,400,700,100italic,300italic,400italic,700italic' ),
		'ledger'                  => array( 'font-family' => "'Ledger', serif;",                      'enqueue' => 'Ledger' ),
		'libre-baskerville'       => array( 'font-family' => "'Libre Baskerville', serif;",           'enqueue' => 'Libre+Baskerville:400,700,400italic' ),
		'lobster'                 => array( 'font-family' => "'Lobster', cursive;",                   'enqueue' => 'Lobster' ),
		'lora'                    => array( 'font-family' => "'Lora', serif;",                        'enqueue' => 'Lora:400,700,400italic,700italic' ),
		'lustria'                 => array( 'font-family' => "'Lustria', serif;",                     'enqueue' => 'Lustria' ),
		'merriweather'            => array( 'font-family' => "'Merriweather', serif;",                'enqueue' => 'Merriweather:400,300,300italic,400italic,700,700italic' ),
		'merriweather-sans'       => array( 'font-family' => "'Merriweather Sans', sans-serif;",      'enqueue' => 'Merriweather+Sans:400,300,300italic,400italic,700,700italic' ),
		'monda'                   => array( 'font-family' => "'Monda', sans-serif;",                  'enqueue' => 'Monda:400,700' ),
		'montserrat'              => array( 'font-family' => "'Montserrat', sans-serif;",             'enqueue' => 'Montserrat:400,700' ),
		'mouse-memoirs'           => array( 'font-family' => "'Mouse Memoirs', sans-serif;",          'enqueue' => 'Mouse+Memoirs' ),
		'muli'                    => array( 'font-family' => "'Muli', sans-serif;",                   'enqueue' => 'Muli:300,400,300italic,400italic' ),
		'neuton'                  => array( 'font-family' => "'Neuton', serif;",                      'enqueue' => 'Neuton:300,400,700,400italic' ),
		'nobile'                  => array( 'font-family' => "'Nobile', sans-serif;",                 'enqueue' => 'Nobile:400,400italic,700,700italic' ),
		'noto-sans'               => array( 'font-family' => "'Noto Sans', sans-serif;",              'enqueue' => 'Noto+Sans:400,700,400italic,700italic' ),
		'noto-serif'              => array( 'font-family' => "'Noto Serif', serif;",                  'enqueue' => 'Noto+Serif:400,700,400italic,700italic' ),
		'nunito'                  => array( 'font-family' => "'Nunito', sans-serif;",                 'enqueue' => 'Nunito:400,300,700' ),
		'offside'                 => array( 'font-family' => "'Offside', cursive;",                   'enqueue' => 'Offside' ),
		'old-standard-tt'         => array( 'font-family' => "'Old Standard TT', serif;",             'enqueue' => 'Old+Standard+TT:400,400italic,700' ),
		'open-sans'               => array( 'font-family' => "'Open Sans', sans-serif;",              'enqueue' => 'Open+Sans:300italic,400italic,700italic,400,300,700' ),
		'oswald'                  => array( 'font-family' => "'Oswald', sans-serif;",                 'enqueue' => 'Oswald:400,300,700' ),
		'oxygen'                  => array( 'font-family' => "'Oxygen', sans-serif;",                 'enqueue' => 'Oxygen:400,300,700' ),
		'paytone-one'             => array( 'font-family' => "'Paytone One', sans-serif;",            'enqueue' => 'Paytone+One' ),
		'pt-mono'                 => array( 'font-family' => "'PT Mono', sans-serif;",                'enqueue' => 'PT+Mono' ),
		'pt-sans'                 => array( 'font-family' => "'PT Sans', sans-serif;",                'enqueue' => 'PT+Sans:400,700,400italic,700italic' ),
		'pt-sans-narrow'          => array( 'font-family' => "'PT Sans Narrow', sans-serif;",         'enqueue' => 'PT+Sans+Narrow:400,700' ),
		'pt-serif'                => array( 'font-family' => "'PT Serif', serif;",                    'enqueue' => 'PT+Serif:400,700,400italic,700italic' ),
		'playfair-display'        => array( 'font-family' => "'Playfair Display', serif;",            'enqueue' => 'Playfair+Display:400,700,400italic,700italic' ),
		'pontano-sans'            => array( 'font-family' => "'Pontano Sans', sans-serif",            'enqueue' => 'Pontano+Sans' ),
		'quattrocento'            => array( 'font-family' => "'Quattrocento', serif;",                'enqueue' => 'Quattrocento:400,700' ),
		'quattrocento-sans'       => array( 'font-family' => "'Quattrocento Sans', sans-serif;",      'enqueue' => 'Quattrocento+Sans:400,400italic,700,700italic' ),
		'raleway'                 => array( 'font-family' => "'Raleway', sans-serif;",                'enqueue' => 'Raleway:400,100,200,300,700' ),
		'rambla'                  => array( 'font-family' => "'Rambla', sans-serif;",                 'enqueue' => 'Rambla:400,700,400italic,700italic' ),
		'roboto'                  => array( 'font-family' => "'Roboto', sans-serif;",                 'enqueue' => 'Roboto:400,100,100italic,300,300italic,400italic,700,700italic' ),
		'roboto-slab'             => array( 'font-family' => "'Roboto Slab', serif;",                 'enqueue' => 'Roboto+Slab:400,100,300,700' ),
		'rokkitt'                 => array( 'font-family' => "'Rokkitt', serif;",                     'enqueue' => 'Rokkitt:400,700' ),
		'rufina'                  => array( 'font-family' => "'Rufina', serif;",                      'enqueue' => 'Rufina:400,700' ),
		'sanchez'                 => array( 'font-family' => "'Sanchez', serif;",                     'enqueue' => 'Sanchez:400italic,400' ),
		'shadows-into-light'      => array( 'font-family' => "'Shadows Into Light', cursive;",        'enqueue' => 'Shadows+Into+Light' ),
		'shadows-into-light-two'  => array( 'font-family' => "'Shadows Into Light Two', cursive;",    'enqueue' => 'Shadows+Into+Light+Two' ),
		'sintony'                 => array( 'font-family' => "'Sintony', sans-serif",                 'enqueue' => 'Sintony:400,700' ),
		'source-serif-pro'        => array( 'font-family' => "'Source Serif Pro', serif;",            'enqueue' => 'Source+Serif+Pro:400,600,700' ),
		'source-sans-pro'         => array( 'font-family' => "'Source Sans Pro', sans-serif;",        'enqueue' => 'Source+Sans+Pro:200,300,400,700,200italic,300italic,400italic,700italic' ),
		'titillium-web'           => array( 'font-family' => "'Titillium Web', sans-serif;",          'enqueue' => 'Titillium+Web:400,300,300italic,400italic,700,700italic,200,200italic' ),
		'ubuntu'                  => array( 'font-family' => "'Ubuntu', sans-serif;",                 'enqueue' => 'Ubuntu:300,400,700,300italic,400italic,700italic' ),
		'varela'                  => array( 'font-family' => "'Varela', sans-serif;",                 'enqueue' => 'Varela' ),
		'varela-round'            => array( 'font-family' => "'Varela Round', sans-serif;",           'enqueue' => 'Varela+Round' ),
		'vollkorn'                => array( 'font-family' => "'Vollkorn', serif;",                    'enqueue' => 'Vollkorn:400italic,700italic,400,700' ),
		'yanone-kaffeesatz'       => array( 'font-family' => "'Yanone Kaffeesatz', sans-serif;",      'enqueue' => 'Yanone+Kaffeesatz:400,300,700' ),
	);

	if( isset( $google_fonts_skeleton[$font] ) ) {
		return $google_fonts_skeleton[$font];
	} else {
		return $google_fonts_skeleton['raleway'];
	}

}

/**
 * Minify the CSS.
 *
 * @param string $css.
 * @return minified css
 */
function hw_notification_minify_css( $css ) {

    // Remove CSS comments
    $css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );

    // Remove space after colons
	$css = str_replace( ': ', ':', $css );

	// Remove space before curly braces
	$css = str_replace( ' {', '{', $css );

    // Remove whitespace i.e tabs, spaces, newlines, etc.
    $css = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '     '), '', $css );

    return $css;
}

/**
 * Notification Font
 *
 * Adds inline styles to the head.
 *
 * @return string
 */
function hw_notification_notification_font() {

	$notification_font_skeleton = hw_notification_google_fonts_skeleton( hw_notification_option( 'notification_font' ) );

// Custom CSS
$custom_css = "
/*--------------------------------------------------------------
2.0 - WSNB Wrapper
--------------------------------------------------------------*/
.hw-notification-notification {
	font-family: ". $notification_font_skeleton['font-family'] ."
}

/*--------------------------------------------------------------
4.0 - Links
--------------------------------------------------------------*/
.hw-notification-wrapper a.hw-notification-notification-link,
.hw-notification-wrapper a.hw-notification-notification-link:visited {
	font-family: ". $notification_font_skeleton['font-family'] ."
}
";

return hw_notification_minify_css( $custom_css );

}

/**
 * Button Font
 *
 * Adds inline styles to the head.
 *
 * @return string
 */
function hw_notification_button_font() {

	$button_font_skeleton = hw_notification_google_fonts_skeleton( hw_notification_option( 'button_font' ) );

// Custom CSS
$custom_css = "
/*--------------------------------------------------------------
5.0 - Button
--------------------------------------------------------------*/
.hw-notification-wrapper a.hw-notification-button,
.hw-notification-wrapper a.hw-notification-button:visited {
	font-family: ". $button_font_skeleton['font-family'] ."
}
";

return hw_notification_minify_css( $custom_css );

}

/**
 * Notification Bar
 *
 * @return void
 */
function hw_notification_init() {

	// Enable Validation
	if( 0 == hw_notification_option( 'enable' ) ) {
		return;
	}

	// Notification Bar Markup
?>
<div class="hw-notification-wrapper <?php echo hw_notification_option( 'notification_type' ); ?>">
	<div class="hw-notification-inside">

		<div class="hw-notification-notification">

			<?php if( '' != hw_notification_option( 'notification' ) ) : ?>
				<?php if( '' == hw_notification_option( 'notification_link' ) ) : ?>
					<?php echo esc_html( hw_notification_option( 'notification' ) ); ?>
				<?php else: ?>
					<a class="hw-notification-notification-link" href="<?php echo esc_url( hw_notification_option( 'notification_link' ) ); ?>">
						<?php echo esc_html( hw_notification_option( 'notification' ) ); ?>
					</a>
				<?php endif; ?>
			<?php endif; ?>

			<?php if( 1 == hw_notification_option( 'display_button' ) ) : ?>
			<a class="hw-notification-button" href="<?php echo esc_url( hw_notification_option( 'button_link' ) ); ?>">
				<?php echo esc_html( hw_notification_option( 'button_label' ) ); ?>
			</a><!-- .hw-notification-button -->
			<?php endif; ?>

		</div><!-- .hw-notification-notification -->



	</div><!-- .hw-notification-inside -->
</div><!-- .hw-notification-wrapper -->
<?php

}
add_action( 'wp_footer', 'hw_notification_init' );
