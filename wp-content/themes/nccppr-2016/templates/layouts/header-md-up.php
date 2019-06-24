<?php

use Roots\Sage\Assets;
use Roots\Sage\Nav;

?>

<header id="header" class="banner visible-md-block visible-lg-block" role="banner">
 <a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src='/wp-content/themes/ednc-2016/assets/images/nccppr-logo.svg'); alt="NCCPPR" /></a>

  <div class="container-fluid">
    <span class="site-name">North Carolina Center for Public Policy Research</span>
    <div class="pull-right text-right">
      <ul class="list-inline minor-links">
        <li>
          <div id="header-search">
            <?php get_template_part('templates/components/searchform'); ?>
            <a class="icon-search" id="icon-search" href="javascript:void(0);"></a>
          </div>
        </li>
        <li><a class="icon-facebook" href="https://www.facebook.com/NCCPPR/" target="_blank"></a></li>
        <li><a class="icon-twitter" href="https://twitter.com/nccppr" target="_blank"></a></li>
        <li><a class="gtranslate" href="#" id="gtranslate" title="en Español">en Español</a></li>
      </ul>
    </div>
  </div>

  <nav class="navbar navbar-default" data-topbar role="navigation">

    <div class="navbar-left">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary_navigation',
        'container' => false,
        'menu_class' => 'nav navbar-nav',
        'walker' => new Nav\Widgets_Nav_Walker()
      ));

      if (function_exists('widgetize_my_dropdown_menus')) {
        widgetize_my_dropdown_menus('primary_navigation');
      }
      ?>
    </div>

    <div class="navbar-right">
      <div class="btn-group">
        <a href="#" class="btn btn-default" data-toggle="modal" data-target="#emailSignupModal">Subscribe to Friday@Five</a>
        <a href="https://donatenow.networkforgood.org/nccppr" class="btn btn-primary">Donate</a>
      </div>
    </div>
  </nav>
</header>
