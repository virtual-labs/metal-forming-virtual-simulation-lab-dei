<?php session_start(); ?>
<!DOCTYPE HTML>
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
color:blue;
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
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header">
<br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div>
<div><a href="mem103.php" title="MEM-103 Manufacturing Processes-I">Sign In</a><br /><br /></div>
<center><table border=0 cellspacing="15" bgcolor="#FFCC99">
<form id="form1" name="form1" method="POST" onsubmit="return validation();">

<th colspan="3" style="font-size:20px; color:#0000FF">Create your Account</th>
<tr></tr>
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
<option value="Agriculture">Agriculture</option>
<option value="Civil">Civil</option>
<option value="Electrical">Electrical</option>
<option value="Footwear">Footwear</option>
<option value="Mechanical">Mechanical</option>
</select></td></tr>

<tr><td style="font-size:18px;">College</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="college" name="college" value="Dayalbagh Educational Institute" size="25" readonly /></td></tr>

<tr><td style="font-size:18px;">City</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="city" name="city" size="25" /></td></tr>

<tr><td style="font-size:18px;">State</td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" id="state" name="state" size="25" /></td></tr>

<tr><td style="font-size:18px;"><label for="securitycode">Security Code<img src="images/arsterix.gif"></label></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input id="securitycode" name="securitycode" type="text" /></td></tr>

<tr><td></td><td></td><td>
<img src="captcha.php" id="captcha_security" />&nbsp;&nbsp;&nbsp;
<a href="#" onclick="document.getElementById('captcha_security').src='captcha.php?'+Math.random();" id="change-captcha">
<img src="images/refresh_icon.jpg" height="25" width="25" title="Refresh"></a></td></tr>

<tr><td colspan="3" style="font-size:18px; color:red; text-align:center; decoration:blink;">&nbsp;<span id="info"></span></td></tr>

<tr><td colspan="3" style="text-align:center;">
<input type="submit" name="Registration" value="Register" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="Clear" value="Clear" onclick="this.form.reset();" /></td></tr>

</form></table></center>
<?php
	include("config.inc.php");
	$date = @date('Y-m-d H:i:s');
	$user=$_POST["fname"]."&nbsp;".$_POST["lname"];
	$pwd=trim($_POST["password"]);

	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db($db);

if(isset($_POST[Registration]))
{
if( $_SESSION['code'] == $_POST['securitycode'] ) {
	$dquery=mysql_query("select Email from mem103");
	while($dv=mysql_fetch_array($dquery))
	{
	if($dv["Email"]===$_POST["email"])
	{
	echo ("<SCRIPT LANGUAGE='JavaScript'>alert('You have already registered in MEM-103 Manufacturing Processes-I');</SCRIPT>");
	$f=0;
	exit;
	}
	else $f=1;
	}
	if($f===1)
	{
	$query="insert into mem103(Fname,Lname,Email,Password,Branch,College,City,State,Date) 
	values('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$pwd."',
	'".$_POST["branch"]."','".$_POST["college"]."','".$_POST["city"]."','".$_POST["state"]."','".$date."')";
	mysql_query($query);
	
//Sending an automatic email
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . "\r\n";
$message="Welcome,&nbsp;".$user.".&nbsp;Your registration is successful in MEM-103 Manufacturing Processes-I.<br>Your Email ID:&nbsp;".$_POST["email"]."<br/>Password:&nbsp;".$pwd;
@mail($_POST["email"],"Registration",$message,$headers);
echo ("<SCRIPT LANGUAGE='JavaScript'>alert('Thankyou for registration');</SCRIPT>");
}
}
else echo "<script language=\"javascript\">document.getElementById('info').innerHTML=\"Invalid Security Code\"</script>";
unset($_SESSION['code']);
}
?>
<br></div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>