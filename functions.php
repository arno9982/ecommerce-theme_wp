<?php
/**
 * EazyShop Theme Functions
 */

// Charger les styles et scripts
function eazyshop_enqueue_scripts() {
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Styles du thème
    wp_enqueue_style('eazyshop-base', get_template_directory_uri() . '/css/base.css', array(), '1.0');
    wp_enqueue_style('eazyshop-contact', get_template_directory_uri() . '/css/contact.css', array(), '1.0');
    wp_enqueue_style('eazyshop-style', get_stylesheet_uri(), array(), '1.0');
    
    // JavaScript
    wp_enqueue_script('eazyshop-contact', get_template_directory_uri() . '/js/contact.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'eazyshop_enqueue_scripts');

// Support du titre dynamique
function eazyshop_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    
    // Menus
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'eazyshop'),
    ));
}
add_action('after_setup_theme', 'eazyshop_theme_setup');

// Widget pour le footer (optionnel)
function eazyshop_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'eazyshop'),
        'id'            => 'footer-1',
        'description'   => __('Zone de widgets pour le footer', 'eazyshop'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'eazyshop_widgets_init');

// Traitement du formulaire de contact
function eazyshop_handle_contact_form() {
    // Vérification du nonce pour la sécurité
    check_ajax_referer('eazyshop_contact_nonce', 'contact_nonce');
    
    // Récupération des données
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $phone = sanitize_text_field($_POST['contact_phone']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    
    // Validation
    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Veuillez remplir tous les champs obligatoires.'));
    }
    
    // Envoi de l'email
    $to = get_option('admin_email');
    $subject = 'Nouveau message de contact - ' . get_bloginfo('name');
    $body = "Nom: $name\nEmail: $email\nTéléphone: $phone\n\nMessage:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8');
    
    if (wp_mail($to, $subject, $body, $headers)) {
        wp_send_json_success(array('message' => 'Votre message a été envoyé avec succès !'));
    } else {
        wp_send_json_error(array('message' => 'Erreur lors de l\'envoi du message.'));
    }
}
add_action('wp_ajax_eazyshop_contact_form', 'eazyshop_handle_contact_form');
add_action('wp_ajax_nopriv_eazyshop_contact_form', 'eazyshop_handle_contact_form');
?>