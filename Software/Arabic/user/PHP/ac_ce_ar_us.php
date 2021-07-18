<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
  	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	
	 <script type="text/javascript">
	$(document).ready(function(){
		$('input').tooltip();
	});
   </script>
	<style type="text/css">
		label
		{
		  margin-bottom: 35px !important;
		}
		input[type="search"] {
			border-radius: 5px;

			}
		.dataTables_info , .dataTables_paginate
		{
		   margin-top: 15px !important;
		}
		th{
			background-color: #454d60 !important;
		}
		.table-hover{
			background-color: #dcdfe1 !important;
		}
	</style>
  
</head>
<body>
	<?php include("header_ar_us.php");?>

<div class="container-fluid">							  
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="acceleration_table" class="table table-striped table-hover">
		<thead><tr><th>اسم</th><th>مرتبه الجديد</th><th>درجة الجديد</th><th>عنوان الوضيفي الجديد</th><th>راتب الجديد</th><th>التاريخ السنوات الجديد</th><th>عمل</th></tr></thead>
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
							$sql ="SELECT full_name,service_id,ser_id_for, new_rank,new_grade,new_title,new_salary,new_annual_date\n"
								 ."FROM employee,service,acceleration\n"
								 ."WHERE employee_id_for=employee_id and service_id=ser_id_for and employee_id='$id';";
							$output =$ob->return_data($sql);
							//hamu zanera eakane nau query ka la table kae dabne
							for($i=0;$i<count($output);$i++){
									$ser_id=$output[$i]['service_id'];
									$full_name=$output[$i]['full_name'];
									$rank=$output[$i]['new_rank'];
									$grade=$output[$i]['new_grade'];
									$title=$output[$i]['new_title'];
									$salary=$output[$i]['new_salary'];
									$annual=$output[$i]['new_annual_date'];

								    echo "<tr>";
									echo"<td>$full_name</td>";
									echo"<td>$rank</td>";
									echo"<td>$grade</td>";
									echo"<td>$title</td>";
									echo"<td>$salary</td>";
									echo"<td>$annual</td>";
									echo"<td><button id='button_$ser_id' type='button' class='btn btn-default'><span class='glyphicon glyphicon-th-list'></span></button></td>";
								    echo "</tr>";
							}						  
						}
				}
		?>	

		</tbody></b>
	</table>
		
	<div class="modal modal-lg fade" id="myModal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;"> جمع المعلومات </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_rank" title="مرتبة القديم" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_grade" title="درجة القديم" readonly  data-placement="left"></div>
				</div>	  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_title" title="عنوان الوضيفي القديم" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_salary" title="راتب القديم" readonly data-placement="left"></div>
				</div>  
				<div class="form-group">
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="old_annual" title="التاريخ السنوات القديم" readonly data-placement="left"></div>
					<div class="col-sm-6"> <input type="text" class="form-control text-center" id="period" title="مدة پێشخستن" readonly data-placement="left"></div>
				</div>  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>الغاء</button></div>
   </div></div></div>   
</div></div></div>

	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function(){
		  $("button").click(function(){
				var id = $(this).attr("id").substring(7);
				if(id>0)//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
					$.post("../PHP/ac_ce_ar_proc_us.php",
					{"id":id},
						function(data, status){	
							$("#old_title").val(data[0]["old_title"]);
							$("#old_salary").val(data[0]["old_salary"]);
							$("#old_rank").val(data[0]["old_rank"]);
							$("#old_grade").val(data[0]["old_grade"]);
							$("#old_annual").val(data[0]["old_annual_date"]);
							$("#period").val(data[0]["acceleration_period"]);

							$("#myModal").modal("show");
						}
					);	
		  }); 
		  $("#acceleration_table").DataTable(
		
  {"language": {
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