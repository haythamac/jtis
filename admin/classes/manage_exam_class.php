<?php 

class manage_exam_class
 {


 	public $host="localhost";
 	public $username="root";
 	public $pass="";
 	public $db_name="jtis";
 	public $conn;
 	public $exam_course_list;
 	public $diff_data;
 	

 	public function __construct()
 	{
 		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
 		if ($this->conn->connect_errno)
 		 {
 			die("connection failed");
 		}
 	}

 	public function display_exam_courses()
 	{
 		$query="select * from science_branch";
 		$result=$this->conn->query($query);
 		
 		while($row=$result->fetch_array(MYSQLI_ASSOC))
 		{
 			$this->exam_course_list[]=$row;
 		}
 		return $this->exam_course_list;
 	}

 	public function display_exam_difficulty()                
	{
		$query=$this->conn->query("SELECT MIN(id) AS id, difficulty FROM difficulty WHERE difficulty IN ('easy', 'medium', 'hard') GROUP BY difficulty");
		

		while($row=$query->fetch_array(MYSQLI_ASSOC))      
		{	
			$this->diff_data[]=$row;
			

		}
		
		return $this->diff_data;
	}


 	public function add_exam($query_string)
	{
		$this->conn->query($query_string);
		return true;
	}

	public function add_exam_identification($query_string)
	{
		$this->conn->query($query_string);
		return true;
	}

	public function edit_exam(){ // NOT DONE YET
		$query = "SELECT";
	}
}

 ?>