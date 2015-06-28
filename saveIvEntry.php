<?php
	session_start();

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$ivDate = $_POST ["ivDate"];
		$ivtime = $_POST ["ivTime"];
		$ptName = $_POST ["ptName"];
		$ivRoom = $_POST ["ptRoom"];
		$ivMix = $_POST ["ivMix"];
		$drugMfr = $_POST ["drugMfr"];
		$drugLot = $_POST ["drugLot"];
		$drugExp = $_POST ["drugExp"];
		$diluent = $_POST ["diluent"];
		$dilMfr = $_POST ["dilMfr"];
		$dilLot = $_POST ["dilLot"];
		$dilExp = $_POST ["dilExp"];
		$qty = $_POST ["qty"];
		$prepBy = $_POST ["prepBy"];
		$userid = $_SESSION["userid"];

		//database connection//
		$dbc = mysqli_connect('localhost','root','','virtua') or die ("Error connecting to mysql server.");
		$query = "insert into ivrecords(ivDate, ivTime, ptName, ptRoom, ivMix, drugMfr, drugLot, drugExp, diluent, dilMfr, dilLot, dilExp, qty, prepBy,userid) value ('$ivDate','$ivtime','$ptName','$ivRoom','$ivMix','$drugMfr','$drugLot','$drugExp','$diluent','$dilMfr','$drugLot','$drugExp','$qty','$prepBy','$userid')";
		
		$return_json = array();

		if (mysqli_query($dbc, $query)) {
			mysqli_close($dbc);
			$_SESSION ['validUser'] = 'yes';
			session_write_close();
			$return_json['error'] = false;
			$return_json['msg'] = "Successful";
		}
		else{
			die('Error: ' . mysqli_error($dbc));
			mysqli_close($dbc);
			$return_json['error'] = true;
			$return_json['msg'] = "Error";
		}

		echo json_encode($return_json);
	}	
?>