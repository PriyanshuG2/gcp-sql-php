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

$result = mysqli_query($link,"SELECT * FROM orders");
echo "
<table class='main' style='float:left;'>
	<tr>
		<th>Order ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Cost($)</th>
		<th>Height(IN)</th>
		<th>Lengt(IN)</th>
		<th>Width(IN)</th>
		<th>Wood</th>
		<th class='rotate'>&raquo;</th>
	</tr>
";
$rowNumber=0;
while($row = mysqli_fetch_array($result)){
echo '<tr id='.$rowNumber.'>';
echo '<td>' . $row['ID'] . '</td>';
echo '<td>' . $row['ClientName'] . '</td>';
echo '<td>' . $row['ClientEmail'] . '</td>';
echo '<td>' . $row['TotalCost'] . '</td>';
echo '<td>' . $row['Height'] . '</td>';
echo '<td>' . $row['Length'] . '</td>';
echo '<td>' . $row['Width'] . '</td>';
echo '<td>' . $row['WoodType'] . '</td>';
echo '<td class="x" id="side" style="width: 20px; text-align:center;"></td>';
echo '</tr>';
++$rowNumber;
}
echo '</table>';
?>