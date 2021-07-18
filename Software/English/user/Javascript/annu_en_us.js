$(document).ready(function(){
	
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/annu_en_proc_us.php",
			{"id":id},
				function(data, status){	
					$("#new_salary").val(data[0]["new_salary"]);
					$("#old_salary").val(data[0]["old_salary"]);
					$("#title").val(data[0]["title"]);
					$("#qdam").val(data[0]["qdam"]);
					$("#myModal").modal("show");
				}
			);	
  }); 
  $("#annual_table").DataTable();
});