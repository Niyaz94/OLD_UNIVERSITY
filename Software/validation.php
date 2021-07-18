<?php
class class_validation{
		
	public function __construct(){}
			
		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
	function rank_grade($value,$max){
		if (filter_var($value, FILTER_VALIDATE_INT, array("options" => array("min_range"=>1, "max_range"=>$max)))== true)
			return true;
		else
			return false;
	}
		
	function validate_name($username){
		if (preg_match("/^[a-zA-Z]+$/",$username) || preg_match("/\p{Arabic}/u",$username))
			return true;
		else
			return false;
	}
		
	function validate_date($date){
		$test_arr  = explode('-', $date);
		if (count($test_arr) == 3)
			if (checkdate($test_arr[1], $test_arr[2], $test_arr[0]))
				return true;
			else
				return false;
		else
			return false;
	}
		function validate_password($password){
			if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/',$password))
				return true;
			else
				return false;
		}
	}
?>