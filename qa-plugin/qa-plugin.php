
<?php
/**
* Plugin Name: qa-plugin
* Plugin URI: #
* Description: This is the very first plugin I ever created.
* Version: 1.0
* Author: Naba
* Author URI: #
**/

//register custom post type
function wpdocs_codex_book_init() {
    $labels = array(
        'name'                  => _x( 'Books', 'Post type general name', 'rock' ),
        'singular_name'         => _x( 'Book', 'Post type singular name', 'rock' ),
        'menu_name'             => _x( 'Books', 'Admin Menu text', 'rock' ),
        'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'rock' ),
        'add_new'               => __( 'Add New', 'rock' ),
        'add_new_item'          => __( 'Add New Book', 'rock' ),
        'new_item'              => __( 'New Book', 'rock' ),
        'edit_item'             => __( 'Edit Book', 'rock' ),
        'view_item'             => __( 'View Book', 'rock' ),
        'all_items'             => __( 'All Books', 'rock' ),
        'search_items'          => __( 'Search Books', 'rock' ),
        'parent_item_colon'     => __( 'Parent Books:', 'rock' ),
        'not_found'             => __( 'No books found.', 'rock' ),
        'not_found_in_trash'    => __( 'No books found in Trash.', 'rock' ),
        'featured_image'        => _x( 'Book Cover Image', 'rock' ),
        'set_featured_image'    => _x( 'Set cover image', 'rock' ),
        'remove_featured_image' => _x( 'Remove cover image', 'rock' ),
        'use_featured_image'    => _x( 'Use as cover image', 'rock' ),
        'archives'              => _x( 'Book archives', 'rock' ),
        'insert_into_item'      => _x( 'Insert into book', 'rock' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this book', 'rock' ),
        'filter_items_list'     => _x( 'Filter books list', 'rock' ),
        'items_list_navigation' => _x( 'Books list navigation', 'rock' ),
        'items_list'            => _x( 'Books list', 'rock' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'book' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
    );
 
    register_post_type( 'book', $args );
}
 
add_action( 'init', 'wpdocs_codex_book_init' );


//calling shortcode
add_shortcode("qa-post", "qa_query_post");
function qa_query_post($arrtibutes){

    $arrtibutes = shortcode_atts(array(
        "posts"         => "",
        "post_type"     => "post"
    ), $arrtibutes);

    ob_start();
    include_once plugin_dir_path(__FILE__).'/views/qa-post.php';
    $file_content = ob_get_contents();
    ob_end_clean();
    return $file_content;
}