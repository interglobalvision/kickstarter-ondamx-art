<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
  $args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
  ) );
  $posts = get_posts( $args );
  $post_options = array();
  if ( $posts ) {
    foreach ( $posts as $post ) {
      $post_options [ $post->ID ] = $post->post_title;
    }
  }
  return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

  // Start with an underscore to hide fields from custom fields list
  $prefix = '_igv_';

  /**
   * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
   */

  $metabox = new_cmb2_box( array(
    'id'            => $prefix . 'metabox',
    'title'         => esc_html__( 'Details', 'cmb2' ),
    'object_types'  => array( 'post' ), // Post type
  ) );

  $metabox->add_field( array(
		'name'       => esc_html__( 'Artist', 'cmb2' ),
		'id'         => $prefix . 'work_artist',
		'type'       => 'text',
	) );

  $metabox->add_field( array(
		'name'       => esc_html__( 'Title', 'cmb2' ),
		'id'         => $prefix . 'work_title',
		'type'       => 'text',
	) );

  $metabox->add_field( array(
		'name'       => esc_html__( 'Year', 'cmb2' ),
		'id'         => $prefix . 'work_year',
		'type'       => 'text',
	) );

  $metabox->add_field( array(
		'name'       => esc_html__( 'Price MXN', 'cmb2' ),
		'id'         => $prefix . 'work_price_mxn',
		'type'       => 'text',
	) );

  $metabox->add_field( array(
		'name'       => esc_html__( 'Price USD', 'cmb2' ),
		'id'         => $prefix . 'work_price_usd',
		'type'       => 'text',
	) );
}
?>
