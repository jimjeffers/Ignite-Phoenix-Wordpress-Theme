<?php
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 */
?>
<!-- begin footer -->
</div>

</div>

<div id="footer">
   <div id="lists">
      <div class="aktt_tweets">
         <h3>Twitter</h3>
         <?php aktt_sidebar_tweets(); ?>
      </div><!-- This is what I get for using twitter tools. -->
      <ul class="blog_list" id="categories_list">
         <h3>Categories</h3>
         <?php wp_list_categories('title_li='); ?>
      </ul>
      <ul class="blog_list" id="archives_list">
         <h3>Archives</h3>
         <?php wp_get_archives('type=monthly'); ?>
      </ul>
      <ul class="blog_list" id="bookmarks_list">
         <h3>Bookmarks</h3>
         <?php wp_list_bookmarks('categorize=0&title_li='); ?>
      </ul>
      <ul class="blog_list" id="networks_list">
         <h3>Find Us On</h3>
         <li><a href="http://twitter.com/ignitephoenix">Twitter</a></li>
         <li><a href="http://www.linkedin.com/groups?gid=1593447">LinkedIn</a></li>
         <li><a href="http://www.facebook.com/pages/Ignite-Phoenix/61962537430">Facebook</a></li>
         <li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li>
      </ul>
   </div>
   <div id="closing_remarks">
   <p id="credits">All content &amp; images &copy; 2006–<?php echo date('Y'); ?> Ignite Phoenix (unless otherwise noted). Site designed by <a id="sumo" href="http://sumocreations.com">Sumo Creations<span></span></a>.</p>
   </div>
   <span id="city_artifact">&nbsp;</span>
</div>
<span class="frame top">&nbsp;</span>
<span class="frame right">&nbsp;</span>
<span class="frame bottom">&nbsp;</span>
<span class="frame left">&nbsp;</span>
<?php wp_footer(); ?>
<script type="text/javascript" charset="utf-8" src="<?php echo get_bloginfo('template_directory'); ?>/jquery-1.3.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_bloginfo('template_directory'); ?>/ignite.js"></script>
<script type="text/javascript" charset="utf-8" src="<?php echo get_bloginfo('template_directory'); ?>/jquery.scrollTo-min.js"></script>
<?php if($encouraged_commentary == true) { ?>
<script type="text/javascript" charset="utf-8" src="<?php echo get_bloginfo('template_directory'); ?>/encouraged-commentary-min.js"></script>
<?php } ?>
</body>
</html>