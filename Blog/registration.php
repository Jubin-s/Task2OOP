<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration</title>

</head>
<script type="text/javascript">
function namee()
	{
	var nam=document.getElementById("na").value;
	var nam1=/^[a-zA-Z\s]+$/;
	
	if(nam=="")
		{
		
		na.focus();
		return false;
		
		}
	if(nam.match(nam1))
		{
		
		
		}
	else
		{
		
		na.focus();
		return false;
		
		
		}
	}
	function email()
	{
	var nam=document.getElementById("em").value;
	var nam1= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	if(nam=="")
		{
		
		em.focus();
		return false;
		
		}
	if(nam.match(nam1))
		{
		
		
		}
	else
		{
		
		em.focus();
		return false;
		
		
		}
	}
	
	function phnn()
	{
	var ph=document.getElementById("phn").value;
	var ph1=/^[6-9][0-9]+$/;
	if(ph=="")
		{
		
		phn.focus();
		return false;
		}
	if(ph.match(ph1)&& (ph.length==10))
		{
		
		
		}
	else
		{
		
		phn.focus();
		return false;
		}
	}
	
	function psw()
	{
	var ps=document.getElementById("pass").value;
	var ps1=/^[a-zA-Z0-9:@]+$/;
	if(ps=="")
		{
		
		pass.focus();
		return false;
		}
	if(ps.match(ps1)&& (ps.length>=8))
		{
		
		
		}
	else
		{
		
		pass.focus();
		return false;
		}
	}
</script>
<body style="background-image: url(images/reg.jpg);background-size: 1600px;">
</br></br></br></br>
	<form method="post" action="reg.php" style="color:Red">
		<center>
			<table id="table" border="1" style="height:100%" cellpadding="10px" >
				<tr>
					<th colspan="2" style=color:azure>
						Register Here
					</th>
				</tr>
				<tr>
					<th >
						Name
					</th>
					<td>
						<input type="text" style="width:100;padding:10px" id="na" name="name" onblur="namee()" required>
					</td>
				</tr>
				<tr>
					<th>
						Email
					</th>
					<td>
						<input type="text" style="width:100;padding:10px" id="em" name="email" onblur="email()" required>
					</td>
				</tr>
				<tr>
					<th>
						Phone
					</th>
					<td>
						<input type="number" style="width:100;padding:10px" id="phn" name="phone" onblur="phnn()" required>
					</td>
				</tr>
				<tr>
					<th>
						Password
					</th>
					<td>
						<input type="password" id="pass" name="password" onblur="psw()" style="width:100;padding:10px" required>
					</td>
				</tr>
				<tr>
					<th colspan="2">
						<input type="submit" style="width:100;padding:10px;background-color:green;color:white;font-size:15px;" value="Register" onclick ="  namee();  email();  phn();  psw(); ">
					</th>
				</tr>
			</table>
		</center>
	</form>
</body>
</html>