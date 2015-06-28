<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
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

		//database connection//
		$dbc = mysqli_connect('localhost','root','','virtua') or die ("Error connecting to mysql server.");
		$query = "select * from ivrecords where ptName = '$ptName'";

		$result = mysqli_query($dbc, $query)or die ("Could not connect to mysql server. ");

		$rec_found = false;

		$dbRecs = "";
		$uid = 0;
		while ($row = mysqli_fetch_array($result)) {
			if ($rec_found == false){
				$dbRecs = "<table border=1><tr>";
				$dbRecs .= "<td>Date</td>";
				$dbRecs .= "<td>Time</td>";
				$dbRecs .= "<td>Patient Name</td>";
				$dbRecs .= "<td>Room</td>";
				$dbRecs .= "<td>IV Mixture</td>";
				$dbRecs .= "<td>Mfr</td>";
				$dbRecs .= "<td>Lot#</td>";
				$dbRecs .= "<td>Exp</td>";
				$dbRecs .= "<td>Diluent</td>";
				$dbRecs .= "<td>Mfr</td>";
				$dbRecs .= "<td>Lot#</td>";
				$dbRecs .= "<td>Exp</td>";
				$dbRecs .= "<td>Qty</td>";
				$dbRecs .= "<td>PrepBy</td></tr>";
				$rec_found = true;
			}
			$dbRecs .= "<tr>";
				$dbRecs .= "<td>" . $row['ivDate'] . "</td>";
				$dbRecs .= "<td>" . $row['ivTime'] . "</td>";
				$dbRecs .= "<td>" . $row['ptName'] . "</td>";
				$dbRecs .= "<td>" . $row['ptRoom'] . "</td>";
				$dbRecs .= "<td>" . $row['ivMix'] . "</td>";
				$dbRecs .= "<td>" . $row['drugMfr'] . "</td>";
				$dbRecs .= "<td>" . $row['drugLot'] . "</td>";
				$dbRecs .= "<td>" . $row['drugExp'] . "</td>";
				$dbRecs .= "<td>" . $row['diluent'] . "</td>";
				$dbRecs .= "<td>" . $row['dilMfr'] . "</td>";
				$dbRecs .= "<td>" . $row['dilLot'] . "</td>";
				$dbRecs .= "<td>" . $row['dilExp'] . "</td>";
				$dbRecs .= "<td>" . $row['qty'] . "</td>";
				$dbRecs .= "<td>" . $row['prepBy'] . "</td></tr>";

		}
		
		$return_json = array();

		if($rec_found) {
			$dbRecs .= "</table>";
			$return_json['msg'] = $dbRecs;
			$return_json['error'] = false;
		}
		else {
			$return_json['msg'] = "Your search returned zero results.";
			$return_json['error'] = true;
		}

		mysqli_close($dbc);

		echo json_encode($return_json);
	}	
?>