<!DOCTYPE html>
<html lang="en">
<head>
  <title>پێشخستنی سوپاس و پێزانین</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
   	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	    <link rel="stylesheet" type="text/css" 		 href="../../../CSS/css_table_data.css">

  
</head>
<body">

	<?php include("header_ku_us.php");?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="ac_ac_table" class="table table-striped table-hover">
		<thead><tr><th>ناو</th><th>جۆری بەڵگەنامە</th><th>بەروار</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				if(isset($_SESSION["username"]) && isset($_SESSION["password"])){//bakar det bo auae bzane session ka check kraea
					$user=$_SESSION["username"];
					$pass=$_SESSION["password"];
					$sql = "SELECT emp_id FROM user where user_name='$user';";//id au employee dadoztaua ka daxele system kae bua
						$ob=new class_database("localhost","root","root","HR");//call class e database krdea

						$result =$ob->return_data($sql);
						if(count($result)==1){//agar result la 1 zeatr bu hech maka chunka deara 2 kas ba haman username u password e haea
							$id=$result[0]["emp_id"];	
							$sql ="SELECT full_name,document_type,date_en\n"
								 ."FROM employee,service,orders\n"
								 ."WHERE employee_id_for=employee_id and service_id=ser_id_for and ser_type_for=service_type and service_type='thanks' and employee_id='$id' group by ser_id_for";
							$output =$ob->return_data($sql);
							//hamu zanera eakane nau query ka la table kae dabne
							for($i=0;$i<count($output);$i++){
									$full_name=$output[$i]['full_name'];
									$type=$output[$i]['document_type'];
									$date=$output[$i]['date_en'];
									
								    echo "<tr>";
									echo"<td>$full_name</td>";
									echo"<td>$type</td>";
									echo"<td>$date</td>";
								    echo "</tr>";
							}						  
						}
				}
		?>	
		</tbody></b>
	</table>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			  $("#ac_ac_table").DataTable(	
		 {
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
}
  );
});
	</script>
</body></html>