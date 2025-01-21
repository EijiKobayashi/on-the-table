<?php
// https://deep-space.blue/web/2963
// https://envydesign.jp/blog/2024/03/acf-pro_custom_block/#2blockjsonwo_shiu_fang_fa
add_action('init', 'register_acf_blocks');
function register_acf_blocks() {
  register_block_type(dirname(__DIR__) . '/blocks/accordion');
}

// カテゴリー追加
/*add_filter('block_categories_all', function ($categories) {
  $new_category = [
    'slug' => 'acf-block',
    'title' => 'ACFブロック',
  ];
  array_splice($categories, 1, 0, [$new_category]);
  return $categories;
});*/
