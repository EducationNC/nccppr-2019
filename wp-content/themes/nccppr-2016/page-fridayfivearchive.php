<div class="article">
  

  <?php $paged = get_query_var('paged') ? get_query_var('paged') : 1;

  $ffive = array(
    'post_type' => 'fridayfive',
    'paged' => $paged,
    'orderby' => 'post_date',
    'order' => 'DESC'
  );

  query_posts($ffive); 
 
    ?>

  <? get_template_part('templates/components/fridayfive', 'header'); ?>
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-9">

      <?php get_template_part('templates/layouts/archive', 'loop'); ?>

    </div>

    <div class="col-md-3 col-lg-push-1 sidebar">
      <?php get_template_part('templates/components/sidebar', 'fridayfive'); ?>
    </div>
  </div>
</div>
