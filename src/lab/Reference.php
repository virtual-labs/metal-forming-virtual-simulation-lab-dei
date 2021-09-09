<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
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
  // this works for FireFox and WebKit in future according to http://help.dottoro.com/lhqsqbtn.php
  element.draggable = false;
  // this works for older web layout engines
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
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<br/><center style="font-size:24px; color:blue; font-weight:bold">REFERENCES</center>
<p style="margin:50px; margin-top:20px; font-size:21px">
1. Lange, K., "Handbook of Metal Forming", McGraw-Hill, 1985.<br/><br/>
2. ASM Handbook, Ninth Edition, "Forming and Forging", Volume 14,1988.<br/><br/>
3. Shiro Kobayashi, Soo-Ik Oh, Taylan Alton "Metal Forming and the Finite Element Method" Oxford University Press, USA, 1989.<br/><br/>
4. Serope Kalpakjian and Steven Schmid, "Manufacturing Engineering and Technology", Pearson Education, 2009.<br/><br/>
5. Amitabha Ghosh and A. K. Mallik, "Manufacturing Science", Affiliated East-West Press, 2009.<br/><br/>
6. R. H. Wagoner and J. L. Chenot, "Metal forming analysis", Cambridge University Press, Cambridge, 2001.<br/><br/>
7. Taylan Alton, Gracious Ngaile, Gangshu Shen, "Cold and hot forging: fundamentals and applications", Volume 1, ASM International, 2004.<br/><br/>
8. FORGE: User Manual, Transvalor Inc., Sophia Antipolis, France.</p>
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
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>