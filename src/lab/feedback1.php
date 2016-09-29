<?php 
session_start();
ini_set("display_errors","Off");
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml1">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
td{
font-size: 16px;
line-height: 18px;
}
</style>
<script language="javascript">
<!-- 
var isNS = (navigator.appName == "Netscape") ? 1 : 0;
  if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
  function mischandler(){
   return false;
 }
  function mousehandler(e){
 	var myevent = (isNS) ? e : event;
 	var eventbutton = (isNS) ? myevent.which : myevent.button;
    if((eventbutton==2)||(eventbutton==3)) return false;
 }
 document.oncontextmenu = mischandler;
 document.onmousedown = mousehandler;
 document.onmouseup = mousehandler;
 
 function validation()
{
	var semail=/^[0-9a-zA-Z_\.-]+\@[0-9a-zA-Z_\.-]+\.[0-9a-zA-Z_\.-]+$/;
	
	if(document.feedbackform.name.value=="")
	   {
		alert("Enter your name");
		document.feedbackform.name.focus();
		return false;
	    }
	else if(document.feedbackform.name.value.length<'3')
	    {
		alert("Minimum name length must be 3");
		document.feedbackform.name.value="";
		document.feedbackform.name.focus();
		return false;
	    }	   
	else if(document.feedbackform.deptName.value=="")
	    {
		alert("Please enter your Institute/College with place");
		document.feedbackform.deptName.focus();
		return false;
	    }
	else if(document.feedbackform.class.value=="")
		 {
		alert("Please enter class with Semester");
		document.feedbackform.class.focus();
		return false;
	     }		
    else if(document.feedbackform.email.value=="")
	   {
		alert("Please enter your email");
		document.feedbackform.email.focus();
		return false;
	   }
	else if(!semail.test(document.feedbackform.email.value))
	   {
		alert("Please enter correct email");
		document.feedbackform.email.value="";
		document.feedbackform.email.focus();
		return false;
	   }
}
-->
</script>
</head>
<body bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
ini_set("display_errors","Off");
include("mainmenu.php");
?>
</ul></div>
<script>
// Google Analytic Code
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-57409344-1', 'auto');
  ga('send', 'pageview');
</script>
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style="padding-left:35px;">
<center><br/><b style="font-size:1.6em; color:#ff00ff; text-decoration:underline">Metal Forming Virtual Simulation Lab - Feedback</b>
<div style="font-family:arial; font-size:2em; color:#ff0000;" id="message"></div></center><br>
<FORM name="feedbackform" METHOD="post" onSubmit="return validation()">
<table>
<tr>
<td>A) Name:<img src="images/arsterix.gif"></td>
<td><input type="text" size="50px" name="name"></td><td>&nbsp;&nbsp;&nbsp;</td>
<td></td></tr>
<tr>
<td>B) College/Company with place:<img src="images/arsterix.gif"></td>
<td><input type="text" size="50px" name="deptName"></td></tr>
<tr>
<td>C) Class with Semester / Designation:<img src="images/arsterix.gif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td><input type="text" name="class" size="50"></td></tr>
<tr>
<td>D) Email ID:<img src="images/arsterix.gif"></td>
<td><input type="text" name="email" size="50"></td></tr>
</table><br />
<table border="0"><tr>
<td>Please put forward your opinion by electing any one :</td>
<td>Excellent&nbsp;&nbsp;</td><td>Very Good&nbsp;&nbsp;</td>
<td>Good&nbsp;&nbsp;</td><td>Fair&nbsp;&nbsp;</td><td>Poor</td></tr>

<tr><td>1) The objective of the metal forming processes are clearly defined.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio1" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio1" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>2) The process simulations can be easily understood
&nbsp;&nbsp;&nbsp;&nbsp;<br> by the student.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio2" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio2" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>3) The analysis of process was found to be easy.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio3" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio3" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>4) The supporting literature / notes found to be helpful.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio4" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio4" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>5) The student gets a feel for understanding the process simulation remotely.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio5" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio5" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>6) The simulation process motivating enough.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio6" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio6" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>7) The Web-interface is user friendly .</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio7" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio7" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>8) you were able to compare the process that was taught to you in the class.</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio8" value="Fair"></td>
<td><br>&nbsp;&nbsp;<input type="radio" name="formradio8" value="Poor"><p>&nbsp;</p></td></tr>

