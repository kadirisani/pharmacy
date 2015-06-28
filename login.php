<?php
	session_start();
	$msg = "";

	if($_SERVER["REQUEST_METHOD"] == 'POST') {
		$uName = $_POST ["username"];
		$pwd = $_POST ["password"];

		$dbc = mysqli_connect('localhost','root','','virtua')  or die ("Error connecting to the mysql server. ");
		$query = "select firstname, lastname,uid from users where username = '$uName'and password = '$pwd'";

		$result = mysqli_query($dbc, $query)or die ("Could not connect to mysql server. ");

		$rec_found = false;

		$fullName = "";
		$uid = 0;
		while ($row = mysqli_fetch_array($result)) {
			$rec_found = true;
			$fullName = $row['firstname'] . '' . $row['lastname'];
			$uid = $row['uid'];
		}
		
		$return_json = array();

		if($rec_found) {
			$return_json['msg'] = "success";
			$return_json['error'] = false;
			$_SESSION ['userid'] = $uid;
			$_SESSION ['fullName'] = $fullName;
			session_write_close();
		}
		else {
			$return_json['msg'] = "Login failed. Either Username or Password is incorrect.";
			$return_json['error'] = true;
		}

		mysqli_close($dbc);

		echo json_encode($return_json);

	}
?>