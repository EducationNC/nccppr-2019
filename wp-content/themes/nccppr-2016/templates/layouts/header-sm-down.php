<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<div class="mobile-bar hidden-md hidden-lg print-no">
  <img class="mobile-logo" src='/wp-content/themes/ednc-2016/assets/images/nccppr-logo.svg' alt="NCCPPR" />
  <div class="mobile-title">North Carolina Center for Public Policy Research</div>

  <div class="mobile-menu">
    <a id="nav-toggle" class="nav-toggle" href="#"><span>Menu</span></a>

    <ul id="mobile-nav" class="mobile-nav">
      <li>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'primary_navigation',
          'container' => false,
          'walker' => new Nav\Mobile_Nav_Walker
        ));
        ?>
      </li>

      <li class="mobile-search">
        <?php get_template_part('templates/components/searchform'); ?>
        <a class="icon-search" id="icon-search" href="javascript:void(0);"></a>
      </li>

      <li>
        <ul class="list-inline social-media text-center">
        <li><a class="icon-facebook" href="https://www.facebook.com/NCCPPR/" target="_blank"></a></li>
        <li><a class="icon-twitter" href="https://twitter.com/nccppr" target="_blank"></a></li>
        <li><a class="gtranslate" href="#" id="gtranslate" title="en Español">en Español</a></li>
        </ul>
      </li>

      <li class="text-center">
        <div class="btn-group">
          <a href="#" class="btn btn-default" data-toggle="modal" data-target="#emailSignupModal">Subscribe to Friday @ Five</a>
          <a href="https://donatenow.networkforgood.org/nccppr" class="btn btn-primary">Donate</a>
        </div>
      </li>
    </ul>
  </div>
</div>
