<?php

namespace Roots\Sage\Admin;

use Roots\Sage\Assets;

// Add admin scripts and styles
function admin_scripts() {
  wp_enqueue_style('ednc_admin_css', Assets\asset_path('styles/admin.css'));
  wp_enqueue_script('ednc_admin_js', Assets\asset_path('scripts/admin.js'));
}
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\\admin_scripts');

/**
 * Order bios, bills, and legislators on admin page
 *
 */
function admin_orderby( $vars ) {

	if ( isset( $vars['post_type']) && $vars['post_type'] == 'bio' && !isset( $vars['orderby'] ) ) {
		$vars = array_merge( $vars, array(
			'orderby' => 'meta_value title',
			'meta_key' => 'last_name_to_sort_by',
			'order' => 'ASC'
		));
	}

	if ( isset( $vars['post_type']) && ($vars['post_type'] == 'bill' || $vars['post_type'] == 'legislator') && !isset( $vars['orderby'] ) ) {
		$vars = array_merge( $vars, array(
			'orderby' => 'menu_order',
			'order' => 'ASC'
		));
	}

	return $vars;
}
add_filter( 'request', __NAMESPACE__ . '\\admin_orderby' );



/**
 * Add columns to admin screen for post lists
 *
 */

// posts
function posts_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
	if ( function_exists( 'coauthors' ) ) {
		$new_columns['coauthors'] = 'Authors';
	} else {
		$new_columns['author'] = 'Author';
	}
	$new_columns['appearance'] = 'Appearance';
	$new_columns['categories'] = 'Categories';
	$new_columns['column'] = 'Column';
  $new_columns['district'] = 'District';
	$new_columns['comments'] = '<span><span class="vers"><span title="Comments" class="comment-grey-bubble"></span></span></span>';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
  return $columns;
}

function posts_custom_column_content($column_name, $id) {
  if ( 'appearance' == $column_name ) {
    echo get_the_term_list($id, 'appearance', '', ', ', '');
  }
  if ( 'district' == $column_name ) {
    echo get_the_term_list($id, 'district-posts', '', ', ', '');
  }
	if ( 'column' == $column_name ) {
		echo get_the_term_list($id, 'column', '', ', ', '');
	}
}

add_filter( 'manage_post_posts_columns', __NAMESPACE__ . '\\posts_custom_column_heading', 10, 1 );
add_action( 'manage_post_posts_custom_column', __NAMESPACE__ . '\\posts_custom_column_content', 10, 2 );

// maps
function maps_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
	$new_columns['author'] = 'Author';
	$new_columns['map-column'] = 'Map Column';
	$new_columns['map-category'] = 'Map Category';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
	return $columns;
}

function maps_custom_column_content($column_name, $id) {
	if ( 'map-column' == $column_name ) {
		echo get_the_term_list($id, 'map-column', '', ', ', '');
	}
	if ( 'map-category' == $column_name ) {
		echo get_the_term_list($id, 'map-category', '', ', ', '');
	}
}

add_filter( 'manage_map_posts_columns', __NAMESPACE__ . '\\maps_custom_column_heading', 10, 1 );
add_filter( 'manage_map_posts_custom_column', __NAMESPACE__ . '\\maps_custom_column_content', 10, 2 );

// bills
function bills_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
  $new_columns['session'] = 'Session';
	$new_columns['bill-type'] = 'Bill Type';
	$new_columns['bill-status'] = 'Bill Status';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
	return $columns;
}

function bills_custom_column_content($column_name, $id) {
  if ( 'session' == $column_name ) {
    echo get_the_term_list($id, 'session', '', ', ', '');
  }

	if ( 'bill-type' == $column_name ) {
		echo get_the_term_list($id, 'bill-type', '', ', ', '');
	}

	if ( 'bill-status' == $column_name ) {
		echo get_the_term_list($id, 'bill-status', '', ', ', '');
	}
}

add_filter( 'manage_bill_posts_columns', __NAMESPACE__ . '\\bills_custom_column_heading', 10, 1 );
add_filter( 'manage_bill_posts_custom_column', __NAMESPACE__ . '\\bills_custom_column_content', 10, 2 );

// resources
function resources_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
	$new_columns['resource-type'] = 'Resource Type';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
	return $columns;
}

function resources_custom_column_content($column_name, $id) {
	if ( 'resource-type' == $column_name ) {
		echo get_the_term_list($id, 'resource-type', '', ', ', '');
	}
}

add_filter( 'manage_resource_posts_columns', __NAMESPACE__ . '\\resources_custom_column_heading', 10, 1 );
add_filter( 'manage_resource_posts_custom_column', __NAMESPACE__ . '\\resources_custom_column_content', 10, 2 );

// bios
function bios_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
	$new_columns['author-type'] = 'Author Type';
	$new_columns['author-year'] = 'Contributing Year';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
	return $columns;
}

