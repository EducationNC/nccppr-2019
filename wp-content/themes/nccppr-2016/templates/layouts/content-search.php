<?php
global $query_string;

$query_args = explode("&", $query_string);
$search_query = array();

if( strlen($query_string) > 0 ) {
  foreach($query_args as $key => $string) {
    $query_split = explode("=", $string);
    $search_query[$query_split[0]] = urldecode($query_split[1]);
  } // foreach
} //if

$search = new WP_Query($search_query);
?>
<?php
$img = $post->cse_img;
?>
<article <?php post_class('block-post clearfix'); ?>>
  <a class="mega-link" href="<?php the_permalink(); ?>"></a>
  <?php if ($img) { ?>
    <div class="col-sm-5">
      <div class="photo-overlay">
        <img class="post-thumbnail" src="<?php echo $img; ?>" />
      </div>
    </div>

    <div class="col-sm-7">
  <?php } else { ?>
    <div class="col-sm-12">
  <?php } ?>
      <header>
        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <?php if (get_post_type() === 'post') { get_template_part('templates/components/entry-meta'); } ?>
      </header>

      <div class="excerpt">
        <?php the_excerpt(); ?>
      </div>
    </div>
</article>
