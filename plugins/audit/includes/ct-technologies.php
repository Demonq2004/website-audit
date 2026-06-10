<?php
function audit_register_project_taxonomy()
{
    $labels = array(
        'name' => 'Technologie',
        'singular_name' => 'Technology',
        'search_items' => 'Wyszukaj Technologie',
        'all_items' => 'Wszystkie Technologie',
        'edit_item' => 'Edytuj Technology',
        'update_item' => 'Aktualizuj Technology',
        'add_new_item' => 'Dodaj Nową Technology',
        'new_item_name' => 'Nowa Nazwa Technology',
        'menu_name' => 'Technologie',
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'technology'),
        'show_in_rest' => true,
    );

    register_taxonomy('technology', array('project'), $args);
}
add_action('init', 'audit_register_project_taxonomy');