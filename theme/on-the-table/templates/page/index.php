<?php get_header(); ?>
<main class="l-main">
  <div class="l-main__inner">
    <?php get_template_part('templates/partial/home', 'introduction'); ?>
    <?php get_template_part('templates/partial/home', 'news'); ?>
    <?php get_template_part('templates/partial/home', 'menu'); ?>
    <?php get_template_part('templates/partial/home', 'chef'); ?>
    <?php get_template_part('templates/partial/home', 'our-statement'); ?>
    <?php get_template_part('templates/partial/home', 'restaurant'); ?>
    <?php get_template_part('templates/partial/home', 'inquiry'); ?>
    <!--  / .l-main__inner /  -->
  </div>
</main>
<?php get_footer(); ?>