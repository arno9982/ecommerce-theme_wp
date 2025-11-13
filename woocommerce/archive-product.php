<?php
/**
 * Template de la page Catalogue pour EAZYSHOP
 * Compatible avec le design statique
 * 
 * Placez ce fichier dans: /wp-content/themes/votre-theme/woocommerce/archive-product.php
 */

defined('ABSPATH') || exit;

// Inclusion du header (contient votre <header> statique)
get_header('shop'); 
?>

<main class="product-page-main">
    
    <!-- SIDEBAR : Catégories & Filtres -->
    <aside class="sidebar">
        
        <!-- Catégories -->
        <div class="categories-box">
            <h2>Catégories</h2>
            <nav>
                <?php 
                // Widget des catégories WooCommerce (sans titre dupliqué)
                the_widget(
                    'WC_Widget_Product_Categories',
                    'title=&hierarchical=1&show_children_only=0',
                    array(
                        'before_widget' => '<div class="widget widget_product_categories">',
                        'after_widget' => '</div>',
                        'before_title' => '',
                        'after_title' => ''
                    )
                );
                ?>
            </nav>
        </div>
        
        <hr>
        
        <!-- Filtres -->
        <div class="filters-box">
            <h2>Filtres</h2>
            
            <!-- Filtre de Prix -->
            <?php 
            the_widget(
                'WC_Widget_Price_Filter',
                'title=Prix (FCFA)',
                array(
                    'before_widget' => '<div class="filter-group widget_price_filter">',
                    'after_widget' => '</div>',
                    'before_title' => '<h3>',
                    'after_title' => '</h3>'
                )
            );
            ?>
            
            <!-- Filtre par Attribut : Taille (si l'attribut existe) -->
            <?php
            // Vérifier si l'attribut 'pa_taille' existe dans votre installation WooCommerce
            if (taxonomy_exists('pa_taille')) {
                the_widget(
                    'WC_Widget_Layered_Nav',
                    'title=Taille (Vêtements)&attribute=pa_taille',
                    array(
                        'before_widget' => '<div class="filter-group widget_layered_nav">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3>',
                        'after_title' => '</h3>'
                    )
                );
            }
            ?>
            
            <!-- Filtre par Attribut : Taille Chaussures (si l'attribut existe) -->
            <?php
            if (taxonomy_exists('pa_taille-chaussures')) {
                the_widget(
                    'WC_Widget_Layered_Nav',
                    'title=Taille (Chaussures)&attribute=pa_taille-chaussures',
                    array(
                        'before_widget' => '<div class="filter-group widget_layered_nav">',
                        'after_widget' => '</div>',
                        'before_title' => '<h3>',
                        'after_title' => '</h3>'
                    )
                );
            }
            ?>
            
            <!-- Bouton d'application des filtres (WooCommerce gère déjà cela automatiquement) -->
            <button class="apply-filters-btn" onclick="window.location.reload();" style="display:none;">
                Appliquer les filtres
            </button>
            
        </div>
        
    </aside>
    
    <!-- CONTENU PRINCIPAL : Liste des produits -->
    <section class="product-list-container">
        
        <?php
        /**
         * Hook: woocommerce_before_main_content
         */
        do_action('woocommerce_before_main_content');
        ?>
        
        <!-- Titre de la page -->
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="woocommerce-products-header__title page-title">
                <?php woocommerce_page_title(); ?>
            </h1>
        <?php endif; ?>
        
        <?php
        /**
         * Hook: woocommerce_archive_description
         */
        do_action('woocommerce_archive_description');
        ?>
        
        <?php if (woocommerce_product_loop()) : ?>
            
            <?php
            /**
             * Hook: woocommerce_before_shop_loop
             */
            do_action('woocommerce_before_shop_loop');
            ?>
            
            <?php
            // Ouvrir la boucle des produits
            woocommerce_product_loop_start();
            
            if (wc_get_loop_prop('total')) {
                while (have_posts()) {
                    the_post();
                    
                    /**
                     * Hook: woocommerce_shop_loop
                     */
                    do_action('woocommerce_shop_loop');
                    
                    wc_get_template_part('content', 'product');
                }
            }
            
            // Fermer la boucle
            woocommerce_product_loop_end();
            ?>
            
            <?php
            /**
             * Hook: woocommerce_after_shop_loop
             */
            do_action('woocommerce_after_shop_loop');
            ?>
            
        <?php else : ?>
            
            <?php
            /**
             * Hook: woocommerce_no_products_found
             */
            do_action('woocommerce_no_products_found');
            ?>
            
        <?php endif; ?>
        
        <?php
        /**
         * Hook: woocommerce_after_main_content
         */
        do_action('woocommerce_after_main_content');
        ?>
        
    </section>
    
</main>

<?php
// Inclusion du footer (contient votre <footer> statique)
get_footer('shop');
?>