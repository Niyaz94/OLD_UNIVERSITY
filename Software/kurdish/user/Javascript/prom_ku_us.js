$(document).ready(function(){
	
  $("button").click(function(){
		var id = $(this).attr("id").substring(7);
		if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			$.post("../PHP/prom_ku_proc_us.php",
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
  $("#promotion_table").DataTable( {
    "language": {
        "sProcessing":    "Procesando...",
        "sLengthMenu":    "پیشاندانی _MENU_ داخلکراو",
        "sZeroRecords":   "No se encontraron resultados",
        "sEmptyTable":    "هیچ زانیاریەک بەردەست نیە لە خشتەکە",
        "sInfo":          "پیشاندانی داخلکراوەکان لە _START_ تا _END_ لە کۆی  _TOTAL_ داخلکراو",
        "sInfoEmpty":     "پیشاندانی 0 تا 0 لە 0 داخلکراو",
        "sInfoFiltered":  "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":   "",
        "sSearch":        " گه‌ران ",
        "sUrl":           "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":    "Último",
            "sNext":    "دواتر",
            "sPrevious": "پێشتر"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
});	
});