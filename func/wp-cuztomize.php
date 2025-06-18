<?php
function register_social_media_settings($wp_customize)
{
    // Dodanie sekcji Social Media
    $wp_customize->add_section('social_media_section', [
        'title'    => __('Linki do Social Media', 'go'),
        'priority' => 35,
    ]);

    // Tablica z social media
    $social_media = [
        'instagram' => __('Instagram', 'go'),
        'facebook' => __('Facebook', 'go'),
        'youtube' => __('youtube', 'go'),
        'tiktok' => __('Ticktock', 'go'),

    ];

    foreach ($social_media as $key => $label) {
        $wp_customize->add_setting("{$key}_url", [
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ]);
        $wp_customize->add_control("{$key}_url", [
            'label'   => sprintf(__('%s URL', 'go'), $label),
            'section' => 'social_media_section',
            'type'    => 'url',
        ]);
    }
}
add_action('customize_register', 'register_social_media_settings');


function register_footer_settings($wp_customize)
{
    // SEKCJA FOOTERA
    $wp_customize->add_section('footer_section', [
        'title'    => __('Ustawienia Footer', 'go'),
        'priority' => 55,
    ]);
    // ✉️ Tytuł 2 col
    $wp_customize->add_setting('footer_info_title', [
        'default'           => '',
        // 'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_info_title', [
        'label'   => __('Tytuł trugiej kolumny', 'go'),
        'section' => 'footer_section',
        'type'    => 'text',
    ]);
    // ✉️ Info
    $wp_customize->add_setting('footer_info', [
        'default'           => '',
        // 'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_info', [
        'label'   => __('Info nad buttonem', 'go'),
        'section' => 'footer_section',
        'type'    => 'text',
    ]);
    // ✉️ Button
    $wp_customize->add_setting('footer_button_txt', [
        'default'           => '',
        // 'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_button_txt', [
        'label'   => __('Tekst buttona', 'go'),
        'section' => 'footer_section',
        'type'    => 'text',
    ]);
    $wp_customize->add_setting('footer_button_url', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_button_url', [
        'label'   => __('Link buttona', 'go'),
        'section' => 'footer_section',
        'type'    => 'url',
    ]);

    // 📞 Numer telefonu w Footerze
    $wp_customize->add_setting('footer_phone_number', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);
    $wp_customize->add_control('footer_phone_number', [
        'label'   => __('Numer telefonu', 'go'),
        'section' => 'footer_section',
        'type'    => 'text',
    ]);

    // ✉️ Adres e-mail w Footerze
    $wp_customize->add_setting('footer_email_address', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('footer_email_address', [
        'label'   => __('Adres e-mail', 'go'),
        'section' => 'footer_section',
        'type'    => 'email',
    ]);
    // ✉️ Adres e-mail w Footerze
    $wp_customize->add_setting('footer_email_address2', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ]);
    $wp_customize->add_control('footer_email_address2', [
        'label'   => __('Adres e-mail', 'go'),
        'section' => 'footer_section',
        'type'    => 'email',
    ]);


    // Pobranie wszystkich utworzonych menu
    $menus = wp_get_nav_menus();
    $menu_choices = ['' => __('Wybierz menu', 'go')];

    foreach ($menus as $menu) {
        $menu_choices[$menu->term_id] = $menu->name;
    }

    // 📋 5 pól do wyboru menu w Footerze (dropdown z utworzonymi menu) + Tytuł dla każdego menu
    for ($i = 1; $i <= 3; $i++) {
        // Pole tytułu menu
        $wp_customize->add_setting("footer_menu_title_$i", [
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        ]);
        $wp_customize->add_control("footer_menu_title_$i", [
            'label'   => sprintf(__('Tytuł menu %d', 'go'), $i),
            'section' => 'footer_section',
            'type'    => 'text',
        ]);

        // Pole wyboru menu
        $wp_customize->add_setting("footer_menu_$i", [
            'default'           => '',
            'sanitize_callback' => 'absint', // ID menu powinno być liczbą
        ]);
        $wp_customize->add_control("footer_menu_$i", [
            'label'   => sprintf(__('Wybierz menu %d', 'go'), $i),
            'section' => 'footer_section',
            'type'    => 'select',
            'choices' => $menu_choices,
        ]);
    }

    // 🌐 Checkbox: Włącz Social Media w Footerze
    $wp_customize->add_setting('footer_display_socialmedia', [
        'default'           => false,
        'sanitize_callback' => 'wp_validate_boolean',
    ]);
    $wp_customize->add_control('footer_display_socialmedia', [
        'label'   => __('Włącz Social Media w Footerze', 'go'),
        'section' => 'footer_section',
        'type'    => 'checkbox',
    ]);
}
add_action('customize_register', 'register_footer_settings');
