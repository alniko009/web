$(document).ready(function () {
	$("#tabs-3 .ChkImg").click(function()
	{
		if($(this).prop("checked")==true)
		{
			alert("test");
			$("#tabs-4 .Cover:last").after("<div style='widht:100%;height:30px;border:1px solid red;' class='bla'></div>");
		}
		//else 
	});

	/*//////////////////////////////////////////////////////////ADD GARAGE CHECK*/
	$(".RemoveGarage:first-child").css("display","none");
	$(".AddGarage").click(function()
	{
	   if($(".GarageClone:first").find("input").val()!=="")
	   {
			$(this).parent().parent().parent().clone().insertAfter(".GarageClone:last");
			$(".AddGarage:last").css("display","none");
			$(".RemoveGarage:last").css("display","inline-block");
			$(".AddGarage:first").parent().parent().parent().find("input").val("");
		};
		$(".RemoveGarage").click(function()
		{
			$(this).parent().parent().parent().remove();
		});
	});
	
	/*//////////////////////////////////////////////////////////END OF ADD GARAGE CHECK*/
	
	/*///////////////////////////////////////////////////////////////CUSTOM CAR ADDITIONS*/
	$(".CustomAdditionsClone:first").find(".RemoveCustomAdded").css("display","none");
	
	$(".CustomAdded").click(function()
	{
		if($(this).parent().find('input[name="Custom Additions"]').val()!=="")
		{
			$(this).parent().clone().insertAfter(".CustomAdditionsClone:first");
			$(this).parent().find("input").val("");
			$(".CustomAdditionsClone").find(".CustomAdded").css("display","none");
			$(".CustomAdditionsClone:first").find(".CustomAdded").css("display","inline-block");
			$(".RemoveCustomAdded").click(function(){$(this).parent().remove();});
			$(".CustomAdditionsClone").find(".RemoveCustomAdded").css("display","inline-block");
			$(".CustomAdditionsClone:first").find(".RemoveCustomAdded").css("display","none");
		};
		
	});
	
	/*///////////////////////////////////////////////////////////////END OF CUSTOM CAR ADDITIONS*/
	
	/*///////////////////////////////////////////////////////////////AddReduce CAR COST CALCULATION*/
	var PriceList=$(".PriceList").val();
	$(".AddReduceClone:first").find(".RemoveAddReduce").css("display","none");
	
	$(".AddReduce").click(function()
	{
		if($(this).parent().find('input[name="MoneyChange"]').val()!==""  || $(this).parent().find('input[name="PercChange"]').val()!=="")
		{
			$(this).parent().clone().insertAfter(".AddReduceClone:first");
			$(this).parent().find("input").val("");
			$(".AddReduceClone").find(".AddReduce").css("display","none");
			$(".AddReduceClone:first").find(".AddReduce").css("display","inline-block");
			$(".RemoveAddReduce").click(function(){$(this).parent().remove();});
			$(".AddReduceClone").find(".RemoveAddReduce").css("display","inline-block");
			$(".AddReduceClone:first").find(".RemoveAddReduce").css("display","none");
		};
		
		$('input[name="PercChange"]').focus(function()
		{
			$(this).parent().find('input[name="MoneyChange"]').val("");
		});
		$('input[name="MoneyChange"]').focus(function()
		{
			$(this).parent().find('input[name="PercChange"]').val("");
		});
		
	});
	
	/*///////////////////////////////////////////////////////////////END OF AddReduce CAR COST CALCULATION*/
	
	/*///////////////////////////////////////////////////////////////CAR COST CALCULATION*/
	$(".CarValueRender").click(function()
	{
		$(this).prev().text("חשב מחדש");
		$(this).parent().parent().find(".inlineClass").css("margin-left","0px");
		
		var q = parseInt($(".PriceList").val());
		if(isNaN(q)==true)
		{
			alert("חובה להכניס מחירון");
		};
		
		if($('input[value="Month2008"]').prop("checked")!==true && $('input[value="Month2007Up"]').prop("checked")!==true && $('input[value="Month2008Up"]').prop("checked")!==true)
		{
			alert("חובה לסמן חודשי שימוש");
		};
		
		var g = parseInt($(".PriceAdded").val())
		if(isNaN(g)==true)
		{
			var t = parseInt($(".PriceList").val())
			$(".sumPlusTax").text(t);
			return false;
		};
		
		var z = 0;
		$(".AddReduceClone").each(function()
		{   
			if($(this).find('input[name="MoneyChange"]').val()!=="")
			{
				var w = parseInt($(this).find('input[name="MoneyChange"]').val());
				z = parseInt(w+z);
			};
		});
		
		var q = parseInt($(".PriceList").val());
		var p = 0;
		var r = 0;
		$(".AddReduceClone").each(function()
		{   
			if($(this).find('input[name="PercChange"]').val()!=="")
			{
				var v = parseInt($(this).find('input[name="PercChange"]').val());
				p = (v*q)*0.01;
				r = r+p;
			};
		});
		var CalcBeforeWeight = z+r;
	
		var monthNum =$('.MonthOnRoad option:selected').prevAll().length;
		
		if($('input[value="Month2008"]').prop("checked")==true)
		{
			var PriceList=parseInt($(".PriceList").val());
			var PriceAdded=parseInt($(".PriceAdded").val());
			var sum = PriceAdded*monthNum+PriceList;
			$(".sumPlusTax").text(sum+CalcBeforeWeight);
		}
		if($('input[value="Month2007Up"]').prop("checked")==true)
		{
			monthNum=-(12-(monthNum+1));
			var PriceList=parseInt($(".PriceList").val());
			var PriceAdded=parseInt($(".PriceAdded").val());
			var sum = PriceAdded*monthNum+PriceList;
			$(".sumPlusTax").text(sum+CalcBeforeWeight);
		}
		
		if($('input[value="Month2008Up"]').prop("checked")==true)
		{
			monthNum=monthNum+1;
			var PriceList=parseInt($(".PriceList").val());
			var PriceAdded=parseInt($(".PriceAdded").val());
			var sum = PriceAdded*monthNum+PriceList;
			$(".sumPlusTax").text(sum+CalcBeforeWeight);
		}
		
	});
	/*///////////////////////////////////////////////////////////////END OF CAR COST CALCULATION*/
	
	/*///////////////////////////////////////////////////////////////AddReduce CAR COST Weighting CALCULATION*/
	var PriceList=$(".PriceList").val();
	$(".AddReduceCloneWeight:first").find(".RemoveAddReduceWeight").css("display","none");
	
	$(".AddReduceWeight").click(function()
	{
		if($(this).parent().find('input[name="MoneyChange"]').val()!==""  || $(this).parent().find('input[name="PercChange"]').val()!=="")
		{
			$(this).parent().clone().insertAfter(".AddReduceCloneWeight:first");
			$(this).parent().find("input").val("");
			$(".AddReduceCloneWeight").find(".AddReduceWeight").css("display","none");
			$(".AddReduceCloneWeight:first").find(".AddReduceWeight").css("display","inline-block");
			$(".RemoveAddReduceWeight").click(function(){$(this).parent().remove();});
			$(".AddReduceCloneWeight").find(".RemoveAddReduceWeight").css("display","inline-block");
			$(".AddReduceCloneWeight:first").find(".RemoveAddReduceWeight").css("display","none");
		};
		
		$('input[name="PercChange"]').focus(function()
		{
			$(this).parent().find('input[name="MoneyChange"]').val("");
		});
		$('input[name="MoneyChange"]').focus(function()
		{
			$(this).parent().find('input[name="PercChange"]').val("");
		});
		
	});
	/*///////////////////////////////////////////////////////////////END OF AddReduce CAR COST Weighting CALCULATION*/
	
	/*//////////////////////////////////////////////////////////////CAR COST AFTER WEIGHT CALCULATION*/
	$(".CarWeightRender").click(function()
	{
		$(this).prev().text("חשב מחדש");
		var u = $('input[name="PercWeightChanged"]').val();
		var o = $(".sumPlusTax").html();
		var k = o-(o*u*0.01);
		$(".sumPlusTaxAndWeight").html(k);
		
		var z = 0;
		$(".AddReduceCloneWeight").each(function()
		{   
			if($(this).find('input[name="MoneyChange"]').val()!=="")
			{
				var w = parseInt($(this).find('input[name="MoneyChange"]').val());
				z = parseInt(w+z);
			};
		});
		
		//var q = parseInt($(".sumPlusTaxAndWeight").val());
		var p = 0;
		var r = 0;
		$(".AddReduceCloneWeight").each(function()
		{   
			if($(this).find('input[name="PercChange"]').val()!=="")
			{
				var v = parseInt($(this).find('input[name="PercChange"]').val());
				p = (v*k)*0.01;
				r = r+p;
			};
		});
		var CalcBeforeWeight = z+r;
		$(".sumPlusTaxAndWeight").html(k+CalcBeforeWeight);
		
	});
	/*//////////////////////////////////////////////////////////////END OF CAR COST AFTER WEIGHT CALCULATION*/
	
	/*//////////////////////////////////////////////////////////////KILOMETER CALCULATION*/
	/*KM RENDER*/
	$(".OtzVal").blur(function() {
		$(".MadOtz").text($(this).val());
	});
	
	var timerId = 0;
	timerId = setInterval(function () {
		$(".OtzCalcWeight .enabled").click(function()
		{
			var MadOtzNum = parseInt($(".MadOtz").text());
			var OtzCalcVar = $(this).find("span").text();
			if(OtzCalcVar == "בית ספר לנהיגה")
			{
				var h = $(".MadOtz").text();
				$(".OtzCalcBalance").text(h*0.20);
				$(".OtzCalcAfterBalance").text(MadOtzNum-h*0.20);
			};
		});
		clearInterval(timerId);
	}, 3000);
	/*END OF KM RENDER*/
	/*KM PERC RENDER*/
	$(".KmPercRender").click(function()
	{   
		var sumPlusTaxWeight = $(".sumPlusTaxAndWeight").html();
		var PerChgKm = $('input[name="PercChange Of KmWeight"]').val();
		var SumKm = (sumPlusTaxWeight-(sumPlusTaxWeight*PerChgKm*0.01));
		$(".sumPlusTaxAndWeight").html(SumKm);
	});
	/*END OF KM PERC RENDER*/
	/*//////////////////////////////////////////////////////////////END OF KILOMETER CALCULATION*/
	
	/*//////////////////////////////////////////////////////////////POLICY VALUE PERCENT RENDER*/
	$(".PolicyValueRender").click(function()
	{   
		var m = $('input[name="PolicyValue"]').val();
		var j = $('input[name="PolicyValueAtEvent"]').val();
		var l = 100-(100*j)/m;
		$(".PolicyValueDiff").val(l);
	});
	/*//////////////////////////////////////////////////////////////END OF POLICY VALUE PERCENT RENDER*/
	
	/*//////////////////////////////////////////////////////////////ADD REDUCE OF KM THAT THE CAR DID*/
	var eMonthKm = 0;
	eMonthKm = setInterval(function () {
		$(".OtzKmRender .enabled").click(function()
		{
			var monthNum =$('.OtzKmRender option:selected').prevAll().length;
			var MadOtzNum = parseInt($(".MadOtz").html());
			$(".MonthKmVar").html(monthNum*1700);
			$(".MonthKmCalc").html(monthNum*1700+MadOtzNum);
		});
		clearInterval(eMonthKm);
	}, 3000);
	/*//////////////////////////////////////////////////////////////END OF ADD REDUCE OF KM THAT THE CAR DID*/
	
	/*/////////////////////////////////////////////////////////////ADD REDUCE OF PARTDAMAGED IN TAB 6 JS*/
	$(".PartDamageselect .ChkImg").click(function()
	{
		
		$(".ValuePartDmgClone:first").find(".RemovePartDmg").css("display","none");
		
		$(".AddPartDmg").click(function()
		{
			if($(this).parent().find('input[name="PartDmgPercent"]').val()!=="" && $(this).parent().find('input[name="PartDmgReduce"]').val()!=="")
			{
				$(this).parent().addClass("bla");
				$(this).parent().clone().insertAfter(".bla:first");
				$(".bla:first").find(".AddPartDmg").css("display","inline-block");
				$(".bla:last").find(".AddPartDmg").css("display","none");
				$(".bla:first").find(".RemovePartDmg").css("display","none");
				$(".bla:last").find(".RemovePartDmg").css("display","inline-block");
				$(".ValuePartDmgClone").find(".bla").removeClass("bla");
				$(this).parent().find("input").val("");
				$(".RemovePartDmg").click(function(){$(this).parent().remove();});
			};
			
		});
	});
	/*/////////////////////////////////////////////////////////////END OF ADD REDUCE OF PARTDAMAGED IN TAB 6 JS*/
	
	/*/////////////////////////////////////////////////////////////RENDER PARTDAMAGED IN TAB 6*/
	$(".PartDamageRender").click(function()
	{
		var t = 0;
		var x = $(".sumPlusTaxAndWeight").html();
		if(x!==""){
				$(this).prev().text("חשב מחדש");
				$(".PartDmgPercent").each(function()
				{
					var y = $(this).val();
					var z = (y*0.01)*x;
					t = t+z;
					$(".PartDmgSum").text(x-t);
				});
				
			}else{
				alert("יש למלא שדה מחירון לאחר שקלול תחילה");
		};
	});
	/*/////////////////////////////////////////////////////////////RENDER PARTDAMAGED IN TAB 6*/
	
	/*//////////////////////////////////////////////////////////////ADD CAR PARTS BY SUPPLIER JS*/
	/*$(".RemoveCarPartBtn:first").css("display","none");
	$(".AddCarPartBtn").click(function()
	{
				$(this).parent().clone().insertAfter(".AddCarPart:first");
				$(".AddCarPart").find(".AddCarPartBtn").css("display","none");
				$(".AddCarPart:first").find(".AddCarPartBtn").css("display","inline-block");
				$(".AddCarPart").find(".RemoveCarPartBtn").css("display","inline-block");
				$(".AddCarPart:first").find(".RemoveCarPartBtn").css("display","none");
				$(".RemoveCarPartBtn").click(function(){$(this).parent().remove();});
		
	});*/
	$(".AddPartprice").focus(function()
	{
		$(this).val("");
	}).blur(function()
		{
		if($(this).val()==""){
			$(this).val("הקש למחיר");
			};
		});
		
	$('.AddPartprice').keyup(function () {  
		this.value = this.value.replace(/[^0-9\.]/g,''); 
	});
	
	$(".SupplierAddCar .Cover:first").css("display","block");
	/*//////////////////////////////////////////////////////////////END OF ADD CAR PARTS BY SUPPLIER JS*/
	
	/*///////////////////////////////////////////////////////////////WORK ON PARTS CALCULATION TAB 5 JS*/
	$(".PartDamageselect .ChkImg").click(function()
	{
		$(".WorkInputPrice").focus(function()
					{
						var x=$(this).parent().find(".WorkInputHours").val();
						var y=$(this).parent().find(".WorkInputPricePerHour").val();
						var z=$(this).parent().find(".WorkInputDiscountPerc").val();
						var z = z*0.01;
						var g=$(this).parent().find(".WorkInputDiscount").val((x*y)*z)
						$(this).val(x*y-(x*y)*z);
					});
		
		$(".WorkRemove").css("display","none");
	
		$(".WorkAdd").click(function()
		{
			if($(this).parent().find(".WorkInputPrice").val()!=="")
			{
					$(this).parent().addClass("WorkAdded");
					$(this).parent().clone().insertAfter(".WorkAdded:first");
					$(".WorkAdded").find(".WorkAdd").css("display","none");
					$(".WorkAdded:first").find(".WorkAdd").css("display","inline-block");
					$(".WorkAdded").find(".WorkRemove").css("display","inline-block");
					$(".WorkAdded:first").find(".WorkRemove").css("display","none");
					$(".WorkDetails").removeClass("WorkAdded");
					$(this).parent().find("input").val("");
					$(".WorkRemove").click(function(){$(this).parent().remove();});
					
					$(".WorkInputPrice").focus(function()
					{
						var x=$(this).parent().find(".WorkInputHours").val();
						var y=$(this).parent().find(".WorkInputPricePerHour").val();
						var z=$(this).parent().find(".WorkInputDiscountPerc").val();
						var z = z*0.01;
						var g=$(this).parent().find(".WorkInputDiscount").val((x*y)*z)
						$(this).val(x*y-(x*y)*z);
					});
			};
		});
		
		$(".PartRemove").css("display","none");
		$(".PartAdd").click(function()
		{
		
			if($(this).parent().find(".addPartInputPrice").val()!=="")
			{
					$(this).parent().addClass("PartAdded");
					$(this).parent().clone().insertAfter(".PartAdded:first");
					$(".PartAdded").find(".PartAdd").css("display","none");
					$(".PartAdded:first").find(".PartAdd").css("display","inline-block");
					$(".PartAdded").find(".PartRemove").css("display","inline-block");
					$(".PartAdded:first").find(".PartRemove").css("display","none");
					$(".addPart").removeClass("PartAdded");
					$(this).parent().find("input").val("");
					$(".PartRemove").click(function(){$(this).parent().remove();});
			};
		});
	});
	/*///////////////////////////////////////////////////////////////END OF WORK ON PARTS CALCULATION TAB 5 JS*/
	
});

