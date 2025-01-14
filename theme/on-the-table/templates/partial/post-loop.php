<?php
if ($args) {
  $wp_query = (empty($args['wp_query'])) ? $wp_query : $args['wp_query'];
}
while ($wp_query->have_posts()) {
  $wp_query->the_post();
?>
  <a href="<?php the_permalink() ?>" class="c-news__item">
    <time class="--date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>
    <h3 class="--title"><?php the_title(); ?></h3>
    <ion-icon name="ios-arrow-forward" class="--icon"></ion-icon>
    <!--  / .c-news__item /  -->
  </a>
<?php
}
?>