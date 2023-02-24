<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="<?php echo get_field('meta_description'); ?>">
<?php wp_head(); ?>

<link rel="icon" type="image/x-icon" href="<?php the_field('favicon', 'option'); ?>">
<script src="https://kit.fontawesome.com/8ac8a2333d.js" crossorigin="anonymous"></script>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">

<div id="header-cta"><div class="cta-banner">
    <a href="<?php the_field('sticky_header_link', 'option'); ?>" target="_blank">
    <?php the_field('sticky_header_call_to_action', 'option'); ?>
</a></div></div>

<div id="branding">
    <div class="header-logo">
        <a href=""><img src="<?php the_field('header_logo', 'option'); ?>" alt=""></a>
    </div>
    <div class="hanburger"><label for="nav-control"><i class="fa-solid fa-bars"></i></label></div>
</div>

<input type="checkbox" name="nav-control" id="nav-control">

<nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>

</nav>
</header>
<div id="container">