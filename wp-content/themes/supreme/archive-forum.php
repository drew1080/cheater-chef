<?php
/**
 * bbPress Forum Archive
 *
 * The is archive template is used for listing bbPress forums.
 *
 * @package supreme
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // supreme_before_content ?>
	
	<?php bbp_breadcrumb( array( 'before' => '<div class="breadcrumb">', 'after' => '</div>', 'sep' => '<span class="sep">&raquo</span>' ) ); ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // supreme_open_content ?>

		<div class="hfeed">
			
			<div class="loop-meta">
				<h1 class="loop-title"><?php bbp_forum_archive_title(); ?></h1>
			</div>
			
			<?php get_sidebar( 'before-content' ); // Loads the sidebar-before-content.php template. ?>
			
			<?php bbp_get_template_part( 'bbpress/content', 'archive-forum' ); ?>
			
			<?php get_sidebar( 'after-content' ); // Loads the sidebar-after-content.php template. ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // supreme_close_content ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // supreme_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>