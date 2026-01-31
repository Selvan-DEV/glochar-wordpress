</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-top">
            <div class="footer-branding">
                <h2><?php bloginfo('name'); ?></h2>
                <p class="footer-tagline"><?php bloginfo('description'); ?></p>
            </div>
            
            <div class="footer-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_class'     => 'footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                ));
                ?>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="copyright">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
            </div>
            
            <div class="footer-social">
                <!-- Add your social media links here -->
                <a href="#" class="social-link" aria-label="Instagram"><i class="icon-instagram"></i></a>
                <a href="#" class="social-link" aria-label="LinkedIn"><i class="icon-linkedin"></i></a>
                <a href="#" class="social-link" aria-label="YouTube"><i class="icon-youtube"></i></a>
                <a href="#" class="social-link" aria-label="Pinterest"><i class="icon-pinterest"></i></a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
