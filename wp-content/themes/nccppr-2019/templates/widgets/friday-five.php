<?php

$fridayfive = new WP_Query([
  'post_type' => 'fridayfive',
  'posts_per_page' => 1
]);

if ($fridayfive->have_posts()) : while ($fridayfive->have_posts()) : $fridayfive->the_post();

$feature = get_field('featured_read');

?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <h1 class="section-header">Friday@Five <a class="more" href="<?php the_permalink(); ?>">More &raquo;</a></h1>
        <p class="visible-xs-block visible-sm-block"><a href="<?php the_permalink(); ?>" class="btn btn-default">Read Friday@Five</a></p>
      </div>
    </div>
     <p class="hidden-xs hidden-sm"><a href="<?php the_permalink(); ?>" class="btn btn-default">Friday@Five archive</a></p>
 <div class="entry-content">
            <?php the_field('notes'); ?>
     <h3 class="section-header">What We're Reading</h3>
    <div class="row">
      <div class="col-md-4 featured-pick" data-source="<?php echo $feature[0]['link']; ?>">
        <a class="mega-link" href="<?php echo $feature[0]['link']; ?>" target="_blank" onclick="ga('send', 'event', 'fridayfive', 'click');"></a>
        <h6>Featured read</h6>
        <?php if (!empty($feature[0]['featured_image'])) { ?>
          <div class="row">
            <div class="col-sm-6 col-md-12">
              <div class="photo-overlay">
                <span class="label">&nbsp;</span>
                <?php echo wp_get_attachment_image($feature[0]['featured_image']['ID'], 'featured-small'); ?>
              </div>
            </div>

            <div class="col-sm-6 col-md-12">
        <?php } ?>
        <h3><?php echo $feature[0]['title']; ?></h3>

        <p class="meta byline"><?php echo $feature[0]['source_name']; ?> | <?php echo $feature[0]['original_date']; ?></p>
        <div class="excerpt"><?php echo $feature[0]['intro_text']; ?>... <a class="more" href="<?php echo $feature[0]['link']; ?>" target="_blank" onclick="ga('send', 'event', 'fridayfive', 'click');">Read the rest <span class="icon-external-link"></span></a></div>

        <?php if (!empty($feature[0]['featured_image'])) { ?>
          </div><!-- .col -->
          </div><!-- .row -->
        <?php } ?>
      </div>
 
      <div class="col-md-4 col-md-push-4">
        

        <ul class="ednews-items">
          <?php
          $date = get_the_time('n/j/Y');
          $items = get_field('news_item');

          $i = 0;
          $limit = 6;
          $count = count($items);

          // If count is less than limit, determine where to break the column. Otherwise, set column break at half the limit
          if ($count < $limit) {
            $colbreak = floor($count/2);
          } else {
            $colbreak = $limit/2;
          }

          while ($i < $limit && $i < $count) {
            if ($i == $colbreak) {
              echo '</ul></div><div class="col-md-4 col-md-pull-4"><ul class="ednews-items">';
            }
            $item = $items[$i];
            ?>

            <li data-source="<?php echo $item['link']; ?>">
              <a class="mega-link" href="<?php echo $item['link']; ?>" target="_blank" onclick="ga('send', 'event', 'fridayfive', 'click');"></a>
              <h3><?php echo $item['title']; ?></h3>
              <p class="meta"><?php echo $item['source_name']; ?> | <?php echo $item['original_date']; ?> <span class="icon-external-link"></span></p>
            </li>

            <?php
            $i++;
          } ?>

          <?php
          if ($count > $limit) {
            echo '<li><a class="more" href="' . get_the_permalink() . '">See all of today\'s picks &raquo;</a></li>';
          }
          ?>
        </ul>
      </div>
    </div>
  </div>
<?php endwhile; endif; wp_reset_query(); ?>
