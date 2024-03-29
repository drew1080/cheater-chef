<?php get_header(); ?>
<div class="span-24" id="contentwrap">
  <?php get_sidebars('left'); ?>
  <div class="span-14">
    <div id="content">		
      <?php if(is_home()) { include (TEMPLATEPATH . '/featured.php'); } ?>
      <?php if (have_posts()) : ?>	
        <?php while (have_posts()) : the_post(); ?>

          <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
            <h2 class="title">
              <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="postdate">
              <?php the_author_posts_link(); ?> on <?php the_time('F jS, Y') ?> 
              <?php if (current_user_can('edit_post', $post->ID)) { ?> 
                <img src="<?php bloginfo('template_url'); ?>/images/edit.png" /> 
                <?php edit_post_link('Edit', '', ''); } ?></div>

                <div class="entry">
                  <div style="width:540px;text-align:center"><?php if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { 
                    the_post_thumbnail(array(350,260), array("class" => " post_thumbnail")); } ?></div>
                    <div style=""><?php the_excerpt('<strong>Read more &raquo;</strong>'); ?></div>
                  </div>
                </div><!--/post-<?php the_ID(); ?>-->

              <?php endwhile; ?>
              <div class="navigation">
                <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
                  <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
                  <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
                  <?php } ?>
                </div>
              <?php else : ?>
                <h2 class="center">Not Found</h2>
                <p class="center">Sorry, but you are looking for something that isn't here.</p>
                <?php get_search_form(); ?>

              <?php endif; ?>
            </div>
          </div>
          <?php get_sidebars('right'); ?>
        </div>
        <?php get_footer(); ?>
