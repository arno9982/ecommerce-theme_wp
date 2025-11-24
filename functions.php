<?php
/**
 * EAZYSHOP - Functions.php
 * Configuration complète du thème avec support WooCommerce
 */

// ================================================
// 1. SETUP DU THÈME (Support des fonctionnalités)
// ================================================
add_action('after_setup_theme', function() {
    // Support des fonctionnalités WordPress de base
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo'); // Ajouté pour la cohérence
    
    // Menus de navigation
    register_nav_menus([
        'primary-menu' => 'Menu Principal',
        'secondary-menu' => 'Menu Footer' 
    ]);
    
    // Support WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
});

// ================================================
// 2. CHARGEMENT DES STYLES ET SCRIPTS (UNIFIÉ)
// ================================================

function eazyshop_all_assets() {
    $template_uri = get_template_directory_uri();
    
    // --- STYLES GLOBAUX ---
    
    // 1. Font Awesome (Dépendance externe)
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');

    // 2. Normalize
    wp_enqueue_style('eazyshop-normalize', $template_uri . '/styles/normalize-perso.css', array(), '1.0');

    // 3. Style de BASE (Doit être chargé partout)
    wp_enqueue_style('eazyshop-base', $template_uri . '/base.css', array('eazyshop-normalize'), '1.0');
    
    // 4. Style principal du thème (stylesheet_uri)
    wp_enqueue_style('eazyshop-style', get_stylesheet_uri(), array('eazyshop-base'), '1.0');
    
    // --- STYLES CONDITIONNELS ---
    
    // Styles pour la page d'accueil (home.css)
    if (is_page('Home') || is_page_template('index.php')) {
        wp_enqueue_style('eazyshop-home', $template_uri . '/styles/home.css', array('eazyshop-style'), '1.0');
    }
    
    // Styles pour la page Contact
    if (is_page_template('page-contact.php') || is_page('contact')) { // Ajustez la condition si nécessaire
        wp_enqueue_style('eazyshop-contact', $template_uri . '/styles/contact.css', array('eazyshop-style'), '1.0');
    }
    
    // Styles pour la page About Us
    if (is_page('about-us') || is_page_template('about_us.php')) { // Ajustez la condition si nécessaire
        wp_enqueue_style('eazyshop-about', $template_uri . '/styles/about.css', array('eazyshop-style'), '1.0');
    }

    // Styles et Scripts Spécifiques aux pages WooCommerce
    if (is_shop() || is_product_category() || is_product_tag() || is_product()) {
        
        // Product CSS (votre ancien fichier product.css)
        wp_enqueue_style(
            'product-css', 
            $template_uri . '/styles/product.css', 
            array('eazyshop-style'),
            '1.0.0'
        );
        
        // WooCommerce Custom CSS (pour surcharger WooCommerce)
        wp_enqueue_style(
            'woocommerce-custom-css',
            $template_uri . '/styles/woocommerce-custom-styles.css',
            array('product-css', 'woocommerce-general'),
            '1.0.0'
        );
        
        // Force 3 columns layout (surchargé par le CSS inline en section 7.4)
        wp_enqueue_style(
            'woocommerce-force-layout',
            $template_uri . '/styles/woocommerce-force-3-columns.css',
            array('woocommerce-custom-css'),
            '1.0.0'
        );
        
        // Product JS (Utilisé sur les pages produits/boutique)
        wp_enqueue_script(
            'product-js', 
            $template_uri . '/javascript/product.js', 
            array('jquery'), 
            '1.0', 
            true
        );
        
        // Passer les données du panier au JavaScript
        if (class_exists('WooCommerce') && WC()->cart) {
             wp_localize_script('product-js', 'eazyshopCart', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'cart_count' => WC()->cart->get_cart_contents_count(),
                'cart_url' => wc_get_cart_url(),
                'checkout_url' => wc_get_checkout_url()
            ));
        }
       
    }
    // --- SCRIPTS GLOBAUX ---

