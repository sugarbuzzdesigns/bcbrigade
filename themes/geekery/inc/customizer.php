<?php
/**
 * Geekery Theme Customizer
 *
 * @package Magnigenie
 * @subpackage Geekery
 * @since Geekery 1.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function geekery_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'geekery_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function geekery_customize_preview_js() {
	wp_enqueue_script( 'geekery_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'geekery_customize_preview_js' );

/*****************************************************************************************/

function geekery_register_theme_customizer( $wp_customize ) {
	// remove control
	$wp_customize->remove_section( 'header_image' );
	$wp_customize->remove_control( 'display_header_text' );

	// rename existing section
	$wp_customize->add_section( 'title_tagline' , array(
			'title' => __( 'Header Text/Logo', 'geekery' ),
			'priority' => 20
		) );

	class GEEKERY_ADDITIONAL_Control extends WP_Customize_Control {
		public $type = 'textarea';

		public function render_content() {
?>
			<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
			</label>
			<?php
		}
	}

	$wp_customize->add_setting(
		'geekery_color_scheme',
		array(
			'default'      => '#39ada5',
			'sanitize_callback' => 'geekery_sanitize_hex_color',
			'sanitize_js_callback' => 'geekery_sanitize_escaping'
		)
	);

	$wp_customize->add_setting( 'geekery_logo',
	    array ( 'default' => '',
	    	'sanitize_callback' => 'esc_url_raw'
	    )
     );
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'color_scheme',
			array(
				'label'       => __( 'Primary Color', 'geekery' ),
				'section'     => 'colors',
				'settings'    => 'geekery_color_scheme'
			)
		)
	);

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo', array(
				'label'    => __( 'Logo', 'geekery' ),
				'section'  => 'title_tagline',
				'settings' => 'geekery_logo',
			) ) );

	$wp_customize->add_section(
		'geekery_custom_css_section',
		array(
			'title'     => __( 'Custom CSS', 'geekery' ),
			'priority'  => 200
		)
	);

	$wp_customize->add_setting( 'geekery_slider', array(
			'default'    => '1',
			'sanitize_callback' => 'geekery_sanitize_checkbox'
		) 
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'geekery_slider',
			array(
				'label'     => __( 'Enable Slider', 'geekery' ),
				'section'   => 'title_tagline',
				'settings'  => 'geekery_slider',
				'type'      => 'checkbox',
			)
		)
	);

	$wp_customize->add_setting(
		'geekery_custom_css',
		array(
			'default'    =>  '',
			'sanitize_callback' => 'geekery_sanitize_custom_css',
			'sanitize_js_callback' => 'geekery_sanitize_escaping'
		)
	);

	$wp_customize->add_control(
		new GEEKERY_ADDITIONAL_Control (
			$wp_customize,
			'geekery_custom_css',
			array(
				'label'     => __( 'Add your custom css here and design live! (for advanced users)' , 'geekery' ),
				'section'   => 'geekery_custom_css_section',
				'settings'  => 'geekery_custom_css'
			)
		)
	);

	function geekery_sanitize_hex_color( $color ) {
		if ( $unhashed = sanitize_hex_color_no_hash( $color ) )
			return '#' . $unhashed;

		return $color;
	}

	function geekery_sanitize_custom_css( $input ) {
		$input = wp_kses_stripslashes( $input );
		return $input;
	}

	function geekery_sanitize_integer( $input ) {
		if ( is_numeric( $input ) ) {
			return intval( $input );
		}
	}

	function geekery_sanitize_escaping( $input ) {
		$input = esc_attr( $input );
		return $input;
	}

	function geekery_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return 1;
		} else {
			return '';
		}
	}

}
add_action( 'customize_register', 'geekery_register_theme_customizer' );


function geekery_customizer_css() {
	$primary_color =  get_theme_mod( 'geekery_color_scheme' );
	if ( $primary_color && $primary_color != '#FFF' ) {
		$customizer_css = '
			blockquote { border-color: #EAEAEA #EAEAEA #EAEAEA '.$primary_color.'; }
			a { color: '.$primary_color.'; }
			.site-title a:hover { color: #777777; }
			.header-wrap, #secondary .widget-title, footer.entry-meta span.cat-links a, footer.entry-meta span.tags-links a { background-color: '.$primary_color.'; }
			.main-navigation a:hover, .main-navigation ul li.current-menu-item a, .main-navigation ul li.current_page_ancestor a, .main-navigation ul li.current-menu-ancestor a, .main-navigation ul li.current_page_item a, .main-navigation ul li:hover > a {
				color: '.$primary_color.';
			}
			#masthead .search-form, .main-navigation ul li ul li a:hover, .main-navigation ul li ul li:hover > a, .main-navigation ul li.current-menu-item ul li a:hover { background-color: '.$primary_color.'; }
			button, input[type="button"], input[type="reset"], input[type="submit"] { 	background-color: '.$primary_color.'; }
			#content .entry-title a:hover { color: '.$primary_color.'; }
			.entry-meta span:hover { color: '.$primary_color.'; }
			#content .entry-meta span a:hover { color: '.$primary_color.'; }
			#content .comments-area article header cite a:hover, #content .comments-area a.comment-edit-link:hover, #content .comments-area a.comment-permalink:hover { color: '.$primary_color.'; }
			.comments-area .comment-author-link a:hover { color: '.$primary_color.'; }
			.comment .comment-reply-link:hover { color: '.$primary_color.'; }
			.site-header .menu-toggle { color: '.$primary_color.'; }
			.site-header .menu-toggle:hover,.readmore-button:hover a { color: '.$primary_color.' !important; }
			.main-small-navigation li a:hover { background: '.$primary_color.'; }
			.main-small-navigation ul > .current_page_item, .main-small-navigation ul > .current-menu-item { background: '.$primary_color.'; }
			.main-small-navigation ul li ul li a:hover, .main-small-navigation ul li ul li:hover > a, .main-small-navigation ul li.current-menu-item ul li a:hover { background-color: '.$primary_color.'; }
			#featured_pages a.more-link:hover { border-color:'.$primary_color.'; color:'.$primary_color.'; }
			a#back-top:before,.comments-area .comment-author-link span,.readmore-button { background-color:'.$primary_color.'; }';
?>
	<style type="text/css"><?php echo $customizer_css; ?></style>
	<?php
	}
?>
	<style type="text/css"><?php echo trim( get_theme_mod( 'geekery_custom_css' ) ); ?></style>
	<?php
}
add_action( 'wp_head', 'geekery_customizer_css' );
?>
