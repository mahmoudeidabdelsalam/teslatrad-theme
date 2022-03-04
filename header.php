<?php
/**
 * The theme header.
 * 
 * @package bootstrap-basic4
 */

$container_class = apply_filters('bootstrap_basic4_container_class', 'container');
if (!is_scalar($container_class) || empty($container_class)) {
    $container_class = 'container';
}
?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

  <!--WordPress head-->
  <?php wp_head(); ?>
  <!--end WordPress head-->
</head>

<body <?php body_class(); ?>>
    <header class="page-header page-header-sitebrand-topbar">
      <div class="row main-navigation">
        <div class="col-md-3 col-12">
          <h1 class="site-title-heading">
            <a href="<?php echo esc_url(home_url('/')); ?>"
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
              <img class="img-fluid" src="<?=get_theme_file_uri().'/assets/img/logo.png' ?>"
                alt="<?=get_bloginfo('name', 'display') ?>" title="<?=get_bloginfo('name') ?>" />
              <span class="sr-only"> <?=get_bloginfo('name') ?> </span>
            </a>
          </h1>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bootstrap-basic4-topnavbar"
            aria-controls="bootstrap-basic4-topnavbar" aria-expanded="false"
            aria-label="<?php esc_attr_e('Toggle navigation', 'bootstrap-basic4'); ?>">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>

        <div class="col-md-6 col-12">
          <div class="row m-0 justify-content-end">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div id="bootstrap-basic4-topnavbar" class="collapse navbar-collapse">
                <?php 
                wp_nav_menu(
                  array(
                    'depth' => '2',
                    'theme_location' => 'primary', 
                    'container' => false, 
                    'menu_id' => 'bb4-primary-menu',
                    'menu_class' => 'navbar-nav mr-auto', 
                    'walker' => new \BootstrapBasic4\BootstrapBasic4WalkerNavMenu()
                  )
                ); 
                ?>
              </div>
              <div class="clearfix"></div>
            </nav>
          </div>
        </div>

        <div class="col-md-2 col-12">
            <ul class="button-action">
              <li>
                <img src="<?=get_theme_file_uri().'/assets/img/flag.png' ?>" alt="flag ar"> <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
              </li>
              <li>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-search"></i>
                </button>
              </li>
            </ul>
        </div>
      </div>
      <!--.main-navigation-->
    </header>
    <!--.page-header-->

