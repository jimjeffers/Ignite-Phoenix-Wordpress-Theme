<?php
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 * Template Name: Blog
 */
 $body_id = 'blog';
 include "header.php" ?>
  <h2 id="section">Latest Blogs</h2>	
	<div id="primaryContent" class="hfeed archive-feed">
      <?php
      $query = "SELECT post_title, post_content, post_date, MONTH( post_date ) AS month ,  YEAR( post_date ) AS year, DAY( post_date ) AS day , id FROM $wpdb->posts WHERE post_status = 'publish' and post_type = 'post' ORDER BY post_date DESC LIMIT 30";

      if ( $posts = $wpdb->get_results($query) ) {
        foreach ($posts as $post) { ?>
         <div class="hentry entry xfolkentry archive" id="post-<?php the_ID(); ?>">
            <h3 class="entry-title taggedlink"><a href="<?php get_permalink($post->id) ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <ul class="post-info">
               <li class="date"><a href="<?php get_permalink($post->id) ?>" title="<?php the_title_attribute(); ?>"><abbr class="published" title="<?php the_time('Y-M-d'); ?>T<?php the_time('H:i:su'); ?>"><?php the_time('l, F jS, Y \a\t H:ia') ?></abbr></a></li>
               <!-- <li class="contact"><address class="vcard author"><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></address></li>
                              <li class="respond"><a href="#respond" class="comment-count"><? comments_number('0','1','%'); ?> <span>comments</span></a></li> -->
            </ul><div class="entry-content">
              <p><?php echo (strlen($post->post_content) > 144) ? substr($post->post_content,0,144).'... <a href="'.get_permalink($post->id).'">read more</a>' : $post->post_content; ?></p>
            </div>
         </div>
   <?php }
   } ?>
  </div>

<?php get_footer(); ?>