// --- SCRIPTS GLOBAUX ET CONDITIONNELS (AJOUTS ICI) ---
    
    // Script Global (votre script.js)
    wp_enqueue_script('eazyshop-script', $template_uri . '/javascript/script.js', array('jquery'), '1.0', true);


    // 🚀 AJOUT DU SCRIPT POUR LA PAGE CONTACT 🚀
    // Assurez-vous que le fichier est bien situé dans /javascript/contact.js
    if (is_page_template('page-contact.php') || is_page('Contact')) {
        wp_enqueue_script(
            'eazyshop-contact-js', 
            $template_uri . '/javascript/contact.js', 
            array('jquery', 'eazyshop-script'), // Dépendance à jQuery et votre script global
            '1.0', 
            true // Charge dans le pied de page
        );
        // Localisation pour l'AJAX du formulaire de contact
        wp_localize_script('eazyshop-contact-js', 'eazyshopAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('eazyshop_contact_nonce')
        ));
    }
    
    // 🚀 AJOUT DU SCRIPT POUR LA PAGE ABOUT US 🚀
    // Assurez-vous que le fichier est bien situé dans /javascript/about.js
    if (is_page('about-us') || is_page_template('about_us.php')) {
        wp_enqueue_script(
            'eazyshop-about-js', 
            $template_uri . '/javascript/scrpt.js', 
            array('jquery', 'eazyshop-script'), 
            '1.0', 
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'eazyshop_all_assets');

// Remplacer toutes les anciennes actions 'wp_enqueue_scripts' par celle-ci
add_action('wp_enqueue_scripts', 'eazyshop_all_assets');

// ================================================
// ... (Reste du code à partir de la section 3)
// ================================================


// ================================================
// 3. CONFIGURATION WOOCOMMERCE
// ================================================

/**
 * 3.1. Désactiver les styles WooCommerce par défaut (optionnel)
 * Décommentez si vous voulez un contrôle total sur les styles
 */
// add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * 3.2. Nombre de produits par page
 */
function eazyshop_products_per_page() {
    return 12; // Afficher 12 produits (grille 3×4)
}
add_filter('loop_shop_per_page', 'eazyshop_products_per_page', 20);

/**
 * 3.3. Nombre de colonnes (valeur par défaut, surchargée par CSS Grid)
 */
function eazyshop_loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'eazyshop_loop_columns');

/**
 * 3.4. Désactiver complètement le système de colonnes WooCommerce
 */
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

// Remettre le tri mais sans le compteur qui casse la mise en page
add_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 10);

/**
 * 3.5. Supprimer le fil d'Ariane (breadcrumb) si vous ne le voulez pas
 * Décommentez la ligne suivante pour le désactiver
 */
// remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// ================================================
// 4. PERSONNALISATION DES TEMPLATES WOOCOMMERCE
// ================================================

/**
 * 4.1. Afficher la catégorie du produit dans la boucle
 */
function eazyshop_show_product_category() {
    global $product;
    $categories = wc_get_product_category_list($product->get_id(), ', ', '', '');
    
    if ($categories) {
        $cat_text = strip_tags($categories);
        $first_cat = explode(',', $cat_text)[0];
        echo '<p class="category-tag">' . strtoupper(esc_html(trim($first_cat))) . '</p>';
    } else {
        echo '<p class="category-tag">PRODUITS</p>';
    }
}

/**
 * 4.2. Modifier le texte du bouton "Ajouter au panier"
 */
function eazyshop_add_to_cart_text() {
    return 'Add to Cart';
}
add_filter('woocommerce_product_add_to_cart_text', 'eazyshop_add_to_cart_text');
add_filter('woocommerce_product_single_add_to_cart_text', 'eazyshop_add_to_cart_text');

/**
 * 4.3. Personnaliser l'affichage des notes/étoiles
 */
function eazyshop_custom_rating_html($html, $rating, $count) {
    if ($rating > 0) {
        $full_stars = floor($rating);
        $empty_stars = 5 - $full_stars;
        
        $stars_html = '<div class="product-rating">';
        $stars_html .= '<span class="stars full">' . str_repeat('★', $full_stars) . '</span>';
        $stars_html .= '<span class="stars empty">' . str_repeat('☆', $empty_stars) . '</span>';
        $stars_html .= '<span class="review-count">(' . number_format($rating, 1) . ')</span>';
        $stars_html .= '</div>';
        
        return $stars_html;
    }
    
    return $html;
}
add_filter('woocommerce_product_get_rating_html', 'eazyshop_custom_rating_html', 10, 3);

// ================================================
// 5. PANIER ET AJAX
// ================================================

/**
 * 5.1. Fonction pour obtenir le nombre d'articles dans le panier
 */
function eazyshop_cart_count() {
    if (class_exists('WooCommerce')) {
        return WC()->cart->get_cart_contents_count();
    }
    return 0;
}

/**
 * 5.2. Endpoint AJAX pour mettre à jour le compteur du panier
 */
function eazyshop_cart_count_ajax() {
    echo eazyshop_cart_count();
    wp_die();
}
add_action('wp_ajax_get_cart_count', 'eazyshop_cart_count_ajax');
add_action('wp_ajax_nopriv_get_cart_count', 'eazyshop_cart_count_ajax');

/**
 * 5.3. Mettre à jour automatiquement le panier via AJAX (fragments)
 */
