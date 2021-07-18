$(document).ready(function (){
	$("#certificate_table").DataTable(
 {
    "language": {
        "sProcessing": "جارٍ التحميل...",
                            "sLengthMenu": "أظهر _MENU_ مدخلات",
                            "sZeroRecords": "لم يعثر على أية سجلات",
                            "sInfo": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل",
                            "sInfoEmpty": "يعرض 0 إلى 0 من أصل 0 سجل",
                            "sInfoFiltered": "(منتقاة من مجموع _MAX_ مُدخل)",
                            "sInfoPostFix": "",
                            "sSearch": "ابحث:",
                            "sUrl": "",
                            "oPaginate": {
                                "sFirst": "الأول",
                                "sPrevious": "السابق",
                                "sNext": "التالي",
                                "sLast": "الأخير"
    }
}
}
  );
	var t=$("#certificate_table").DataTable();
	var id=0,type,reset_data=[],update_data=[],found_id,counter=1;
	
	var index_id=["new_salary","old_salary","new_rank","old_rank","new_grade","old_grade","new_annual_date","old_annual_date","new_title","old_title"];
	var value_id=["new_salary","salary","new_rank","rank","new_grade","grade","new_doaa","S_date","new_title","title"];
	var div_child_id=["div_orderd_by_","div_document_type_","div_order_type_","div_order_number_","div_english_date_","div_kurdish_date_"];
	var input_id=["orderd_by_","document_type_","order_type_","order_number_","english_date_","kurdish_date_"];
	var input_title=["ترتيب حسب","نوع الوثيقة","نوع الطلب","رقم الطلب","تاريخ الإنجليزية","تاريخ کردی"];
	var placeholder=["ترتيب حسب","نوع الوثيقة","نوع الطلب","رقم الطلب","تاريخ الإنجليزية","تاريخ کردی"];
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
		placeholder:'بحث...'
	});
	$(ms).on('selectionchange', function(){//به‌كاردێت بۆ دۆزینه‌وه‌یی ئایدی ئه‌و ناوه‌ی كه‌ دیاری كرایه‌
		id=Number(this.getValue());
	});
	
	$('#button_acc').click(function(){
		if(id>0 )//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/cert_ar_proc_hr.php",
			{"id":id,"cert":$("#certificate option:selected").text()},
				function(data, status){
					t.clear().draw();
					update_data=JSON.parse(JSON.stringify(data));
					reset_data=JSON.parse(JSON.stringify(data));
					var header=["full_name","new_salary","new_rank","new_grade","new_doaa"];
						var tr = $("<tr>",{"id":"tr_"+id});	
						for(var j=0;j<5;j++){
							var td = $("<td>", {"text":data[header[j]]});
							$($(tr)).append($(td));
						}
						var td = $("<td >",{"class":"text-center"});
						var span1= $("<span>", {"class":"glyphicon glyphicon-edit"});
						var button1= $("<button>", {"id":"edit_"+data["employee_id"],"type":"button", "class":"btn btn-info btn-sm"});
						$($(button1)).append($(span1));
						$($(td)).append($(button1));
						
						var span2= $("<span>", {"class":"glyphicon glyphicon-save"});
						var button2= $("<button>", {"id":"save_"+data["employee_id"],"type":"button", "class":"btn btn-success btn-sm"});
						$($(button2)).append($(span2));
						$($(td)).append($(button2));	
						$($(tr)).append($(td));	
						
						var span3= $("<span>", {"class":"glyphicon glyphicon-trash"});
						var button3= $("<button>", {"id":"remove_"+data["employee_id"],"type":"button", "class":"btn btn-danger btn-sm"});
						$($(button3)).append($(span3));
						$($(td)).append($(button3));		
						$($(tr)).append($(td));	
						t.row.add(tr).draw(tr);
					}				
			);	
	});
	
	$("#certificate_table tbody").on("click","button",function(){	
		 var arr = $(this).attr("id").split("_");//id au button ka click e krdea dakata array
		 id=arr[1];//id user kaea
		 type=arr[0];//jore button ka edit,remove,save 
		if(arr[0]=="edit"){//agar click lasar button e edit krd
				for(var n=0;n<10;n++)//data e da data form kae
					$("#"+index_id[n]).val(update_data[value_id[n]]);
			$("#edit_Modal").modal("show");	//modue edit dabtau
		}else if(arr[0]=="remove"){//agar click lasar button e remove krd
			t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
			update_data=[];
			reset_data=[];
		}else if(arr[0]=="save"){//agar click lasar button e save krd
			$("#save_Modal").modal("show");//module xazn krdn labo database dabtaua
		}
	});
	$("#edit_reset").click(function(){//به‌كارد?ت ب? گ?رينه‌وه‌ ف?رمه‌كه‌ له‌ب? ش?وه‌ي سه‌ره‌تا
		for(var j=0;j<10;j++){
			$("#"+index_id[j]).val(reset_data[value_id[j]]);//au nrxanae ka darchuena dadata form kae(lauanaea user gorebe)
			change_input("#div_"+index_id[j],"#span_"+index_id[j],true,j);//pash reset krdn hamu input kan dakataua true
			update_data[value_id[j]]=reset_data[value_id[j]];//update_data eakae dakataua defualt
		}
		var x_id="#tr_"+id;
		var tr = $('#certificate_table tbody '+x_id);
		tr.find('td:eq(1)').html($("#new_rank").val());
		tr.find('td:eq(2)').html($("#new_grade").val());
		tr.find('td:eq(3)').html($("#new_salary").val());
		tr.find('td:eq(4)').html($("#new_annual_date").val());
		t.rows(tr).invalidate().draw(true);
	});
	$("#edit_save").click(function(){
		for(var i=0;i<10;i++){//bakardet bo uargrtne data e nau form aka katek user dast kare dakat
			update_data[value_id[i]]=$("#"+index_id[i]).val();	
		}
		$("#edit_Modal").modal("hide");
			var x_id="#tr_"+id;
			var tr = $('#certificate_table tbody '+x_id);
			tr.find('td:eq(1)').html($("#new_rank").val());
			tr.find('td:eq(2)').html($("#new_grade").val());
			tr.find('td:eq(3)').html($("#new_salary").val());
			tr.find('td:eq(4)').html($("#new_annual_date").val());
			t.rows(tr).invalidate().draw(true);
	});
	$("#save_save").click(function(){
				
		var order=[];
		if(id>0 && counter >= 1){//ئه‌گه‌ر هيچ ناوه‌ك دياري نه‌كرابوو ئه‌وه‌ هيچ مه‌كه‌
			for(var i=1,k=0;i<counter;i++,k++){//bakardet bo uargrtne content e order kan
				var index=[];
				for(var j=0;j<6;j++){
					index[j]=$("#"+input_id[j]+i+"").val();
				}
				order[k]=index;
			}
			value=JSON.stringify(update_data);
			order=JSON.stringify(order);
			$.post("../PHP/cert_ar_proc_hr.php",
			{"info":value,"order":order},
				function(data, status){
					$("#save_Modal").modal("hide");
					t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
					reset_data=[];
					update_data=[];
					id=0;
				}
			);
		}
	});
	
	var found_check=[true,true,true,true,true,true,true,true,true,true];
	$('#new_salary,#old_salary,#new_rank,#old_rank,#new_grade,#old_grade,#new_annual_date,#old_annual_date,#new_title,#old_title').blur(function(){	
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
			if(validation_number($(this).val(),11,0)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
		}else if(check_id=="old_rank"){
			if(validation_number($(this).val(),11,0)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,3);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,3);
		}else if(check_id=="new_grade"){
			if(validation_number($(this).val(),12,0)==true)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,4);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,4);
		}else if(check_id=="old_grade"){
			if(validation_number($(this).val(),12,0)==true)
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
		}else if(check_id=="new_title"){
			if(			validation_text(	$(this).val()	)	)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,8);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,8);
		}else if(check_id=="old_title"){
			if(		validation_text(	$(this).val()	)	)
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,9);
			else
				change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,9);
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
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true && found_check[3]==true && found_check[4]==true && found_check[5]==true 
			&& found_check[6]==true && found_check[7]==true && found_check[8]==true && found_check[9]==true){
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
		var	div_p3 = $("<p>", {"class": "form-control-static","text":"طلب:"+counter});		
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