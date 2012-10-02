<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2012 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>  
    <div id="widgets" class="home-widgets">
        <div class="grid col-300">
        <?php responsive_widgets(); // above widgets hook ?>
            
            <?php if (!dynamic_sidebar('home-widget-1')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Home Widget 1', 'responsive'); ?></h3></div>
                <div class="textwidget"><?php _e('This is your feature home widget box. To edit please go to Appearance > Widgets and choose 6th widget from the top in area six called Home Widget 1. Title is also manageable from widgets as well.','responsive'); ?></div>
            
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-1 ?>

        <?php responsive_widgets_end(); // responsive after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300">
        <?php responsive_widgets(); // responsive above widgets hook ?>
            
        <?php if (!dynamic_sidebar('home-widget-2')) : ?>
              <div class="widget-wrapper">

                  <div class="widget-title-home"><h3><?php _e('Home Widget 2', 'responsive'); ?></h3></div>
                  <div class="textwidget"><?php _e('This is your third home widget box. To edit please go to Appearance > Widgets and choose 8th widget from the top in area eight called Home Widget 3. Title is also manageable from widgets as well.','responsive'); ?></div>

  			</div><!-- end of .widget-wrapper -->
  			<?php endif; //end of home-widget-2 ?>
            
        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 -->

        <div class="grid col-300 fit">
        <?php responsive_widgets(); // above widgets hook ?>
            
			<?php if (!dynamic_sidebar('home-widget-3')) : ?>
            <div class="widget-wrapper">
            
                <div class="widget-title-home"><h3><?php _e('Home Widget 3', 'responsive'); ?></h3></div>
                <div class="textwidget"><?php _e('This is your third home widget box. To edit please go to Appearance > Widgets and choose 8th widget from the top in area eight called Home Widget 3. Title is also manageable from widgets as well.','responsive'); ?></div>
        
			</div><!-- end of .widget-wrapper -->
			<?php endif; //end of home-widget-3 ?>
            
        <?php responsive_widgets_end(); // after widgets hook ?>
        </div><!-- end of .col-300 fit -->
    </div><!-- end of #widgets -->