<?php
	include 'includes/db.php';
	if(isset($_POST['submit_form'])){
		$name = strip_tags($_POST['au_name']);
		$au_file = strip_tags($_POST['au_file']);
		$fl_IMG = strip_tags($_POST['fl_IMG']);
	
		$ins_sql = "UPDATE AudioGuide (au_name, au_file, fl_IMG) VALUES ('$name', '$au_file', '$fl_IMG')" ;
		$run_sql = mysqli_query($conn, $ins_sql);
	}else{
		echo "this doesnt work";
	}
?>