function eazyshop_add_to_cart_fragment($fragments) {
    $cart_count = WC()->cart->get_cart_contents_count();
    
    ob_start();
    ?>
    <span class="nb-cart"><?php echo $cart_count > 99 ? '99+' : $cart_count; ?></span>
    <?php
    $fragments['.nb-cart'] = ob_get_clean();
    
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'eazyshop_add_to_cart_fragment');

// ================================================
// 6. OPTIMISATIONS ET UTILITAIRES
// ================================================

/**
 * 6.1. Placeholder personnalisé pour les images produits
 */
function eazyshop_custom_placeholder_image($image_html) {
    $custom_placeholder = get_stylesheet_directory_uri() . '/images/placeholder.jpg';
    
    // Vérifier si le fichier placeholder existe
    if (file_exists(get_stylesheet_directory() . '/images/placeholder.jpg')) {
        return str_replace(wc_placeholder_img_src(), $custom_placeholder, $image_html);
    }
    
    return $image_html;
}
add_filter('woocommerce_single_product_image_html', 'eazyshop_custom_placeholder_image');

/**
 * 6.2. Supprimer les métadonnées inutiles dans la boucle produit
 */
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);

/**
 * 6.3. Modifier la structure de la boucle produit (optionnel)
 * Décommentez si vous voulez ajouter un wrapper personnalisé
 */
/*
function eazyshop_product_loop_start() {
    return '<div class="product-grid"><ul class="products columns-3">';
}
add_filter('woocommerce_product_loop_start', 'eazyshop_product_loop_start');

function eazyshop_product_loop_end() {
    return '</ul></div>';
}
add_filter('woocommerce_product_loop_end', 'eazyshop_product_loop_end');
*/

// ================================================
// 7. CONFIGURATION AVANCÉE (Optionnel)
// ================================================

/**
 * 7.1. Désactiver les styles WooCommerce sur certaines pages
 */
function eazyshop_dequeue_woo_styles() {
    // Décommentez pour désactiver les styles WooCommerce sur la page d'accueil
    // if (is_front_page()) {
    //     wp_dequeue_style('woocommerce-general');
    //     wp_dequeue_style('woocommerce-layout');
    //     wp_dequeue_style('woocommerce-smallscreen');
    // }
}
add_action('wp_enqueue_scripts', 'eazyshop_dequeue_woo_styles', 99);

/**
 * 7.2. Ajouter des classes personnalisées au body
 */
function eazyshop_body_classes($classes) {
    if (is_shop() || is_product_category() || is_product_tag()) {
        $classes[] = 'woocommerce-page';
        $classes[] = 'eazyshop-catalog';
    }
    return $classes;
}
add_filter('body_class', 'eazyshop_body_classes');

/**
 * 7.3. Changer la devise affichée (XAF)
 */
function eazyshop_change_currency_symbol($currency_symbol, $currency) {
    switch ($currency) {
        case 'XAF':
            $currency_symbol = 'FCFA';
            break;
    }
    return $currency_symbol;
}
add_filter('woocommerce_currency_symbol', 'eazyshop_change_currency_symbol', 10, 2);



// ================================================
// 8. SÉCURITÉ ET NETTOYAGE
// ================================================

/**
 * 8.1. Nettoyer le header WooCommerce
 */
remove_action('wp_head', 'wc_gallery_noscript');

/**
 * 8.2. Désactiver les générateurs de version dans le header
 */
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_false');

/**
 * 7.4. Ajouter du CSS inline pour forcer la grille (en cas d'urgence)
 * J'ai gardé cette fonction et celle de fin (eazyshop_force_grid_inline) 
 * car elles sont importantes pour forcer votre grille CSS.
 */
function eazyshop_force_grid_css() {
    if (is_shop() || is_product_category() || is_product_tag()) {
        // ... (Contenu de la balise style) ...
    }
}
add_action('wp_head', 'eazyshop_force_grid_css', 999);


// Traitement du formulaire de contact
// (Pas de changement ici, c'est correct)
function eazyshop_handle_contact_form() {
    // ...
}
add_action('wp_ajax_eazyshop_contact_form', 'eazyshop_handle_contact_form');
add_action('wp_ajax_nopriv_eazyshop_contact_form', 'eazyshop_handle_contact_form');


/**
 * FORCER CSS GRID - Inline pour priorité maximale (Doublon gardé pour être sûr)
 */
function eazyshop_force_grid_inline() {
    if (is_shop() || is_product_category() || is_product_tag()) {
        ?>
        <style id="eazyshop-force-grid">
            /* FORCE GRID - Priorité 999 */
            .woocommerce .products,
            .woocommerce ul.products {
                display: grid !important;
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 40px !important;
                /* ... (Autres règles) ... */
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'eazyshop_force_grid_inline', 999);

?>