<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
<link href="./css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="./css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
td{
font-family:Times new roman;
font-weight:bold;
}
</style>
<script language="javascript">
<!-- 
 function validation()
{
	var sname=/[^a-zA-Z]/; 
	var semail=/^[0-9a-zA-Z_\.-]+\@[0-9a-zA-Z_\.-]+\.[0-9a-zA-Z_\.-]+$/;
	var ucountry = document.form1.country;
	
	if(document.form1.fname.value=="")
	   {
		alert("Please enter your first name");
		document.form1.fname.focus();
		return false;
	    }
	else if(document.form1.fname.value.length<'3')
	    {
		alert("Minimum name length must be 3");
		document.form1.fname.value="";
		document.form1.fname.focus();
		return false;
	    }
	else if(sname.test(document.form1.fname.value))
	    {
		alert("Please enter valid name");
		document.form1.fname.value="";
		document.form1.fname.focus();
		return false;
	    }		
    else if(document.form1.email.value=="")
	   {
		alert("Please enter your email ID");
		document.form1.email.focus();
		return false;
	   }
	else if(!semail.test(document.form1.email.value))
	   {
		alert("Please enter valid email ID to send password in your email account");
		document.form1.email.value="";
		document.form1.email.focus();
		return false;
	   }	   
	else if(document.form1.password.value=="")
	    {
		alert("Please enter your password");
		document.form1.password.focus();
		return false;
	    }
	else if(document.form1.password.value.length<'4')
	    {
		alert("Minimun password length must be 4");
		document.form1.password.value="";
		document.form1.password.focus();
		return false;
	    }
   else if(document.form1.confpassword.value=="")
	    {
		alert("Please enter your password again");
		document.form1.confpassword.focus();
		return false;
	   }
    else if((document.form1.password.value)!=(document.form1.confpassword.value))
       {
	    alert("Please enter correct password");
	    document.form1.confpassword.value="";
		document.form1.confpassword.focus();
		return false;
       }
	else if(document.form1.branch.value=="")
		 {
		alert("Please select branch");
		document.form1.branch.focus();
		return false;
	     }
	
}
-->
</script>
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;" onload="hidefield()">
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<div><a href="mem103.php" title="MEM-103 Manufacturing Processes-I">Sign In</a><br><br>
<b style="font-size:20px; color:#FF0000">Create your Account</b></div>
<center><table border=0>
<tr>
<td><center><table border=0 cellspacing="20">
<form id="form1" name="form1" method="Post" action="signup.php" onsubmit="return validation();">

<tr><td style="font-size:18px;">First Name<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="fname" size="25" /></td></tr>

<tr><td  style="font-size:18px;">Last Name</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="lname" size="25" /></td></tr>

<tr><td  style="font-size:18px;">Email ID<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="email" size="25" /></td></tr>

<tr><td  style="font-size:18px;">Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="password" size="25" /></td></tr>

<tr><td  style="font-size:18px;">Confirm Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="confpassword" size="25" /></td></tr>

<tr><td  style="font-size:18px;">Branch<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><select id="branch" name="branch">
<option value="">--Select--</option>
<option value="Civil">Civil</option>
<option value="Electrical">Electrical</option>
<option value="Mechanical">Mechanical</option>
<option value="Computer Science">Computer Science</option>
</select></td></tr>

<tr><td  style="font-size:18px;">College</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="college" name="college" size="25" /></td></tr>

<tr><td  style="font-size:18px;">City</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="city" name="city" size="25" /></td></tr>

<tr><td  style="font-size:18px;">State</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="state" name="state" size="25" /></td></tr>

<tr><td></td><td></td><td>
<input type="submit" name="Registration" value="Register" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Clear" value="Clear" onclick="this.form.reset();" /></td></tr>
</form></table></center></td></tr></table></center>
<?php
 	//Opening file to get counter value
	$fp = fopen ("../counter.txt", "r");
	$count_number = fread ($fp, filesize ("../counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("../counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
<br><br><br></div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>