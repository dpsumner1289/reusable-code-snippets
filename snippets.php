<?php
/**
 * ## Add new image sizes
 * 
 * crop param can be array( x_crop_position, y_crop_position ), 
 * true (hard crop) or false (soft crop)
 * 
 */

if( function_exists('add_image_size') ){
	add_image_size('bc-custom-thumbnail-size', 200, 150, true);
}
add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
	return array_merge( $sizes, array(
		'bc-custom-thumbnail-size' => __( 'b/c custom thumbnail size' ),
	));
}

//-- WP vars to display image
$image = $imageObject;
$custom_image_id = $image['id'];
$custom_image_size = 'bcc-custom-image-size';
$resized_img = wp_get_attachment_image( $custom_image_id, $custom_image_size );

//-- Display the image
echo $resized_img;