<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
if ($args) {
  $type = (empty($args['type'])) ? null : $args['type'];
}
if ($type == 'top') {
  $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
  );
}
$wp_query = new WP_Query($args);
if ($wp_query->have_posts()) {
?>
  <div class="c-news__list">
    <?php get_template_part('templates/partial/post', 'loop', $args = array('wp_query' => $wp_query)); ?>
  </div>
  <?php
  // 現在のページ番号
  $current_page = max(1, get_query_var('paged'));
  // 総ページ数
  $total_pages = $wp_query->max_num_pages;
  ?>
  <div class="p-news__pagination">
    <ul>
      <li class="--prev">
        <?php if ($current_page > 1) {
          $prev_page_url = get_pagenum_link($current_page - 1); ?>
          <a href="<?php echo esc_url($prev_page_url); ?>">
            <ion-icon name="ios-arrow-back"></ion-icon>
          </a>
        <?php } ?>
      </li>
      <li class="--all">
        <!--a href="#">News一覧</a-->
      </li>
      <li class="--next">
        <?php if ($current_page < $total_pages) {
          $next_page_url = get_pagenum_link($current_page + 1); ?>
          <a href="<?php echo esc_url($next_page_url); ?>">
            <ion-icon name="ios-arrow-forward"></ion-icon>
          </a>
        <?php } ?>
      </li>
    </ul>
  </div>
<?php
}
wp_reset_query();
?>