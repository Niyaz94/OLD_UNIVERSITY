$(document).ready(function (){	

	var id=0,user_id=0,type;
	var t=$('#leave_table').DataTable({"order": [[ 1, "desc" ]]});
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
		placeholder:'Search...',
	});
	$(ms).on('selectionchange', function(){
		user_id=Number(this.getValue());
	});
	
	$("#leave_table tbody").on("click","button",function(){	
		var em_id=$(this).attr("id");
		var arr = em_id.split("_");
				  
		if(arr[0]=="remove"){
				$("#remove_Modal").modal("show");
				id=arr[1];
				type=arr[0];
		}else if(arr[0]=="update"){
			$("#insert_Modal").modal("show");
			id=arr[1];
			type=arr[0];
		}
	});
	$('#new_annual').change(function(){//la table remove bakardet bo auae bzane data e ba tauaue daxel krdea
		if(validation_date($(this).val())){
			$("#remove_save").prop( "disabled",false);		
		}else{
			$("#remove_save").prop( "disabled",true);		
		}
	});
	
	$("#remove_save").click(function(){//bakardet bo delete name ek
		$.post(
			"../PHP/leave_en_proc_hr.php",
			{"remove":type,"id":id,"date":$('#new_annual').val()},
			function(data, status){	
				t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
				$("#remove_Modal").modal("hide");
				$('#remove_form')[0].reset();
				$("#remove_save").prop( "disabled",true);		
			}
		);
	});	
	
	$("#add_new").click(function(){
		if(user_id>0){
			$("#insert_Modal").modal("show");
		}
	});
	$("#enter_save").click(function(){
		if(user_id>0){
			$("#insert_Modal").modal("hide");
			$.post("../PHP/leave_en_proc_hr.php",
				{"id":user_id,"check":"check","day":$("#day").val(),"year":$("#year").val(),"month":$("#month").val()},
					function(data, status){
						if(data==1){
							$("#error_Modal").modal("show");
						}else if(data["type"]==0){
							$("#old").val(data["old"]);
							$("#new").val(data["new"]);
							$("#data_Modal").modal("show");
						}
					}
				);
		}
		if(id>0){
			$("#insert_Modal").modal("hide");
			$.post("../PHP/leave_en_proc_hr.php",
				{"id":id,"check_update":"check_update","day":$("#day").val(),"year":$("#year").val(),"month":$("#month").val()},
					function(data, status){
						$("#old").val(data["old"]);
						$("#new").val(data["new"]);
						$("#data_Modal").modal("show");
					}
				);
		}
	});
	
	$("#data_save").click(function(){
		if(id>0){
			$.post("../PHP/leave_en_proc_hr.php",
			{"id":id,"update":"update","new":$("#new").val(),"old":$("#old").val(),"day":$("#day").val(),"year":$("#year").val(),"month":$("#month").val()},
				function(data, status){
					if(data==1){
						var x_id="#tr_"+id;
						var tr = $('#leave_table tbody '+x_id);
						tr.find('td:eq(1)').html($("#year").val());
						tr.find('td:eq(2)').html($("#month").val());
						tr.find('td:eq(3)').html($("#day").val());
						tr.find('td:eq(4)').html($("#old").val());
						tr.find('td:eq(5)').html($("#new").val());
						t.rows(tr).invalidate().draw(true);
						$("#data_Modal").modal("hide");
						id=0;
						close();
					}
				}
			);
		}
		if(user_id>0){	
			$.post("../PHP/leave_en_proc_hr.php",
				{"user_id":user_id,"insert":"insert","new":$("#new").val(),"old":$("#old").val(),"day":$("#day").val(),"year":$("#year").val(),"month":$("#month").val()},
				function(data, status){
					
					var header=["year","month","day","old","new"];
					var tr = $("<tr>",{"id":"tr_"+user_id});	
					var td = $("<td>", {"text":data["full_name"]});
					$($(tr)).append($(td));
					for(var j=0;j<5;j++){
						var td = $("<td>", {"text":$("#"+header[j]).val()});
						$($(tr)).append($(td));
					}	
					var td = $("<td >",{"class":"text-center"});
					var span1= $("<span>", {"class":"glyphicon glyphicon-edit"});
					var button1= $("<button>", {"id":"update_"+user_id,"type":"button", "class":"btn btn btn-success btn-sm"});
					$($(button1)).append($(span1));
					$($(td)).append($(button1));
					
					var span2= $("<span>", {"class":"glyphicon glyphicon-remove"});
					var button2= $("<button>", {"id":"remove_"+user_id,"type":"button", "class":"btn btn-danger btn-sm"});
					$($(button2)).append($(span2));
					$($(td)).append($(button2));	
					$($(tr)).append($(td));	
					
					t.row.add(tr).draw(tr);
					$("#data_Modal").modal("hide");
					user_id=0;
					close();
				}
			);
		}
	});
	var found_check=[false,false,false];
	$('#year').on("keyup mouseup",function(){//
		if(validation_number($(this).val(),11,0)==true)
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});
	$('#month').on("keyup mouseup",function(){
		if(validation_number($(this).val(),12,0)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});	
	$('#day').on("keyup mouseup",function(){
		if(validation_number($(this).val(),31,0)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
	});	
	
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class","col-md-12 has-success has-feedback");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class","col-md-12 has-error has-feedback");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true){
			$("#enter_save").prop( "disabled", false );
			$("#enter_save").attr("class","btn btn-success pull-right");
			$("#span_enter_save").attr("class","glyphicon glyphicon-ok");
		}else{
			$("#enter_save" ).prop( "disabled", true );
			$("#enter_save").attr("class","btn btn-danger pull-right");
			$("#span_enter_save").attr("class","glyphicon glyphicon-remove");
		}
	}
	function close (){
		$('#leave_form')[0].reset();
		$('#data_form')[0].reset();
		change_input("#div_year","#span_year",false,0);
		change_input("#div_month","#span_month",false,1);
		change_input("#div_day","#span_day",false,2);

			$("#enter_save" ).prop( "disabled", true );
			$("#enter_save").attr("class","btn btn-danger pull-right");
			$("#span_enter_save").attr("class","glyphicon glyphicon-remove");
	}
	
});