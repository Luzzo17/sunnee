<footer class="site-footer">
    <div class="container">
    <?php $footer_logo = get_theme_mod('footer_logo');

if ( $footer_logo ) : ?>
    <img src="<?php echo esc_url( $footer_logo ); ?>" 
         alt="<?php bloginfo('name'); ?> - Footer Logo"
         class="footer-logo">
<?php endif; ?>
    <div>
        <p>Navigazione</p>
        <a href="<?php echo esc_url(home_url('/')); ?>">
                Home
            </a>
        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'primary-menu'
            ));
            ?>

        </nav>
    </div>
    
    
<div class="footer-contacts">
    <p>Contatti</p>

    <?php
    $email   = get_theme_mod('contact_email', 'info@sunnee.it');
    $phone   = get_theme_mod('contact_phone', '+39 02 1234 5678');
    $ig      = get_theme_mod('contact_instagram', 'https://www.instagram.com');
    $tiktok  = get_theme_mod('contact_tiktok', 'https://www.tiktok.com');
    $x       = get_theme_mod('contact_x', 'https://www.twitter.com');
    ?>

    <p>Email: <a href="mailto:<?php echo esc_attr($email); ?>">
        <?php echo esc_html($email); ?>
    </a></p>

    <p>Telefono: <a href="tel:<?php echo esc_attr(preg_replace('/\s+/', '', $phone)); ?>">
        <?php echo esc_html($phone); ?>
    </a></p>

    <br/>

    <p>Seguici sui social:</p>
    

    <div class="social-icons">
        <a href="<?php echo esc_url($ig); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="<?php echo esc_url($tiktok); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="<?php echo esc_url($x); ?>" target="_blank" rel="noopener noreferrer">
            <i class="fab fa-twitter"></i>
        </a>
    </div>

</div>



<div>
    <p> © <?php echo date('Y'); ?>
    <?php bloginfo('name'); ?>
    <br/>
    Tema sviluppato da 
    <br/>
    <a href="https://www.linkedin.com/in/angelo-ferrucci/" target="_blank" rel="noopener noreferrer">Angelo Ferrucci</a>
    </p>
</div>


</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>
