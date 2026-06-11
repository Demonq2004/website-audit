<?php
if (!defined('ABSPATH')) {
    exit;
}

function create_team_post_type() {
    $labels = array(
        'name'                  => _x( 'Zespół', 'Post Type General Name', 'web-plugin' ),
        'singular_name'         => _x( 'Członek zespołu', 'Post Type Singular Name', 'web-plugin' ),
        'menu_name'             => __( 'Zespół', 'web-plugin' ),
        'all_items'             => __( 'Wszyscy członkowie', 'web-plugin' ),
        'add_new_item'          => __( 'Dodaj nowego członka', 'web-plugin' ),
        'add_new'               => __( 'Dodaj nowego', 'web-plugin' ),
        'new_item'              => __( 'Nowy członek', 'web-plugin' ),
        'edit_item'             => __( 'Edytuj członka', 'web-plugin' ),
        'update_item'           => __( 'Zaktualizuj', 'web-plugin' ),
        'view_item'             => __( 'Zobacz', 'web-plugin' ),
        'search_items'          => __( 'Szukaj', 'web-plugin' ),
    );
    
    $args = array(
        'label'                 => __( 'Członek zespołu', 'web-plugin' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'technologies' ),
        'public'                => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'publicly_queryable'    => false,
        'exclude_from_search'   => true,
        'has_archive'           => false,
        'show_in_nav_menus'     => false,
        'hierarchical'          => false,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'can_export'            => true,
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );
    
    register_post_type( 'team_member', $args );
}
add_action( 'init', 'create_team_post_type', 0 );