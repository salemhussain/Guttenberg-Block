<?php

function wp_event_rigister_block() {
	// wp_register_script('wp-events-block-js', get_template_directory_uri() . '/assets/js/gutenberg/block-awhitepixel-myfirstblock.js');
    wp_register_script(
		'wp-events-block-js', // Handle.
		plugins_url( '/build/index.js', dirname( __FILE__ ) ), // Block.build.js: We register the block here. Built with Webpack.
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' , 'wp-components' ), // Dependencies, defined above.
		null, // filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' ), // Version: filemtime — Gets file modification time.
		true // Enqueue the script in the footer.
	);
	
//  echo plugins_url( 'wp-events/index.js', dirname( __FILE__ ) );
	register_block_type('wp-events/short-code', [
		'editor_script' => 'wp-events-block-js',
	]);

	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
	wp_enqueue_style(
		'wp-events-block-css-editor',
        plugins_url( 'editor.css', __FILE__ ),
        array( 'wp-edit-blocks' )
	);
	wp_enqueue_style(
		'wp-events-block-css-editor',
        plugins_url( 'style.css', __FILE__ ),
        array( 'wp-edit-blocks' )
	);
}

add_action( 'init', 'wp_event_rigister_block' );



