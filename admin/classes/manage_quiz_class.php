<?php 

class manage_quiz_class
 {


 	public $host="localhost";
 	public $username="root";
 	public $pass="";
 	public $db_name="jtis";
 	public $conn;
 	public $quiz_course_list;
 	public $diff_data;
 	

 	public function __construct()
 	{
 		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
 		if ($this->conn->connect_errno)
 		 {
 			die("connection failed");
 		}
 	}

 	public function display_quiz_courses()
 	{
 		$query="select * from science_branch";
 		$result=$this->conn->query($query);
 		
 		while($row=$result->fetch_array(MYSQLI_ASSOC))
 		{
 			$this->quiz_course_list[]=$row;
 		}
 		return $this->quiz_course_list;
 	}

 	public function display_quiz_difficulty()                
	{
		$query=$this->conn->query("SELECT MIN(id) AS id, difficulty FROM difficulty WHERE difficulty IN ('easy', 'medium', 'hard') GROUP BY difficulty");
		

		while($row=$query->fetch_array(MYSQLI_ASSOC))      
		{	
			$this->diff_data[]=$row;
			

		}
		
		return $this->diff_data;
	}


 	public function add_quiz($query_string)
	{
		$this->conn->query($query_string);
		return true;
	}

	public function add_quiz_identification($query_string)
	{
		$this->conn->query($query_string);
		return true;
	}

	public function edit_quiz(){ // NOT DONE YET
		$query = "SELECT";
	}
}

 ?>