<?php
/**
 * @package WordPress
 * @subpackage Ignite_Phoenix
 */
  $body_id = 'home';
  include "header.php";
?>
<div id="intro" class="section">
<?php if(!getPage('main-page-stream')) { ?>
  <?php $intro = getPage('main-page-intro'); ?>
<?php } ?>
  <?php $sponsors = getPage('main-page-sponsors'); ?>
</div>

<div id="about" class="section">
   <h2 class="header">About</h2>
   <?php $about = getPage('main-page-about'); ?>
</div>
<div id="venue" class="section">
   <h2 class="header">Venue</h2>
   <?php $venue = getPage('main-page-venue'); ?>
</div>
<div id="rules" class="section">
   <h2 class="header">Rules</h2>
   <div id="rules_of_ignite">
      <?php $rules = getPage('main-page-rules'); ?>
   </div>
</div>
<div id="ideas" class="section">
   <h2 class="header">Submit!</h2>
   <div id="submission_directions" class="section intro">
      <?php $submit = getPage('main-page-submit');  ?>
   </div>
   <?php if($submit) : ?>
   <div id="submission_form">
      <?php insert_cform('Idea Form');?>
   </div>
   <div id="submissions">
      <h3>Submissions</h3>
      <?php getPage('main-page-submissions'); ?>
   </div>
   <?php endif; ?>
   <?php if(!$submit) : ?>
   <div id="lineup">
      <h3>Final Lineup</h3>
      <?php $lineup = getPage('main-page-the-lineup');  ?>
   </div>
   <?php endif; ?>
</div>
<?php get_footer(); ?>
