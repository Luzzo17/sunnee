<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="separator" style="margin-top:10vh">
    <img src="<?php echo esc_url(get_theme_mod('separator_image', get_theme_file_uri('assets/images/separator.jpg'))); ?>" alt="">
    <h1><?php the_title(); ?></h1>
</div>

<div class="section">
    <?php the_content(); ?>
</div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>