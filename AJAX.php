<?php
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$TotalCost = $_REQUEST['Final'];
$height = $_REQUEST['height'];
$length = $_REQUEST['length'];
$width = $_REQUEST['width'];
$wood = $_REQUEST['wood'];

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

$sq= "SELECT MAX(ID) FROM orders";
$result= mysqli_query($link, $sq);
$row = mysqli_fetch_array($result);
$max = $row[0];
$max+=1;

$sql = "INSERT INTO orders (ClientName, ClientEmail, TotalCost, Height, Length, Width, WoodType, ID)
	VALUES ('$name', '$email', '$TotalCost', '$height', '$length', '$width', '$wood', '$max')";

if ($link->query($sql) === TRUE) {
} else {
    echo $row;
}


$res = "$name $email";
echo $res;
?>