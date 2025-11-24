<?php
/**
 * Template Name: home
 * Description: Page template pour la page home
 */
get_header();

// --- Définition des URLs dynamiques ---

// 1. URL de la page Boutique WooCommerce
// Cette fonction nécessite que WooCommerce soit actif.
$shop_page_url = function_exists('wc_get_page_id') ? get_permalink( wc_get_page_id( 'shop' ) ) : '#';

// 2. URL de la page "About us" (Assumons que le titre de la page est 'About us')
$about_page = get_page_by_title( 'About' );
$about_page_url = $about_page ? get_permalink( $about_page->ID ) : '#';

// 3. URI du répertoire du thème (pour les images, en supposant qu'elles sont dans /images/)
$template_uri = get_template_directory_uri();
?>

<main>
    <div class="container">
        <section class="hero-section">
            <div class="first-box" style="grid-area: first;">
                <div class="first-box-first">
                    <h2>The best of shopping in one click is on <span>EazyShop</span></h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        libero commodi laboriosam assumenda quia dolorem impedit sed,
                    </p>
                    <div class="hero-options">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-hero-action-1">Shop now</a>
                        <a href="<?php echo esc_url( $about_page_url ); ?>" class="btn-hero-action-2">About us</a>
                    </div>
                </div>
                <div class="first-box-second">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/camera.png" alt="Cloth Image">
                </div>
            </div>
            <div class="second-box" style="grid-area: second;">
                <div>
                    The all-in-one<br>platform
                </div>
            </div>
            <div class="third-box" style="grid-area: third;">
                <div>
                    The best designs<br>and accessories
                </div>
            </div>
            <div class="fourth-box" style="grid-area: fourth;">
                <p>Pro Men's<br>Trousers</p>
                <a href="<?php echo esc_url( $shop_page_url ); ?>">Show more</a>
            </div>
            <div class="fifth-box" style="grid-area: fifth;">
                <div>
                    <p>Cloths for both<br>girls and boys</p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>">Discover</a>
                </div>
            </div>
        </section>
        <section class="awards-section">
            <div class="award">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                    </svg>
                </div>
                <div>
                    <span class="award-title">SATISFIED OR REIMBURSED</span>
                    <span class="award-text">24h hours return available</span>
                </div>
            </div>
            <div class="award">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                    </svg>
                </div>
                <div>
                    <span class="award-title">SATISFIED OR REIMBURSED</span>
                    <span class="award-text">24h hours return available</span>
                </div>
            </div>
            <div class="award">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                    </svg>
                </div>
                <div>
                    <span class="award-title">SATISFIED OR REIMBURSED</span>
                    <span class="award-text">24h hours return available</span>
                </div>
            </div>
            <div class="award">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z"/>
                    </svg>
                </div>
                <div>
                    <span class="award-title">SATISFIED OR REIMBURSED</span>
                    <span class="award-text">24h hours return available</span>
                </div>
            </div>
        </section>
        <section class="present-section">
            <div class="illustration-box">
                <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Illustration">
            </div>
            <div class="present-content">
                <h2>What is <span>EazyShop</span> ?</h2>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Assumenda, nisi ad error minus ex totam molestiae aliquam saepe,
                    aliquid voluptate odit maiores corrupti neque 
                    cum est ratione cumque fugit adipisci!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Assumenda, nisi ad error minus ex totam molestiae aliquam saepe,
                    aliquid voluptate odit maiores corrupti neque 
                    cum est ratione cumque fugit adipisci!
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Assumenda, nisi ad error minus ex totam molestiae aliquam saepe,
                    aliquid voluptate odit maiores corrupti neque 
                    cum est ratione cumque fugit adipisci!
                </p>
                <p class="present-options">
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-present-action-1">Discover</a>
                    <a href="#services-section" class="btn-present-action-2">See More</a>
                </p>
            </div>
        </section>
        <section class="services-section" id="services-section">
            <h2>Discover our quality products</h2>
            <div class="services">
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
                <div class="service">
                    <div class="image-box">
                        <a href="<?php echo esc_url( $shop_page_url ); ?>">
                            <img src="<?php echo esc_url( $template_uri ); ?>/images/card-2.jpg" alt="Services Image">
                        </a>
                    </div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                        laborum unde dolores.
                        <br>
                        <span>500+ differents styles available</span>
                    </p>
                    <a href="<?php echo esc_url( $shop_page_url ); ?>" class="btn-see-more">See more</a>
                </div>
            </div>
        </section>
        <section class="testimonies-section">
            <h2>Testimonies</h2>
            <div class="testimonies">
                <div class="testimony">
                    <span class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, 
                        adipisicing elit. Explicabo, 
                        iure totam! Quia voluptas a tenetu.
                    </p>
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/user.jpeg" alt="User">
                    <span class="user">Martin KOUAM</span>
                </div>
                <div class="testimony">
                    <span class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, 
                        adipisicing elit. Explicabo, 
                        iure totam! Quia voluptas a tenetu.
                    </p>
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/user.jpeg" alt="User">
                    <span class="user">Martin KOUAM</span>
                </div>
                <div class="testimony">
                    <span class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </span>
                    <p>
                        Lorem ipsum dolor sit amet consectetur, 
                        adipisicing elit. Explicabo, 
                        iure totam! Quia voluptas a tenetu.
                    </p>
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/user.jpeg" alt="User">
                    <span class="user">Martin KOUAM</span>
                </div>
            </div>
        </section>
        <section class="sponsors-section">
            <h2>Sponsors</h2>
            <div class="sponsors">
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/amazon.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/google.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/microsoft.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/amazon.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/google.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/microsoft.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/google.png" alt="">
                </div>
                <div class="sponsor">
                    <img src="<?php echo esc_url( $template_uri ); ?>/images/google.png" alt="">
                </div>
            </div>
        </section>
    </div>
</main>
     
<?php get_footer(); ?>