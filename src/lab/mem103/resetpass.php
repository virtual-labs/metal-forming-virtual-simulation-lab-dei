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
font-weight:bold;
}
</style>
<script language="javascript">
<!-- 
 function validation()
{
	if(document.reset.email.value=="")
	   {
		alert("Please enter your email ID");
		document.reset.email.focus();
		return false;
	   }
	else if(document.reset.currpassword.value=="")
	    {
		alert("Please enter current password");
		document.reset.currpassword.focus();
		return false;
	    }   
	else if(document.reset.password.value=="")
	    {
		alert("Please enter new password");
		document.reset.password.focus();
		return false;
	    }
	else if(document.reset.password.value.length<'4')
	    {
		alert("Minimun password length must be 4");
		document.reset.password.value="";
		document.reset.password.focus();
		return false;
	    }
   else if(document.reset.confpassword.value=="")
	    {
		alert("Please enter your password again");
		document.reset.confpassword.focus();
		return false;
	   }
    else if((document.reset.password.value)!=(document.reset.confpassword.value))
       {
	    alert("Please enter correct password");
	    document.reset.confpassword.value="";
		document.reset.confpassword.focus();
		return false;
       }
}
-->
</script>
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header">
<br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div  style="min-height:500px">
<div><a href="mem103.php" title="MEM-103 Manufacturing Processes-I">Sign In</a><br /><br /><br /></div>

<center><table border=0 cellspacing="15" bgcolor="#FFCC99">
<form id="reset" name="reset" method="POST" onsubmit="return validation();">

<th colspan="3" style="font-size:20px; color:#0000FF">Change your Password</th>
<tr></tr>
<tr></tr>
<tr><td  style="font-size:18px; color:blue;">Email ID<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="text" name="email" size="25" /></td></tr>

<tr><td  style="font-size:18px; color:blue;">Current Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="currpassword" size="25" /></td></tr>

<tr><td  style="font-size:18px; color:blue;">New Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="password" size="25" /></td></tr>

<tr><td  style="font-size:18px; color:blue;">Confirm New Password<img src="images/arsterix.gif"></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input type="password" name="confpassword" size="25" /></td></tr>

<tr><td style="font-size:18px; color:blue;"><label for="securitycode">Security Code<img src="images/arsterix.gif"></label></td><td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
<td><input id="securitycode" name="securitycode" size="25" type="text" /></td></tr>

<tr><td colspan="2"></td><td>
<img src="captcha.php" id="captcha_security" />&nbsp;&nbsp;&nbsp;
<a href="#" onclick="document.getElementById('captcha_security').src='captcha.php?'+Math.random();" id="change-captcha">
<img src="images/refresh_icon.jpg" height="25" width="25" title="Refresh"></a></td></tr>

<tr><td colspan="3" style="font-size:18px; color:red; text-align:center;">&nbsp;<span id="info"></span></td></tr>
<tr><td colspan="2"></td><td><input type="submit" name="Update" value="Update" /></td></tr>
</form></table></center></center>
<?php
	include("config.inc.php");
	$date = @date('Y-m-d H:i:s');
	$pwd=trim($_POST["password"]);

	global $db, $db_host, $db_user, $db_password;
	$conn = mysql_connect($db_host,$db_user,$db_password);
	if (!$conn) {
	die("ERROR: " . mysql_error() . "\n");
	}
	mysql_select_db($db);

if(isset($_POST[Update]))
{
if( $_SESSION['code'] == $_POST['securitycode'] ) 
{
	$dquery=mysql_query("select Email, Password from mem103");
	while($dv=mysql_fetch_array($dquery))
	{
	if($dv["Email"]===$_POST["email"] && $dv["Password"]===$_POST["currpassword"])
	{
	$query="update mem103 set Password='".$pwd."',Date='".$date."' where Email = '".$_POST["email"]."'";
	mysql_query($query);
	
	//Sending an automatic email
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: ' . "\r\n";
	$message="Welcome,&nbsp;Your password has been changed in MEM-103 Manufacturing Processes-I.<br>Your new password is:&nbsp;".$pwd;
	@mail($_POST["email"],"Reset Password",$message,$headers);
	echo ("<SCRIPT LANGUAGE='JavaScript'>alert('Your Password has been changed');</SCRIPT>");
	$f=0;
	exit;
}
else $f=1;
}
if($f===1)
{
echo "<script language=\"javascript\">document.getElementById('info').innerHTML=\"Email ID and Current Password do not<br>match with your record,<br>Please enter valid email ID and Password\"</script>";
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