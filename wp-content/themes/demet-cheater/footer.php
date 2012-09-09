</div>   

<div id="footer">
  <?php $defaults = array(
  	'menu'            => 'Master', 
  	'container'       => 'div', 
  	'container_class' => 'menu-master-container', 
  	'menu_class'      => 'menu', 
  	'echo'            => true,
  	'fallback_cb'     => 'wp_page_menu',
  	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
  	'depth'           => 0
  ); ?>
  <?php wp_nav_menu( $defaults ); ?>
  Copyright &copy; <a href="<?php bloginfo('home'); ?>"><strong><?php bloginfo('name'); ?></strong></a>  - <?php bloginfo('description'); ?>
</div>
<div id="credits">Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a></div>


</div>
<?php
wp_footer();
echo get_theme_option("footer")  . "\n";
?>
</body>
</html>