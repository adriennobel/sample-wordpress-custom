<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<?php wp_head(); ?>
<link rel="icon" type="image/x-icon" href="<?php the_field('favicon', 'option'); ?>">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<div id="header-cta"><div class="cta-banner">
    <a href="<?php the_field('sticky_header_link', 'option'); ?>">
    <?php the_field('sticky_header_call_to_action', 'option'); ?>
</a></div></div>
<div id="branding">
<div class="header-logo">

<img src="<?php the_field('header_logo', 'option'); ?>" alt="">

</div>
</div>
<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>

</nav>
</header>
<div id="container">