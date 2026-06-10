<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function audit_register_project_cpt() {
    $labels = array(
        'name'                  => 'Projekty Portfolio',
        'singular_name'         => 'Projekt',
        'menu_name'             => 'Projekty',
        'add_new'               => 'Dodaj nowy',
        'add_new_item'          => 'Dodaj nowy Projekt',
        'edit_item'             => 'Edytuj Projekt',
        'all_items'             => 'Wszystkie Projekty',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-portfolio',
        'rewrite'               => array( 'slug' => 'project' ),
        'supports'              => array( 'title', 'excerpt' ), 
        'show_in_rest'          => true,
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'audit_register_project_cpt' );