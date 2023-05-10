<?php

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
$sql= "SELECT EmployeeNumber FROM credentials";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$EmployeeNumber=$row[0];

$sql= "SELECT SupervisorNumber FROM credentials";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$SupervisorNumber=$row[0];

$sql= "SELECT CEONumber FROM credentials";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$CEONumber=$row[0];

$result = mysqli_query($link,"SELECT * FROM orders");
echo "<table id='empnum'>";
echo "<th class='rightloss'>Employee Password: </th><th id='EmployeeNumber' class='leftloss'> $EmployeeNumber </th><th><button class='button' onclick='changeEmp()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";
echo "<br><br>";
echo "<table id='supnum'>";
echo "<th class='rightloss'>Supervisor Password: </th><th id='SupervisorNumber' class='leftloss'> $SupervisorNumber </th><th><button class='button' onclick='changeSup()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";
echo "<br><br>";
echo "<table id='mannum'>";
echo "<th class='rightloss'>Manger Password: </th><th id='CEONumber' class='leftloss'> $CEONumber </th><th><button class='button' onclick='changeMan()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";

?>