function bios_custom_column_content($column_name, $id) {
	if ( 'author-type' == $column_name ) {
		echo get_the_term_list($id, 'author-type', '', ', ', '');
	}
	if ( 'author-year' == $column_name ) {
		echo get_the_term_list($id, 'author-year', '', ', ', '');
	}
}

add_filter( 'manage_bio_posts_columns', __NAMESPACE__ . '\\bios_custom_column_heading', 10, 1 );
add_filter( 'manage_bio_posts_custom_column', __NAMESPACE__ . '\\bios_custom_column_content', 10, 2 );

// galleries
function galleries_custom_column_heading($columns) {
	$new_columns['cb'] = 'cb';
	$new_columns['title'] = 'Title';
	$new_columns['id'] = 'ID';
	$new_columns['date'] = 'Date';

	$columns = $new_columns;
	return $columns;
}

function galleries_custom_column_content($column_name, $id) {
	if ( 'id' == $column_name ) {
		echo get_the_id();
	}
}

add_filter( 'manage_gallery_posts_columns', __NAMESPACE__ . '\\galleries_custom_column_heading', 10, 1 );
add_filter( 'manage_gallery_posts_custom_column', __NAMESPACE__ . '\\galleries_custom_column_content', 10, 2 );

/**
 * Patch to allow private pages to appear as options in parent select menu for other pages
 * https://core.trac.wordpress.org/ticket/8592#comment:129
 *
 */
function admin_private_parent_metabox($output) {
	global $post;

	$args = array(
		'post_type'			=> $post->post_type,
		'exclude_tree'		=> $post->ID,
		'selected'			=> $post->post_parent,
		'name'				=> 'parent_id',
		'show_option_none'	=> __('(no parent)'),
		'sort_column'		=> 'menu_order, post_title',
		'echo'				=> 0,
		'post_status'		=> array('publish', 'private'),
	);

	$defaults = array(
		'depth'					=> 0,
		'child_of'				=> 0,
		'selected'				=> 0,
		'echo'					=> 1,
		'name'					=> 'page_id',
		'id'					=> '',
		'show_option_none'		=> '',
		'show_option_no_change'	=> '',
		'option_none_value'		=> '',
	);

	$r = wp_parse_args($args, $defaults);
	extract($r, EXTR_SKIP);

	$pages = get_pages($r);
	$name = esc_attr($name);
	// Back-compat with old system where both id and name were based on $name argument
	if (empty($id))
	{
		$id = $name;
	}

	if (!empty($pages))
	{
		$output = "<select name=\"$name\" id=\"$id\">\n";

		if ($show_option_no_change)
		{
			$output .= "\t<option value=\"-1\">$show_option_no_change</option>";
		}
		if ($show_option_none)
		{
			$output .= "\t<option value=\"" . esc_attr($option_none_value) . "\">$show_option_none</option>\n";
		}
		$output .= walk_page_dropdown_tree($pages, $depth, $r);
		$output .= "</select>\n";
	}

	return $output;
}

add_filter('wp_dropdown_pages', __NAMESPACE__ . '\\admin_private_parent_metabox');



/**
 * Add filters to admin screen for posts
 *
 */

/*

function filter_posts_by_taxonomies() {

	// Apply this only on a specific post type

  global $typenow;


	// A list of taxonomy slugs to filter by
	$taxonomies = array('appearance');

  if( $typenow == 'post' ){

		foreach ($taxonomies as $tax_slug) {
      $current_tax_slug = isset( $_GET[$tax_slug] ) ? $_GET[$tax_slug] : false;
			$tax_obj = get_taxonomy($tax_slug);
			$tax_name = $tax_obj->labels->name;
			$terms = get_terms($tax_slug);
			if(count($terms) > 0) {
				echo "<select name='$tax_slug' id='$tax_slug' class='postform'>";
				echo "<option value=''>Show All $tax_name</option>";
				foreach ($terms as $term) {
					echo '<option value='. $term->slug, $_GET[$tax_slug] == $term->slug ? ' selected="selected"' : '','>' . $term->name .' (' . $term->count .')</option>';
				}
				echo "</select>";
			}
		}
	}

}
add_filter( 'restrict_manage_posts', __NAMESPACE__ . '\\filter_posts_by_taxonomies');
// add_filter( 'wp_enqueue_scripts', __NAMESPACE__ . '\\filter_posts_by_taxonomies', 10, 2 );


/*

function filter_cars_by_taxonomies($post_type) {

	// Apply this only on a specific post type
  if ( $post_type === 'post')
		return;

	// A list of taxonomy slugs to filter by
	$taxonomies = array('appearance');

	foreach ( $taxonomies as $taxonomy_slug ) {

		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;

		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<select name='{$taxonomy_slug}' id='{$taxonomy_slug}' class='postform'>";
		echo '<option value="">' . sprintf( esc_html__( 'Show All %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
	  echo '</select>';
  }

}
add_filter( 'restrict_manage_posts', __NAMESPACE__ . '\\filter_cars_by_taxonomies');
//add_action( 'restrict_manage_posts', 'filter_cars_by_taxonomies' , 10, 2);
*/
