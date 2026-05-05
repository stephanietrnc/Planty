<?php
add_action('wp_enqueue_scripts', function() {
    // Pour charger le style du thème parent 
    wp_enqueue_style(
        'parent-style', 
        get_template_directory_uri() . '/style.css' 
        );
        wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
        
        // Pour se préconnecter à Google Fonts (performance)
        wp_enqueue_style(
            'google-fonts-preconnect',
            'https://fonts.googleapis.com',
            false   
        );

        // Pour charge la police de Google Fonts
        wp_enqueue_style(
            'police-syne',
            'https://fonts.googleapis.com/css2?family=Syne:wght@400..800&display=swap',
            false
        );
        });

/********************** HOOK ADMIN ********************/

add_filter( 'wp_nav_menu_items', 'add_admin_link_menu', 10, 2 );

function add_admin_link_menu ( $items, $args ) {
    // On cible uniquement le menu voulu ('primary' pour cibler le menu principal ici)
    if ( $args->theme_location !== 'primary' ) {
        return $items;
    }

    // Vérifie si l'utilisateur est connecté
    if ( is_user_logged_in() ) {
        $admin_url = admin_url(); // Retourne l'URL du tableau de bord WP
        $items .= '<li class="menu-item"><a href="' . esc_url( $admin_url ) . '">Admin</a></li>';
    }

    return $items;
}

