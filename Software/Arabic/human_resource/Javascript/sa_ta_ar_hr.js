$(document).ready(function (){	
	var t=$("#salary_table").DataTable({
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
		},"order": [[ 1,"desc" ]]
	});	
	var id=0;
	$("#salary_table tbody").on("click","button",function(){	
		var em_id=$(this).attr("id");
		var arr = em_id.split("_");
		id=arr[1];	
		$("#myModal").modal("show");
	});

	$("#save").click(function(){
		if(id>0){
			$.post("../PHP/sa_ta_ar_proc_hr.php",
			{"id":id,"basic":$("#basic").val(),"salary":$("#salary_increase").val(),"year":$("#rank_year").val()},
				function(data, status){
					if(data==1){
						var x_id="#tr_"+id;
						var tr =$('#salary_table tbody '+x_id);
						
						var basic=Number($("#basic").val());
						var increase=Number($("#salary_increase").val());
						for(var i=1;i<12;i++){
							var index_xx="td:eq("+i+")";
							tr.find(index_xx).html(basic);
							basic+=increase;
						}
						tr.find('td:eq(12)').html($("#salary_increase").val());
						tr.find('td:eq(13)').html($("#rank_year").val());
						
						t.rows(tr).invalidate().draw(true);
						
						$("#myModal").modal("hide");
						id=0;
						close();
					}
				}
			);
		}
	});
	var found_check=[false,false,false];
	$('#basic').on("keyup mouseup",function(){
		if(Number($(this).val()) && $(this).val()>0 && $(this).val()<1000000)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,0);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,0);
	});	
	$('#salary_increase').on("keyup mouseup",function(){
		if(Number($(this).val()) && $(this).val()>0 && $(this).val()<1000000)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,1);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,1);
	});	
	$('#rank_year').on("keyup mouseup",function(){
		if(Number($(this).val()) && $(this).val()>0 && $(this).val()<12)
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),true,2);
		else
			change_input("#div_"+$(this).attr("id"),"#span_"+$(this).attr("id"),false,2);
	});		
	function change_input(div,span,check,index){
		if(check==true){
			found_check[index]=true;
			$(div).attr("class","col-md-offset-3 has-feedback has-success col-md-6");
			$(span).attr("class","glyphicon glyphicon-ok form-control-feedback");
			check_button();
		}else{
			found_check[index]=false;
			$(div).attr("class","col-md-offset-3 has-feedback has-error col-md-6");
			$(span).attr("class","glyphicon glyphicon-remove form-control-feedback");
			check_button();
		}
	}	
	function check_button(){
		if(found_check[0]==true && found_check[1]==true && found_check[2]==true){
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
		change_input("#div_basic","#span_basic",false,0);
		change_input("#div_salary_increase","#span_salary_increase",false,1);
		change_input("#div_rank_year","#span_rank_year",false,2);
			$("#save" ).prop( "disabled", true );
			$("#save").attr("class","btn btn-danger pull-right");
			$("#span_save").attr("class","glyphicon glyphicon-remove");
	}
	
});