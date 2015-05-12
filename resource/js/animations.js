/**
 * Created by neil on 5/11/15.
 */
$(document).ready(function(){
   $("#menuButton").hover(function(){
      $("#menu").slideDown("slow");
   });
});

$(document).click(function(){
   $("#menu").slideUp("slow");
});