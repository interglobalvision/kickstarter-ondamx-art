<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php wp_title('|',true,'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

<?php
get_template_part('partials/globie');
get_template_part('partials/seo');
?>

  <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
  <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">
  <link rel="shortcut" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.ico">
  <link rel="apple-touch-icon" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon-touch.png">
  <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo('stylesheet_directory'); ?>/dist/img/favicon.png">

<?php if (is_singular() && pings_open(get_queried_object())) { ?>
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php } ?>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if lt IE 9]><p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->

<section id="main-container">

  <header id="header" class="padding-top-tiny padding-bottom-tiny">
    <h1 class="u-visuallyhidden">Onda MX Kickstarter</h1>
    <div id="header-row" class="grid-row justify-between align-items-center">
      <div class="grid-item item-s-4 item-m-3 item-l-2">
        <a href="<?php echo home_url(); ?>"><img id="onda-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/logo_ondamx.png" /></a>
      </div>
<?php
$options = get_site_option('_igv_custom_options');

if (!empty($options['marquee_text'])) {
?>
      <div class="grid-item item-m-6 item-l-8" id="marquee-holder">
        <div id="marquee"><?php echo $options['marquee_text']; ?></div>
      </div>
<?php
}
?>
      <div class="grid-item item-s-8 item-m-3 item-l-2 text-align-right">
        <a href="<?php echo !empty($options['kickstarter_url']) ? $options['kickstarter_url'] : 'https://kickstarter.com/profile/ondamx'; ?>"><img id="kickstarter-logo" src="<?php bloginfo('stylesheet_directory'); ?>/dist/img/logo_kickstarter.png" /></a>
      </div>
    </div>
  </header>
