<?php

// Register responsive menu script
add_action( 'wp_enqueue_scripts', 'mono_enqueue_scripts' );
/**
 * Enqueue javascript
 * @author mono voce
 */
function mono_enqueue_scripts() {
	
	wp_enqueue_script( 'mono-jquery', get_stylesheet_directory_uri() . '/js/jquery-1.9.1.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-owl-script', get_stylesheet_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-owl-image', get_stylesheet_directory_uri() . '/js/owl-carousel-images.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'mono-owl-video', get_stylesheet_directory_uri() . '/js/owl-carousel-video.js', array( 'jquery' ), '1.0.0', true );

}

//* Add gallery slider function
add_action( 'genesis_entry_content', 'image_slider', 12 );
/**
 * Image slider function.
 */
function image_slider() {
	$rows = get_field( 'picture_slider' );  //this is the ACF instruction to get everything in the repeater field
	
	if ( is_single() ) {
		
		if($rows) {
			echo '<div id="owl-one-slide" class="owl-carousel">';
			
			foreach($rows as $row) {	
 				
				echo '<div class="item"><img class="" src="' . $row['picture'] .'" /><p>' . $row['picture_text']. '</p></div>';
			}
			
			echo '</div>';
		}
	
	}
}