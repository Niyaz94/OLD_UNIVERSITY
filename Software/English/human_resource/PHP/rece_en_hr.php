<!DOCTYPE html>
<html lang="en">
<head>
  <title>Received Request</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<script src="../../../need/jquery/jquery-1.12.0.js"></script>
	<link rel="stylesheet" type="text/css" 		 href="../../../need/DataTables/media/css/jquery.dataTables.css"> 
	<link rel="stylesheet" type="text/css" href="../../../CSS/design_milakat_1.css">
  
</head>
<body>
		<?php 
				include("header_en_hr.php");
				include("../../../database.php");
		?>

<div class="container">							

	
<div class="col-sm-10 col-sm-offset-1">
	
	<table id="rece_table" class="table table-striped table-hover">
		<thead><tr><th>Name</th><th>Document Type</th><th>Date</th><th>Action</th></tr></thead>
		<br/><br/>
		<b>
		<tbody class="text-center">	<?php
			if(isset($_SESSION["username"]) && isset($_SESSION["password"])){//bakar det bo auae bzane session ka check kraea
				$ob=new class_database("localhost","root","root","HR");//call class e database krdea
				$sql = "SELECT full_name,message_id,subject,send_date FROM message,employee where employee_id_for=employee_id";
				$output =$ob->return_data($sql);
							
					for($i=0;$i<count($output);$i++){
						$full_name=$output[$i]['full_name'];
						$subject=$output[$i]['subject'];
						$date=$output[$i]['send_date'];
						$id=$output[$i]['message_id'];			
						echo "<tr >";
						echo"<td>$full_name</td>";
						echo"<td>$subject</td>";
						echo"<td>$date</td>";
						echo"<td >
							<button id='seen_$id' type='button' class='btn btn-success btn-sm'><span class='glyphicon glyphicon-fullscreen'></span></button>
							<button id='remove_$id' type='button' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-remove'></span></button>
						</td>";
						echo "</tr>";
					}
				}
		?>	
	
		</tbody></b>
	</table>	


	<div class="modal fade" id="rece_Modal" role="dialog" style="margin-left: auto; margin-right: auto; margin-top: 60px; ">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #454d60; ">  
		<div class="modal-header" style="border-color: #454d60;"><center><h3 style="color: white;">Message Content </h3></center></div>
        <div class="modal-body" style="border-color: #454d60;">	
			<form class="form-horizontal" role="form">	
			<b>
				<div class="form-group">
					<div class="col-sm-12"> 
					  <textarea class="form-control text-center" rows="10" id="content"></textarea>

					</div>
				</div>	  
			</b></form>
        </div>
        <div class="modal-footer" style="border-color: #454d60;"><button type="submit" class="btn btn-danger btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button></div>
   </div></div></div>   
</div></div></div>



	
</div>
<script type="text/javascript" charset="utf8" src="../../../need/DataTables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			var t=$("#rece_table").DataTable({
				"order": [[ 2, "desc" ]]
			});
			  
			  $("button").click(function(){
				  var em_id=$(this).attr("id");
				  var arr = em_id.split("_");
				  
				  if(arr[0]=="remove"){
					$.post(
						"../PHP/rece_en_proc_hr.php",
						{"id":arr[1],"remove":arr[0]}
					);
					t.row($(this).parents('tr')).remove().draw();
				  }else if(arr[0]=="seen"){
					  $.post(
						"../PHP/rece_en_proc_hr.php",
						{"id":arr[1],"seen":arr[0]},
						function(data, status){	
							$("#content").text(data["content"]);
							$("#rece_Modal").modal("show");
						}
					 );
				  }
			  });
			  
			  
		});
	</script>	
</body>
</html>