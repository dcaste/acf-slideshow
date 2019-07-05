<?php
/**
 * Register ACF Block.
 *
 * @return void
 */
function register_acf_block_types() {

	acf_register_block_type(array(
		'name'            => 'acf-slideshow',
		'title'           => 'Slideshow',
		'description'     => 'Slideshow',
		'render_template' => 'acf-slideshow.php',
		'category'        => 'common',
		'keywords'        => array( 'slideshow' ),
		'align'           => 'full',
	));

}

if( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'register_acf_block_types' );
}