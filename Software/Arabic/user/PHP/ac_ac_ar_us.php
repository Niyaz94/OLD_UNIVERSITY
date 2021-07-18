<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
  	<link rel="stylesheet" type="text/css" href="../../../CSS/css_table_date.css">
	
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
  
</head>
<body>
	<?php include("header_ar_us.php");?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="ac_ac_table" class="table table-striped table-hover">
		<thead><tr><th>اسم</th><th>نوع الوثيقة</th><th>التاريخ</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				if(isset($_SESSION["username"]) && isset($_SESSION["password"])){//bakar det bo auae bzane session ka check kraea
					$user=$_SESSION["username"];
					$pass=$_SESSION["password"];
					$sql = "SELECT emp_id FROM user where user_name='$user';";//id au employee dadoztaua ka daxele system kae bua
						$ob=new class_database("localhost","root","","human_resources_4");//call class e database krdea
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
	</script>
</body></html>