<?php
/**
 * The template for displaying product content within loops
 * Compatible avec le design EAZYSHOP statique
 * 
 * Placez ce fichier dans: /wp-content/themes/votre-theme/woocommerce/content-product.php
 */

defined('ABSPATH') || exit;

global $product;

if (!is_a($product, 'WC_Product') || !$product->is_visible()) {
    return;
}
?>

<li <?php wc_product_class('product-card', $product); ?>>
    
    <a href="<?php the_permalink(); ?>" class="product-link">
        
        <!-- Image du produit -->
        <div class="product-image-wrapper">
            <?php 
            // Afficher l'image du produit avec la taille 'shop_catalog'
            echo woocommerce_get_product_thumbnail('shop_catalog'); 
            ?>
        </div>
        
        <!-- Détails de la carte -->
        <div class="card-details">
            
            <!-- Tag de catégorie -->
            <p class="category-tag">
                <?php 
                // Récupérer les catégories du produit
                $product_categories = wc_get_product_category_list($product->get_id(), ', ', '', '');
                if ($product_categories) {
                    $categories_text = strip_tags($product_categories);
                    $first_category = explode(',', $categories_text)[0];
                    echo strtoupper(esc_html(trim($first_category)));
                } else {
                    echo 'PRODUITS';
                }
                ?>
            </p>
            
            <!-- Titre du produit -->
            <h3><?php the_title(); ?></h3>
            
            <!-- Rating (note) -->
            <?php if (wc_review_ratings_enabled()) : ?>
                <div class="product-rating">
                    <?php 
                    $rating = $product->get_average_rating();
                    $review_count = $product->get_review_count();
                    
                    if ($rating > 0) {
                        $full_stars = floor($rating);
                        $empty_stars = 5 - $full_stars;
                        
                        echo '<span class="stars full">' . str_repeat('★', $full_stars) . '</span>';
                        echo '<span class="stars empty">' . str_repeat('☆', $empty_stars) . '</span>';
                        echo '<span class="review-count">(' . number_format($rating, 1) . ')</span>';
                    } else {
                        // Pas de notes, afficher 5 étoiles vides
                        echo '<span class="stars empty">☆☆☆☆☆</span>';
                        echo '<span class="review-count">(0.0)</span>';
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <!-- Prix -->
            <p class="price">
                <?php 
                // Afficher le prix (avec support des promotions)
                echo $product->get_price_html(); 
                ?>
            </p>
            
        </div>
    
    </a>
    
    <?php
    /**
     * Hook: woocommerce_after_shop_loop_item
     * Ce hook affiche le bouton "Ajouter au panier"
     */
    do_action('woocommerce_after_shop_loop_item');
    ?>
    
</li>