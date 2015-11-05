$(document).ready(function()
{
	$("body").on("keypress","input.myClass",function(event){
		if(event.which==13)
		{
			var text=document.activeElement;
			var t=text;
			text=$(text).val();
			var row=$(t).parent().parent();
			var id1=$(row).children(" #id");
			var buyer=$(row).children("#buyer");
			id1=$(id1).text();
			var price1=$(row).children("#price");
			var p=price1;
			price1=$(price1).text();
			var name1=document.cookie;
			name1=name1.substr(name1.indexOf("name="));
			name1=name1.split(';');
			name1=name1[0].substr(name1[0].indexOf('=')+1);
			$(t).val("");
			$.ajax({
			 	type:"POST",
				url:"Update.php",
			 	data:{id:id1 , name:name1 ,price:text ,oldprice:price1} ,
			 	dataType:"html",
			 	success:function(result) 
			 	{
			 	    var newresult=result.split(';');
			 		$(buyer).text(newresult[0]);
			 		$(p).text(newresult[1]);
					
			 	}
			});
		}
	});
	$("#word").keypress(function(event){
		if(event.which==13)
		{
			var marka=$('#marka').val();
			var model=$('#model').val();
			//var year=document.getElementById("godina").value.substr(4);
			$.ajax({
				type:"POST",
				url:"getSearch.php",
			 	data:{brandp:marka , modelp:model } ,
			 	dataType:"html",
			 	success:function(result){
			 		$("#list").html(result);
			 	}
			});
		}
	});
	$("#marka").change(function(){
		var brand=$("#marka").val();
		$.ajax({
			type:"POST",
			url:"getModel.php",
			data:{marka: brand},
			dataType:"html",
			success:function(result)
			{
				$("#model").html(result);
			}
		});
	});
});
