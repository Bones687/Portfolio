/**
 * Created by neil on 5/11/15.
 */
$(document).ready(function(){
   $("#menuButton").hover(function(){
       $("#cartDisplay").slideUp("slow");
      $("#menu").slideDown("slow");
   });

   $("#cart").hover(function(){
       if($('#quantity').text() != '0')
        $("#menu").slideUp("slow");
        $("#cartDisplay").slideDown("slow");
   });
});

$(document).click(function(event){
   $("#menu").slideUp("slow");
    if(!$("#cartDisplay").is(event.target) && $("#cartDisplay").is(":visible"))
        $("#cartDisplay").slideUp("slow");
});

$(document).hover(function(){

});