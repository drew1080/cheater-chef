<?php
if(get_theme_option('featured_posts') != '') {
?>
<script type="text/javascript">
	function startGallery() {
		var myGallery = new gallery($('myGallery'), {
			timed: true,
			delay: 6000,
			slideInfoZoneOpacity: 0.8,
			showCarousel: false,
			slideInfoZoneSlide: false
		});
	}
	window.addEvent('domready', startGallery);
</script>
<div class="fullbox_excerpt">
	<div class="fullbox_content">
	</div>
</div>
<?php } ?>