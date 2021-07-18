$(document).ready(function (){	
	var t=$("#certificate_table").DataTable({
		"language": {
			"sLengthMenu":    "پیشاندانی _MENU_ داخلکراو",
			"sEmptyTable":    "هیچ زانیاریەک بەردەست نیە لە خشتەکە",
			"sInfo":          "پیشاندانی داخلکراوەکان لە _START_ تا _END_ لە کۆی  _TOTAL_ داخلکراو",
			"sInfoEmpty":     "پیشاندانی 0 تا 0 لە 0 داخلکراو",
			"sInfoPostFix":   "",
			"sSearch":        " گه‌ران ",
			"sUrl":           "",
			"sInfoThousands":  ",",
			"oPaginate": {
				"sNext":    "دواتر",
				"sPrevious": "پێشتر"
			}
		},"order": [[ 1, "desc" ]]
	});
	var id=0,type,row;
	
	$("#certificate_table tbody").on("click","button",function(){	
		var em_id=$(this).attr("id");
		var arr = em_id.split("_");
				  
		if(arr[0]=="remove"){
			$.post(
				"../PHP/ce_ru_ku_proc_hr.php",
				{"id":arr[1],"remove":arr[0]},
				function(data, status){
					t.row($("#"+arr[0]+"_"+arr[1]).parents('tr')).remove().draw();
				}
			);
		}else if(arr[0]=="update"){
			$("#certificate_modal").modal("show");
			id=arr[1];
			type=arr[0];
		}
	});
	$("#add_new").click(function(){
		$("#certificate_modal").modal("show");
		id=-1000;
	});
	$("#save").click(function(){
		if(id>0){
			var check_x=0;
			$.post("../PHP/ce_ru_ku_proc_hr.php",
			{"id":id,"update":type,"name":$("#name").val(),"start_rank":$("#start_rank").val(),"start_grade":$("#start_grade").val(),"end_rank":$("#end_rank").val(),"end_grade":$("#end_grade").val(),"year":$("#year").val(),"month":$("#month").val()},
				function(data, status){
					if(data==1){
						
						var x_id="#tr_"+id;
						var tr = $('#certificate_table tbody '+x_id);
						tr.find('td:eq(0)').html($("#name").val());
						tr.find('td:eq(1)').html($("#start_rank").val());
						tr.find('td:eq(2)').html($("#start_grade").val());
						tr.find('td:eq(3)').html($("#end_rank").val());
						tr.find('td:eq(4)').html($("#end_grade").val());
						tr.find('td:eq(5)').html($("#year").val());
						tr.find('td:eq(6)').html($("#month").val());
						t.rows( tr ).invalidate().draw(true);					
					}
					$("#certificate_modal").modal("hide");
				}
			);
		}
		if(id==-1000){	
			$.post("../PHP/ce_ru_ku_proc_hr.php",
				{"add_new":"add","name":$("#name").val(),"start_rank":$("#start_rank").val(),"start_grade":$("#start_grade").val(),"end_rank":$("#end_rank").val(),"end_grade":$("#end_grade").val(),"year":$("#year").val(),"month":$("#month").val()},
					function(data, status){
						//id=data;
						var header=["name","start_rank","start_grade","end_rank","end_grade","year","month"];
						
					var tr = $("<tr>",{"id":"tr_"+data});	
					for(var j=0;j<7;j++){
						var td = $("<td>", {"text":$("#"+header[j]).val()});
						$($(tr)).append($(td));
					}	
					var td = $("<td >",{"class":"text-center"});
					var span1= $("<span>", {"class":"glyphicon glyphicon-edit"});
					var button1= $("<button>", {"id":"update_"+data,"type":"button", "class":"btn btn btn-success btn-sm"});
					$($(button1)).append($(span1));
					$($(td)).append($(button1));
					
					var span2= $("<span>", {"class":"glyphicon glyphicon-remove"});
					var button2= $("<button>", {"id":"remove_"+data,"type":"button", "class":"btn btn-danger btn-sm"});
					$($(button2)).append($(span2));
					$($(td)).append($(button2));	
					$($(tr)).append($(td));	
					
					t.row.add(tr).draw(tr);
					$("#certificate_modal").modal("hide");
					close();
					}	
			);
			id=0;
		}
	});
	var found_check=[false,false,false,false,false,false,false];
	$('#name').change(function(){//
		if(/^([A-Za-z 0-9]+|[\u0600-\u06FF 0-9]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,6);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,6);
	});
	$('#start_rank').change(function(){
		if(validation_number($(this).val(),11,1)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});	
	$('#start_grade').change(function(){
		if(validation_number($(this).val(),12,1)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});	
	$('#end_rank').change(function(){
		if(validation_number($(this).val(),11,1)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
	});	
	$('#end_grade').change(function(){
		if(validation_number($(this).val(),12,1)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,3);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,3);
	});	
	$('#year').change(function(){
		if(validation_number($(this).val(),6,0)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,4);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,4);
	});	
	$('#month').change(function(){
		if(validation_number($(this).val(),11,0)==true)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,5);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,5);
	});	
	
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class","col-md-6 has-success has-feedback");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class","col-md-6 has-error has-feedback");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true && found_check[3]==true && found_check[4]==true && found_check[5]==true && found_check[6]==true){
			$("#save").prop( "disabled", false );
			$("#save").attr("class","btn btn-success pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-ok");
		}else{
			$("#save" ).prop( "disabled", true );
			$("#save").attr("class","btn btn-danger pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-remove");
		}
	}
	function close (){
		$('#salary_form')[0].reset();
		change_input("#div_start_rank","#span_start_rank",false,0);
		change_input("#div_start_grade","#span_start_grade",false,1);
		change_input("#div_end_rank","#span_end_rank",false,2);
		change_input("#div_end_grade","#span_end_grade",false,3);
		change_input("#div_year","#span_year",false,4);
		change_input("#div_month","#span_month",false,5);
		change_input("#div_name","#span_name",false,6);

			$("#save" ).prop( "disabled", true );
			$("#save").attr("class","btn btn-danger pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-remove");
	}
	
});