$(document).ready(function(){
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/serv_en_proc_us.php",
			{"id":id},
				function(data, status){	
					$("#new_title").val(data[0]["new_title"]);
					$("#old_title").val(data[0]["old_title"]);
					$("#new_salary").val(data[0]["new_salary"]);
					$("#old_salary").val(data[0]["old_salary"]);
					$("#new_rank").val(data[0]["new_rank"]);
					$("#old_rank").val(data[0]["old_rank"]);
					$("#new_grade").val(data[0]["new_grade"]);
					$("#old_grade").val(data[0]["old_grade"]);
					$("#new_annual_date").val(data[0]["new_annual_date"]);
					$("#old_annual_date").val(data[0]["old_annual_date"]);
					$("#myModal").modal("show");
				}
			);	
  }); 
  $("#annual_table").DataTable();		
});