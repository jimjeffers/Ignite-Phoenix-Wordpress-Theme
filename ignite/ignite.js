// I Love jQuery.
$(document).ready( function() {
   // SETUP BLOG NAV DROPDOWN
   var subNavigation = $($('#primary_navigation li.blog .subnavigation').hide().get(0));
   var menuTimeout = false;
   $('#primary_navigation li.blog').hover(
      function() {
         if(!menuTimeout && !subNavigation.is(':visible')) {
            menuTimeout = setTimeout(function() {
               $('#primary_navigation li.blog > a').addClass('active');
               subNavigation.fadeIn("fast");
               menuTimeout = false;
            }, 50);
         } else {
            clearTimeout(menuTimeout);
            menuTimeout = false;
         }
      },
      function() {
         if(!menuTimeout && subNavigation.is(':visible')) {
            menuTimeout = setTimeout(function() {
               $('#primary_navigation li.blog a').removeClass('active');
               subNavigation.fadeOut("fast");
               menuTimeout = false;
            }, 300);
         } else {
            clearTimeout(menuTimeout);
            menuTimeout = false;
         }
      }
   );
   if($('body#home').length > 0) {
      var current_section = 'intro';
      // A baseline for spacing. I tweaked it later. Seemed like a good idea at first.
      var default_spacing = 150;
      // Our sections.
      var intro = $('#intro');
      var about = $('#about');
      var venue = $('#venue');
      var rules = $('#rules');
      var ideas = $('#ideas');
      var footer = $('#footer');
      var home_link = $($('#primary_navigation li.home a').get(0));
   
      // ABOUT
      ensureAboveEachOther(intro,about,default_spacing-150);
      // VENUE
      ensureAboveEachOther(about,venue,0);
      // RULES
      ensureAboveEachOther(venue,rules,default_spacing-250);
      // IDEAS
      ensureAboveEachOther(rules,ideas,default_spacing);
      // SUBMISSIONS (threw a little wrench into the mix)
      var submissions_offset = getTallest('#submission_directions,#submission_form');
      if(submissions_offset > 0) {
         $('#submissions').css('padding-top',submissions_offset+(90));
         $('#lineup').css('padding-top',submissions_offset+(90));
      } else {
         $('#submissions').addClass('straggler');
         $('#lineup').addClass('straggler');
      }
      // FOOTER
      ensureAboveEachOther(ideas,footer,default_spacing);
   
      // Setup scrolling nav.
      home_link.fadeOut("fast");
      $('#primary_navigation li > a').each(function() {
         var item = $(this);
         item.click(function() {
            var target = $('#'+item.get(0).href.split("#")[1]);
            if(target.length > 0) {
               if(target.get(0).id == "intro") { target = 0; }
               $.scrollTo(target, {duration: 1000});
               $('#primary_navigation li.current').removeClass('current');
               return false;
            } else {
               return true;
            }
         });
      });
      $('#submit_your_idea').click(function(){$.scrollTo('#ideas',{duration:1000});});
      
      // Setup scrolling selector update.
      var scrollTarget = $(window);
      scrollTarget.scroll(function(){
         // TODO:
         // Refactor this into a nice function sometime later.
         
         // About
         if(scrollTarget.scrollTop() > about.position().top-100 && scrollTarget.scrollTop() < venue.position().top-100) {
            $('#primary_navigation li.about').addClass('current');
         } else {
            $('#primary_navigation li.about.current').removeClass('current');
         }
         // Venue
         if(scrollTarget.scrollTop() > venue.position().top-100 && scrollTarget.scrollTop() < rules.position().top-100) {
            $('#primary_navigation li.venue').addClass('current');
         } else {
            $('#primary_navigation li.venue.current').removeClass('current');
         }
         // Rules
         if(scrollTarget.scrollTop() > rules.position().top-100 && scrollTarget.scrollTop() < ideas.position().top-100) {
            $('#primary_navigation li.rules').addClass('current');
         } else {
            $('#primary_navigation li.rules.current').removeClass('current');
         }
         // Rules
         if(scrollTarget.scrollTop() > ideas.position().top-100 && scrollTarget.scrollTop() < footer.position().top-400) {
            $('#primary_navigation li.submit').addClass('current');
         } else {
            $('#primary_navigation li.submit.current').removeClass('current');
         }
         
         // Link back to home:
         if(scrollTarget.scrollTop() > about.position().top-100 && !home_link.is(':visible')) {
            home_link.fadeIn("fast");
         } else if(scrollTarget.scrollTop() < about.position().top-100 && home_link.is(':visible')) {
            home_link.fadeOut("fast");
         }
      });
   }
   
   // Save the blog if it's a short post.
   var comments = $('#comments');
   var recentPosts = $('#recentPosts')
   if(comments.length > 0) {
      if(comments.position().top < recentPosts.position().top + recentPosts.height()) {
         $('#comments').css('padding-top',recentPosts.position().top + recentPosts.height() - comments.position().top + 40);
      }
      var tallest = 0;
      $('.comment').each(function(){
         var curHeight = $(this).height();
         if(curHeight > 300) { $(this).addClass('long-comment'); var curHeight = $(this).height(); }
         if(curHeight > tallest) {
            tallest = curHeight;
         }
      });
      $('.comment').css('height',tallest);
   }
   
   // Start cycling through sponsors.
   showSponsor(0);
   
   // Scroll to proper section after everything is repositioned if it exists...
   var startPoint = $('#'+window.location.href.split('#')[1]);
   if(startPoint.length > 0) {
      $.scrollTo(startPoint, {duration: 1000});
   }
   
});

function getTallest(selector){
   var height = 0;
   var items = $(selector);
   if(items.length > 0) {
      $(selector).each(function(){
         var current_height = $(this).position().top+$(this).height();
         if(height < current_height) { height = current_height; }
      });
   }
   return height;
};

function ensureAboveEachOther(onTop,onBottom,spacing){
   if(onTop.length > 0 && onBottom.length > 0) {
      onBottom.css('top',onTop.position().top+onTop.height()+spacing);
   }
}

function showSponsor(current) {
   var container = $('#sponsors').hide();
   var sponsors = $('#sponsors img').hide();
   var sponsors = $('#sponsors li').hide();
   if(current > sponsors.length-1) { current = 0; } 
   if(sponsors.length > 0) {
      $($('#sponsors li').get(current)).show();
      var sponsor = $('#sponsors img').get(current);
      $(sponsor).show();
      $('#sponsors').css('height',sponsor.height);
      $('#sponsors').css('width',sponsor.width);
      container.css('margin-top',-sponsor.height/2);
      container.css('margin-left',-sponsor.width/2);
      
      container.show('normal');
      setTimeout(function() {
         showSponsor(current+1);
      }, 2000);
   }
   
}
