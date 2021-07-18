$(document).ready(function(){
	
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/annu_ar_proc_us.php",
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
 $("#annual_table").DataTable(
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