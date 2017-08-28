<?php
/**
 * A unique identifier is defined to store the options in the database and reference them free the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'cto'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'cto' ),
		'two' => __( 'Two', 'cto' ),
		'three' => __( 'Three', 'cto' ),
		'four' => __( 'Four', 'cto' ),
		'five' => __( 'Five', 'cto' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'cto' ),
		'two' => __( 'Pancake', 'cto' ),
		'three' => __( 'ctoelette', 'cto' ),
		'four' => __( 'Crepe', 'cto' ),
		'five' => __( 'Waffle', 'cto' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();
	
	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5
	);

	$options[] = array(
		'name' => __( 'Header Section', 'cto' ),
		'type' => 'heading'
	);
	
	$options[] = array(
		'name' => __('Logo :', 'cto'),
		'desc' => __('Please upload website logo here', 'cto'),
		'id' => 'logo',
		'type' => 'upload'
	);
	
	$options[] = array(
		'name' => __('Favicon :', 'cto'),
		'desc' => __('Please upload website favicon icon here', 'cto'),
		'id' => 'favicon',
		'type' => 'upload'
	);
	
	
	$options[] = array(
		'name' => __( 'Twitter Link:', 'cto' ),
		'id' => 'twitter_link',
		'placeholder' => 'Twitter Link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Linkedin Link:', 'cto' ),
		'id' => 'linkedin_link',
		'placeholder' => 'Linkedin Link',
		'type' => 'text'
	);
	
	$options[] = array(
		'name' => __( 'Copyright Text:', 'cto' ),
		'id' => 'copyright_text',
		'placeholder' => 'Copyright Text',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Footer Address:', 'cto' ),
		'id' => 'footer_address',
		'type' => 'editor',
		'settings' => $wp_editor_settings
	);
	
	return $options;
}