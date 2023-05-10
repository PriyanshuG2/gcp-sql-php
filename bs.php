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
$sql= "SELECT PerSQF FROM basecosts";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$PerSQF=$row[0];

$sql= "SELECT MarkUpHome FROM basecosts";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$MarkUpHome=$row[0];

$sql= "SELECT MarkUpMin FROM basecosts";
$result= mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);
$MarkUpMin=$row[0];

$result = mysqli_query($link,"SELECT * FROM orders");
echo "<table id='sqfnum'>";
echo "<th class='rightloss'>Cost per sqaure foot: </th><th id='PerSQF' class='leftloss'> $PerSQF </th><th><button class='button' onclick='changeSQF()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";
echo "<br><br>";
echo "<table id='homnum'>";
echo "<th class='rightloss'>Online markup for orders (percent): </th><th id='MarkUpHome' class='leftloss'> $MarkUpHome</th><th><button class='button' onclick='changeHom()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";
echo "<br><br>";
echo "<table id='minnum'>";
echo "<th class='rightloss'>Company markup minimum (percent): </th><th id='Min' class='leftloss'> $MarkUpMin</th><th><button class='button' onclick='changeUpMin()' id='borderloss'><span>Change </span></button></th>";
echo "</table>";
?>