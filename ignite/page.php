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
               <div class="entry-content description quotable">
                  <?php the_content(); ?>
               </div>
      <?php endwhile; else: ?>
         <p>Sorry, no posts matched your criteria.</p>
      <?php endif; ?>
   </div>
   <ul id="recentPosts">
      <?php getRecentBlogArticles(); ?>
   </ul>
<?php include "footer.php"; ?>
