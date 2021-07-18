<?php
	$mysql = new mysqli("localhost","root","","human_resources_4");

	$mysql->query("SET NAMES 'utf8'");
	$mysql->query('SET CHARACTER SET utf8');
    $result = $mysql->query("select employee.employee_id,full_name,S_date,salary,rank,grade,title from employee,information where information.employee_id_for=employee.employee_id;");
    $rows = array();
    while($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $rows[] =$row;
    }
    echo json_encode($rows,JSON_UNESCAPED_UNICODE);
    $result->close();
    $mysql->close();

?>