<?php
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
   <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

   <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
   
   <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
   <!--[if IE]>
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" media="screen" />
   <![endif]-->
   <!--[if IE 6]>
   <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie6.css" type="text/css" media="screen" />
   <![endif]-->
   <!--[if lt IE 7]>
   <script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE7.js" type="text/javascript"></script>
   <![endif]-->
   <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
   <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
   <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

   <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
   <?php wp_get_archives('type=monthly&format=link'); ?>
   <?php //comments_popup_script(); // off by default ?>
   <?php wp_head(); ?>
</head>
<body id="<?php echo $body_id ?>">
   <h1 id="logo">Ignite Phoenix<span></span></h1>
   <div id="event_info">
      <?php getPage('main-page-event-info'); ?>
   </div>
   <ul id="primary_navigation">
      <li class="about"><a href="<?php bloginfo('url'); ?>#about">About</a></li>
      <li class="venue"><a href="<?php bloginfo('url'); ?>#venue">Venue</a></li>
      <li class="rules"><a href="<?php bloginfo('url'); ?>#rules">Rules</a></li>
      <li class="submit"><a href="<?php bloginfo('url'); ?>#ideas">Submit!</a></li>
      <li class="blog"><a href="<?php bloginfo('url'); ?>/blog">Blog<span></span></a><ul class="subnavigation">
        <li><a href="<?php bloginfo('rss2_url'); ?>">Subscribe via RSS</a></li><li><a href="<?php bloginfo('url'); ?>/subscribe-with-email-notifications">Subscribe via Email Notifications</a></li></ul></li>
      <li class="home" id="return_to_top"><a href="<?php bloginfo('url'); ?>#intro">Home<span></span></a></li>
   </ul>
<!-- end header -->
