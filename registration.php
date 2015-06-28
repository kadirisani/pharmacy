<?php
	if($_SERVER["REQUEST_METHOD"] == 'POST') {
		$fName = $_POST ["firstname"];
		$lName = $_POST ["lastname"];
		$email = $_POST ["email"];
		$uName = $_POST ["username"];
		$pwd = $_POST ["password"];

		$dbc = mysqli_connect('localhost','root','','virtua')  or die ("Error connecting to the mysql server. ");

		$query = "insert into users(firstname,lastname,email,username,password)value('$fName','$lName','$email','$uName','$pwd')";

		$myArray = array();

		if (mysqli_query($dbc, $query)) {
			$myArray['msg'] = "happened";
		}
		else{
			$myArray['msg'] = "notHappened";
		}

		mysqli_close($dbc);
		
		echo json_encode($myArray);
	}
?>