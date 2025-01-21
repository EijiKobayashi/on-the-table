<?php get_header(); ?>
<main class="l-main">
  <div class="l-main__inner p-news">
    <h2 class="p-news__pagetitle">News</h2>
    <section class="c-section c-news">
      <div class="p-news__contents">
        <header>
          <time class="--date" datetime="<?php echo get_post_time('Y-m-d'); ?>"><?php echo get_post_time('Y.m.d'); ?></time>
          <h1 class="--title"><?php the_title(); ?></h1>
        </header>
        <article>
          <?php the_content(); ?>
        </article>
      </div>
      <div class="p-news__pagination">
        <ul>
          <li class="--prev">
            <?php
            $prev_post = get_adjacent_post(false, '', true, 'category');
            if ($prev_post && 'post' === get_post_type($prev_post)) {
              $prev_url = get_permalink($prev_post->ID);
              //$prev_title = get_the_title($prev_post->ID);
            ?>
              <a href="<?php echo esc_url($prev_url); ?>">
                <ion-icon name="ios-arrow-back"></ion-icon>
              </a>
            <?php } ?>
          </li>
          <li class="--all">
            <a href="<?php echo home_url('news/'); ?>">News一覧</a>
          </li>
          <li class="--next">
            <?php
            $next_post = get_adjacent_post(false, '', false, 'category');
            if ($next_post && 'post' === get_post_type($next_post)) {
              $next_url = get_permalink($next_post->ID);
              //$next_title = get_the_title($next_post->ID);
            ?>
              <a href="<?php echo esc_url($next_url); ?>">
                <ion-icon name="ios-arrow-forward"></ion-icon>
              </a>
            <?php } ?>
          </li>
        </ul>
      </div>
      <!--  / .l-section /  -->
    </section>
    <!--  / .l-main__inner /  -->
  </div>
</main>
<?php get_footer(); ?>