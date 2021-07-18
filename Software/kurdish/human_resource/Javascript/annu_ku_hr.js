$(document).ready( function () {
	$("#annual_table").DataTable(
		
  {
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
    }
}
  );
	var t=$("#annual_table").DataTable();
	var id,type,user_data,update_data=[],found_id,counter=1;
	var index_id=["new_salary","old_salary","new_rank","old_rank","new_grade","old_grade","new_annual_date","old_annual_date"];
	var value_id=["employee_id","salary","new_salary","rank","new_rank","grade","new_grade","S_date","new_S_date","new_barz","new_sarm"];
	
	var div_child_id=["div_orderd_by_","div_document_type_","div_order_type_","div_order_number_","div_english_date_","div_kurdish_date_"];
	var input_id=["orderd_by_","document_type_","order_type_","order_number_","english_date_","kurdish_date_"];
	var input_title=["داواکاری لەلایەن","جۆری بەڵگەنامە","جۆری داواکاری","ژمارەی داواکاری","بەرواری ئینگلیزی","بەرواری کوردی"];
	var placeholder=["داواکاری لەلایەن","جۆری بەڵگەنامە","جۆری داواکاری","ژمارەی داواکاری","بەرواری ئینگلیزی","بەرواری کوردی"];
	var input_type=["text","text","text","text","date","date"];
	$("#month_list").change(function(){
		var manth=$("#month_list option:selected" ).text();
		if(manth=="کۆن")
			manth=-1;
		else if(manth=="نوێ")
			manth=13;
		$.post(
			"../PHP/annu_ku_proc_hr.php",
			{"manth":manth},
			function(data, status){	
				user_data=data;
				t.clear().draw();
				var header=["full_name","new_rank","new_grade","new_salary","new_S_date"];
				for(var i=0;i<data.length;i++){
					var tr = $("<tr>", {"id":"tr_"+(i+1)});	
					for(var j=0;j<5;j++){
						var td = $("<td>", {"text":data[i][header[j]]});
						$($(tr)).append($(td));
					}	
					var td = $("<td >",{"class":"text-center"});
					var span1= $("<span>", {"class":"glyphicon glyphicon-edit"});
					var button1= $("<button>", {"id":"edit_"+data[i]["employee_id"],"type":"button", "class":"btn btn-info btn-sm"});
					$($(button1)).append($(span1));
					$($(td)).append($(button1));
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
					var span4= $("<span>", {"class":"glyphicon glyphicon-pencil"});
					var button4= $("<button>", {"id":"change_"+data[i]["employee_id"],"type":"button", "class":"btn btn-primary btn-sm"});
					$($(button4)).append($(span4));
					$($(td)).append($(button4));		
					$($(tr)).append($(td));
					t.row.add(tr).draw(tr);
				}
			}
		);	
		
	});
	$("#annual_table tbody").on("click","button",function(){	
		 var arr = $(this).attr("id").split("_");//id au button ka click e krdea dakata array
		 id=arr[1];//id user kaea
		 type=arr[0];//jore button ka edit,remove,save 
		if(arr[0]=="edit"){//agar click lasar button e edit krd
			 for(var i=0;i<user_data.length;i++)//lanau user kan bgare hata id au kasae dabneaua ka click lasar naue kraea
				if(user_data[i]["employee_id"]==id){//agar id ka eaksan bu
					for(var n=0;n<8;n++)//data e da data form kae
						$("#"+index_id[n]).val(user_data[i][value_id[n+1]]);
					for(var m=0;m<11;m++)//au data eanae ka hatena xazn dakat
						update_data[m]=user_data[i][value_id[m]];
				}
			$("#edit_Modal").modal("show");	//modue edit dabtau
		}else if(arr[0]=="remove"){//agar click lasar button e remove krd
			$("#remove_Modal").modal("show");//module remove krd dabtaua
		}else if(arr[0]=="change"){//agar click lasar button e remove krd
			$("#change_Modal").modal("show");//module change krd dabtaua
		}else if(arr[0]=="save"){//agar click lasar button e save krd
			if(found_id!=id){//bakardet agar user edit nakrd uata rastauxo zaneareakane xazn krd
				for(var i=0;i<user_data.length;i++)//lanau user kan bgare hata id au kasae dabneaua ka click lasar naue kraea
					if(user_data[i]["employee_id"]==id)//agar id ka eaksan bu
						for(var j=0;j<11;j++)//data eakan daxel bka
							update_data[j]=user_data[i][value_id[j]];
			}
			$("#save_Modal").modal("show");//module xazn krdn labo database dabtaua	
		}
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
			value=JSON.stringify(update_data);
			order=JSON.stringify(order);
			$.post("../PHP/annu_ku_proc_hr.php",
			{"info":value,"order":order},
				function(data, status){
					$("#save_Modal").modal("hide");
					t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
				}
			);	
		}
		update_data=[];	
	});
	$("#change_save").click(function(){//bakardet bo delete name ek	
		var check=$("#check_prom").is(":checked");
		if(check==true){
			$.post(
				"../PHP/annu_ku_proc_hr.php",
				{"change":type,"id":id},
				function(data, status){
					if(data==1)
						t.row($("#"+type+"_"+id).parents('tr')).remove().draw();		
				}
			);	
		}
		$("#change_Modal").modal("hide");//module change krd close dabe	
	});	
	
	$("#remove_save").click(function(){//bakardet bo delete name ek
		$.post(
			"../PHP/annu_ku_proc_hr.php",
			{"remove":type,"id":id,"date":$('#new_annual').val()},
			function(data, status){	
				t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
				$("#remove_Modal").modal("hide");
				$('#remove_form')[0].reset();
				$("#remove_save").prop( "disabled",true);		
			}
		);
	});	
	$("#edit_reset").click(function(){//به‌كاردێت بۆ گۆرینه‌وه‌ فۆرمه‌كه‌ له‌بۆ شێوه‌ی سه‌ره‌تا
		for(var i=0;i<user_data.length;i++)
			if(user_data[i]["employee_id"]==id){//bakardet bo dozenauae id user kae
				for(var j=0;j<8;j++){
					$("#"+index_id[j]).val(user_data[i][value_id[j+1]]);//au nrxanae ka darchuena dadata form kae(lauanaea user gorebe)
					change_input("#div_"+index_id[j],"#span_"+index_id[j],true,j);//pash reset krdn hamu input kan dakataua true
					update_data[j+1]=user_data[i][value_id[j+1]];//update_data eakae dakataua defualt
				}
			}
	});
	$("#edit_save").click(function(){
		for(var i=0;i<8;i++){//bakardet bo uargrtne data e nau form aka katek user dast kare dakat
			update_data[i+1]=$("#"+index_id[i]).val();	
			found_id=id;
		}
		$("#edit_Modal").modal("hide");
	});
	
	$('#new_annual').on("keyup mouseup blur",function(){//la table remove bakardet bo auae bzane data e ba tauaue daxel krdea
		if(validation_date($(this).val())){
			$("#remove_save").prop( "disabled",false);		
		}else{
			$("#remove_save").prop( "disabled",true);		
		}
	});
	var found_check=[true,true,true,true,true,true,true,true];
	$('#new_salary,#old_salary,#new_rank,#old_rank,#new_grade,#old_grade,#new_annual_date,#old_annual_date').on("keyup mouseup",function(){	
		check_id=$(this).attr("id");
		if(check_id=="new_salary"){
			if(validation_number($(this).val(),10000000,0)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);		
		}else if(check_id=="old_salary"){
			if(validation_number($(this).val(),10000000,0)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
		}else if(check_id=="new_rank"){
			if(validation_number($(this).val(),11,1)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
		}else if(check_id=="old_rank"){
			if(validation_number($(this).val(),11,1)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,3);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,3);
		}else if(check_id=="new_grade"){
			if(validation_number($(this).val(),12,1)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,4);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,4);
		}else if(check_id=="old_grade"){
			if(validation_number($(this).val(),12,1)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,5);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,5);
		}else if(check_id=="new_annual_date"){
			if(validation_date($(this).val()))
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,6);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,6);
		}else if(check_id=="old_annual_date"){
			if(validation_date($(this).val()))
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,7);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,7);
		}
	});		
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class"," has-feedback has-success col-md-6");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class"," has-feedback has-error col-md-6");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true && found_check[3]==true && found_check[4]==true && found_check[5]==true && found_check[6]==true && found_check[7]==true){
			$("#edit_save").prop( "disabled", false );
			$("#edit_save").attr("class","btn btn-success pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-info");
		}else{
			$("#edit_save" ).prop( "disabled", true );
			$("#edit_save").attr("class","btn btn-danger pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-remove");
		}
	}
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
		var	div_p3 = $("<p>", {"class": "form-control-static","text":"داواکاری :"+counter});		
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
} );