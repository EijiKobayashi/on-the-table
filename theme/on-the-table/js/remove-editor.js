wp.domReady(() => {
  // サンプル
  // wp.blocks.unregisterBlockStyle( 'ブロック名', 'スタイル名' );

  // 画像
  wp.blocks.unregisterBlockStyle('core/image', 'default');
  wp.blocks.unregisterBlockStyle('core/image', 'rounded');

  // 引用
  wp.blocks.unregisterBlockStyle('core/quote', 'default');
  wp.blocks.unregisterBlockStyle('core/quote', 'plain');
  wp.blocks.unregisterBlockStyle('core/quote', 'large');

  // ボタン
  wp.blocks.unregisterBlockStyle('core/button', 'fill');
  wp.blocks.unregisterBlockStyle('core/button', 'outline');

  // 抜粋
  wp.blocks.unregisterBlockStyle('core/pullquote', 'default');
  wp.blocks.unregisterBlockStyle('core/pullquote', 'solid-color');

  // グループ
  wp.blocks.unregisterBlockVariation('core/group', 'group-row');
  wp.blocks.unregisterBlockVariation('core/group', 'group-stack');
  wp.blocks.unregisterBlockVariation('core/group', 'group-grid');

  // 区切り
  wp.blocks.unregisterBlockStyle('core/separator', 'default');
  wp.blocks.unregisterBlockStyle('core/separator', 'wide');
  wp.blocks.unregisterBlockStyle('core/separator', 'dots');

  // テーブル
  wp.blocks.unregisterBlockStyle('core/table', 'regular');
  wp.blocks.unregisterBlockStyle('core/table', 'stripes');

  // SNS
  wp.blocks.unregisterBlockStyle('core/social-links', 'default');
  wp.blocks.unregisterBlockStyle('core/social-links', 'logos-only');
  wp.blocks.unregisterBlockStyle('core/social-links', 'pill-shape');
});
