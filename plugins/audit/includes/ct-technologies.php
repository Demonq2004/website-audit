<?php
function audit_register_project_taxonomy()
{
    $labels = array(
        'name' => 'Technologie',
        'singular_name' => 'Technologia',
        'search_items' => 'Wyszukaj Technologie',
        'all_items' => 'Wszystkie Technologie',
        'edit_item' => 'Edytuj Technologie',
        'update_item' => 'Aktualizuj Technologie',
        'add_new_item' => 'Dodaj Nową Technologie',
        'new_item_name' => 'Nowa Nazwa Technologie',
        'menu_name' => 'Technologie',
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'public' => false,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => false,
        'rewrite' => false,
        'show_in_rest' => true,
    );

    register_taxonomy('technology', array('project', 'team_member'), $args);
}
add_action('init', 'audit_register_project_taxonomy');