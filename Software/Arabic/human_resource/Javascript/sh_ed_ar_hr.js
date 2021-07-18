$(document).ready(function(){
	var t=$("#promotion_table").DataTable({
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
	});
	$('input').tooltip();
	
 var id=0;
  $("#promotion_table tbody").on("click","button",function(){
	  		 
		 var arr = $(this).attr("id").split("_");//id au button ka click e krdea dakata array
		 id=arr[1];//id user kaea
		 var type=arr[0];//jore button ka edit,remove,save 
		 var type=arr[0];//jore button ka edit,remove,save 
		if(id>0){//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			if(type=="button"){
			$.post("../PHP/sh_ed_ar_proc_hr.php",
			{"id":id,"type":"type"},
				function(data, status){	
					var employee=["full_name","blood_group","current_country","gender","current_city","social_status","current_address","number_of_children","birthday","born_place","email","phone_number"];
					var department=["university_name","college_name","post","department_name","employment_status","employment_date","start_work_date","work_resume_date","place_work","expert","leave_work_balance","approval_ministry","issue_number"];
					var information=["salary","title","rank","grade","S_date","barzkrdnaua","sarmucha","zh_qdam","taebat","molat","sza"];
					var certificate=["cert_name","place_of_issue","date_of_issue"];		
					for(var i=0;i<certificate.length;i++){
						$("#"+certificate[i]).val(data[0][certificate[i]]);
					}
					for(var i=0;i<information.length;i++){
						
						if(information[i]=="barzkrdnaua"){
								$('select#barzkrdnaua option[value="'+data[0]["barzkrdnaua"]+'"]').attr("selected", true);
						}else if(information[i]=="sarmucha"){
								$('select#sarmucha option[value="'+data[0]["sarmucha"]+'"]').attr("selected", true);
						}else if(information[i]=="taebat"){
								$('select#taebat option[value="'+data[0]["taebat"]+'"]').attr("selected", true);
						}else if(information[i]=="molat"){
								if(data[0]["molat"]==1){
									$("#"+information[i]).val("مۆڵه‌تی هه‌یه‌");
								}else if(data[0]["molat"]==0){
									$("#"+information[i]).val("مۆڵه‌تی نیه‌");
								}
						}else if(information[i]=="sza"){
								$('select#sza option[value="'+data[0]["sza"]+'"]').attr("selected", true);
						}else{
							$("#"+information[i]).val(data[0][information[i]]);
						}
					}
					for(var i=0;i<department.length;i++){
						if(department[i]=="employment_status"){
							$('select#employment_status option[value="'+data[0]["employment_status"]+'"]').attr("selected", true);
						}else{
							$("#"+department[i]).val(data[0][department[i]]);
						}
					}
					for(var i=0;i<employee.length;i++){
						if(employee[i]=="gender"){
								$('select#gender option[value="'+data[0]["gender"]+'"]').attr("selected", true);
						}else if(employee[i]=="social_status"){
								$('select#social_status option[value="'+data[0]["social_status"]+'"]').attr("selected", true);
						}else if(employee[i]=="blood_group"){
								$('select#blood_group option[value="'+data[0]["blood_group"]+'"]').attr("selected", true);
						}else{
							$("#"+employee[i]).val(data[0][employee[i]]);
						}
					}	
					$("#username").val(data[0]["user_name"]);
					$("#password").val(data[0]["password"]);
					
					$("#myModal").modal("show");			
				}
			);
			}else if(type=="remove"){
				if (confirm('Are you sure you want to delete this employee')) {
					$.post("../PHP/sh_ed_ar_proc_hr.php",
					{"id":id,"remove":"remove"},
						function(data, status){
							if(data==1)
								t.row($("#"+type+"_"+id).parents('tr')).remove().draw();
						}
					);
				}
				
			}
		}			
  }); 

  $("#save_information").click(function(){	
		var emp_json={
			"name":$("#full_name").val(),
			"email":$("#email").val(),
			"phone":$("#phone_number").val(),
			"gender":$( "select#gender option:selected" ).val(),
			"blood":$( "select#blood_group option:selected" ).val(),
			"birthday":$("#birthday").val(),
			"born_place":$("#born_place").val(),
			"social":$( "select#social_status option:selected" ).val(),
			"child":$("#number_of_children").val(),
			
			"address":$("#current_address").val(),
			"current_city":$("#current_city").val(),
			"current_country":$("#current_country").val(),
		};
		emp_json=JSON.stringify(emp_json);
		
		var dep_json={
			"university":$("#university_name").val(),
			"college":$("#college_name").val(),
			"employment":$("#employment_date").val(),
			"wrd":$("#work_resume_date").val(),
			"swa":$("#start_work_date").val(),
			"Status":$( "select#employment_status option:selected" ).val(),	
			"post":$("#post").val(),
			"department":$("#department_name").val(),
			"pow":$("#place_work").val(),
			"lwb":$("#leave_work_balance").val(),
			"issueno":$("#issue_number").val(),
			"ministry":$("#approval_ministry").val(),
			"expert":$("#expert").val(),
		};	
		dep_json=JSON.stringify(dep_json);
		
		var info_json={
			"salary":$("#salary").val(),
			"doaa":$("#S_date").val(),
			"title":$("#title").val(),
			"rank":$("#rank").val(),
			"grade":$("#grade").val(),
			"zh_qdam":$("#zh_qdam").val(),
			"barzkrdnaua":$( "select#barzkrdnaua option:selected" ).val(),
			"sarmucha":$( "select#sarmucha option:selected" ).val(),	
			"taebat":$( "select#taebat option:selected" ).val(),	
			"sza":$( "select#sza option:selected" ).val()
			
		};
		info_json=JSON.stringify(info_json);
		
		
		if(id>0){
			$.post("../PHP/sh_ed_ar_proc_hr.php",{"id":id,employee: emp_json, department: dep_json, information:info_json},
				function(data, status){
					$("#myModal").modal("hide");			
				}
			);
		}
			
    });
});