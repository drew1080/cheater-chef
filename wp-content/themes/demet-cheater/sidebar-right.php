<div class="span-5 last">
  <div class="sidebar sidebar-right">

    <?php get_search_form(); ?> 
    <ul>
      <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Right Sidebar') ) : ?>

      <?php endif; ?>
    </ul>

    <div class="sidebaradbox">
      <?php sidebar_ads_125(); ?>
    </div>
    <?php if(get_theme_option('ad_sidebar2_bottom') != '') {
      ?>
      <div class="sidebaradbox">
        <?php echo get_theme_option('ad_sidebar2_bottom'); ?>
      </div>
      <?php
    }
    ?>
  </div>

</div>
