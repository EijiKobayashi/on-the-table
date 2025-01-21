<?php

// ヘッダーメタ削除
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles', 10);

// 投稿タイプ 'post' のカテゴリーとタグを無効化
function disable_category_and_tags_for_posts() {
  unregister_taxonomy_for_object_type('category', 'post');
  unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'disable_category_and_tags_for_posts');

// 省略時設定
function new_excerpt_more($more) {
  return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

// アイキャッチ有効化
add_theme_support('post-thumbnails');

// BODY にタグ CLASS 付与
function add_slug_class_name($classes) {

  if ((is_singular('post') || is_singular('news')) || (is_page('news'))) {
    $classes[] = 'news';
  }
  if (is_singular()) {
    $post_type = get_query_var('post_type');
    if (is_page()) {
      $post_type = 'page';
    }
    if ($post_type && is_post_type_hierarchical($post_type)) {
      global $post;
      $classes[] = esc_attr($post->post_name);
      if ($post->ancestors) {
        $root = $post->ancestors[count($post->ancestors) - 1];
        $root_post = get_post($root);
        $classes[] = esc_attr($root_post->post_name);
      }
    }
    $page = get_post(get_the_ID());
    $classes[] = $page->post_name;
  }
  return $classes;
}
add_filter('body_class', 'add_slug_class_name');
function remove_body_class($wp_classes, $extra_classes) {
  $wp_classes = preg_grep("/single-|page-|template|logged-in|\d/", $wp_classes, PREG_GREP_INVERT);
  return array_merge($wp_classes, (array) $extra_classes);
}
add_filter('body_class', 'remove_body_class', 10, 2);

// CLASS追加 for IMG
function image_class_filter($class) {
  return $class . ' img-responsive';
}
add_filter('get_image_tag_class', 'image_class_filter');

// CLASS追加 for previous_post_link() & next_post_link()
function add_prev_post_link_class($output) {
  return str_replace('<a href=', '<a class="nav-links__prev nav-links__a" href=', $output);
}
add_filter('previous_post_link', 'add_prev_post_link_class');
function add_next_post_link_class($output) {
  return str_replace('<a href=', '<a class="nav-links__next nav-links__a" href=', $output);
}
add_filter('next_post_link', 'add_next_post_link_class');

// ブロックエディタスタイル削除
function dequeue_plugins_style() {
  if (!is_admin()) {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('core-block-supports');
  }
}
add_action('wp_enqueue_scripts', 'dequeue_plugins_style', 9999);
function dequeue_global_style() {
  if (!is_admin()) {
    wp_dequeue_style('global-styles');
  }
}
add_action('wp_enqueue_scripts', 'dequeue_global_style', 9999);

// フッタースタイル削除
add_action('wp_footer', 'dequeue_plugins_style');
add_action('wp_footer', 'dequeue_global_style');

// 不要 css 非表示
function dequeue_custom_style() {
  wp_dequeue_style('classic-theme-styles');
  //wp_dequeue_style('fsb-flexible-spacer-style');
  //wp_deregister_style('flexible-table-block', plugins_url('/build/style-index.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'dequeue_custom_style', 9999);

// Yoast SEO コメント非表示
add_filter('wpseo_debug_markers', '__return_false');

// デフォルトjQueryを削除
/*function delete_jquery() {
  if (!is_admin()) {
    wp_enqueue_scripts('jquery');
  }
}
add_action('init', 'delete_jquery');*/

// 新規投稿画面にCSS読み込む
function my_new_post_styles($hook_suffix) {
  if ($hook_suffix == 'post-new.php' || $hook_suffix == 'post.php') {
    wp_enqueue_style('my_new_post_admin_css', get_template_directory_uri() . '/css/admin-style.css');
  }
}
add_action('admin_enqueue_scripts', 'my_new_post_styles');
function my_front_style() {
  wp_enqueue_style('my_admin_style', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('admin_head-post.php', 'my_front_style');
function my_front_widget() {

  wp_enqueue_style('my_admin_widget', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('load-widgets.php', 'my_front_widget');

// SVGアップロード
function add_file_types_to_uploads($file_types) {
  $new_filetypes = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types = array_merge($file_types, $new_filetypes);
  return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

// SVG表示
add_filter('manage_media_columns', function ($columns) {
  echo '<style>.media-icon img[src$=".svg"]{width:100%;}</style>';
  return $columns;
});

// 自動補完リダイレクト無効
function disable_redirect_canonical($redirect_url) {
  if (is_404()) {
    return false;
  }
  return $redirect_url;
}
add_filter('redirect_canonical', 'disable_redirect_canonical');

// iframeの遅延読み込みを無効
function disable_post_content_iframe_lazy_loading($default, $tag_name, $context) {
  if ('iframe' === $tag_name && 'the_content' === $context) {
    return false;
  }
  return $default;
}
add_filter('wp_lazy_loading_enabled', 'disable_post_content_iframe_lazy_loading', 10, 3);
