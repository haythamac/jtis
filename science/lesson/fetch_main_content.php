<?php
session_start();

	$con=mysqli_connect('localhost','root');
	mysqli_select_db($con,'jtis');

	
		$id=$_POST['txt1'];
		echo "hello sunil";
		$q="select * from courses where id=$id";
		$result=mysqli_query($con,$q);
		$res=mysqli_fetch_array($result); 

	?>
    <div class="card col-md-6">
    <?php $_SESSION['message']=$res['description'];
    	$_SESSION['path'] = $res['directory_path'];
            header("location:topics_in.php?course_name=".$res['course_name']); ?>
		</div>

	<?php ?>