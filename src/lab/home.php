<?php setcookie("name", "Metal Forming");
ini_set("display_errors","Off"); ?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" media="all" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css" media="print">
body { visibility: hidden; display: none }
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
 
window.onload = init; 
function init() {
  disableDraggingFor(document.getElementById("draggingDisabled"));
} 
function disableDraggingFor(element) {
  element.draggable = false;
  element.onmousedown = function(event) {
                event.preventDefault();
                return false;
};
}
-->
</script>
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
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
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; height:100%;">
<center><table border="0">
<th width="755" style="background:#3399FF; font-size:20px; color:#FFFFFF;">PREAMBLE</th>
<th style="background:#FF00FF; font-size:16px; color:#FFFFFF;";><?php echo @date('l, d-M-Y'); include("Time.php");?></th>
<tr><td width="755" valign="top" style="font-size:16px; padding:10px;">
<b style="color:#0000FF; font-size:16px; text-transform:uppercase;">Metal Forming</b> process is a widely used manufacturing process mainly for its minimum waste and dimensional precision,
and it usually improves the mechanical properties of the formed product. Metal forming process is an important module that is being taught to undergraduate courses of <b style="color:#0000FF; font-size:16px; text-transform:uppercase;">
Mechanical Engineering</b> because this process is widely used in the manufacturing industry for manufacturing of hand tools, surgical instruments, machine parts for automobile, machine tools, aeronautical and many others industries. There is a great
difficulty when teaching various metal forming processes due to various process parameters, materials, complex die shapes, and high capacity presses involved in the process.
The virtual prototypes generated from computer numerical simulations provide an efficient understanding of processes and concepts and allows the analysis and visualization of metal flow. 
Computer numerical simulation has become a reliable and acceptable tool to model the metal forming process.
The <b style="color:#0000FF; font-size:16px; text-transform:uppercase;">
objective of Metal Forming Virtual Simulation Lab</b> is to make students understand the various fundamental metal forming processes and to recognise the effect of various process parameters with the help of computer
numerical simulations. In this lab animations of upsetting process, extrusion process, multi-step forging processes, closed die forging, rolling process, sheet metal processes and intricate phenomena during these processes are incorporated to make the student appreciate and develop better understanding of the fundamental concepts.
</td><td>
<img src="images/slide.gif" height="280" width="320"><br />
<img src="images/home.gif" height="180" width="320">
</td></tr></table>
<?php
 	//Opening file to get counter value
	$fp = fopen ("counter.txt", "r");
	$count_number = fread ($fp, filesize ("counter.txt"));
	fclose($fp);
	$i="";
	$ImgPath="images/imgs/";	//Path of image folder
   if(!isset($_COOKIE["name"]))
    {
	$counter = (int)($count_number) + 1;
    }
   else
    {
	$counter = (int)($count_number);
	}
	$count_number = (string)($counter);
	$len = strlen($count_number);
	while($len!=$i && $len!=0)
	{
	 echo "<img src=".$ImgPath.$count_number[$i].".jpg alt=\"You are visitor number $count_number\" width=20 Height=22>";
	 $i++;
	}
	$fp = fopen ("counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>
</center></div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>