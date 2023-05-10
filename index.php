<!DOCTYPE html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta http-equiv="content-type"
    content="text/html; charset=utf-8"/>
		<title>
			Ikea Desks
		</title>
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
			
			$sql= "SELECT CEONumber FROM credentials";
			$result= mysqli_query($link, $sql);
			$row = mysqli_fetch_array($result);
			$CEONumber=$row[0];
		?>
		
		<script>
		
		
			function finalize() {
					var name = document.getElementById("name").value;
					var email = document.getElementById("email").value;
					var wood = document.querySelector("input[name = 'wood']:checked").value;
					
					if (window.XMLHttpRequest) {
						xmlhttp=new XMLHttpRequest();
					}
				
					xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
							var res=this.responseText
							res = res.split(" ");
							var name=res[0]
							var email=res[1]
							console.log(res);
							document.getElementById("name").value=res[0];
							document.getElementById("email").value=res[1];
							document.getElementById("res").innerHTML="Success! <br> Please reload page to order again"
							window.location.href = "http://localhost/DeskAssignment"
						}
					}
					xmlhttp.open("GET","AJAX.php?name="+name+"&email="+email+"&Final="+Final+"&height="+height+"&length="+length+"&width="+width+"&wood="+wood,true);
					xmlhttp.send();
					
					document.getElementById("name").disabled=true;
					document.getElementById("email").disabled=true;
					document.getElementById("sumbitPRT2").disabled=true;
				
				
				
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
				
				if (height>=10){
					if(height<=60){
						if(length>=10){
							if(width>=10){
								document.getElementById("Alerts").innerHTML=""
								return Cal(height, length, width, WC)
								
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
				
				Markup=<?php echo $MarkUpHome; ?>
				
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
				
				document.getElementById("Alerts").innerHTML="The final cost is: <b>$" + Final + "</b><br> Please finalize your order: <br> Name: <br>"
				var div = document.getElementById("Alerts");
				var input = document.createElement("input");
				input.type="text";
				input.id="name";
				div.appendChild(input);
				
				document.getElementById("Alerts").innerHTML+="<br> Email: <br>"
				var div = document.getElementById("Alerts");
				var input = document.createElement("input");
				input.type="text";
				input.id="email";
				div.appendChild(input);
				
				document.getElementById("Alerts").innerHTML+="<br>"
				
				var div = document.getElementById("Alerts");
				var button = document.createElement("button");
				button.innerHTML="<span>Finalize </span>";
				button.id="sumbitPRT2";
				button.classList.add("button");
				button.setAttribute("onclick","finalize()");
				div.appendChild(button);
				document.getElementById("Alerts").innerHTML+='<p id="res"></p>'
				
			}
		</script>
	</head>
	
	<body>
	
	
		<script>
		
		var EmployeeNumber = <?php echo $EmployeeNumber; ?>
		
		var SupervisorNumber = <?php echo $SupervisorNumber; ?>
		
		var CEONumber = <?php echo $CEONumber; ?>
		
		function yet(){
			IDUser = document.getElementById("ID").value
			if (IDUser==EmployeeNumber){
				window.location.href = "http://localhost/DeskAssignment/employee.php"
			}
			else if (IDUser==SupervisorNumber){
				window.location.href = "http://localhost/DeskAssignment/supervisor.php"
			}
			else if (IDUser==CEONumber){
				window.location.href = "http://localhost/DeskAssignment/Man.php"
			}
			else{
				document.getElementById("Alerts2").innerHTML="Incorrect"
			}
		}
		</script>
		
		
		<h1 class="site"><a href="http://localhost/DeskAssignment/">Ikea Desks</a></h1>
		<br>
		<div class="right">
			<p>Staff Member?</p>
			<label> ID: </label>
			<input type="number" id="ID" placeholder="Enter Staff ID Here">
			<button type="button" onclick="yet()" id="change" class="button"><span>Login </span></button>
			<p id="Alerts2"></p>
		</div>
		<br>
		<h2>Buy your desks here for a cheap price or call <h2 id="PhoneNumber"></h2><h2> for cheaper prices </h2>
		<br>
		<br>
		<h3>Pick the wood: </h3>
		<br>
		<div class="Aline">
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
		<br>
		<h3>State Sizes: </h3>
		
		<div class="Aline">
			<label> Height (Up-Down): <br></label>
			<input type="number" id="Height" placeholder=0 name="val"><span>IN</span>
			<br>
			
			<label>Length (West-East): <br></label>
			<input type="number" id="Length" placeholder=0 name="val"><span>IN</span>
			<br>
			
			<label>Width (North-South): <br></label>
			<input type="number" id="Width" placeholder=0 name="val"><span>IN</span>
			<br>
			
			<h4>Min: 10in<br>Max: 60in-Height</h4><br>
		
		
			<button class="button" type="sumbit" onclick="check()" id="sumbit"><span>Place Order </span></button>
			
		</div>
		<div class="Aline" id="PRT2">
			<p id="Alerts"></p>
		</div>
		
	</body>
	
</html>