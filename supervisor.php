<!DOCTYPE html>

<html>

	<head>
		<title>
			Supervisor
		</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		
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
			$final = "
			<table class='main'>
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
			$final.= '<tr id='.$rowNumber.'>';
			$final.= '<td>' . $row['ID'] . '</td>';
			$final.= '<td>' . $row['ClientName'] . '</td>';
			$final.= '<td>' . $row['ClientEmail'] . '</td>';
			$final.= '<td>' . $row['TotalCost'] . '</td>';
			$final.= '<td>' . $row['Height'] . '</td>';
			$final.= '<td>' . $row['Length'] . '</td>';
			$final.= '<td>' . $row['Width'] . '</td>';
			$final.= '<td>' . $row['WoodType'] . '</td>';
			$final.= '<td class="x" id="side" style="width: 20px; text-align:center;"></td>';
			$final.= '</tr>';
			++$rowNumber;
			}
			$final.= '</table>';

		?>
		
		<script>
		
		
			function dlete(){
				document.getElementById("Op2").innerHTML = '<h2>Mass Delete</h2><br><hr/><br><h3>Delete all</h3><br><label> Where: <br></label><select id="Where"><option value="name">Name</option><option value="email">Email</option><option value="cost">Cost</option><option value="height">Height</option><option value="length">Length</option><option value="width">Width</option><option value="WT">Woodtype</option></select><br><label>Is: <br></label><input type="text" id="Is" name="val"><br><button class="button" type="sumbit" onclick="Delete2()" id="sumb"><span>Delete all </span></button>'
				
				var Rside = document.getElementsByClassName("x");
				document.getElementById("ad").style.display="none"
				for (i=0; i<Rside.length; i++){
					Rside[i].innerHTML = "<button class='B' onclick='Delete("+i+")'>X</button>";
					Rside[i].style.fontWeight=500;
				}
				document.getElementById("dlete").innerHTML="<span>Go Back</span>"
				document.getElementById("dlete").setAttribute("onclick","GoBack1()");
			}
			function GoBack1(){
				document.getElementById("Op2").innerHTML = ""
				document.getElementById("dlete").innerHTML="<span>Delete Order</span>"
				document.getElementById("dlete").setAttribute("onclick","dlete()");
				document.getElementById("ad").style.display=""
				var Rside = document.getElementsByClassName("x");
				for (i=0; i<Rside.length; i++){
					Rside[i].innerHTML = "";
					Rside[i].style.fontWeight=30;
				}
			}
			function Delete(RowNumber){
				var Row = document.getElementById(RowNumber);
				var Cells = Row.getElementsByTagName("td");
				var IDRow = Cells[0].innerText
				
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						window.location.href = "http://localhost/DeskAssignment/supervisor.php"
					}
				}
				
				xmlhttp.open("GET","delete.php?ID="+IDRow,true);
				xmlhttp.send();
			}
			
			function Delete2(){
				var e = document.getElementById("Where");
				var where = e.options[e.selectedIndex].value;
				
				var is = document.getElementById("Is").value;
				
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						window.location.href = "http://localhost/DeskAssignment/supervisor.php"
					}
				}
				
				xmlhttp.open("GET","deleteW.php?where="+where+"&is="+is,true);
				xmlhttp.send();
			}
			
			
			function change(){
				var Rside = document.getElementsByClassName("x");
				document.getElementById("ead").style.display="none"
				for (i=0; i<Rside.length; i++){
					Rside[i].innerHTML = "<button class='B' onclick='Chang("+i+")'>&lsaquo;</button>";
					Rside[i].style.fontWeight=900;
					Rside[i].style.fontSize="large";
				}
				document.getElementById("change").innerHTML="<span>Go Back</span>"
				document.getElementById("change").setAttribute("onclick","GoBack2()");
			}
			function GoBack2(){
				document.getElementById("Op2").innerHTML = ""
				document.getElementById("change").innerHTML="<span>Change Order</span>"
				document.getElementById("change").setAttribute("onclick","change()");
				document.getElementById("ead").style.display=""
				var Rside = document.getElementsByClassName("x");
				for (i=0; i<Rside.length; i++){
					Rside[i].innerHTML = "";
					Rside[i].style.fontWeight=30;
					Rside[i].style.fontSize="medium";
				}
			}
			function Chang(i){
				var Row = document.getElementById(i);
				var Cells = Row.getElementsByTagName("td");
				var IDRow = Cells[0].innerText
				var Name = Cells[1].innerText
				var Email = Cells[2].innerText
				var TotalCost = Cells[3].innerText
				var Height = Cells[4].innerText
				var Length = Cells[5].innerText
				var Width = Cells[6].innerText
				var WoodType = Cells[7].innerText
				
				if (WoodType=="Oak"){
					set1="Hickory"
					set2="Mahogamy"
				}
				if (WoodType=="Hickory"){
					set1="Oak"
					set2="Mahogamy"
				}
				if (WoodType=="Mahogamy"){
					set1="Hickory"
					set2="Oak"
				}
				
				document.getElementById("Op2").innerHTML = 'Name: <br><input type="text" id="cname" value='+Name+'><br>Email: <br><input type="text" id="cemail" value='+Email+'><br>Cost($): <br><input type="number" id="ccost" value='+TotalCost+'><br>Height(IN): <br><input type="number" id="cheight" value='+Height+'><br>Length(IN): <br><input type="number" id="clength" value='+Length+'><br>Width(IN): <br><input type="number" id="cwidth" value='+Width+'><br>Wood Type: <br><select id="cwoodtype"><option value='+WoodType+'>'+WoodType+'</option><option value='+set1+'>'+set1+'</option><option value='+set2+'>'+set2+'</option></select><br><br><button class="button" type="sumbit" onclick="Change2('+i+')" id="sumb"><span>Change To These Value </span></button><br><p id="Alerts"></p>'
			}
			
			function Change2(i){
				var Row = document.getElementById(i);
				var Cells = Row.getElementsByTagName("td");
				var IDRow = Cells[0].innerText
				
				var NewName = document.getElementById("cname").value;
				var NewEmail = document.getElementById("cemail").value;
				var NewCost = document.getElementById("ccost").value;
				var NewHeight = document.getElementById("cheight").value;
				var NewLength = document.getElementById("clength").value;
				var NewWidth = document.getElementById("cwidth").value;
				var e = document.getElementById("cwoodtype");
				var NewWoodType = e.options[e.selectedIndex].value;
				
				if (NewHeight>=10){
					if(NewHeight<=60){
						if(NewLength>=10){
							if(NewWidth>=10){
								if(NewName!=""){
									if(NewEmail!=""){
									}
									else{
										document.getElementById("Alerts").innerHTML="Enter Email"
										return;
									}
								}
								else{
								document.getElementById("Alerts").innerHTML="Enter Name"
								return;
								}
							}
							else{
							document.getElementById("Alerts").innerHTML="Width too small"
							return;
							}
						}
						else{
						document.getElementById("Alerts").innerHTML="Length too small"
						return;
						}
					}
					else{
					document.getElementById("Alerts").innerHTML="Height too large"
					return;
					}
				}
				else{
				document.getElementById("Alerts").innerHTML="Height too small"
				return;
				}
				
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						if (this.responseText!=""){
							alert(this.responseText);
						}
						window.location.href = "http://localhost/DeskAssignment/supervisor.php"
					}
				}
				
				xmlhttp.open("GET","Change.php?NN="+NewName+"&NE="+NewEmail+"&NC="+NewCost+"&NH="+NewHeight+"&NL="+NewLength+"&NW="+NewWidth+"&NWT="+NewWoodType+"&RowID="+IDRow,true);
				xmlhttp.send();
			}
			
		</script>
	</head>
	
	<body>
		<h1 class="site"><a href="http://localhost/DeskAssignment/">Ikea Desks</a></h1>
		<br>
		<br>
		<h2>Welcome, Supervisor</h2>
		<br>
		<h3>Here are recent orders</h3>
		<br>
		<h2>ORDERS</h2>
		<hr/>
		<div class="left" >
			<?php echo $final; ?>
			<br>
			<table>
				<tr id="borderloss">
					<th id="ead"><button onclick="dlete()" id="dlete" class="button"><span>Delete Order </span></button></th>
					<th id="ad"><button onclick="change()" id="change" class="button"><span>Change Order </span></button></th>
				</tr>
			</table>
			<p id="instructions"></p>
		</div>
		<div class="right" id="Op2">
		</div>
		
	</body>
	
</html>