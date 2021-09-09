<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="../images/icon.ico">
<link href="css/main.css" media="all" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<link href="gallery/style.css" rel="stylesheet" type="text/css" />	
	<script type="text/javascript" src="gallery/jquery.js"></script>
	<script type="text/javascript" src="gallery/jquery_gallery.js"></script>
	<script type="text/javascript" src="gallery/filter.js"></script>
<style type="text/css" media="print">
body { visibility: hidden; display: none }
</style>
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
include("mainmenu.php");
?>
</ul></div>
<div style="background:#FFFFFF; position: relative; margin:auto; width: 1024px; height:660px;">

<div id="container">
<!-- start -->
	<div id="gallery">
					<div id="output">
					 <center> <img src="gallery/1.jpg" alt="ITM, Gwalior"/></center>
</div>		
					<div id="captions">
						<div id="nav">
							<ul>
							<li><a href="#" class="navPrevious">[ &lt; ]</a></li>
								<li><a href="#" class="navNext">[ &gt; ]</a></li>
								<li><a href="#" class="navStopAdvance">[ Stop ]</a></li>
								<li><a href="#" class="navPlayAdvance active">[ Play ]</a></li>
							</ul>
						</div>	
						<span class="line"></span>
						<br class="clear" />
						<span class="line2"></span>
	    </div>
					<ul class="thumbnails category1">    
                    <li><img src="gallery/1.jpg"  alt="ITM, Gwalior" title="Virtual Lab Workshop at ITM, Gwalior"/></li>
                    <li><img src="gallery/2.jpg"  alt="SRM, Gwalior" title="Virtual Lab Workshop at Shri Group of Colleges, Gwalior"/></li>
                    <li><img src="gallery/3.jpg" alt="HCST, Mathura" title="Virtual Lab Workshop at Hindustan College of Science & Technology, Mathura"/></li>
                    <li><img src="gallery/4.jpg" alt="HCST, Mathura" title="Virtual Lab Workshop at Institute of Engineering and Technology, Agra"/></li>
                    <li><img src="gallery/5.jpg" alt="HCST, Mathura" title="Virtual Lab Workshop at Hindustan College of Science & Technology, Mathura"/></li>
                    <li><img src="gallery/6.jpg" alt="Skyline, Greater Noida" title="Virtual Lab Workshop at Skyline Institute of Engineering and Technology, Greater Noida"/></li>
                    <li><img src="gallery/7.jpg"  alt="SRM, Gwalior" title="Virtual Lab Workshop at SRM, Gwalior"/></li>
                    <li><img src="gallery/8.jpg"  alt="ITM, Gwalior" title="Virtual Lab Workshop at ITM, Gwalior"/></li>
                    <li><img src="gallery/9.jpg"  alt="AEC, Agra" title="Virtual Lab Workshop at Anand Engineering College, Agra"/></li>
                    <li><img src="gallery/10.jpg"  alt="AEC, Agra" title="Virtual Lab Workshop at Anand Engineering College, Agra"/></li>
                    <li><img src="gallery/11.jpg"  alt="DEI, Agra" title="Workshop, QANSAS 2018"/></li>
              </ul>
  <br class="clear" />
					<script type="text/javascript">

						$.gallerax({
							outputSelector: 		'#output img',				// Output selector
							thumbnailsSelector:		'.thumbnails li img',		// Thumbnails selector
							captionSelector:		'#captions .line',			// Caption selector
							captionLines:			2,							// Caption lines (3 lines)
							fade: 					'fast',						// Transition speed (fast)
							navNextSelector:		'#nav a.navNext',			// 'Next' selector
							navPreviousSelector:	'#nav a.navPrevious',		// 'Previous' selector
							navFirstSelector:		'#nav a.navFirst',			// 'First' selector
							navLastSelector:		'#nav a.navLast',			// 'Last' selector
							navStopAdvanceSelector:	'#nav a.navStopAdvance',	// 'Stop Advance' selector
							navPlayAdvanceSelector:	'#nav a.navPlayAdvance',	// 'Play Advance' selector
							advanceFade:			'slow',						// Advance transition speed (slow)
							advanceDelay:			4000,						// Advance delay (4 seconds)
							advanceResume:			12000,						// Advance resume (12 seconds)
							thumbnailsFunction: 	function(s) {				// Thumbnails function
							
								return s.replace(/_thumb\.jpg$/, '.jpg');
								
							}
						});
					</script>
			<!-- end -->
			</div>
	</div>
</div>
<div style="color:#ffffff; text-align:center;">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>