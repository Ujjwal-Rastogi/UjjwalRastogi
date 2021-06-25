<?php

function ewa_pikme_theme_wp_import_files() {
    return array(
        array(
            'import_file_name' => 'Demo Import',
            'categories' => array('Category'),
            'local_import_file' => trailingslashit(get_template_directory()) . 'demo-data/content.xml',
            'local_import_widget_file' => trailingslashit(get_template_directory()) . 'demo-data/widgets.wie',
            'local_import_redux' => array(
                array(
                    'file_path' => trailingslashit(get_template_directory()) . 'demo-data/theme_options.json',
                    'option_name' => 'pikmewp_options',
                ),
            ),
            'import_preview_image_url' => trailingslashit(get_template_directory_uri()) . 'demo-data/preview_import_image.jpg',
            'import_notice' => esc_html__('After you import this demo, you will have to setup the home page separately', 'ewa-pikme-theme'),
            'preview_url' => '#',
        )
    );
}

add_filter('pt-ocdi/import_files', 'ewa_pikme_theme_wp_import_files');

function ewa_pikme_theme_wp_after_import_setup() {
    // Assign menus to their locations.
    $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');
    $footer_menu = get_term_by('name', 'Footer Resources', 'nav_menu');

    set_theme_mod('nav_menu_locations', array(
        'menu-1' => $main_menu->term_id,
        'menu-3' => $footer_menu->term_id
        )
    );

    // Assign front page and posts page (blog page).
    $front_page_id = get_page_by_title('Home');
    $blog_page_id = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page_id->ID);
    update_option('page_for_posts', $blog_page_id->ID);
}

add_action('pt-ocdi/after_import', 'ewa_pikme_theme_wp_after_import_setup');
