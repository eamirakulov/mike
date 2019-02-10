<?php

/**
 * Remove the content editor from front page
 */
function remove_content_editor(){
    if((int) get_option('page_on_front')==get_the_ID()){
        remove_post_type_support('page', 'editor');
    }
    if(function_exists("pll_get_post")){
        if((int) pll_get_post(get_the_ID(),"en")==get_the_ID()){
            remove_post_type_support('page', 'editor');
        }
    }
}
add_action('admin_head', 'remove_content_editor');
/**
 * Returns page/post slug
 */
function the_slug()
{
	$post_data = get_post($post->ID, ARRAY_A);
	$slug = $post_data['post_name'].'_page';
	return $slug;
}

/**
 * Returns part of string
 */
function excerpt($str, $length = 500, $trailing = '...')
{
	$str = strip_tags($str);
	$length -= mb_strlen($trailing);
	if(mb_strlen($str)> $length)
		return mb_substr($str, 0, $length).$trailing;
	else 
		return $str;
}

/**
 * Add menu
 */
add_theme_support( 'menus' );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'header-menu' => 'Header Menu',
			'footer-menu' => 'Footer Menu',
			'mobile-menu' => 'Mobile Menu'
		)
	);
}
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

add_theme_support( 'post-thumbnails' );

//add_action( 'init', 'create_post_type' );
//function create_post_type() {
//	register_post_type( 'test',
//		array(
//			'labels' => array(
//				'name' => __( 'Test' ),
//				'singular_name' => __( 'Test' )
//			),
//		'public' => true,
//		'has_archive' => true,
//		'supports' => array( 'title', 'editor') 
//		)
//	);
//}

