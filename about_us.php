<?php
/**
 * Template Name: about us Page
 * Description: Page template pour la page de contact
 */

get_header(); 
$template_uri = get_template_directory_uri();
?>

<main>
        <section class="page-title-section">
            <div class="container">
                <h1>About Us</h1>
            </div>
        </section>

        <section class="about-section bg-dark">
            <div class="container two-col-layout">
                <div class="col-text">
                    <h2 class="large-title">A Family That Keeps on Growing</h2>
                    <p>We always aim to please our customers by providing the best products and services. Our team is passionate about technology and dedicated to helping you find the perfect setup.</p>
                </div>
                <div class="col-image">
                    
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/our_product.jpeg" alt="visuel game de produits vendus">
                </div>
            </div>
        </section>

        <section class="about-section bg-light">
            <div class="container two-col-layout row-reverse">
                <div class="col-text">
                    <div class="section-title">
                        <i class="icon fa-solid fa-comment-dots"></i>
                        <h2>The Highest Quality of Products</h2>
                    </div>
                    <p>Our commitment to exceptional quality ensures that every piece of clothing is crafted with care, using premium materials to deliver styl and comfort that lasts.</p>
                </div>
                <div class="col-image">
                    
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/image_quality.jpeg" alt="image illustrant la qualite des produits">
                </div>
            </div>
        </section>

        <section class="about-section bg-dark">
            <div class="container two-col-layout">
                <div class="col-text">
                    <div class="section-title">
                        <i class="icon fa-solid fa-truck-fast"></i>
                        <h2>We Deliver To Any Regions</h2>
                    </div>
                    <p>No matter where you are, we'll get your order to you. Our logistics network ensures fast, safe, and reliable shipping to all regions. Track your order from our warehouse to your doorstep.</p>
                    
                </div>
                <div class="col-image">
                    
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/Tom_Suscriber.jfif" alt="image d'un client satisfait qui donne un temoignage">
                </div>
            </div>
        </section>
        <h1 class="brand">Our brands</h1>
        <section class="logo-visuel">
            <div class="logo-slider" aria-hidden="false">
                <div class="logo-track">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/puma.jpeg" alt="puma logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/nike.jpeg" alt="nike logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/adidas.jpeg" alt="adidas logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/louis.jpeg" alt="louis logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/nike.jpeg" alt="nike logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/adidas.jpeg" alt="adidas logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/louis.jpeg" alt="louis logo">
                </div>
                <div class="logo-track" aria-hidden="true">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/puma.jpeg" alt="puma logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/nike.jpeg" alt="nike logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/adidas.jpeg" alt="adidas logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/louis.jpeg" alt="louis logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/nike.jpeg" alt="nike logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/adidas.jpeg" alt="adidas logo">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/about/louis.jpeg" alt="louis logo">
                </div>
            </div>
        </section>

        <section class="testimonial-section">
            <div class="container">
                <i class="icon-quote fa-solid fa-quote-left"></i>
                <blockquote>
                    "Excatly as described! The product matches the pictures. Good values for money. Thanks!"
                </blockquote>
                <p class="author">- Tom H.</p>
            </div>
        </section>

        <section class="why-us-section bg-light">
            <div class="container">
                <div class="three-col-layout">
                    <div class="col-feature">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-gear"></i>
                        </div>
                        <h3>High Quality</h3>
                        <p>We use only the best components for our builds.</p>
                    </div>
                    <div class="col-feature">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-paper-plane"></i>
                        </div>
                        <h3>Fastest Shipping</h3>
                        <p>Get your products delivered to you quickly.</p>
                    </div>
                    <div class="col-feature">
                        <div class="icon-wrapper">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <h3>Amazing Service</h3>
                        <p>Our support team is here for you 24/7.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>