<tr><td>9) Studying through virtual lab gives scope for more innovative and creative<br> research work?</td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="Excellent" Checked="1"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="Very Good"></td>
<td>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="Good"></td>
<td>&nbsp;&nbsp;&nbsp;<input type="radio" name="formradio9" value="Fair"></td>
<td>&nbsp;&nbsp;<input type="radio" name="formradio9" value="Poor"></td></tr>

<tr><td><p>&nbsp;</p>10) Specify problems/difficulties you faced and Give interesting things<br> about the simulations.</td>
<td colspan="5"><input type="text" name="formtext" style="width :350px; height:30px; border-style:solid; border-color:#98bf21;" maxlength="500"></td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td><label for="securitycode">Security Code<img src="images/arsterix.gif"></label></td>
<td><input id="securitycode" name="securitycode" type="text" size="11"/></td>
<td colspan="3" style="font-size:18px; color:red; text-decoration:blink;">&nbsp;<span id="info"></span></td></tr>

<tr><td></td><td>
<img src="captcha.php" id="captcha_security" />&nbsp;&nbsp;&nbsp;
<a href="#" onclick="document.getElementById('captcha_security').src='captcha.php?'+Math.random();" id="change-captcha">
<img src="images/refresh_icon.jpg" height="25" width="25" title="Refresh"></a></td></tr>
</table>
<center>
<input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM>
<?php
$date = @date('Y-m-d H:i:s');
include("config.inc.php");
global $db, $db_host, $db_user, $db_password;
$conn = mysql_connect($db_host,$db_user,$db_password);
if (!$conn) {
die("ERROR: " . mysql_error() . "\n");
}
mysql_select_db ($db);
if (isset($_POST['send']))
{
if( $_SESSION['code'] == $_POST['securitycode'] ) {
//Inserting values in the database
$query="insert into feedback(Name,Institute,Class,Email,Objective,Process,Analysis,Notes,Understand,Motivate,Interface,Compare,Scope,About,DateTime)
values('".$_POST["name"]."','".$_POST["deptName"]."','".$_POST["class"]."',
'".$_POST["email"]."','".$_POST["formradio1"]."','".$_POST["formradio2"]."','".$_POST["formradio3"]."',
'".$_POST["formradio4"]."','".$_POST["formradio5"]."','".$_POST["formradio6"]."','".$_POST["formradio7"]."',
'".$_POST["formradio8"]."','".$_POST["formradio9"]."','".$_POST["formtext"]."','".$date."')";
mysql_query($query);

//Sending an automatic email
$to="ajaykant900@gmail.com,mfvslab@gmail.com";
$subject="Feedback for Metal Forming Virtual Simulation Lab";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: ' . "\r\n";
$message="Name=".$_POST["name"]."<br>Institute=".$_POST["deptName"]."<br/>Class=".$_POST["class"]."<br/>Email ID=".$_POST["email"]."<br/><br/>Feedback:<br/>".$_POST["formtext"];
@mail($to,$subject,$message,$headers);
@mail($_POST["email"],"Welcome","Thankyou for sending feedback. Metal Forming Virtual Simulation Lab heartly welcomes you. You can give your valuable suggestions to make interactive simulations on real time forming experiments.",$headers);
echo ("<SCRIPT LANGUAGE='JavaScript'>alert('Thankyou, your feedback has been submitted');</SCRIPT>");
}
else echo "<script language=\"javascript\">document.getElementById('info').innerHTML=\"Invalid Security Code\"</script>";
unset($_SESSION['code']);
}
 	//Opening file to get counter value
	$fp = fopen ("counter.txt", "r");
	$count_number = fread ($fp, filesize ("counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
<br/></div></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>