$(document).ready(function(){
	
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/prom_en_proc_us.php",
			{"id":id},
				function(data, status){	
					$("#old_title").val(data[0]["old_title"]);
					$("#old_salary").val(data[0]["old_salary"]);
					$("#old_rank").val(data[0]["old_rank"]);
					$("#old_grade").val(data[0]["old_grade"]);
					$("#myModal").modal("show");
				}
			);	
  }); 
  $("#promotion_table").DataTable();	
});