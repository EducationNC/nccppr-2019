<?php

use Roots\Sage\Assets;

?>

<div class="above-footer print-no">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-push-2">
        <div class="hidden-xs">
          <?php get_template_part('templates/components/email-signup'); ?>
        </div>
        <div class="visible-xs-block text-center extra-bottom-margin">
          <a class="btn btn-default" data-toggle="modal" data-target="#emailSignupModal">Free Subscription</a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="content-info" role="contentinfo">

  <div class="container">
    <div class="row">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'footer_navigation',
        'container' => false,
        'menu_class' => 'col-sm-8 menu-footer-nav print-no',
        // 'walker' => new Walker_Nav_Menu
      ));
      ?>

      <div class="col-sm-4">
        <div class="h5">Support us</div>
        <p><a class="btn btn-gray" href="https://donatenow.networkforgood.org/nccppr">Donate Now</a></p>

        <hr />

        <p class="small">
          <span class="copyright">&copy; <?php echo date('Y'); ?> NCCPPR. All rights reserved.</span><br />
          <a href="<?php echo get_permalink('1528'); ?>">Terms of service</a> | <a href="<?php echo get_permalink('1530'); ?>">Privacy policy</a>
        </p>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade email-signup-modal print-no" id="emailSignupModal" tabindex="-2" role="dialog" aria-labelledby="emailSignupModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <?php get_template_part('templates/components/email-signup'); ?>
    </div>
  </div>
</div>
