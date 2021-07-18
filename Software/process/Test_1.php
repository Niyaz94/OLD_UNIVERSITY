<?php
			include("peshxstn.php");
			$result=array(
				array(
					"employee_id"=>12,
					"full_name"=>"niyaz",
					"S_date"=>"2017-3-1",
					"zh_qdam"=>0,
					"molat"=>0,
					"sza"=>0
				),
				array(
					"employee_id"=>15,
					"full_name"=>"niyaz",
					"S_date"=>"2017-3-1",
					"zh_qdam"=>3,
					"molat"=>0,
					"sza"=>0
				)
			);
			/*$old=array(
				"cer_name"=>"بكالۆریۆس",
				"start_rank"=>7,
				"start_grade"=>1,
				"end_rank"=>1,
				"end_grade"=>11,
				"month_period"=>0,
				"year_period"=>0,
				"year_to_finish"=>4
			);
			
			$new=array(
				"cer_name"=>"دكتۆرا",
				"start_rank"=>5,
				"start_grade"=>1,
				"end_rank"=>1,
				"end_grade"=>11,
				"month_period"=>6,
				"year_period"=>1,
				"year_to_finish"=>2
			);
			$info=array(
				"full_name"=>"niyaz",
				"cert_name"=>"بكالۆریۆس",
				"S_date"=>"2017-3-1",
				"rank"=>2,
				"grade"=>1,
				"salary"=>1500000,
				"barzkrdnaua"=>0,
				"sarmucha"=>1
		);*/
				
		$bru=new class_peshxstn_supas($result);
		
		echo "<pre>";
			print_r($bru->return_data());
		echo "</pre>";
		
		/*$basic=new basic_1();
		echo "<pre>";
			print_r($basic->out());
		echo "</pre>";*/
?>