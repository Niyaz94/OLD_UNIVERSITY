<?php
	class class_molat{	
		private $output;	
		public function __construct($S_date,$year,$month,$day){
			$this->find_new_date($S_date,$year,$month,$day);
		}		
		public function find_new_date($S_date,$year,$month,$day)
		{
			$date=date_create($S_date);
			if(0 < $month && $month < 12 && 0 <= $year && $year<= 5){
				date_modify($date,"+$month months");
				date_modify($date,"+$year years");
				date_modify($date,"+$year days");
			}
			$this->output=date_format($date,"Y-m-d");
		}
		public function output_data(){
			return $this->output;
		}
	}
?>