<?php
/**
 * Custom template tags for this theme
 * 
 * @subpackage Laundry Master
 * @since 1.0
 */

/**
 * Prints HTML with meta information for the current post-date/time and author.
 */

if ( ! function_exists( 'laundry_master_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function laundry_master_entry_footer() {

	$separate_meta = __( ', ', 'laundry-master' );
	$categories_list = get_the_category_list( $separate_meta );
	$tags_list = get_the_tag_list( '', $separate_meta );
	if ( ( ( laundry_master_categorized_blog() && $categories_list ) || $tags_list ) || get_edit_post_link() ) {

		echo '<footer class="entry-footer">';			

			laundry_master_edit_link();

		echo '</footer> <!-- .entry-footer -->';
	}
}
endif;

if ( ! function_exists( 'laundry_master_edit_link' ) ) :

function laundry_master_edit_link() {
	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'laundry-master' ),
			esc_html( get_the_title() )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

function laundry_master_categorized_blog() {
	$category_count = get_transient( 'laundry_master_categories' );

	if ( false === $category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$category_count = count( $categories );

		set_transient( 'laundry_master_categories', $category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $category_count > 1;
}

if ( ! function_exists( 'laundry_master_the_custom_logo' ) ) :

function laundry_master_the_custom_logo() {
	the_custom_logo();
}
endif;

function laundry_master_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'laundry_master_categories' );
}
add_action( 'edit_category', 'laundry_master_category_transient_flusher' );
add_action( 'save_post',     'laundry_master_category_transient_flusher' );