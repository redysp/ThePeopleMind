$(document).ready(function() {
  $("#rulesList").hide();
  
  $("#rulesList").each(function(index) {
    $(this).delay(400*index).fadeIn(2000);
  });
     
  $("#rulesList li").hover(function() {
	 	$(this).addClass("blue");
	 }, function() {
	 	$(this).removeClass("blue");
	 });
});
