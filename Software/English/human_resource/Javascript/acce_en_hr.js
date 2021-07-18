$(document).ready(function (){
		var t=$("#accelerarion_table").DataTable();
		var id_array,type,id,counter=1,check,update_data=[];
		var div_child_id=["div_orderd_by_","div_document_type_","div_order_type_","div_order_number_","div_english_date_","div_kurdish_date_"];
		var input_id=["orderd_by_","document_type_","order_type_","order_number_","english_date_","kurdish_date_"];
		var input_title=["Orderd By ","Document Type ","Order Type ","Order Number ","English Date ","Kurdish Date"];
		var placeholder=["Orderd By ","Document Type ","Order Type ","Order Number ","English Date ","Kurdish Date"];
		var input_type=["text","text","text","text","date","date"];

	var ms=$('#search_acc').magicSuggest({
		data: '../PHP/magic_database.php',
		valueField: 'employee_id',
		displayField: 'full_name',
		allowFreeEntries: false,
		maxSelection: 20,
		maxDropHeight: 150,
		hideTrigger : false,
		highlight :true,
		expandOnFocus: true,
		placeholder:'Search..'
	});
	$(ms).on('selectionchange', function(){//به‌كاردێت بۆ دۆزینه‌وه‌یی ئایدی ئه‌و ناوه‌ی كه‌ دیاری كرایه‌
		id_array=this.getValue();
	});		
	
	$("#button_acc").click(function(){
		$.post("../PHP/acce_en_proc_hr.php",
			{"id":id_array},
				function(data, status){
					update_data=data;
					t.clear().draw();
					var header=["full_name","S_date","new_S_date","new_zh_qdam"];
					for(var i=0;i<data.length;i++){
						var tr = $("<tr>");	
						for(var j=0;j<4;j++){
							var td = $("<td>", {"text":data[i][header[j]]});
							$($(tr)).append($(td));
						}
						var td = $("<td>");
						var span2= $("<span>", {"class":"glyphicon glyphicon-save"});
						var button2= $("<button>", {"id":"save_"+data[i]["employee_id"],"type":"button", "class":"btn btn-success btn-sm"});
						$($(button2)).append($(span2));
						$($(td)).append($(button2));	
						$($(tr)).append($(td));	
						
						var span3= $("<span>", {"class":"glyphicon glyphicon-trash"});
						var button3= $("<button>", {"id":"remove_"+data[i]["employee_id"],"type":"button", "class":"btn btn-danger btn-sm"});
						$($(button3)).append($(span3));
						$($(td)).append($(button3));		
						$($(tr)).append($(td));	
						t.row.add(tr).draw(tr);
					}
				}
			);	
	});

	$("#accelerarion_table tbody").on("click","button",function(){	
		 var arr = $(this).attr("id").split("_");//id au button ka click e krdea dakata array
		 id=arr[1];//id user kaea
		 type=arr[0];//jore button ka edit,remove,save 
		 
		if(arr[0]=="remove"){//agar click lasar button e remove krd
			t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
		}else if(arr[0]=="save"){//agar click lasar button e save krd
			$("#check_Modal").modal("show");//module xazn krdn labo database dabtaua	
		}
	});
	
	$("#check_save").click(function(){
		check=$("#check_prom").is(":checked");
		$("#check_Modal").modal("hide");	
		$("#save_Modal").modal("show");	
	});
	
	$("#save_save").click(function(){		
		var order=[];
		if(id>0 && counter >= 1){//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			for(var i=1,k=0;i<counter;i++,k++){//bakardet bo uargrtne content e order kan
				var index=[];
				for(var j=0;j<6;j++){
					index[j]=$("#"+input_id[j]+i+"").val();
				}
				order[k]=index;
			}
			var value=[];
			for(var i=0;i<update_data.length;i++){
				if(update_data[i]["employee_id"]==id){
					value=update_data[i];
				}		
			}
			order=JSON.stringify(order);
			$.post("../PHP/acce_en_proc_hr.php",
			{"info":value,"order":order,"check":check},
				function(data, status){
					$("#save_Modal").modal("hide");
					t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
				}
			);
		}
	});
	
	
	$("#save_add").click(function(){				
		var div_parent1 = $("<div>", {"id":"div_1_"+counter,"class": "form-group"});
		var div_parent2 = $("<div>", {"id":"div_2_"+counter,"class": "form-group"});		
		var div_child=[];
		for(var i=0;i<6;i++)
			div_child[i]= $("<div>", {"id":div_child_id[i]+counter, "class": "col-md-4"});
		var input=[];
		for(var i=0;i<6;i++)
			input[i]= $("<input>", {"id":input_id[i]+counter, "class":"form-control","placeholder":placeholder[i],"type":input_type[i],"title":input_title[i]});
		for(var i=0;i<3;i++){
			$(div_child[i]).append($(input[i]));
			$(div_parent1).append($(div_child[i]));
		}
		for(var i=3;i<6;i++){
			$(div_child[i]).append($(input[i]));
			$(div_parent2).append($(div_child[i]));
		}		
		var div_parent3 = $("<div>", {"id":"div_3_"+counter,"class": "form-group"});
		var	div_child3 = $("<div>",{"class": "col-sm-12"});
		var	div_p3 = $("<p>", {"class": "form-control-static","text":"Order :"+counter});		
		$(div_child3).append($(div_p3));
		$(div_parent3).append($(div_child3));		
		$("#order_row").append($(div_parent3));
		$("#order_row").append($(div_parent1));
		$("#order_row").append($(div_parent2));
		++counter;
	});
	
	$("#save_remove").click(function(){	
		if(counter>1){
			var remove1="#div_1_"+(counter-1);
			var remove2="#div_2_"+(counter-1);
			var remove3="#div_3_"+(counter-1);
			$(remove1).remove();
			$(remove2).remove();	
			$(remove3).remove();			
			--counter;
		}
	});	
	
	
	
});