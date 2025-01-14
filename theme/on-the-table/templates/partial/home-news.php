<?php
$args = array(
  'post_type' => 'post',
  'post_status' => 'publish',
  'posts_per_page' => 3,
  'orderby' => 'date',
  'order' => 'DESC',
);
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) {
?>
  <section class="c-section p-home-news c-news" id="news">
    <h2 class="c-heading" style="">News</h2>
    <div class="c-news__list">
      <?php get_template_part('templates/partial/post', 'loop', $args = array('wp_query' => $wp_query)); ?>
      <!--  / .c-news__list /  -->
    </div>
    <a href="<?php echo home_url('news/'); ?>" class="p-home-news__button">全てのNEWSを見る</a>
    <!--  / .l-section /  -->
  </section>
<?php
}
wp_reset_query();
?>