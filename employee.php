<!DOCTYPE html>

<html>

	<head>
		<title>
			test
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
			
			$sql= "SELECT MarkUpHome FROM basecosts";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$MarkUpHome=$row[0];
			
			$sql= "SELECT PerSQF FROM basecosts";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$PerSQF=$row[0];

			$sql= "SELECT EmployeeNumber FROM credentials";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$EmployeeNumber=$row[0];
			
			$sql= "SELECT SupervisorNumber FROM credentials";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$SupervisorNumber=$row[0];
			
			$sql= "SELECT MarkUpMin FROM basecosts";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$MarkUpMin=$row[0];
		?>
		<script>
		
			function present(){
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("res").innerHTML=this.responseText
						document.getElementById("res").style.display=""
						
						document.getElementById("u").innerHTML='<button class="button" onclick="OrderB()"><span>Go Back </span></button>'
					}
				}
				
				xmlhttp.open("GET","tables2.php?",true);
				xmlhttp.send();
			}
			
			
			function OrderB(){
				document.getElementById("res").innerHTML=""
				document.getElementById("res").style.display="none"
				document.getElementById("u").innerHTML='<button class="button" onclick="present()"><span>Orders </span></button>'
				/*		
				var div = document.getElementById("u");
				var button = document.createElement("button");
				button.innerHTML="<span>Orders</span>";
				button.classList.add("button");
				button.style.backgroundColor="#000000";
				button.style.color="#FFFFFF";
				button.style.borderWidth="1px";
				button.style.borderColor="#FFFFFF";
				button.style.borderStyle="solid";
				button.style.padding="10px";
				button.style.cursor="pointer";
				button.onclick=function () {
					if (window.XMLHttpRequest) {
						xmlhttp=new XMLHttpRequest();
					}
					
					xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
							document.getElementById("res").innerHTML=this.responseText
							document.getElementById("res").style.display=""
							
							document.getElementById("u").innerHTML='<button class="button" onclick="present()"><span>Orders </span></button>'
						}
					}
					
					xmlhttp.open("GET","tables.php?",true);
					xmlhttp.send();
				}
				div.appendChild(button);
				*/
			}
			
			
			function check(){
				var radios = document.getElementsByName("wood");

				for (var i = 0; i < radios.length; i++){
					if (radios[i].checked){
						document.getElementById("Alerts").innerHTML=""
						return check2(radios[i].value)
					}
				}
				document.getElementById("Alerts").innerHTML="Please select a type of wood"
				
			}
			
			function check2(wood){
				var WC=0
				if (wood=="Oak"){
					WC=30
				}
				if (wood=="Hickory"){
					WC=45
				}
				if (wood=="Mahogamy"){
					WC=60
				}
				
				height=document.getElementById("Height").value
				length=document.getElementById("Length").value
				width=document.getElementById("Width").value
				var name = document.getElementById("name").value;
				var email = document.getElementById("email").value;
				var Markup=document.getElementById("Markup").value;
				
				if (height>=10){
					if(height<=60){
						if(length>=10){
							if(width>=10){
								if(name!=""){
									if(email!=""){
										if(Markup>=<?php echo $MarkUpMin ?>){
										document.getElementById("Alerts").innerHTML=""
										return Cal(height, length, width, WC)
										}
										else{
										document.getElementById("Alerts").innerHTML="Markup perentage not above requirement"
										}
									}
									else{
									document.getElementById("Alerts").innerHTML="Enter Email"
									}
								}
								else{
								document.getElementById("Alerts").innerHTML="Enter Name"
								}
							}
							else{
							document.getElementById("Alerts").innerHTML="Width too small"
							}
						}
						else{
						document.getElementById("Alerts").innerHTML="Length too small"
						}
					}
					else{
					document.getElementById("Alerts").innerHTML="Height too large"
					}
				}
				else{
				document.getElementById("Alerts").innerHTML="Height too small"
				}
				
			}
			
			function Cal(height, length, width, WC){
				
				CostPerSQF=<?php echo $PerSQF; ?>
				
				heightsqf=height/144
				TableSurfacesqf=length*width/144
				TotalLegsqf=heightsqf*4
				OGC=TotalLegsqf+TableSurfacesqf*CostPerSQF
				
				Markup=document.getElementById("Markup").value;
				
				MarkupMath=Markup/100
				MarkupHold=OGC*MarkupMath
				Final=Math.round(MarkupHold+OGC+WC)
				
				document.getElementById("O").disabled=true;
				document.getElementById("H").disabled=true;
				document.getElementById("M").disabled=true;
				document.getElementById("Height").disabled=true;
				document.getElementById("Length").disabled=true;
				document.getElementById("Width").disabled=true;
				document.getElementById("sumbit").disabled=true;
				document.getElementById("Markup").disabled=true;
				
				var name = document.getElementById("name").value;
				var email = document.getElementById("email").value;
				var wood = document.querySelector("input[name = 'wood']:checked").value;
				
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
			
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						window.location.href = "http://localhost/DeskAssignment/employee.php"
					}
				}
				
				xmlhttp.open("GET","AJAX.php?name="+name+"&email="+email+"&Final="+Final+"&height="+height+"&length="+length+"&width="+width+"&wood="+wood,true);
				xmlhttp.send();
			}
		</script>
	</head>
	
	<body>
	<h1 class="site"><a href="http://localhost/DeskAssignment/">Ikea Desks</a></h1>
		<p class="title"><b>Make Order</b></p>
		<div class="box1">
			<div class="left">
				<h3>Wood:</h3>
				<br>
				<label class="radio">&nbsp;Oak
				<input type="radio" name="wood" id="O" value="Oak">
				<span class="checkmark"></span>
				</label>
				
				<label class="radio">&nbsp;Hickory
				<input type="radio" name="wood" id="H" value="Hickory">
				<span class="checkmark"></span>
				</label>
				
				<label class="radio">&nbsp;Mahogamy
				<input type="radio" name="wood" id="M" value="Mahogamy">
				<span class="checkmark"></span>
				</label>
			</div>
			
			<div class="right">
				<h3>Sizes:</h3>
				<br>
			
				<label> Height (Up-Down): <br></label>
				<input type="number" id="Height" value=0 name="val"><span>IN</span>
				<br>
				
				<label>Length (West-East): <br></label>
				<input type="number" id="Length" value=0 name="val"><span>IN</span>
				<br>
				
				<label>Width (North-South): <br></label>
				<input type="number" id="Width" value=0 name="val"><span>IN</span>
				<br>
				
			</div>
			
			<div class="center">
				<label>Markup Rate(%): <br></label>
				<input type="number" id="Markup" value=0 name="Rate">
				<br>
				<label>Client Name: <br></label>
				<input type="text" id="name">
				<br>
				<label>Client Email: <br></label>
				<input type="text" id="email">
				<br>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div class="center">
		<br>
			<button class="button" type="sumbit" onclick="check()" id="sumbit"><span>Place Order </span></button><p id="Alerts"></p>
		</div>
		
		<hr class="hr"/>
		<div id="u">
			<button class="button" onclick="present()"><span>Orders </span></button>
		</div>
		<br>
		<br>
		<div style="display:none;" id="res">
		</div>
		
	</body>
	
</html>