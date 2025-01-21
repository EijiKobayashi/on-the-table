<!DOCTYPE html>
<html lang="ja" dir="ltr">

<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# website: http://ogp.me/ns/website#">
  <meta charset="utf-8" />
  <!-- Google Tag Manager -->
  <!-- End Google Tag Manager -->
  <title><?php wp_title('｜', true, 'right'); ?></title>
  <meta name="description" content="ここにHOMEのディスクリプションが入ります">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <link rel="icon" type="image/svg+xml" href="<?php echo home_url(); ?>/assets/images/favicon/favicon.svg">
  <link rel="apple-touch-icon" href="<?php echo home_url(); ?>/assets/images/favicon/apple-touch-icon.png">
  <link rel="manifest" href="<?php echo home_url(); ?>/assets/images/favicon/manifest.json">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="use-credentials">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <script type="module" crossorigin="use-credentials" src="<?php echo home_url(); ?>/assets/js/main.js"></script>
  <link rel="stylesheet" crossorigin="use-credentials" href="<?php echo home_url(); ?>/assets/css/style.css">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="pagetop">
  <!-- Google Tag Manager (noscript) -->
  <!-- End Google Tag Manager (noscript) -->
  <header class="l-header js-header">
    <div class="l-header__inner">
      <p class="l-header__logo"><a href="<?php echo home_url(); ?>"><img src="<?php echo home_url(); ?>/assets/images/common/logo.svg" alt="ON the TABLE CHINESE" width="180" height="74"></a></p>
      <p class="l-header__name">オンザ テーブル チャイニーズ</p>
      <div class="l-header__menu c-hamburger js-menu-toggle">
        <button class="c-hamburger__button" title="MENU">
          <span class="c-hamburger__border"></span>
          <span class="c-hamburger__border"></span>
          <span class="c-hamburger__border"></span>
        </button>
      </div>
      <!--  / .l-header__inner /  -->
    </div>
    <div class="l-header__nav p-navigation">
      <div class="p-navigation__inner">
        <nav class="p-navigation__nav">
          <ul class="--navigation">
            <?php if (is_home() || is_front_page()) { ?>
              <li class="--navigation-item"><a href="#news">News <span class="icon-recent">新 着</span></a></li>
              <li class="--navigation-item"><a href="#menu">Menu</a></li>
              <li class="--navigation-item"><a href="#chef">Chef</a></li>
              <li class="--navigation-item"><a href="#our-statement">Our Statement</a></li>
              <li class="--navigation-item"><a href="#restaurant">店舗情報</a></li>
              <li class="--navigation-item"><a href="#inquiry">お問い合わせ・ご予約</a></li>
            <?php } else { ?>
              <li class="--navigation-item"><a href="<?php echo home_url('news/'); ?>">News <span class="icon-recent">新 着</span></a></li>
              <li class="--navigation-item"><a href="<?php echo home_url(); ?>#menu">Menu</a></li>
              <li class="--navigation-item"><a href="<?php echo home_url(); ?>#chef">Chef</a></li>
              <li class="--navigation-item"><a href="<?php echo home_url(); ?>#our-statement">Our Statement</a></li>
              <li class="--navigation-item"><a href="<?php echo home_url(); ?>#restaurant">店舗情報</a></li>
              <li class="--navigation-item"><a href="<?php echo home_url(); ?>#inquiry">お問い合わせ・ご予約</a></li>
            <?php } ?>
            <li class="--navigation-item"><a href="https://www.instagram.com/onthetable_chinese0116/" target="_blank">Follow us <i class="icon-instagram"></i></a></li>
          </ul>
        </nav>
      </div>
      <!--  / .l-header__nav /  -->
    </div>
  </header>