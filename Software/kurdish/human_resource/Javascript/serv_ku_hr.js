$(document).ready(function (){
var t=$("#service_table").DataTable({
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
});	
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
		placeholder:"گه‌ران....",
	});
	var id=0,counter=1;
	$(ms).on('selectionchange', function(){
		id=Number(this.getValue());
	});
	$('#button_ser').click(function(){//bakar det bo peshan dane button ka
		if(id>0)//agar hech select nakrbu ....ba aesh nakat
			$("#myModal1").modal("show");
	});	
	$('#continue').click(function(){
		$("#myModal1").modal("hide");
		$("#myModal2").modal("show");
	});	
	var div_child_id=["div_orderd_by_","div_document_type_","div_order_type_","div_order_number_","div_english_date_","div_kurdish_date_"];
	var input_id=["orderd_by_","document_type_","order_type_","order_number_","english_date_","kurdish_date_"];
	var input_type=["text","text","text","text","date","date"];
	var input_title=["داواکاری لەلایەن","جۆری بەڵگەنامە","جۆری داواکاری","ژمارەی داواکاری","بەرواری ئینگلیزی","بەرواری کوردی"];
	var placeholder=["داواکاری لەلایەن","جۆری بەڵگەنامە","جۆری داواکاری","ژمارەی داواکاری","بەرواری ئینگلیزی","بەرواری کوردی"];
	var service_id=["#salary","#doaa","#title","#rank","#grade","#increasing","#service_type","#service_period","#from","#to"];
	$('#save').click(function(){
		var order=[],info_value=[];
		if(id>0 && counter > 1){//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
		
			for(var i=1,k=0;i<counter;i++,k++){//bakardet bo uargrtne content e order kan
				var index=[];
				for(var j=0;j<6;j++){
					index[j]=$("#"+input_id[j]+i+"").val();
				}
				order[k]=index;
			}

			for(var i=0;i<10;i++){
				 info_value[i]=$(service_id[i]).val();
			}
			value=JSON.stringify(info_value);
			order=JSON.stringify(order);
			$.post("../PHP/serv_ku_proc_hr.php",
			{"info":value,"order":order,"id":id},
				function(data, status){
					if(data==1){
						close();
						$("#myModal2").modal("hide");
						$("#error_Modal").modal("show");
					}else{
						var parsed = JSON.parse(data);		
						t.clear().draw();
						var tr = $("<tr>", {"id":"tr_"});
						
						var td = $("<td>", {"text":info_value[2]});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":parsed.title});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":info_value[0]});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":parsed.salary});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":info_value[3]});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":parsed.rank});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":info_value[4]});
						$($(tr)).append($(td));
						var td = $("<td>", {"text":parsed.grade});
						$($(tr)).append($(td));
						

						t.row.add(tr).draw(tr);
					
					close();
					$("#myModal2").modal("hide");
					}
					
				}
			);	
		}			
	});
	var found_check=[false,false,false,false,false,false,false,false,false,false];//ده‌بی هه‌مووی راست بی ئه‌وجه‌ ده‌توانی زانیاری بنێری
	$('#salary').on("keyup mouseup",function(){//له‌بۆ ته‌ماشاكردنی مووچه‌
		if(Number($(this).val()) && $(this).val()>0)//ژماره‌بی و له‌ سفر گه‌وره‌تر بی
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});
	$('#doaa').on("keyup mouseup change",function(){//به‌بۆ ته‌ماشاكردنی به‌روار
		if(	/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/.test($(this).val()))
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});
	$('#title').on("keyup mouseup",function(){//له‌بۆ ته‌ماشاكردنی ناونیشان
		if(/^([A-Za-z ]+|[\u0600-\u06FF ]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
	});
	$('#rank').on("keyup mouseup",function(){//له‌بۆ ته‌ماشاكردنی په‌
		if(	Number($(this).val()) && $(this).val()>0 && $(this).val()<11)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,3);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,3);
		found_salary();		
	});
	$('#grade').on("keyup mouseup",function(){//له‌بۆ ته‌ماشا كردنی مه‌رته‌به‌
		if(Number($(this).val()) && $(this).val()>0 && $(this).val()<12)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,4);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,4);
		found_salary();
	});	
	$('#increasing').on("keyup mouseup",function(){//له‌بۆ ته‌ماشاكردنی ناونیشان
		if(/^([A-Za-z 0-9]+|[\u0600-\u06FF 0-9]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,5);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,5);
	});
	$('#service_type').on("keyup mouseup",function(){//
		if(/^([A-Za-z ]+|[\u0600-\u06FF ]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,6);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,6);
	});
	$('#service_period').on("keyup mouseup",function(){//
		if(/^([A-Za-z 0-9]+|[\u0600-\u06FF 0-9]+)$/.test($(this).val()))
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,7);
		else
			 change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,7);
	});
	$('#from').on("keyup mouseup change",function(){//
		if(	/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/.test($(this).val()))
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,8);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,8);
	});
	$('#to').on("keyup mouseup change",function(){//
		if(	/^(19|20)\d{2}-(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])$/.test($(this).val()))
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,9);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,9);
	});
	function change_input(div,span,check,index){
		if(check==true){//ئه‌گه‌ر راست بو ئیندێكسه‌ی ده‌كاته‌ راست
			found_check[index]=true;
			$(div).attr("class","has-feedback has-success col-md-6");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;//ئه‌وه‌ و ئی سه‌رێ به‌كاردێت بۆ گۆرینی نیشانه‌كان له‌كاتی راست و هه‌ڵه‌بوونی ئه‌و نرخانه‌ی كه‌ به‌كار هێنه‌ر داخیلی ده‌كات
			$(div).attr("class","has-feedback has-error col-md-6");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){//ئه‌گه‌ر هه‌مووی راست بێت ئه‌وه‌ ده‌توانی بتنه‌كه‌ی دابگری
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true && found_check[3]==true && found_check[4]==true 
			&& found_check[5]==true && found_check[6]==true && found_check[7]==true && found_check[8]==true && found_check[9]==true)
			$("#continue").prop( "disabled", false );
		else
			$("#continue" ).prop( "disabled", true );
	}
	function found_salary(){//به‌كاردێت بۆ دۆزینه‌وه‌ مه‌عاش به‌هۆیی پله‌ و مه‌رته‌به‌
		if(found_check[3]==true && found_check[4]==true){
			var rank=parseInt($("#rank").val());
			var grade=parseInt($("#grade").val());
			var basic=140;
			var salary=[4 ,5,5,6,6,7,10,12,17,20];//له‌هه‌ر پله‌ك ساڵانه‌ چه‌ند سه‌رمووچه‌ی به‌رزده‌بته‌وه‌		
			for (var i = 0; i <10-rank; i++)//دۆزینه‌وه‌ی پله‌كه‌ی
				basic+=((10*salary[i])+salary[i+1]);
			basic+=((grade-1)*(salary[10-rank]));//دۆزینه‌وه‌ی مه‌رته‌به‌كه‌ی
			$("#salary").val(basic+"000");//گۆرینی نرخه‌كه‌ی
			$("#salary").prop( "disabled", false );//بتوانی ده‌ستكاری بكه‌ی
			change_input("#div_salary","#span_salary",true,0);//نیشانه‌كه‌ی بكاته‌ راست چونكه‌ نرخه‌كه‌ی ئێره‌ هه‌مووجارێ راسته‌
		}
	}
	$("#add").click(function(){				
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
	
	$("#remove").click(function(){	
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
	$('#previous').click(function(){
		$("#myModal1").modal("show");
		$("#myModal2").modal("hide");
	});	
	$('#close').click(function(){
		close();
	});	
	$("#service_table").DataTable();
	function close (){
		$('#service_form')[0].reset();
		change_input("#div_salary","#span_salary",true,0);
		change_input("#div_doaa","#span_doaa",false,1);
		change_input("#div_title","#span_title",false,2);
		change_input("#div_rank","#span_rank",false,3);
		change_input("#div_grade","#span_grade",false,4);
		change_input("#div_increasing","#span_increasing",false,5);
		change_input("#div_service_type","#span_service_type",false,6);
		change_input("#div_service_period","#span_service_period",false,7);
		change_input("#div_from","#span_from",false,8);
		change_input("#div_to","#span_to",false,9);
		$("#salary").prop( "disabled",true);		

		/*bakardet bo delete data e form e 2am*/
		for(;counter>1;)
		if(counter>1){
			var remove1="#div_1_"+(counter-1);
			var remove2="#div_2_"+(counter-1);
			var remove3="#div_3_"+(counter-1);
			$(remove1).remove();
			$(remove2).remove();	
			$(remove3).remove();			
			--counter;
		}	
	}
});