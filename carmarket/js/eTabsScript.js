$(document).ready(function () {

	$('input[type=text]').addClass("InputTextClass");
	/*////////////////////////////////////CHECK BOX CHANGE*/
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
	
	/*/////////////////////////////////////TABS JS*/
	$(function() {
			$( "#tabs" ).tabs();
		});
	
	$(".NextBtn").click(function() {
		var active = $( "#tabs" ).tabs( "option", "active" );
		$( "#tabs" ).tabs( "option", "active", active + 1 );
		return false;
	});
	
	$(".PrevBtn").click(function() {
    var active = $( "#tabs" ).tabs( "option", "active" );
    $( "#tabs" ).tabs( "option", "active", active - 1 );
	return false;
	});
	
	$(".PrevBtn img").hover(function()
	{
		$(this).attr("src","images/ePrevBlue.png");
	});
	$(".PrevBtn img").mouseout(function()
	{
		$(this).attr("src","images/ePrevGray.png");
	});
	/*/////////////////////////////////////END OF TABS JS*/
	
	/*////////////////////////////////////////DATE INPUT JS*/
	var i=1
	$(".eDate").each(function(){
		$(this).addClass("datepicker"+i);
		$(this).datepicker();
		i++
	});
	//$(function() {
			//$( ".datepicker1,.datepicker2,.datepicker3" ).datepicker();
		//});
	/*////////////////////////////////////////END OF DATE INPUT JS*/
	
	/*//////////////////////////////////////////////DROPDOWN JS*/
	function createByJson() {
	var jsonData = [					
					{description:'Choos your payment gateway', value:'', text:'Payment Gateway'},					
					{image:'images/msdropdown/icons/Amex-56.png', description:'My life. My card...', value:'amex', text:'Amex'},
					{image:'images/msdropdown/icons/Discover-56.png', description:'It pays to Discover...', value:'Discover', text:'Discover'},
					{image:'images/msdropdown/icons/Mastercard-56.png', title:'For everything else...', description:'For everything else...', value:'Mastercard', text:'Mastercard'},
					{image:'images/msdropdown/icons/Cash-56.png', description:'Sorry not available...', value:'cash', text:'Cash on devlivery', disabled:true},
					{image:'images/msdropdown/icons/Visa-56.png', description:'All you need...', value:'Visa', text:'Visa'},
					{image:'images/msdropdown/icons/Paypal-56.png', description:'Pay and get paid...', value:'Paypal', text:'Paypal'}
					];
	$("#byjson").msDropDown({byJson:{data:jsonData, name:'payments2'}}).data("dd");
}
	$(document).ready(function(e) {		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
												var val = data.value;
												if(val!="")
													window.location = val;
											}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
		
	//convert
	$("select").msDropdown();
	createByJson();
	$("#tech").data("dd");
	});
	function showValue(h) {
		console.log(h.name, h.value);
	}
	$("#tech").change(function() {
		console.log("by jquery: ", this.value);
	})
	/*//////////////////////////////////////////////END OF DROPDOWN JS*/
	
	/*
	$('.test1').each(function(){
		$(this).imageradio();
		//alert("test");
	});
	*/
	
	// on load
	$(function() {
		// replace the checkboxes with the images
		$('input[type=radio]').each(function() {
			$(this).hide();
			$(this).after($("<img src='Radio.jpg'  class='radioButtonImage' />"));
		});
	
		// setup click events to change the images
		$(".radioButtonImage").click(function() {
				
			if($(this).attr('src') == 'Radio.jpg') { // its checked, so uncheck it
				$(this).parent().parent().find("input").removeAttr("checked");
				$(this).parent().parent().find("img").attr('src', 'Radio.jpg');
				$(this).attr('src', 'RadioSelect.jpg');
				$(this).parent().find("input").prop('checked',true);
				$(this).parent().find("input").attr('checked',true);
			} //else { // its not checked, so check it
				//$(this).attr('src', 'Radio.jpg');
				//$('input[name=eCustomerType]').removeAttr("checked");
			//}
		});
	});
	//ניהול מוקדים
	$(".addNewMoked img").click(function()
	{
		if($(".addNewMoked img").attr("src")=="images/Plus.png"){
			$(".MokedList").css("display","block");
			$(".addNewMoked img").attr("src","images/Minus.png");
		}
		else
		{
			$(".MokedList").css("display","none");
			$(".addNewMoked img").attr("src","images/Plus.png");
		};
	});
	//סוף ניהול מוקדים
	/*עיצוב הטאבים כך שיהיו במצב פיקס כשמגיעים לראש הדף, לא עובד ב - IFRAME
	$(document).scroll(function() {
		var useFixedSidebar = $(document).scrollTop() > 280;
		$('#tabs>ul').toggleClass('fixedMenu', useFixedSidebar);
	});
	//סוף עיצוב טאב במצב פיקס*/
	


	/*///////////////////////////////////TABS COVER DIVS JS*/
	$(".eTab").each(function(){
		$(this).find(".Cover:first").css("display","block");
		$(this).find(".CoverTitle:first img").attr("src","css/images/IframeSubTitlesImg.png");
	});
	var s = 0;
	$(".CoverTitle h4").click(function()
	{
		if(s==0){
			$(this).parent().next(".Cover").css("display","block");
			$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImg.png");
			s=1;
		}
		else
		{
			$(this).parent().next(".Cover").css("display","none");
			$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImgClose.png");
			s=0;
		}
	});
	/*///////////////////////////////////END OF TABS COVER DIVS JS*/
	
	/*//////////////////////////////CUSTOM UPLOAD FILE INPUT JS*/
	$("input[type=file]").before('<div class="mCustomInput">העלה קובץ</div>');

	var wrapperimg2 = $('<div/>').css({height:0,width:0,'overflow':'hidden'});
	var fileInputimg2 = $("input[type=file]").wrap(wrapperimg2);
	$(".mCustomInput:first-child").css("display","none");
	fileInputimg2.change(function(){
	$this = $(this);
	$('.mCustomInput').text($this.val());
	})
	$('.mCustomInput').click(function(){
	$(this).parent().find("input").wrap(wrapperimg2).click();
	}).show();
	/*////////////////////////////END OF UPLOAD FILE CUSTOM INPUT JS*/
	
	/*////////////////////////////////////////TEMPLATES OF REPORTS CSS*/
	$(".ReportsTmp").click(function()
	{
		$(".TemplatesCover").dialog();
		$(".Templatedesc").css("display","none");
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
	});
	
	$(".ChooseReport img").click(function()
	{
		var q=$(this).parent().parent().text()
		$(".ReportRightDesc").text(q);
		$(".ui-button").trigger("click");
	});
	/*////////////////////////////////////////END OF TEMPLATES OF REPORTS CSS*/
	
	$(".firstDetailsOther").click(function()
	{
		$(".detailsOther").css("display","block");
		$(".detailsOther .cover").css("display","block");
	});
	
	$(".CustomerType").click(function()
	{
		$(".detailsOther").css("display","none");
		$(".detailsOther .cover").css("display","none");
	});
	
	/*//////////////////////////////////////////////////ADD PART FROM IFRAME*
	$(".ToPartsSelect").click(function()
	{
		$(".AddPartsIframe").dialog();
	});*
	$.get('http://eliamran.webxp.org.il/Portals/0/PagesHtml/Supplier.html', function(data){
		$(".AddPartsIframe").html( $(data).find('.SparePartsSearch').html());
	});
	/*//////////////////////////////////////////////////END OF ADD PART FROM IFRAME*/
	
	/*///////////////////////////////////////////////////////PRESS ON DAMAGED PART AREA THAT PUT AREA AT NEXT TAB*/
	$(".PartDamageselect .ChkImg").click(function()
	{
		var x = $(this).next().text();
		if($(this).prev().prop("checked")==true)
		{
			$(".PartDescClone:last").clone().insertAfter(".PartDescClone:last");
			$(".PartDescClone:last").find(".inlineClassCoverTitle").html(x);
			$(".PartDescClone:last").find(".Cover").css("display","none");
			$(".PartDescClone:last").find("img").attr("src","css/images/IframeSubTitlesImgClose.png");
			var s = 0;
		$(".CoverTitle h4").click(function()
		{
			if(s==0){
				$(this).parent().next(".Cover").css("display","block");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImg.png");
				s=1;
			}
			else
			{
				$(this).parent().next(".Cover").css("display","none");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImgClose.png");
				s=0;
			}
		});
		}else{
			$(".PartDescClone").each(function()
			{
				if($(this).find(".inlineClassCoverTitle").text()==x)
				{
					$(this).remove();
				}
			});
		};
	});
	/*///////////////////////////////////////////////////////END OF PRESS ON DAMAGED PART AREA THAT PUT AREA AT NEXT TAB*/
	
	/*///////////////////////////////////////////////////////PRESS ON DAMAGED PART AREA THAT PUT AREA AT TAB 6 */
	$(".ValuePartDmgClone:first").css("display","none");
	$(".RemovePartDmg").css("display","none");
	$(".PartDamageselect .ChkImg").click(function()
	{
		var x = $(this).next().text();
		if($(this).prev().prop("checked")==true)
		{
			$(".ValuePartDmgClone:first").clone().insertAfter(".ValuePartDmgClone:last");
			$(".ValuePartDmgClone:last").css("display","block");
			$(".ValuePartDmgClone:last").find(".inlineClassCoverTitle").html(x);
			$(".ValuePartDmgClone:last").find(".RemovePartDmg").css("display","none");
			$(".ValuePartDmgClone:last").find(".Cover").css("display","none");
			$(".ValuePartDmgClone:last").find("h4 img").attr("src","css/images/IframeSubTitlesImgClose.png");
			var s = 0;
		$(".CoverTitle h4").click(function()
		{
			if(s==0){
				$(this).parent().next(".Cover").css("display","block");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImg.png");
				s=1;
			}
			else
			{
				$(this).parent().next(".Cover").css("display","none");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImgClose.png");
				s=0;
			}
		});
		}else{
			$(".ValuePartDmgClone").each(function()
			{
				if($(this).find(".inlineClassCoverTitle").text()==x)
				{
					$(this).remove();
				}
			});
		};
	});
	/*///////////////////////////////////////////////////////END OF PRESS ON DAMAGED PART AREA THAT PUT AREA AT TAB 6*/
	
	/*///////////////////////////////////////////////////////PRESS ON DAMAGED PART AREA THAT PUT AREA AT TAB 5 */
	$(".PartAndWorkDmgClone:first").css("display","none");
	
	$(".PartDamageselect .ChkImg").click(function()
	{
		var x = $(this).next().text();
		if($(this).prev().prop("checked")==true)
		{
			$(".PartAndWorkDmgClone:first").clone().insertAfter(".PartAndWorkDmgClone:last");
			$(".PartAndWorkDmgClone:last").css("display","block");
			$(".PartAndWorkDmgClone:last").find(".inlineClassCoverTitle").html(x);
			$(".PartAndWorkDmgClone:last").find(".RemovePartDmg").css("display","none");
			$(".PartAndWorkDmgClone:last").find(".Cover").css("display","none");
			$(".PartAndWorkDmgClone:last").find("h4 img").attr("src","css/images/IframeSubTitlesImgClose.png");
			var s = 0;
		$(".CoverTitle h4").click(function()
		{
			if(s==0){
				$(this).parent().next(".Cover").css("display","block");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImg.png");
				s=1;
			}
			else
			{
				$(this).parent().next(".Cover").css("display","none");
				$(this).parent().find("img").attr("src","css/images/IframeSubTitlesImgClose.png");
				s=0;
			}
		});
		}else{
			$(".PartAndWorkDmgClone").each(function()
			{
				if($(this).find(".inlineClassCoverTitle").text()==x)
				{
					$(this).remove();
				}
			});
		};
	});
	/*///////////////////////////////////////////////////////END OF PRESS ON DAMAGED PART AREA THAT PUT AREA AT TAB 5*/
});
