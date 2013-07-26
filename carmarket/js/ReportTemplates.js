$(document).ready(function () {
	/*///////////////////////////////////Tamplatedesc DIVS JS*/
	$(".Tamplatedesc:first").css("display","block");
	$(".TamplateTitleImg:first").attr("src","css/images/IframeSubTitlesImg.png");
	/*$(".Tamplatedesc").each(function(){
		$(this).find(".Tamplatedesc:first").css("display","block");
		$(this).find(".TamplateTitle:first img").attr("src","css/images/IframeSubTitlesImg.png");
	});*/
	var z = 0;
	$(".TemplateTitle").click(function()
	{
		if(z==0){
			$(this).parent().find(".Templatedesc").css("display","block");
			$(this).find(".TemplateTitleImg").attr("src","css/images/IframeSubTitlesImg.png");
			z=1;
		}
		else
		{
			$(this).parent().find(".Templatedesc").css("display","none");
			$(this).find(".TemplateTitleImg").attr("src","css/images/IframeSubTitlesImgClose.png");
			z=0;
		}
	});
	/*///////////////////////////////////END OF Tamplatedesc DIVS JS*/
	
	$(".ChooseReport img").click(function()
	{
		var q=$(this).parent().parent().text()
		alert(q);
		$(".ui-button").trigger();
	});
	
});

