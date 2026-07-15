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
    $email   = get_theme_mod('contact_email');
    $phone   = get_theme_mod('contact_phone');
    $ig      = get_theme_mod('contact_instagram');
    $tiktok  = get_theme_mod('contact_tiktok');
    $x       = get_theme_mod('contact_x');

    $email_display = $email ? $email : 'email@example.com';
    $phone_display = $phone ? $phone : '+39 02 1234 5678';

    $ig_url     = $ig ? $ig : 'https://www.instagram.com';
    $tiktok_url = $tiktok ? $tiktok : 'https://www.tiktok.com';
    $x_url      = $x ? $x : 'https://www.twitter.com';
    ?>

    <p>Email: <a href="mailto:<?php echo esc_attr($email_display); ?>">
        <?php echo esc_html($email_display); ?>
    </a></p>

    <p>Telefono: <a href="tel:<?php echo esc_attr($phone_display); ?>">
        <?php echo esc_html($phone_display); ?>
    </a></p>

    <br/>

    <p>Seguici sui social:</p>
    

    <div class="social-icons">
        <a href="<?php echo esc_url($ig_url); ?>" target="_blank">
            <i class="fab fa-instagram"></i>
        </a>
        <a href="<?php echo esc_url($tiktok_url); ?>" target="_blank">
            <i class="fab fa-tiktok"></i>
        </a>
        <a href="<?php echo esc_url($x_url); ?>" target="_blank">
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
    <a href="https://www.linkedin.com/in/angelo-ferrucci/" target="_blank">Angelo Ferrucci</a>
    </p>
</div>


</div>

</footer>

<?php wp_footer(); ?>

</body>

</html>