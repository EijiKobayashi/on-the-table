<?php get_header(); ?>
<main class="l-main">
  <div class="l-main__inner p-news">
    <h2 class="p-news__pagetitle">News</h2>
    <section class="c-section c-news">
      <?php get_template_part('templates/partial/post', 'list', $args = array('type' => 'top')); ?>
      <!--  / .l-section /  -->
    </section>
    <!--  / .l-main__inner /  -->
  </div>
</main>
<?php get_footer(); ?>