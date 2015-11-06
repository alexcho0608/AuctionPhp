$(document).ready(function()
{
	//event on adding a new bid
	$("body").on("keypress","input.myClass",function(event){
		if(event.which == 13)
		{
			var domInputField = document.activeElemet;
			var raisePrice = $(domInputField).val();
			var tableRow = $(domInputField).parent().parent();
			var id = $(tableRow).children(" #id");
			var buyerDom = $(tableRow).children("#buyer");
			id = $(id).text();
			var priceDom = $(tableRow).children("#price");
			var currentPrice = $(priceDom).text();
			var cookieData = document.cookie;
			var namePartStr = cookieData.substr(name1.indexOf("name=")).split(';')[0];
			var name = namePartStr[0].substr(namePartStr[0].indexOf('=')+1);
			$(domInputFIeld).val("");
			$.ajax({
			 	type : "POST",
				url : "Update.php",
			 	data : {id : id, name : name, price : raisePrice, oldprice : currentPrice},
			 	dataType : "html",
			 	success:function(result) 
			 	{
			 	//update price and buyer for bid
			 	    var newresult = result.split(';');
			 		$(buyerDom).text(newresult[0]);
			 		$(priceDom).text(newresult[1]);
					
			 	}
			});
		}
	});
	//event on searching bids
	$("#word").keypress(function(event){
		if(event.which == 13)
		{
			var brand = $('#brand').val();
			var model = $('#model').val();
			var year = document.getElementById("year").value.substr(4);
			$.ajax({
				type : "POST",
				url : "getSearch.php",
			 	data : {brand : brand, model : model, year : year } ,
			 	dataType : "html",
			 	success : function(result){
			 		$("#list").html(result);
			 	}
			});
		}
	});
	//event on getting models for car brand
	$("#marka").change(function(){
		var brand=$("#brand").val();
		$.ajax({
			type:"POST",
			url:"getModel.php",
			data:{brand : brand},
			dataType:"html",
			success:function(result)
			{
				$("#model").html(result);
			}
		});
	});
});
