<?php get_header(); ?>
<div id="content">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post" id="post-<?php the_ID(); ?>">
        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
        <div class="postmetadata">Posted
          <!-- the date and time -->
          on <?php the_time(get_option('date_format')) ?>, <?php the_time(get_option('time_format')) ?>,
          <!-- post author -->
          by <?php the_author() ?>,
          <!-- post category -->
          under <?php the_category(', ') ?>.
        </div>
        <div class="entry">
          <?php the_content('Read the rest of this entry &raquo;'); ?>
        </div>
        <div class="postmetadata">
          <?php if (function_exists('the_tags'))
            the_tags(__('Tags: '), ', ', '<br />');
          ?>
        </div>
      <?php endwhile; ?>
      <?php
      if (function_exists("pagination")) {
        //pagination($additional_loop->max_num_pages);
        pagination($wp_query->max_num_pages);
      }
      ?>
      <?php
      if (function_exists('pagination')) {
        pagination($wp_query->max_num_pages, get_query_var('paged'));
      }
      ?>
    <?php else : ?>
      <h2 class="center">Not Found</h2>
    <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
      <?php get_footer(); ?>