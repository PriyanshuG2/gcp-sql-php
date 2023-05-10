<?php
	$NN = $_REQUEST['NN'];
	$NE = $_REQUEST['NE'];
	$NC = $_REQUEST['NC'];
	$NH = $_REQUEST['NH'];
	$NL = $_REQUEST['NL'];
	$NW = $_REQUEST['NW'];
	$NWT = $_REQUEST['NWT'];
	$ID = $_REQUEST['RowID'];
	
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

	$sql = "UPDATE orders SET ClientName = '$NN', ClientEmail = '$NE', TotalCost = $NC, Height = $NH, Length = $NL, Width = $NW, WoodType = '$NWT' WHERE ID = $ID";
	if ($link->query($sql) === TRUE) {
	} else {
		echo "Error: " . $sql . "<br>" . $link->error;
	}
?>