$(document).ready(function(){
	$('.carousel').carousel({
		interval:5000
	});
	
	// show Color options Div when click on gear
		$(".gear-check").click(function()
		{
			$(".color-options").fadeToggle();
		});
		
		//Caching The scroll Top emlement 
		var scrollButton =$("#scroll-top");
		$(window).scroll(function()
		{
			console.log($(this).scrollTop()	);
			
			if($(this).scrollTop()>=700)
			{
				scrollButton.show();
			}
			else
			{
				scrollButton.hide();
			}
			//  Click on Button to scroll Top 
			scrollButton.click(function()
			{
				
			$("html,body").animate({ scrollTop : 0},600);	
			});
		});
	
});
