<?php
// Template URL
$template_url = get_bloginfo('template_url');
// Site URL
$site_url = get_bloginfo('url');

/**
 * Enqueue scripts and styles.
 */
function themes_scripts() {

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'common-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'common-style' ), '1.0' );
		wp_style_add_data( 'common-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'common-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'common-style' ), '1.0' );
	wp_style_add_data( 'common-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'themes_scripts' );

function add_theme_styles() {
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }
  
	wp_enqueue_style( 'Overpass-font', 'https://fonts.googleapis.com/css?family=Overpass:100,100i,200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i');
	wp_enqueue_style( 'ideaspace', get_template_directory_uri() . '/css/ideaspace-template.css',array(), '1.0.0', 'screen' );
	wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',array(), '1.0.0', 'screen' );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css',array(), '1.0.0', 'screen' );
	wp_enqueue_style( 'skippr', get_template_directory_uri() . '/css/jquery.skippr.css');
	wp_enqueue_style( 'component', get_template_directory_uri() . '/css/component.css');
	wp_enqueue_style( 'multilevelpushmenu', get_template_directory_uri() . '/css/jquery.multilevelpushmenu.css');
	wp_enqueue_style( 'print', get_template_directory_uri() . '/css/print.css',array(), '1.0.0', 'print' );
}
add_action( 'wp_enqueue_scripts', 'add_theme_styles' );

function add_theme_script_footer() {
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main-js.js');
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js');
	wp_enqueue_script( 'textresizer', get_template_directory_uri() . '/js/jquery.textresizer.js');
	wp_enqueue_script( 'skippr', get_template_directory_uri() . '/js/jquery.skippr.min.js');
	wp_enqueue_script( 'aria-menu', get_template_directory_uri() . '/js/aria-menu.js');
	wp_enqueue_script( 'classie', get_template_directory_uri() . '/js/classie.js');
	wp_enqueue_script( 'mlpushmenu', get_template_directory_uri() . '/js/mlpushmenu.js');
	wp_enqueue_script( 'itemslide', get_template_directory_uri() . '/js/itemslide.min.js');
	wp_enqueue_script( 'picturefill', get_template_directory_uri() . '/js/picturefill.js');
	wp_enqueue_script( 'placeholders', get_template_directory_uri() . '/js/placeholders.min.js');
}

add_action('wp_footer', 'add_theme_script_footer');

register_nav_menus( array( 'header_menu' => __( 'Header Menu' ) ) );	// Header Menu

//theme option code start
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/theme-option/' );
require_once dirname( __FILE__ ) . '/theme-option/options-framework.php';

// Loads options.php from child or parent theme
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );

add_action( 'optionsframework_custom_scripts', 'optionsframework_custom_scripts' );

function optionsframework_custom_scripts() {
?>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery('#example_showhidden').click(function() {
  		jQuery('#section-example_text_hidden').fadeToggle(400);
	});
	if (jQuery('#example_showhidden:checked').val() !== undefined) {
		jQuery('#section-example_text_hidden').show();
	}
});
</script>
<?php
}

add_action('acf/input/admin_head', 'my_acf_admin_head');

function my_acf_admin_head() { ?>
<script type="text/javascript">
	(function($) {
		acf.add_action('ready', function(){
			$('body').on('click', '.acf-repeater .acf-row-handle .acf-icon.-minus', function( e ){
				return confirm("Are you sure you want to delete this item?");
			});
		});
	})(jQuery);	
</script>
<?php }

//-----------------------------------------------------------
// ACF custom uber styles
//-----------------------------------------------------------
function custom_acf_repeater_colors() {
     wp_enqueue_style( 'acf-uber-styles', get_template_directory_uri() . '/acf-styles.css' );
}
add_action('admin_head', 'custom_acf_repeater_colors');
//theme option code end

function add_excerpt_support_for_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpt_support_for_pages' );

//add_filter('nav_menu_css_class', 'add_active_class');

function add_active_class($classes, $item) {
	if( $item->menu_item_parent == 0 && (in_array('current_page_item', $classes) )) {
		$classes[] = "current_page_item";
	}
	return $classes;
}

register_nav_menus( array( 'footer_menu' => __( 'Footer Menu' ) ) );	// Footer Menu
register_nav_menus( array( 'top_menu' => __( 'Top Menu' ) ) );	// Top Menu
register_nav_menus( array( 'header_menu' => __( 'Header Menu' ) ) );	// Header Menu
register_nav_menus( array( 'footer_l_menu' => __( 'Footer Left Menu' ) ) );	// Footer left Menu
register_nav_menus( array( 'footer_r_menu' => __( 'Footer Right Menu' ) ) );	// Footer right Menu
?>