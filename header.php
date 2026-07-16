<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<header class="site-header">
    <div class="container">
        <div class="site-logo">

        <?php if (has_custom_logo()) {
            the_custom_logo();
        } else { ?>
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <?php bloginfo('name'); ?>
            </a>

        <?php } ?>
        </div>

        <?php $mobile_logo = get_theme_mod('footer_logo', get_theme_file_uri('assets/images/sunnee_logo.svg')); ?>
        <button class="mobile-menu-toggle" type="button" aria-controls="primary-menu" aria-expanded="false">
            <img src="<?php echo esc_url($mobile_logo); ?>" alt="Apri menu">
        </button>

        <nav class="main-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_id' => 'primary-menu',
                'menu_class' => 'primary-menu',
                'items_wrap' => '<ul id="%1$s" class="%2$s"><li class="mobile-home-link"><a href="' . esc_url(home_url('/')) . '">home</a></li>%3$s</ul>'
            ));
            ?>

        </nav>

    </div>

</header>
