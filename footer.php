<footer>
        <div class="container">
            <div class="newsletter-box">
                <div class="newsletter-info">
                    <p class="newsletter-title">
                        Sign Up To Our Newsletter.
                    </p>
                    <p>
                        Be the first to hear about the latest offers.
                    </p>
                </div>
                <div class="newsletter-form">
                    <input type="text" name="newsletter" id="newsletter" placeholder="Enter your email address">
                    <button type="button" class="btn-newsletter">
                        Subscribe
                    </button>
                </div>
            </div>
            
            <div class="footer-box">
                <div class="general-box">
                    <p class="general-title"><?php bloginfo('name'); ?></p>
                    <p class="general-text">
                        <?php bloginfo('description'); ?>
                    </p>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn-general-discover">
                        Discover <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
                
                <div class="links-box">
                    <p class="links-title">Useful Links</p>
                    <p class="useful-links">
                        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                        <a href="#">Products</a>
                        <a href="#">Contact</a>
                        <a href="#">About us</a>
                        <a href="#">FAQ</a>
                    </p>
                </div>
                
                <div class="infos-box">
                    <p class="infos-title">Contact Info</p>
                    <p class="contact-infos">
                        <span>
                            <i class="fas fa-phone"></i>&nbsp;&nbsp;+237 6 55 55 55 55
                        </span>
                        <span>
                            <i class="fas fa-message"></i>&nbsp;&nbsp;contact@eazy-shop.com
                        </span>
                        <span>
                            <i class="fas fa-location"></i>&nbsp;&nbsp;Central Market. Yaounde, Cameroon
                        </span>
                        <span>
                            <i class="fas fa-calendar"></i>&nbsp;&nbsp;Monday-Saturday: 6:00 AM - 8:00 AM 
                        </span>
                    </p>
                </div>
            </div>
            
            <div class="end-box">
                <div class="social-box">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
                
                <div class="payment-box">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/payment/paypal.png" alt="Paypal">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/payment/visa.png" alt="Visa">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/payment/mastercard.png" alt="Mastercard">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/payment/orange-money.png" alt="Orange Money">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/payment/momo.png" alt="Mobile Money">
                </div>
                
                <div class="copyright-box">
                    Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>, Ltd.
                </div>
            </div>
        </div>
    </footer>

<?php wp_footer(); ?>
</body>
</html>