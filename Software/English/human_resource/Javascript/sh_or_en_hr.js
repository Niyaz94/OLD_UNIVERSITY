$(document).ready(function (){
		var t=$("#accelerarion_table").DataTable();
		var id,type,id,counter=1,check,update_data=[];
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
		maxSelection: 1,
		maxDropHeight: 150,
		hideTrigger : false,
		highlight :true,
		expandOnFocus: true,
		placeholder:'Search..'
	});
	$(ms).on('selectionchange', function(){//به‌كاردێت بۆ دۆزینه‌وه‌یی ئایدی ئه‌و ناوه‌ی كه‌ دیاری كرایه‌
		id=Number(this.getValue());
	});		
	
	$("#button_acc").click(function(){
		if(id>0){
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"id":id},
				function(data, status){	
					t.clear().draw();
					var header=["full_name","service_type","service_id"];
					for(var i=0;i<data.length;i++){
						var tr = $("<tr>", {"id":"tr_"+(i+1)});

						var type=data[i]["service_type"];
						if(data[i]["service_type"]=="annual"){
							data[i]["service_type"]="Annual Allownace";
						}else if(data[i]["service_type"]=="thanks"){
							data[i]["service_type"]="Thanks Acceleration";
						}else if(data[i]["service_type"]=="promotion"){
							data[i]["service_type"]="Promotion";
						}else if(data[i]["service_type"]=="certificate"){
							data[i]["service_type"]="Certificate Acceleration";
						}else if(data[i]["service_type"]=="service_calculation"){
							data[i]["service_type"]="Service Calculation";
						}
						for(var j=0;j<2;j++){
							var td = $("<td>", {"text":data[i][header[j]]});
							$($(tr)).append($(td));
						}
						var td = $("<td >",{"class":"text-center"});
						var span1= $("<span>", {"class":"glyphicon glyphicon-th-list"});
						var button1= $("<button>", {"id":type+"#"+data[i]["service_id"],"type":"button", "class":"btn btn-default btn-sm"});
						$($(button1)).append($(span1));
						$($(td)).append($(button1));
						$($(tr)).append($(td));
						t.row.add(tr).draw(tr);
					}
				}
			);
			id=0;
		}
	});

	$("#accelerarion_table tbody").on("click","button",function(){	
		 var arr = $(this).attr("id").split("#");//id au button ka click e krdea dakata array
		 var service_id=arr[1];//id user kaea
		 type=arr[0];//jore button ka edit,remove,save 
		 //alert(type);
		if(arr[0]=="annual"){//agar click lasar button e remove krd
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"annual":type,"service_id":service_id},
				function(data, status){
					var annual=["rank","title","new_grade","old_grade","new_salary","old_salary","annual_date","qdam"];
					for(var i=0;i<annual.length;i++)
						$("#annual_"+annual[i]).val(data[0][annual[i]]);
					$("#annual_Modal").modal("show");
				}
			);
		}else if(arr[0]=="thanks"){//agar click lasar button e save krd
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"thanks":type,"service_id":service_id},
				function(data, status){
					$("#thanks_date").val(data[0]["date_en"]);
					$("#thanks_Modal").modal("show");
				}
			);
		}else if(arr[0]=="promotion"){
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"promotion":type,"service_id":service_id},
				function(data, status){
					var promotion=["new_rank","old_rank","new_grade","old_grade","old_title","new_title","new_salary","old_salary","period_service"];
					for(var i=0;i<promotion.length;i++)
						$("#pro_"+promotion[i]).val(data[0][promotion[i]]);
					$("#promotion_Modal").modal("show");
				}
			);
		}else if(arr[0]=="certificate"){
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"certificate":type,"service_id":service_id},
				function(data, status){
						var certificate=["new_rank","old_rank","new_grade","old_grade","new_title","old_title","new_salary","old_salary",
									     "new_annual_date","old_annual_date","acceleration_period"];
						for(var i=0;i<certificate.length;i++)
							$("#cert_"+certificate[i]).val(data[0][certificate[i]]);
						$("#certificate_Modal").modal("show");
				}
			);
		}else if(arr[0]=="service_calculation"){
			$.post(
				"../PHP/sh_or_en_proc_hr.php",
				{"service_calculation":type,"service_id":service_id},
				function(data, status){
					var service=["service_cal_type","service_cal_period","from_date","to_date","new_rank","old_rank","new_grade","old_grade",
								 "new_salary","old_salary","new_title","old_title","new_annual_date","old_annual_date","increasing_period"];
					for(var i=0;i<service.length;i++)
						$("#serv_"+service[i]).val(data[0][service[i]]);
					$("#service_Modal").modal("show");
				}
			);
		}
	});
	
});