<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<SCRIPT language="javascript">
msg = "Virtual Lab - Dayalbagh Educational Institute ";
msg = msg;pos = 0;
function scrollMSG() {
document.title = msg.substring(pos, msg.length) + msg.substring(0, pos);
pos++;
if (pos >  msg.length) pos = 0
window.setTimeout("scrollMSG()",200);
}
scrollMSG();
</SCRIPT>
</head>
<body id="draggingDisabled" >
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
<div style="background-image:url(images/content_bg.jpg); position: relative; margin:auto; width: 1024px; min-height:550px;">
<div style=" padding:20px;">
<center>
<b style="font-size:1.8em; color:#0000FF">Dayalbagh Educational Institute<br/>AGRA (INDIA)<br>
<a style="font-size:0.8em;" href="#" onClick="window.open('http://www.dei.ac.in');" title="Dayalbagh Educational Institute"><u>(www.dei.ac.in)</u></a></b>
<table width="520" border="0" cellpadding="2" cellspacing="10">
  <tr>
    <td><a style="color:#F08D20" href="https://www.dei.ac.in/dei/engineering/index.php/2012-12-08-09-23-43/mechanical-engg-faculty/18-mechanical-engineering-faculty/73-dr-rahul-swarup-sharma" target="_blank" title="Profile - Dr. Rahul Swarup Sharma">Dr. Rahul Swarup Sharma</a> (Project Co-ordinator)</td>
  </tr>
  <tr>
    <td><a style="color:#F08D20" href="https://www.dei.ac.in/dei/engineering/index.php/2012-12-08-09-23-43/mechanical-engg-faculty/18-mechanical-engineering-faculty/72-dr-k-hans-raj" target="_blank" title="Profile - Prof. K. Hans Raj">Prof. K. Hans Raj</a> (Advisor)</td>
  </tr>
  <tr>
    <td><a style="color:#F08D20" href="https://www.dei.ac.in/dei/usic/index.php/usic-faculty/2-soami-piara-satsangee" target="_blank" title="Profile - Prof. S.P. Satsangee">Prof. S.P. Satsangee</a> (DEI Virtual Labs  Co-ordinator)</td>
  </tr>
  <tr>
    <td><a style="color:#F08D20" href="ajay/index.html" target="_blank" title="Profile - Ajay Kant Upadhyay">Er. Ajay Kant Upadhyay</a> (Web Developer)</td>
  </tr>
</table><br>
<b style="font-size:1.8em; color:#0000ff; text-decoration:underline">Technical Support-Members (Present and Past)</b>
<table width="520" border="0" cellpadding="2" cellspacing="10">
  <tr>
    <td>Er. Atul Dayal</td>
    <td>Er. Vishnu Pradeep Sharma</td>
  </tr>
  <tr>
    <td>Er. Ishant Singhal</td>
    <td>Er. Pankaj Kumar</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Jitendra Kumar Verma</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Mohit Gupta</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Rohit Kumar Pal</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Shivam Gupta</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Abhishek Modi</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Anuj Kumar Dubey</td>
  </tr><tr>
    <td></td>
    <td>Er. Ankit Satsangi</td>
  </tr>
  <tr>
    <td></td>
    <td>Er. Harshit Anand</td>
  </tr><tr>
    <td></td>
    <td>Er. Vishal Chaturani</td>
  </tr>
</table>
</center>
 <b style="font-size:18px; color:blue; margin-left:700px;">Email: 
 <a href="mailto:mfvslab@gmail.com,rahulswarup@rediffmail.com?Subject=Feedback for Metal Forming Virtual Simulation Lab&cc=ajaykant900@gmail.com,&bcc=mem103.2012@gmail.com" title="Send E-Mail to Metal Forming Virtual Simulation Lab"><u>mfvslab@gmail.com</u></a></b>
</div>
<?php
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
</div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute(www.dei.ac.in)
</div>
</body>
</html>