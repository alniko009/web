$(document).ready(function () {
	//SIDE BANNERS FIXED ON SCROLL JS
	$(document).scroll(function() {
		var useFixedSidebar = $(document).scrollTop() > 237;
		$('.MainBannerRight,.MainBannerLeft').toggleClass('fixedMenu', useFixedSidebar);
	});
	//END OF SIDE BANNERS FIXED ON SCROLL JS
	
	/*////////////////////////////////////CHECK BOX CHANGE*
	var y=0
	$("input[type=checkbox]").after("<img class='ChkImg' src='images/CheckBox.png' />");
	$("input[type=checkbox]").css("visibility","hidden");
	$(".ChkImg").click(function(){
		if(y==0){
			
			$(this).attr("src","images/CheckBoxSelect.png");
			$(this).parent().find("input[type=checkbox]").prop("checked", true)
			y=1;
			
		}
		else if(y==1)
		{
			$(this).attr("src","images/CheckBox.png");
			$(this).parent().find("input[type=checkbox]").prop("checked", false)
			y=0;
			
		}
	});
	/*/////////////////////////////////////END OF CHECK BOX CHANGE*/
	
	/*image radio*/
	$('.RadioDesign').each(function(){
		$(this).imageradio();
	});
	
	/*End image radio*/
});

