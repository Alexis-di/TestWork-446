<?php
add_action( 'add_meta_boxes_'.'product', 'adding_custom_meta_boxes' );
function adding_custom_meta_boxes( $post ) {
	add_meta_box( 'custom-fields-box', 'Custom fields', 'render_custom_fields_box', 'product', 'normal', 'default' );
}

function render_custom_fields_box() {
	require('custom-fields.php');
}

function cf_save_meta_box( $post_id ) {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	if ( $parent_id = wp_is_post_revision( $post_id ) ) {
		$post_id = $parent_id;
	}
	$fields = [
		'cf_type',
        'cf_published_date',
		'cf-image',
	];
	foreach ( $fields as $field ) {
		if ( array_key_exists( $field, $_POST ) ) {
			update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
		}
	}
}

function cf_update( $post_id ) {
	if ( ! wp_is_post_revision( $post_id ) ){
		remove_action('save_post', 'cf_update');

        $my_post['ID'] = $post_id;
        $my_post[post_date] = sanitize_text_field( $_POST['cf_published_date'] );

		$media_url = sanitize_text_field( $_POST['cf-image'] );		
		$attachment_id = attachment_url_to_postid( $media_url );
		set_post_thumbnail( $post_id, $attachment_id );

        wp_update_post( wp_slash($my_post) );	
		add_action('save_post', 'cf_update');
	}
}

add_action( 'save_post', 'cf_save_meta_box' );
add_action( 'save_post', 'cf_update' );

function wpar_include_script() { 
    if ( ! did_action( 'wp_enqueue_media' ) ) {
        // https://developer.wordpress.org/reference/functions/wp_enqueue_media/
        wp_enqueue_media();
    }	
	wp_enqueue_style('cf-style', get_stylesheet_directory_uri() . '/assets/css/cf-style.css');
    wp_enqueue_script( 'wpar_prod-img_uploader', get_stylesheet_directory_uri() . '/assets/js/product_img_uploader.js', array('jquery'), null, false );
	wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js');
}
// https://developer.wordpress.org/reference/hooks/admin_enqueue_scripts/
add_action( 'admin_enqueue_scripts', 'wpar_include_script' );

?>

