<!DOCTYPE html>

<html>

	<head>
		<title>
			Manager
		</title>
		
		<link rel="stylesheet" type="text/css" href="style.css">
		
		<script>
			function present1(){
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("res").innerHTML=""
						document.getElementById("res").innerHTML=this.responseText
						document.getElementById("res").style.display=""
					}
				}
				
				xmlhttp.open("GET","tables.php?",true);
				xmlhttp.send();
			}
			
			
			
			function present2(){
				document.getElementById("res").innerHTML=""
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("res").innerHTML=""
						document.getElementById("res").innerHTML=this.responseText
						document.getElementById("res").style.display=""
					}
				}
				
				xmlhttp.open("GET","cred.php?",true);
				xmlhttp.send()
			}
			
			var click1=true
			var click2=true
			var click3=true
			
			function changeEmp(){
				EmployeeNumber = document.getElementById('EmployeeNumber').innerHTML
				var employee = '1';
				if (click1){
					click1=false
					document.getElementById('empnum').innerHTML='<th class="rightloss">Employee Password: </th><th id="EmployeeNumber" class="leftloss">' + EmployeeNumber + '</th><th><button class="button" onclick="changeEmp()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send('+employee+','+EmployeeNumber+')" id="borderloss"><span>Update Password </span></button></th>'
					document.getElementById('supnum').style.display='none'
					document.getElementById('mannum').style.display='none'
					return
				}
				if (!click1){
					click1=true
					document.getElementById('empnum').innerHTML='<th class="rightloss">Employee Password: </th><th id="EmployeeNumber" class="leftloss">' + EmployeeNumber + '</th><th><button class="button" onclick="changeEmp()" id="borderloss"><span>Change </span></button></th>'
					document.getElementById('supnum').style.display=''
					document.getElementById('mannum').style.display=''
					return
				}
			}
			
			function changeSup(){
				SupervisorNumber = document.getElementById('SupervisorNumber').innerHTML
				var supervisor = '2';
				if (click2){
					click2=false
					document.getElementById('supnum').innerHTML='<th class="rightloss">Supervisor Password: </th><th id="SupervisorNumber" class="leftloss">' + SupervisorNumber + '</th><th><button class="button" onclick="changeSup()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send('+supervisor+','+SupervisorNumber+')" id="borderloss"><span>Update Password </span></button></th>'
					document.getElementById('empnum').style.display='none'
					document.getElementById('mannum').style.display='none'
					return
				}
				if (!click2){
					click2=true
					document.getElementById('supnum').innerHTML="<th class='rightloss'>Supervisor Password: </th><th id='SupervisorNumber' class='leftloss'>" + SupervisorNumber + "</th><th><button class='button' onclick='changeSup()' id='borderloss'><span>Change </span></button></th>"
					document.getElementById('empnum').style.display=''
					document.getElementById('mannum').style.display=''
					return
				}
			}
			
			function changeMan(){
				CEONumber = document.getElementById('CEONumber').innerHTML
				var manager = '3';
				if (click3){
					click3=false
					document.getElementById('mannum').innerHTML='<th class="rightloss">Manager Password: </th><th id="CEONumber" class="leftloss">' + CEONumber + '</th><th><button class="button" onclick="changeMan()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send('+ manager +','+CEONumber+')" id="borderloss"><span>Update Password </span></button></th>'
					document.getElementById('supnum').style.display='none'
					document.getElementById('empnum').style.display='none'
					return
				}
				if (!click3){
					click3=true
					document.getElementById('mannum').innerHTML="<th class='rightloss'>Manager Password: </th><th id='CEONumber' class='leftloss'>" + CEONumber + "</th><th><button class='button' onclick='changeMan()' id='borderloss'><span>Change </span></button></th>"
					document.getElementById('empnum').style.display=''
					document.getElementById('supnum').style.display=''
					return
				}
			}
			
			function send(x,y){
				newnum = document.getElementById("newnum").value
				if (newnum==''){
					document.getElementById("Alerts").innerHTML='Please Enter Value!';
					return
				}
				if(x==1){
					var x='EmployeeNumber'
				}
				if(x==2){
					var x='SupervisorNumber'
				}
				if(x==3){
					var x='CEONumber';
				}
				
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						window.location.href = "http://localhost/DeskAssignment/Man.php"
					}
				}
				console.log(x);
				xmlhttp.open("GET","ccred.php?x="+x+"&NN="+newnum,true);
				xmlhttp.send()
			}
		</script>
		
		<script>
			function present3(){
				document.getElementById("res").innerHTML=""
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				
				xmlhttp.onreadystatechange=function() {
					if (this.readyState==4 && this.status==200) {
						document.getElementById("res").innerHTML=""
						document.getElementById("res").innerHTML=this.responseText
						document.getElementById("res").style.display=""
					}
					if (this.readyState==4 && this.status==404) {
						alert("error");
					}
				}
				
				xmlhttp.open("GET","bs.php?",true);
				xmlhttp.send()
			}
			
			var click4 = true;
			var click5 = true;
			var click6 = true;
			
			function changeSQF(){
				PerSQF = document.getElementById('PerSQF').innerHTML
				var fsq = '4';
				if (click4){
					click4=false
					document.getElementById('sqfnum').innerHTML='<th class="rightloss">Cost per sqaure foot: </th><th id="PerSQF" class="leftloss">' + PerSQF + '</th><th><button class="button" onclick="changeSQF()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send2('+fsq+','+PerSQF+')" id="borderloss"><span>Update Costing </span></button></th>'
					document.getElementById('homnum').style.display='none'
					document.getElementById('minnum').style.display='none'
					return
				}
				if (!click4){
					click4=true
					document.getElementById('sqfnum').innerHTML="<th class='rightloss'>Cost per sqaure foot: </th><th id='PerSQF' class='leftloss'>" + PerSQF + "</th><th><button class='button' onclick='changeSQF()' id='borderloss'><span>Change </span></button></th>"
					document.getElementById('homnum').style.display=''
					document.getElementById('minnum').style.display=''
					return
				}
			}
			
			function changeHom(){
				MarkUpHome = document.getElementById('MarkUpHome').innerHTML
				
				var mh = '5';
				console.log(MarkUpHome);
				if (click5){
					click5=false
					document.getElementById('homnum').innerHTML='<th class="rightloss">Online markup for orders (percent): </th><th id="MarkUpHome" class="leftloss">' + MarkUpHome + '</th><th><button class="button" onclick="changeHom()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send2('+mh+','+MarkUpHome+')" id="borderloss"><span>Update Costing </span></button></th>'
					document.getElementById('sqfnum').style.display='none'
					document.getElementById('minnum').style.display='none'
					return
				}
				if (!click5){
					click5=true
					document.getElementById('homnum').innerHTML="<th class='rightloss'>Online markup for orders (percent): </th><th id='MarkUpHome' class='leftloss'>" + MarkUpHome + "</th><th><button class='button' onclick='changeHom()' id='borderloss'><span>Change </span></button></th>"
					document.getElementById('sqfnum').style.display=''
					document.getElementById('minnum').style.display=''
					return
				}
			}
			
			function changeUpMin(){
				Min = document.getElementById('Min').innerHTML
				console.log(Min);
				var mm = '6';
				if (click6){
					click6=false
					document.getElementById('minnum').innerHTML='<th class="rightloss">Company markup minimum (percent): </th><th id="Min" class="leftloss">' + Min + '</th><th><button class="button" onclick="changeUpMin()" id="borderloss"><span>Go Back </span></button></th><th class="rightloss"><input type="number" id="newnum"></th><th class="leftloss"><button class="button" type="button" onclick="send2('+mm+','+Min+')" id="borderloss"><span>Update Costing </span></button></th>'
					document.getElementById('sqfnum').style.display='none'
					document.getElementById('homnum').style.display='none'
					return
				}
				if (!click6){
					click6=true
					document.getElementById('minnum').innerHTML="<th class='rightloss'>Company markup minimum (percent): </th><th id='Min' class='leftloss'>" + Min + "</th><th><button class='button' onclick='changeUpMin()' id='borderloss'><span>Change </span></button></th>"
					document.getElementById('sqfnum').style.display=''
					document.getElementById('homnum').style.display=''
					return
				}
			}
			
			function send2(x,y){
				console.log(x,y);
			}
			
		</script>
		
		
		
		
		
		
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
						window.location.href = "http://localhost/DeskAssignment/Man.php"
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
						window.location.href = "http://localhost/DeskAssignment/Man.php"
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
						window.location.href = "http://localhost/DeskAssignment/Man.php"
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
		<h2>Manager </h2>
		<br>
		<h3>Click to display all factors</h3>
		<hr class="hr"/>
		<table>
			<tr>
				<th id="u">
					<button class="button" id="borderloss" onclick="present1()"><span>Orders </span></button>
					<button class="button" id="borderloss" onclick="present2()"><span>Credentials </span></button>
					<button class="button" id="borderloss" onclick="present3()"><span>BaseCosts </span></button>
					<p id="Alerts" style="display: inline;"></p>
				</th>
			</tr>
		</table>
		<br>
		<br>
		<div style="display:none;" id="res">
		</div>
	</body>
	
</html>