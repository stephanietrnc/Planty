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


    