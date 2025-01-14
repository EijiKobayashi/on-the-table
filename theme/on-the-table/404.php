<?php get_header(); ?>
<?php
if (function_exists('yoast_breadcrumb')) {
  yoast_breadcrumb('<div class="p-breadcrumbs">', '</div>');
}
?>
<div id="content">
  <h2 class="center">Error 404 - Not Found</h2>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>