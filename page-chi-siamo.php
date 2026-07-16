<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php get_template_part('template-parts/separator_title'); ?>

<?php get_template_part('template-parts/section_img_text'); ?>

<?php get_template_part('template-parts/separator'); ?>

<?php get_template_part('template-parts/section_text_img'); ?>

<?php get_template_part('template-parts/separator'); ?>

<?php get_template_part('template-parts/section_text'); ?>

<?php get_template_part('template-parts/separator'); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
