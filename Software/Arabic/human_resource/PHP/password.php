<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
	<link href="../../../need/magicsuggest/magicsuggest.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>

	
	<style>
		.custom, .custom input {
			color: blue;
			background: #ECEEFF !important;
			border-radius: 0 !important;
		}
	</style>
  
</head>
<body>
<?php 
	include("header_ar_hr.php");
	include("../../../database.php");
?>

<div class="container">
<div class="col-sm-10 col-sm-offset-1">
<br/><br/><br/>
		<form class="form form-horizontal" action="#" method="post">
			<div class="form-group">	
				<div class="col-md-offset-4 col-md-3"><input  id="search_acc"  class="form-control" name="countries[]"></div>
				<div class="col-md-1"><button id="button_acc"  type="button" class="btn btn-primary "><span class="	glyphicon glyphicon-pencil"></span></button></div>
			</div>
		</form>
		
		
		<br/><br/><br/>
		<table id="password_table" class="table table-striped table-hover">
		<thead><tr><th>&nbsp;&nbsp;اسم</th><th>&nbsp;&nbsp;نوع الوثيقة</th><th>&nbsp;&nbsp;تاريخ</th></tr></thead>
		<br/><br/>
		<b>
		<tbody>	
		<?php
				
			$ob=new class_database("localhost","root","","human_resources_4");
			$sql ="SELECT employee_id,full_name,user_name,level FROM user,employee WHERE employee_id=emp_id and level='admin'";
			$output =$ob->return_data($sql);
			for($i=0;$i<count($output);$i++){
				$id=$output[$i]['employee_id'];
				$full_name=$output[$i]['full_name'];
				$username=$output[$i]['user_name'];
				$level=$output[$i]['level'];
									
				echo "<tr id='tr_$id'>";
					echo"<td>$full_name</td>";
					echo"<td>$username</td>";
					echo"<td>$level</td>";
				echo "</tr>";
		 }						  
		?>	
		</tbody></b>
	</table>
		
		
		
		
		
		
		<div class="modal fade" id="password_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
		<div class="modal-dialog modal-sm">
		  <div class="modal-content" style="background-color: #454d60; ">  
			<div class="modal-header" style="border-color: #454d60;">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<center><h4 style="color: white;"> مستوى كلمة المرور</h4></center></div>
			<div class="modal-body" style="border-color: #454d60;">	
				<form id="remove_form" class="form-horizontal" role="form">	
				<b>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3"><select id="leveel" class="form-control"  >
								<option selected >المستعمل</option>
								<option>مشرف</option>
						</select></div>	
				</div>							
				</b></form>
			</div>
			<div class="modal-footer" style="border-color: #454d60;">
				<button id="password_save" type="button" class="btn btn-success btn-default pull-right"><span class="glyphicon glyphicon-save"></span>حفظ</button>
			</div>
	   </div></div></div> 
		
  </div>
</div>


    <script src="../../../need/magicsuggest/magicsuggest.js"></script>
	<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
<script>
	$(document).ready(function (){
			$("#password_table").DataTable(
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

	
	var t=$("#password_table").DataTable();
		
	var ms=$('#search_acc').magicSuggest({
		data: '../PHP/magic_database.php',
		valueField: 'employee_id',
		displayField: 'full_name',
		allowFreeEntries: false,
		maxSelection: 1,
		maxDropHeight: 150,
		hideTrigger : false,
		highlight :true,
		expandOnFocus: true,
		placeholder:'بحث بلوق...'
	});
	var id=0;
	$(ms).on('selectionchange', function(){//به‌كاردێت بۆ دۆزینه‌وه‌یی ئایدی ئه‌و ناوه‌ی كه‌ دیاری كرایه‌
		id=Number(this.getValue());
	});	
	
	$('#password_save').click(function(){
		if(id>0 ){//ئه‌گه‌ر هیچ ناوه‌ك دیاری نه‌كرابوو ئه‌وه‌ هیچ مه‌كه‌
			var level=$("#leveel option:selected").text();
			if(level=="مشرف"){
				level="admin";
			}else if(level=="المستعمل"){
				level="user";
			}
			$.post("password_proc.php",
			{"id":id,"level":level},
				function(data, status){
					if(data==0){
						t.row("#tr_"+id).remove().draw();
					}else if(data["employee_id"]>0){
						var header=["full_name","user_name","level"];
						
						var tr = $("<tr>",{"id":"tr_"+data["employee_id"]});	
						
						for(var j=0;j<3;j++){
							var td = $("<td>", {"text":data[header[j]]});
							$($(tr)).append($(td));
						}
						t.row.add(tr).draw(tr);
					}
				}
			);
		}
		$("#password_Modal").modal("hide");

	});
	
	$('#button_acc').click(function(){
		if(id>0 )
			$("#password_Modal").modal("show");
	});			
});
	</script>
</body>
</html>