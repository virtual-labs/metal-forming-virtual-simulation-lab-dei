$(function(){

   $(".current").click(function(){
   
        var thisFilter = $(this).attr("id") + ".html";
		
			$("#gallery").load(thisFilter);

			$("#categories a").removeClass("current");
			
			$(this).addClass("current");
			
        return false;
		
   });

   $(".filter").click(function(){
   
        var thisFilter = $(this).attr("id") + ".html";
		
			$("#gallery").load(thisFilter);

			$("#categories a").removeClass("current");
			
			$(this).addClass("current");
			
        return false;
		
   });
   
   



});