<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <?php dynamic_sidebar( 'the_topbar' ); ?>
    </div>
  </section>
  <div style="height: 84px;"><header id="header" style="">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#body" class="scrollto">Reve<span>al</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <?php dynamic_sidebar( 'the_menu' ); ?>
      </nav><!-- #nav-menu-container -->
    </div>
  </header>
</div>
<?php wp_body_open(); ?>
<main id="main">
