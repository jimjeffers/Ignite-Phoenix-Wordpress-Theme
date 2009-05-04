<?php
/**
 * @package WordPress
 * @subpackage Ingite_Phoenix
 */
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));

function getPage($name) {
   $return = false;
   $page = new WP_Query();
   $page->query('pagename='.$name.'&post_status=publish');
   if($page->have_posts()) :
   while ($page->have_posts()) : $page->the_post();
      the_content(__('(more...)'));
      $return = true;
   endwhile;
   endif;
   return $return;
}

function getRecentBlogArticles() {
   $page = new WP_Query();
   $page->query('showposts=5');
   while ($page->have_posts()) : $page->the_post();
      echo '<li><a href="';
      the_permalink();
      echo '" rel="bookmark">';
      the_title();
      echo '</a></li>';
   endwhile;
}

?>