<?php session_start();
ini_set("display_errors","Off"); ?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
<style type="text/css">
h1{
font-family:Georgia,arial;
font-size:21px;
text-align:right;
}
b{
color: #8A1134;
font-family:Georgia,arial;
font-weight:normal;
font-size:19px;
}
</style>
</head>
<body id="draggingDisabled" bgcolor="#FFFFFF">
<div id="header_main"></div>
<div id="header">
<ul class="dropdown dropdown-horizontal">
<?php
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li><a href="Extrusion.php">Extrusion</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Aluminium.php">Simulation bench for aluminium</a></li>
	<li><a href="Titanium.php">Simulation bench for titanium</a></li>		
	</ul> 
	</li>
	<li><a href="Extrusioncomp.php">Comparative Simulation</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Seamless Pipe</a>
	<ul>	
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/8mIMYowzbYE">Seamless pipe</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Na10qT1cDMQ">Seamless pipe with forging force</a></li>
	</ul>
	</li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/pO88pA3wZws">Pipe Extrusion</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/VJ_UKF6uMwk">Turbine Blade</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Je-bS79yw88">Golf Stick</a></li>	
	</ul>
	</li>
	<li class="dir"><a href="#">Special Cases</a>
	<ul>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/ypzq7PwnC1U">CASE-1</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/23WMALXZZ0Y">CASE-2</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/k-FZAMpEyr8">CASE-3</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/wVc6VkvklMA">CASE-4</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/SH3Ipq3tdzM">CASE-5</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/R3ILdfi6O2Q">CASE-6</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/tYCxm7icWXw">CASE-7</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/Dc98pn2ba6c">CASE-8</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/fTekwjAQOOk">CASE-9</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/mE7Wf1GFQII">CASE-10</a></li>
	<li><a href="Extru_Experiment.php?https://www.youtube.com/embed/bwbIhWyCCVw">CASE-11</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Extrusion.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<br><center><u style="font-size:2em; color:#ff00ff;">Interactive Simulation Bench of Extrusion Process for Titanium</u>

<FORM METHOD="post" onSubmit="return valid(this)" action="Titanium.php">
<table border="0" cellpadding="2" cellspacing="22">

<tr><td><h1>Extrusion</h1></td><td>:</td><td><input type="radio" name="ext" value="Solid"><b>Solid Shaft</b></td>
<td><input type="radio" name="ext" value="Pipe"><b>Pipe</b></td></tr>

<tr><td><h1>Die Angle</h1></td><td>:</td><td><input type="radio" name="angle" value=45><b>45&deg;</b></td>
<td><input type="radio" name="angle" value=60><b>60&deg;</b></td><td><input type="radio" name="angle" value=90><b>90&deg;</b></td></tr>

<tr><td><h1>Extrusion Die Curvature</h1></td><td>:</td><td><input type="radio" name="radius" value=1><b>Die With Curvature</b></td>
<td><input type="radio" name="radius" value=0><b>Die Without Curvature</b></td></tr>

<tr><td><h1>Coefficient of Friction</h1></td><td>:</td><td><input type="radio" name="fr" value="0"><b>Low</b></td><td><input type="radio" name="fr" value="Medium"><b>Medium</b></td>
<td><input type="radio" name="fr" value="High"><b>High</b></td></tr>

<tr><td><h1>Velocity of Ram/ Speed</h1></td><td>:</td><td><input type="radio" name="speed" value=1><b>1 mm/sec</b></td>
<td><input type="radio" name="speed" value=5><b>5 mm/sec</b></td></tr>

<tr><td><h1>Material/ Workpiece Temperature</h1></td><td>:</td><td><input type="radio" name="m/w" value="Cold"><b>Cold</b></td>
<td><input type="radio" name="m/w" value="Hot"><b>Hot</b></td></tr>
</table><br>

<center><input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM></center>
<?php
$ext = $_REQUEST["ext"];
$an = $_REQUEST["angle"];
$cur = $_REQUEST["radius"];
$fr = $_REQUEST["fr"];
$sp = $_REQUEST["speed"];
$mw = $_REQUEST["m/w"];

