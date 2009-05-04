<?php 
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 */
 $body_id = 'blog';
 $encouraged_commentary = true;
 include "header.php" ?>
   <div id="primaryContent" class="hfeed">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="hentry entry xfolkentry single" id="post-<?php the_ID(); ?>">
               <h2 class="entry-title taggedlink"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
               <ul class="post-info">
                  <li class="date"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><abbr class="published" title="<?php the_time('Y-M-d'); ?>T<?php the_time('H:i:su'); ?>"><?php the_time('l, F jS, Y \a\t H:ia') ?></abbr></a></li>
                  <li class="contact"><address class="vcard author"><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></address></li>
                  <li class="respond"><a href="#respond" class="comment-count"><? comments_number('0','1','%'); ?> <span>comments</span></a></li>
               </ul>
               <div class="entry-content description quotable">
                  <?php the_content(); ?>
               </div>
               <div class="meta">
                  <h3>Meta Information</h3>
                  <p>This post was filed under <?php the_category(', '); ?> and tagged with: <?php the_tags(' <span class="tags">',', ','.</span> ');?></p>
                  <h4>This Post as a Feed</h4>
                  <p>The content of this post and it's comments can be <a href="http://tools.microformatic.com/transcode/atom/hatom/<?php the_permalink() ?>">subscribed to as an RSS feed</a>.</p>
               </div>
            </div>
            <?php comments_template(); ?>
      <?php endwhile; else: ?>
         <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
   </div>
   <ul id="recentPosts">
      <?php getRecentBlogArticles(); ?>
   </ul>
<?php include "footer.php"; ?>
