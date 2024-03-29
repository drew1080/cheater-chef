<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/screen.css" type="text/css" media="screen, projection" />
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/print.css" type="text/css" media="print" />
  <!--[if IE]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" type="text/css" media="screen, projection"><![endif]-->
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <?php if(get_theme_option('featured_posts') != '' && is_home()) {
    ?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/jdgallery/jd.gallery.css" type="text/css" media="screen" charset="utf-8" />
    <script src="<?php bloginfo('template_directory'); ?>/jdgallery/mootools-1.2.5-core-yc.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory'); ?>/jdgallery/mootools-1.2-more.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory'); ?>/jdgallery/jd.gallery.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory'); ?>/jdgallery/jd.gallery.transitions.js" type="text/javascript"></script>
    <?php } ?>
    <!--[if IE 6]>
    <script src="<?php bloginfo('template_url'); ?>/js/pngfix.js"></script>
    <![endif]--> 
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="<?php bloginfo('template_directory'); ?>/menu/mootools-1.2.5-core-yc.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/menu/MenuMatic.css" type="text/css" media="screen" charset="utf-8" />
    <!--[if lt IE 7]>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/menu/MenuMatic-ie6.css" type="text/css" media="screen" charset="utf-8" />
    <![endif]-->
    <!-- Load the MenuMatic Class -->
    <script src="<?php bloginfo('template_directory'); ?>/menu/MenuMatic_0.68.3.js" type="text/javascript" charset="utf-8"></script>
    
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.2.min.js" type="text/javascript"></script>
    <script src="<?php bloginfo('template_directory'); ?>/js/cc-master.js" type="text/javascript"></script>

  <?php echo get_theme_option("head") . "\n";  wp_head(); ?>
  <script type="text/javascript"><!--
  google_ad_client = "ca-pub-7500368659443924";
  /* Test Cheater Chef Ad Right Sidebar */
  google_ad_slot = "0240467679";
  google_ad_width = 180;
  google_ad_height = 150;
  //-->
  </script>
</head>
<body <?php body_class(); ?>>
<script type="text/javascript">
window.addEvent('domready', function() {			
  var myMenu = new MenuMatic();
});	
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=270906249694642";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div id="wrapper">
  <div id="container" class="container">  
    <div class="span-24">
      <!-- <div class="span-20">
      <div id="pagemenucontainer">
      <?php
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu( 'depth=1&theme_location=menu_1&menu_id=pagemenu&container=&fallback_cb=menu_1_default');
    } else {
      menu_1_default();
    }

    function menu_1_default()
    {
      ?>
      <ul id="pagemenu">
      <li <?php if(is_home()) { ?> class="current_page_item" <?php } ?>><a href="<?php echo get_option('home'); ?>/">Home</a></li>
      <?php wp_list_pages('depth=1&sort_column=menu_order&title_li=' ); ?>
      </ul>
      <?php
    }

    ?>
    </div>
    </div> -->

    <div class="span-4 last">
      <div class="topright">
        <a href="https://twitter.com/cheaterchef" class="twitter-follow-button" data-show-count="false">Follow @cheaterchef</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        <a href="http://pinterest.com/cheaterchef/"><img src="http://passets-lt.pinterest.com/images/about/buttons/pinterest-button.png" width="60" height="20" alt="Follow Me on Pinterest" class="pintrest-follow"/></a>
        <div class="fb-like" data-href="https://www.facebook.com/pages/Cheater-Chef/170386289680528" data-send="false" data-layout="button_count" data-width="50" data-show-faces="false"></div>
        <a href="<?php bloginfo('rss2_url'); ?>"><img width="20" height="20" src="<?php bloginfo('template_url'); ?>/images/rss.png" class="rss-feed"/></a>		
      </div>

    </div>
    <div id="header" class="span-24">
      <div class="span-12">
        <?php
      $get_logo_image = get_theme_option('logo');
      if($get_logo_image != '') {
        ?>
        <a href="<?php bloginfo('url'); ?>"><img src="<?php echo $get_logo_image; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logoimg" /></a>
        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
        <?php
      } else {
        ?>
        <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <h2><?php bloginfo('description'); ?></h2>
        <?php
      }
      ?>

    </div>

  </div>

  <div class="span-24">

    <div id="navcontainer">
      <?php
    if(function_exists('wp_nav_menu')) {
      wp_nav_menu( 'theme_location=menu_2&menu_id=nav&container=&fallback_cb=menu_2_default');
    } else {
      menu_2_default();
    }

    function menu_2_default()
    {
      ?>
      <ul id="nav">
        <li <?php if(is_home()) { echo ' class="current-cat" '; } ?>><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <?php wp_list_categories('depth=3&exclude=1&hide_empty=0&orderby=name&show_count=0&use_desc_for_title=1&title_li='); ?>
      </ul>
      <?php
    }
    ?>
  </div>
</div>