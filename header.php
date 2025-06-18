<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="theme-color" content="#fff">
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="https://use.typekit.net/qux5jbr.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header id="header" class="js-header" itemscope itemtype="http://schema.org/WPHeader">
        <?php get_template_part('templates-parts/header/header', 'brand'); ?>
        <?php get_template_part('templates-parts/header/header', 'nav'); ?>
        <?php get_template_part('templates-parts/header/header', 'burger'); ?>
        <?php get_template_part('templates-parts/header/header', 'partners'); ?>
    </header>


    <main id="main">
        <div class="container">