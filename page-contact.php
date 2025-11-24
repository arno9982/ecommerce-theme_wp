<?php
/**
 * Template Name: Contact Page
 * Description: Page template pour la page de contact
 */

get_header(); ?>

<main>
    <section class="contact-section">
        <div class="contact-left">
            <h2><?php the_title(); ?></h2>
            
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
            
            <p>We love hearing from you, our Shop customers.<br>
            Please contact us and we will make sure to get back to you as soon as we possibly can.</p>

            <form class="contact-form" id="contact-form" method="post" action="<?php echo admin_url('admin-ajax.php'); ?>">
                <div class="form-row">
                    <div class="form-group">
                        <label>Your Name <span>*</span></label>
                        <input type="text" name="contact_name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <label>Your Email <span>*</span></label>
                        <input type="email" name="contact_email" placeholder="Your Email" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>Your Phone Number</label>
                        <input type="tel" name="contact_phone" placeholder="Your Phone">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label>What's on your mind? <span>*</span></label>
                        <textarea name="contact_message" placeholder="Jot us a note and we'll get back to you as quickly as possible" required></textarea>
                    </div>
                </div>
                <input type="hidden" name="action" value="eazyshop_contact_form">
                <?php wp_nonce_field('eazyshop_contact_nonce', 'contact_nonce'); ?>
                <button type="submit">Submit</button>
            </form>
        </div>

        <div class="contact-right">
            <div class="info-item">
                <i class="fa-solid fa-location-dot"></i> 
                <span><strong>Address:</strong> 1234 Street Address City Address, 1234</span>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-phone"></i> 
                <span><strong>Phone:</strong> (00)1234 5678</span>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-clock"></i> 
                <span><strong>We are open:</strong><br>
                    Monday - Thursday: 9:00 AM – 5:30 PM<br>
                    Friday: 9:00 AM – 6:00 PM<br>
                    Saturday: 11:00 AM – 5:00 PM
                </span>
            </div>
            <div class="info-item">
                <i class="fa-solid fa-envelope"></i> 
                <span><strong>E-mail:</strong> <a href="mailto:shop@email.com">shop@email.com</a></span>
            </div>
        </div>

        <div id="contact-modal" class="modal">
            <div class="modal-content">
                <span class="close-button">&times;</span>
                <h3 id="modal-title"></h3>
                <p id="modal-message"></p>
                <button id="modal-ok-button">OK</button>
            </div>
        </div>
    </section>

    <section class="footer-section">
        <div class="footer-card">
            <i class="fa-solid fa-headphones"></i>
            <h4>Product Support</h4>
            <p>Up to 3 years on-site warranty available for your peace of mind.</p>
        </div>
        <div class="footer-card">
            <i class="fa-solid fa-user"></i>
            <h4>Personal Account</h4>
            <p>With big discounts, free delivery and a dedicated support specialist.</p>
        </div>
        <div class="footer-card">
            <i class="fa-solid fa-tag"></i>
            <h4>Amazing Savings</h4>
            <p>Up to 70% off new Products, you can be sure of the best price.</p>
        </div>
    </section>
</main>

<?php get_footer(); ?>