<?php  

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
/**
 * 
 */
class examUsers
{
	public $host="localhost";
	public $username="root";
	public $pass="";
	public $db_name="jtis";
	public $conn;
	public $data;
	public $cat_data;
	public $diff_data;
	public $questios_details;
	public $rand_row;
	public $exam_score_data;
	public $activity_log;
	public $session_grading;
	public $exam_taken;

	public function __construct()               //it is the constructor called automatically when we create object
	{
		$this->conn=new mysqli($this->host,$this->username,$this->pass,$this->db_name);
		if ($this->conn->connect_errno) 
		{
			die("database connection failed".$this->conn->connect_errno);
		}
	}

	

	public function getLessonGrading(){
		// get grading
		$query = $this->conn->query("SELECT * FROM science_branch");
		while($row=$query->fetch_assoc()){
			$this->session_grading[] = $row;
		}

		return $this->session_grading;

	}

	public function showProfileExamScore(){
		
		$current_user_id = $_SESSION['user']['user_id'];

		// get score exam details in database
		$query=$this->conn->query("SELECT * FROM score_exam WHERE student_id = $current_user_id");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->exam_score_data[] = $row;
		}
		return $this->exam_score_data;
	}

	public function showProfileExamScoreAdmin(){
		

		// get score exam details in database
		$query=$this->conn->query("SELECT * FROM score_exam");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->exam_score_data[] = $row;
		}
		return $this->exam_score_data;
	}

	public function showActivityLog(){

		$current_user_id = $_SESSION['user']['user_id'];
		// get activity log in database
		$query=$this->conn->query("SELECT * FROM activity_log");
		while($row=$query->fetch_array(MYSQLI_ASSOC)){
			$this->activity_log[] = $row;
		}
		return $this->activity_log;
	}


	public function signup($data)                 //funtion for signup(called in signup_submit.php)
	{
		$this->conn->query($data);
		return true;
	}

	public function login($email,$pass)                  // funtion for login(called in login_submit.php)
	{
		
		$query=$this->conn->query("select email,password from users where email='$email' and password='$pass'");
		$query->fetch_array(MYSQLI_ASSOC);

		if ($query->num_rows>0) 
		{	
			$_SESSION['email']=$email;
			return true;
		}
		else
		{
			return false;
		}

	}

	public function show_users_profile($email)  		 //function to diaplay the users profile
	{
		$query=$this->conn->query("select * from user_info where email='$email'");
		$row=$query->fetch_array(MYSQLI_ASSOC);

		if ($query->num_rows>0) 
		{	
			$this->data[]=$row;

		}
		return $this->data;
	}

	public function show_courses()                //function to diaplay the course list in dropdown box
	{
		$query=$this->conn->query("select * from category");

		while($row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
		{	
			$this->cat_data[]=$row;
			

		}
		
		return $this->cat_data;
	}

	public function show_difficulty()                // function to display the course list in dropdown box
	{
		$query=$this->conn->query("select * from difficulty");

		while($row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
		{	
			$this->diff_data[]=$row;
			

		}
		
		return $this->diff_data;
	}

	public function show_taken_exam()
	{
		$query = $this->conn->query("SELECT * FROM exam_taken WHERE user_id='" . $_SESSION["user"]["user_id"] . "'");  

		while($row = $query->fetch_array(MYSQLI_ASSOC))
		{
			$this->exam_taken[] = $row;
		}
		return $this->exam_taken;
	}


	public function show_questions($course_id, $diff_type)
	{
		$query=$this->conn->query("select * from question_exam where course_id='$course_id' AND difficulty='$diff_type' ORDER BY RAND()");

		while($this->rand_row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
		{	
			$this->questios_details[]=$this->rand_row;
			

		}
		
		return $this->questios_details;
	}

	public function show_questions_identification($course_id, $diff_type)
	{
		$query=$this->conn->query("select * from question_exam_identification where course_id='$course_id' AND difficulty='$diff_type' ORDER BY RAND()");

		while($this->rand_row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
		{	
			$this->questios_details[]=$this->rand_row;
			

		}
		
		return $this->questios_details;
	}

	public function show_result($data)

	{
		$ans=implode("", $data);    // to break the $data into string chunk bcoz $data is an array
		$course_id=$_SESSION['cat_id'];  // the session variable is created in question_show.php file
		$diff_type=$_SESSION['difficulty'];
		$right=0;
		$wrong=0;
		$no_answer=0;
		$query = array();

		if($diff_type != 'hard'){
			$query=$this->conn->query("select id,answer from question_exam where course_id='$course_id' AND difficulty='$diff_type'");
			while($this->rand_row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
			{	
				$answer_id = $this->rand_row['id'];
				$answer = "SELECT answer FROM question_exam WHERE id='$answer_id'";
				$result = $this->conn->query($answer);
				$correct_answer = mysqli_fetch_assoc($result)['answer'];


				if ($_POST[$this->rand_row['id']]=="no_attempt") {  // if user didnt selected any answer      
					$no_answer++;
				}
				elseif (strtolower($correct_answer) == strtolower($_POST[$this->rand_row['id']])){    //if answer is match 
					$right++;
				}
				else
				{
					$wrong++;                          // if wrong answer is selected by user
				}

			}
		}elseif($diff_type == 'hard'){
			$query=$this->conn->query("select id,answer from question_exam_identification where course_id='$course_id' AND difficulty='$diff_type'");

			while($this->rand_row=$query->fetch_array(MYSQLI_ASSOC))      // while loop to fetch all data one by one and store in cat_data array variable
			{	
				$answer_id = $this->rand_row['id'];
				$identification_answer = "SELECT answer FROM question_exam_identification WHERE id='$answer_id'";
				$result = $this->conn->query($identification_answer);
				$correct_answer = mysqli_fetch_assoc($result)['answer'];


				if ($_POST[$this->rand_row['id']]=="no_attempt") {  // if user didnt selected any answer      
					$no_answer++;
				}
				elseif (strtolower($correct_answer) == strtolower($_POST[$this->rand_row['id']])){    //if answer is match 
					$right++;
				}
				else
				{
					$wrong++;                          // if wrong answer is selected by user
				}

			}
		}
		$array=array();                //creating an array
		$array['right']=$right;         // putting the values inside the array
		$array['wrong']=$wrong;
		$array['not_attempted']=$no_answer;
		return $array;					//returning the array filled with above values

		
	}



	public function add_exam($query_string)
	{
		$this->conn->query($query_string);
		return true;
	}

}













?>