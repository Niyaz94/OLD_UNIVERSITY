<?php
	include("../../../database.php");//auae bkaea comment ???????? computer jam dakat
class basic_1{
	private $table,$table_special,$table_array,$certificate,$table_result,$table_certificate,$ob;
	
	function __construct(){
			$this->ob=new class_database("localhost","root","root","HR");
			//bakardet bo henanauae salary_table 
			$sql="SELECT rank,grade,basic,increase_salary,increase_year FROM salary_table order by basic";//sql eakaea
			$this->table_result=$this->ob->return_data($sql);
			//bakardet bo henanauae certificate_rule 
			$sql="SELECT cer_name,start_rank,start_grade,end_rank,end_grade,month_period,year_period FROM certificate_rule";
			$this->table_certificate=$this->ob->return_data($sql);	
			
			$this->find_salary_table();
			$this->find_certificate_table();
	}
	public function check_barzkrdnaua($rank,$grade){
		if($this->table[10-$rank][12]==0){
			return -1;//ئه‌گه‌ر له‌ پله‌ 1 بوو هیچ مه‌كه‌
		}else if($grade+1 >= $this->table[10-$rank][12]){// ئه‌گه‌ر كاتی به‌رزكردنه‌وه‌ی هاتبوو
			return 1;
		}else{//ئه‌گه‌ر كاتی به‌رزكردنه‌وه‌ی نه‌هاتبوو
			return 0;
		}
	}
	public function end_salary($salary,$rank,$grade){	
	
		if($rank==1 && $grade==$this->table_result[0]["grade"]){
			return $salary+($this->table[count($this->table)-1][count($this->table[0])-2]);
		}else{
			for($x=0;$x<count($this->table_array);++$x)//به‌كاردێت بۆ دۆزینه‌وه‌ی موچه‌ ئه‌گه‌ر پله‌ و مه‌رته‌به‌ وه‌ستابێت
				if($salary==$this->table_array[$x])
				{
					return $this->table_array[++$x];
					break;
				}	
		}
				
			
	}
	public function table_matrix($rank,$grade){
		return $this->table[count($this->table)-$rank][$grade];
	}	
	public function find_salary_table(){
		$grade=$this->table_result[0]['grade'];
		$counter=0;//bakarset la table_array
		for($i=0,$m=0,$n=0;$i<count($this->table_result);$i++){	
			$row=array();//1 row e lanau xazn dabe
			$basic=$this->table_result[$i]['basic'];//ma3ash bnchenakae dagarentaua
			$increase_salary=$this->table_result[$i]['increase_salary'];	
			$row[0]=$this->table_result[$i]['rank'];
			for($j=1;$j<$grade+1;$j++){//hamu grade ka dabentaua
				$row[$j]=$basic;
				$basic+=$increase_salary;
			}
			$row[$grade+1]=$this->table_result[$i]['increase_year'];//ba chand sal barzdabtaua
			$row[$grade+2]=$this->table_result[$i]['increase_salary'];//chand ma3ashe barz dabtaua
			$row[$grade+3]=$grade;//chand ma3ashe barz dabtaua
			
			if($this->table_result[$i]['increase_year']==-1){//bakardet bo dozenauae table asae
				$this->table_special[$m]=$row;
				++$m;
			}else{
				$this->table[$n]=$row;// bakardet bo dozenauae table taebat
				++$n;
			}
		}
		$counter=0;//aua bakardet bo dozenauae table_array
		for($i=0;$i<count($this->table_result);$i++){	
			$basic=$this->table_result[$i]['basic'];
			$increase_salary=$this->table_result[$i]['increase_salary'];
			if($this->table_result[$i]['increase_year']!=-1)
				for($j=1;$j<$grade+1;$j++){
					$this->table_array[$counter++]=$basic;
					$basic+=$increase_salary;
				}
		}
		
	}
	
	public function check_rank($id,$rank,$certificate){
		for($i=0;$i<count($this->certificate);$i++){
			if($certificate==$this->certificate[$i][0]){
				if($this->certificate[$i][3]<$rank){
					//$sql="UPDATE information SET barzkrdnaua=0 WHERE employee_id_for='$id';";
					return 1;
				}else{
					return 0;
				}
			}
		}	
	}
	public function check_grade($id,$rank,$grade,$certificate){
		for($i=0;$i<count($this->certificate);$i++)
			if($certificate==$this->certificate[$i][0])
				if( $this->certificate[$i][3]>$rank)
					return 1;
			else if($this->certificate[$i][3]<=$rank)
				if($this->certificate[$i][4]>$grade)
					return 1;
				else
					return 0;	
	}
	
	public function find_certificate_table(){
		$arr=array("cer_name","start_rank","start_grade","end_rank","end_grade","month_period","year_period");
		for($i=0;$i<count($this->table_certificate);$i++)
			for($j=0;$j<count($this->table_certificate[0]);$j++)
				$this->certificate[$i][$j]=$this->table_certificate[$i][$arr[$j]];
	}
	
	public function return_table_special(){
		return $this->table_special;
	}
}
?>