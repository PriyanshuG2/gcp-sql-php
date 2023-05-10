<?php
	$is = $_REQUEST['is'];
	$where = $_REQUEST['where'];
	
	if ($where=="name"){
		$where = "clientname";
	}
	
	if ($where=="email"){
		$where = "ClientEmail";
	}
	
	if ($where=="height"){
		$where = "Height";
	}
	
	if ($where=="length"){
		$where = "Length";
	}
	
	if ($where=="width"){
		$where = "Width";
	}
	
	if ($where=="cost"){
		$where = "TotalCost";
	}
	
	if ($where=="WT"){
		$where = "WoodType";
	}
	
	$link = mysqli_connect('localhost', 'root', '');
	if (!$link){
		$output = 'Unable to connect to the database server ';
		echo $output;
	}


	if (!mysqli_set_charset($link, 'utf8')){
		$output = 'Unable to set database connection encoding ';
		echo $output;
	}


	if (!mysqli_select_db($link, 'deskassignment')){
		$output = 'Unable to locate the deskassignment database ';
		echo $output;
	}

	$sql = "DELETE FROM orders WHERE $where='$is'";
	if ($link->query($sql) === TRUE) {
	} 
	else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
?>