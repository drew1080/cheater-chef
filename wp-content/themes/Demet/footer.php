 </div>   
    	<div id="footer">Copyright &copy; <a href="<?php bloginfo('home'); ?>"><strong><?php bloginfo('name'); ?></strong></a>  - <?php bloginfo('description'); ?></div>
        <?php /* 
                    All links in the footer should remain intact. 
                    These links are all family friendly and will not hurt your site in any way. 
                    Warning! Your site may stop working if these links are edited or deleted 
                    
                    You can buy this theme without footer links online at http://newwpthemes.com/buy/?theme=demet 
                */ ?>
        <div id="credits">Powered by <a href="http://wordpress.org/"><strong>WordPress</strong></a> | Designed by: <a href="http://allpremiumthemes.com">Premium WordPress Themes</a> | Thanks to <a href="http://themesgallery.net">Themes Gallery</a>, <a href="http://www.bromoney.com/">Bromoney</a> and <a href="http://dinothemes.com" title="Wordpress Themes">Wordpress Themes</a></div>
  

</div>
<?php
	 wp_footer();
	echo get_theme_option("footer")  . "\n";
?>
</body>
</html>