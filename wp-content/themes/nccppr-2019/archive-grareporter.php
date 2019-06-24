<div class="container">ARCHIVE
  <?php
  get_template_part('templates/components/page', 'header-wide');

  $paged = get_query_var('paged') ? get_query_var('paged') : 1;

  $args = array(
    'post_type' => 'grareporter',
    'paged' => $paged,
    'meta_key' => 'updated_date',
    'orderby' => 'meta_value_num',
    'order' => 'DESC'
  );

  query_posts($args);
  get_template_part('templates/components/grareporter', 'header');
 ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-9">

      <?php get_template_part('templates/layouts/archive', 'loop'); ?>

    </div>

    <div class="col-md-3 col-lg-push-1 sidebar">
      <?php get_template_part('templates/components/sidebar', 'grareporter'); ?>
    </div>
  </div>
</div>