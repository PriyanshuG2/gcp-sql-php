<?php
	$NewNum = $_REQUEST['NN'];
	$x = $_REQUEST['x'];
	
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

	$sql = "UPDATE credentials SET $x = '$NewNum' WHERE ID = 1";
	if ($link->query($sql) === TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
?>