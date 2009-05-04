<?php
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 */
  $body_id = 'blog';
  include "header.php";
?>
<?php if (have_posts()) : ?>
   <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
   <?php /* If this is a category archive */ if (is_category()) { ?>
   <h2 id="section"><?php single_cat_title(); ?></h2>
   <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
   <h2 id="section">Tagged <?php single_tag_title(); ?></h2>
   <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
   <h2 id="section"><?php the_time('F jS, Y'); ?></h2>
   <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
   <h2 id="section"><?php the_time('F, Y'); ?></h2>
   <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
   <h2 id="section"><?php the_time('Y'); ?></h2>
   <?php /* If this is an author archive */ } elseif (is_author()) { ?>
   <h2 id="section">Author Archive</h2>
   <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
   <h2 id="section">Blog Archives</h2>
   <?php } ?>
   <div id="primaryContent" class="hfeed archive-feed">
      <?php while (have_posts()) : the_post(); ?>
         <div class="hentry entry xfolkentry archive" id="post-<?php the_ID(); ?>">
            <h3 class="entry-title taggedlink"><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
            <ul class="post-info">
               <li class="date"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><abbr class="published" title="<?php the_time('Y-M-d'); ?>T<?php the_time('H:i:su'); ?>"><?php the_time('l, F jS, Y \a\t H:ia') ?></abbr></a></li>
               <!-- <li class="contact"><address class="vcard author"><a class="url fn" href="<?php the_author_url(); ?>"><?php the_author_firstname(); ?> <?php the_author_lastname(); ?></a></address></li>
                              <li class="respond"><a href="#respond" class="comment-count"><? comments_number('0','1','%'); ?> <span>comments</span></a></li> -->
            </ul>
         </div>
   <?php endwhile; else: ?>

      <p>Sorry, no posts matched your criteria.</p>

   <?php endif; ?>
</div>
<?php get_footer(); ?>
