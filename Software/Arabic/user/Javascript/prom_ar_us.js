$(document).ready(function(){
	
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/prom_ar_proc_us.php",
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
  $("#promotion_table").DataTable(	

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
});