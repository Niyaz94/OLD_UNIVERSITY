<?php
	class class_database{
		private $conn;
		public function __construct($servername,$username,$password,$db_name){
			$this->conn = new mysqli($servername,$username,$password,$db_name);
			if ($this->conn->connect_error)
				die("Connection failed: " . $this->conn->connect_error);
			$this->conn->query("SET NAMES 'utf8'"); 
			$this->conn->query('SET CHARACTER SET utf8');
		}
		function __destruct() {
			$this->conn->close();
		}	
		public function return_data($sql_code){
			if($data=$this->conn->query($sql_code))
				return $data->fetch_all(MYSQLI_ASSOC);
		}
		public function insert_data($sql_code){
			$this->conn->query($sql_code);
			return $this->conn->insert_id;
		}
		public function insert_prepare($sql_code,$orderd_by,$order_number,$order_type,$document_type,$date_en,$date_ku,$ser_id_for,$ser_type_for){
			$stmt=$this->conn->prepare($sql_code);
			$stmt->bind_param("ssssssis",$orderd_by,$order_number,$order_type,$document_type,$date_en,$date_ku,$ser_id_for,$ser_type_for);
			$stmt->execute();
			$stmt->close();
		}
		public function update_data($sql_code){
			if($this->conn->query($sql_code))
				return true;
			else
				return false;
		}
		
		public function delete_data($sql_code){
			if($this->conn->query($sql_code))
				return true;
			else
				return false;
		}
	}
?>