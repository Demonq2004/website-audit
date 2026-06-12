<?php
if (!defined('ABSPATH'))
    exit;

add_action('acf/init', 'audit_register_acf_fields');

function audit_register_acf_fields()
{
    if (function_exists('acf_add_local_field_group')) {

        acf_add_local_field_group(array(
            'key' => 'group_audit_project_details',
            'title' => 'Szczegóły Projektu',
            'fields' => array(
                array(
                    'key' => 'field_tech_frontend',
                    'label' => 'Frontend (każda technologia w nowej linii)',
                    'name' => 'tech_frontend',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_tech_architecture',
                    'label' => 'Architektura (każda w nowej linii)',
                    'name' => 'tech_architecture',
                    'type' => 'textarea',
                    'rows' => 4,
                ),
                array(
                    'key' => 'field_tech_backend',
                    'label' => 'Backend APIs (każda w nowej linii)',
                    'name' => 'tech_backend',
                    'type' => 'textarea',
                    'rows' => 4,
                ),

                array(
                    'key' => 'field_project_challenge',
                    'label' => 'The Challenge (Wyzwanie)',
                    'name' => 'project_challenge',
                    'type' => 'wysiwyg',
                    'media_upload' => 0,
                    'toolbar' => 'basic',
                ),
                array(
                    'key' => 'field_project_solution',
                    'label' => 'The Solution (Rozwiązanie)',
                    'name' => 'project_solution',
                    'type' => 'wysiwyg',
                    'media_upload' => 0,
                    'toolbar' => 'basic',
                ),

                array(
                    'key' => 'field_code_title',
                    'label' => 'Tytuł sekcji kodu',
                    'name' => 'code_title',
                    'type' => 'text',
                    'default_value' => 'Implementation Example',
                ),
                array(
                    'key' => 'field_code_description',
                    'label' => 'Opis kodu',
                    'name' => 'code_description',
                    'type' => 'textarea',
                    'rows' => 3,
                ),
                array(
                    'key' => 'field_code_filename',
                    'label' => 'Nazwa pliku z kodem',
                    'name' => 'code_filename',
                    'type' => 'text',
                    'default_value' => 'useFocusTrap.ts',
                ),
                array(
                    'key' => 'field_code_snippet',
                    'label' => 'Kod (Snippet)',
                    'name' => 'code_snippet',
                    'type' => 'textarea',
                    'instructions' => 'Wklej kod bez znaczników. Zostaw puste, aby ukryć tę sekcję na stronie.',
                    'rows' => 10,
                ),
                array(
                    'key' => 'field_project_image_1',
                    'label' => 'Galeria (Thumbnail) - Zdjęcie 1',
                    'name' => 'project_image_1',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_project_image_2',
                    'label' => 'Galeria - Zdjęcie 2',
                    'name' => 'project_image_2',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_project_image_3',
                    'label' => 'Galeria - Zdjęcie 3',
                    'name' => 'project_image_3',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
                array(
                    'key' => 'field_project_image_4',
                    'label' => 'Galeria - Zdjęcie 4',
                    'name' => 'project_image_4',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'project',
                    ),
                ),
            ),
        ));

        acf_add_local_field_group(array(
            'key' => 'group_audit_team_details',
            'title' => 'Dane Członka Zespołu',
            'fields' => array(
                array(
                    'key' => 'field_team_role',
                    'label' => 'Rola',
                    'name' => 'role',
                    'type' => 'text',
                    'instructions' => 'Napisz stanowisko, np. Frontend Developer',
                ),
                array(
                    'key' => 'field_team_github',
                    'label' => 'GitHub URL',
                    'name' => 'github',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_team_linkedin',
                    'label' => 'LinkedIn URL',
                    'name' => 'linkedin',
                    'type' => 'url',
                ),
                array(
                    'key' => 'field_team_twitter',
                    'label' => 'Twitter URL',
                    'name' => 'twitter',
                    'type' => 'url',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'team_member',
                    ),
                ),
            ),
        ));
    }
}