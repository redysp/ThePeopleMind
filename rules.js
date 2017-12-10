$(document).ready(function() {
  $("#rulesList").hide();
    
  $("#rules").click(function() {
      $("#rulesList").toggle();
  });
    
  $("#instructions").click(function() {
      $("#rulesList").toggle();
  });
    
  $("#rulesList li").hover(function() {
	 	$(this).addClass("blue");
	 }, function() {
	 	$(this).removeClass("blue");
	 });
});