if(isset($_POST["send"])){
if($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/li_VuYfEie4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZCN921q1kD0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/RacPMKv94mo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YCwtqI-kGME\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/GJIGKUchYRA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/BMefDt_Gfu0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/TPkjjrxLIpY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Vhkk70-snKA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/c8AlxIk3ol0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/eTiCKc01IIw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/sc6xj2Wkelk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6lLNQFRW0VU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/54466XEkX0U\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/-tjIbpT9LDg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/oShH_43o8WM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/F9_uUxaZKYQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/HHEFgIGaRUE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ED_-lBGvpBo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/n7-fRo6jsVE\"</script> ";
$_SESSION['speech'] = "In this video you can see the cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/GrvWUs4f9wU\"</script> ";
$_SESSION['speech'] = "In this video you can see the cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/5l-C_JhFAlA\"</script> ";
$_SESSION['speech'] = "In this video you can see the  cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nZ5pbE4cFCY\"</script> ";
$_SESSION['speech'] = "In this video you can see the cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nI7qwyeEdJk\"</script> ";
$_SESSION['speech'] = "In this video you can see the cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Weip9CG29uY\"</script> ";
$_SESSION['speech'] = "In this video you can see the cold extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during cold extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jWx2AP2gKzA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/p4PMF0yA7AU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/3A1eRSO2QgQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/wbLOBnURVtA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/x21RliXOFXw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/H8k-zA7p4jw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/MAma-CYU6u0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YtLJ5OWeo0o\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/iXOQWTtgiZU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/mb7VvyxtP2c\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/DHyRcxWOHB0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JQdhEyEfydA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/exDfN2AS5j8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/DHSJZLTbyNc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/9ogu2J8PXyY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/pCVUfIYeO3s\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/3y1u_LURC1Y\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/MPsyzht-sxU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6axxJ64vvxk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/89Q3HZjca0c\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/WoWkiFV-jQI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/TXu132ojFnQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/a1laUZfGCiU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/NqFjcJBAVGg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/bKH8M1BuWaU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.  Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Z75XnopXTi0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/AQJsQi63FNw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/M-mQhTU3d6Q\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jtkIhTb7rxw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6btzrNmYCcs\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/m349KJb1Tjw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/uj-kQCrG91s\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/1XAPsZMcI2Q\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Db9wdfQ5b5U\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/CHC1qjekUlY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Km5chp8ikBo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/1-RIfBPbhHU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/4TMgol2aoaU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/n1-o2LGNvlA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/hATNRyxqpiI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/yreVMUFYdXg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZwuE2qk1amM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nYIpxBsDN4c\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Qd_TCqA24Jk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/hK8kEk6yQEU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZDrIGmVg5JY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/v6TBWb6GEss\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/_lCtojjRhpc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. . One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/9oN25jrTU5I\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/wQ3BYwLzj3w\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/wqpJKbH4sVE\"</script> ";
$_SESSION['speech'] = "In this video you can see the  hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YhfwBA1HBc8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/c107oeeuzBA\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/8vzaTfz88SA\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Cv1mV4GYJgs\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. RAM velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/yrw9RKn4KJA\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nbMoc1F_dMk\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/_MjBriYlqsk\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Yz1myoq7hnA\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6TgcPy3QKCQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/rwPyWptyzco\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. RAM velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/fRUBTR0u-7s\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/NCyvedGrLEg\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/i1Qd3LUUO2M\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/n4UJMZ3SrhQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Gwsp7J7iQQ8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6gfLkx3SaCo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/NX5Kab4LvL4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jpU-GZD6C_o\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/el_doBg8AXc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ruSW5rMrwvo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.  Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Qmb_jRCk1yc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/L0el6JSV9lY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/UyCLlsdGPkg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/OKLHfskjjsA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/8M37pnf4opY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZyMgE2QWO4E\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/yh231yFvtTk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/VIhfOz7ouSw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/aMgVFmfe0k8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/eEqkFqlCkOQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.  One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/lBtWXh6DThY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/l3eE12LoJXQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/EDoGSuCp3Kc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/c-3j_jX0mN0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Fx_aVUdzvt4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/qKlwwOZsktA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/CHuLR3dHqp4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/OE_kI8vyxKM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jkWoygRvoh4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/-8KS9fChDFY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/IChYRji3N-o\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6WZkXisuXus\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/cqIWZAz_UKA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Va7a5sr_T84\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/_WGutIO0lF4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm.  Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ifWlGUeDRgU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JnaqU3axhbw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Ri_yd8xZACU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Pw2st7uxiY0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/hpyVRMyyszQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/DVjcVMQevp0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/rwvfUXMn16k\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot  extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/_Z9hj_faJps\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/9JGNRhVxzTU\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JmES1Bjl3m0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/u3F5I_X8-IQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/dTThYDRSNd0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/85FkNyRiUOM\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm.  Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/SttJF695fgQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/qCt-nSNTbmo\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nJlaSweKJe4\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/gXcE8rHSzhI\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/p_fBuBg4sUU\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZQNureNlHgM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/cHNn35End7I\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/FDk_wTcF5fg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/IdtADkUf4U8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ByZiMLeB56E\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/UHp8OtBrsWU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Titanium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
else print ("<script language='javascript'>alert('You are missing some parameters! Please try again.')</script>");
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
</div>
<div id="footer">
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>