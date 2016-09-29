<?php 
session_start(); 
ini_set("display_errors","Off");
?>
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
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:600px;">
<br><center><u style="font-size:2em; color:#ff00ff;">Interactive Simulation Bench of Extrusion Process for Aluminium</u>

<FORM METHOD="post" onSubmit="return valid(this)" action="Aluminium.php">
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
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/g1yM13j3WFc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/wrBADEPskCs\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases.  
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/2BdlWib2Ymg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/UfUExACLCOc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JzHg4uoXIAo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/icgpDI334UE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/tjD0zjZ3z-8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JiNSdxyEsKo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases.  
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/gGl7ZpxQPf8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Hz831Bi3QIw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/qfGcJyt6Ivg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm . Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/k1DClvqX88I\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ftja0F0jquA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/L4BiGZJrCT8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/tCe5jbtpbOk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/pOFn3LIpO9s\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/TJCD1Ls3kWA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/k0i7Y9kh2X8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/eqlD0b8LKE4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 200 tonnes. Ram velocity is set as 1mm per sec.  Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature of about 179<sup>o</sup>C generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Q7tDnTwDyig\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 200 Tonnes. Ram velocity is set as 5mm per sec.  Die angle is specified as 45<sup>o</sup>  and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows Equivalent strain in the billet.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/5b7oG6aUPMA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 205 Tonnes. Ram velocity is set as 1mm per sec.  Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature of about 1030c generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/8LaaUyoi_90\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 200 Tonnes. Ram velocity is set as 5mm per sec.  Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/2dsiQcVNqkg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 250 Tonnes. Ram velocity is set as 1mm per sec.  Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows Equivalent strain in the billet.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/zAKZ8M-s05M\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during this process is about 250 Tonnes. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature of about 280<sup>o</sup>C generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/BUSt15uxkBg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec.  Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/mya49e5BivU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/2qSdSGH-pl8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Vi9lfY42hu8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/y_Jm4Pclnl4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/n07IB5QanDM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec.  Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/5BSvog7bnck\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/mWBJVwiVE2E\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JcVlnV0jDxk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/AgZqKJQPR6w\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/VTv5bb3pf8k\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/7bl0i5kQSJw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec.  Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
$_SESSION['speech'] = "";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Fm7lpevcuqg\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot  extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/9TEa2_307u0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/S5sD_Zam3LE\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YFzRj_-kyGI\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/MFNk0ZB2EPU\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/LCQKvyWqXZo\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/NIsMG5EabO0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/m9wKcmsQytw\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JDzjdChpHek\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/py4iMHs9Mwg\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/sbBWYnjgCPM\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/qCVxjZWZ52M\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/aPlKf7Mw53Q\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Je30Ywk212E\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ggI_rqNh8S4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/4tqY7uyzgFs\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6ANAj0WMjXw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ivX7RCTlxOg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/rLvWxE8jnnQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ql-Lg5xrKg8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/gA0pedWAfIg\"</script> ";
$_SESSION['speech'] = "In this video you can see the  hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/kmxyh6Ltztk\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/VQJrmfXfZYk\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/M91w1WUH4LY\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/FvlJXpebOyU\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/6gBdKRL9Ofw\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/4-ciVRupjX0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/X5CZX48VBus\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/cYaBfSexs7w\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/g9fBzxeUj6M\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/yXg8mkLrJJ8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/-9KlfMJqim8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/W0OlX-pEfs8\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. Maximum force required during hot extrusion process is less than cold extrusion process. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/RbWxIKYt4H0\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/IQ5WV0gCSEg\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Pipe" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/S-nED96GEOg\"</script> ";
$_SESSION['speech'] = "In this video you can see the hot extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of pipe is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/1MiQ5SGhCPQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/MbQ2npaPOp8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jY9FEkq2DyA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/K9EqZ-NYaKM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/hAHyCokxOPM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YRL6Z90h_NQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/s6mK0CX7G6k\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Ei0hG-b6HGU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/B8oei1IfPso\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/WeK_QDVCbdI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/PN0Qo0rRFio\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/PD-OO2FafOc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/9dVDSDQ_QiA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JbbXX67CRJ0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/JUivNyb5iaA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup>  and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Bzzp0UnxNsQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup>  and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/tK5lzNoUGro\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/0oU0ElQn8_I\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/_NmYr6Agji4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/4kE7IrKncu4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/foDKdi3Sxpk\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium pipe which comprises of a mandrel in the extrusion die. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/jjgWscP9buE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Bz8ZpqANZiA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/bwPhidyNAWs\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required for extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp== 1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/AiyI7ab7U_g\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ZrBKzW3bxo8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/bYevOQqstN8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/I7BGNhvMnkE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. . One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/96PDVfHf2n4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/MtcVqTBNfcI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. . One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/wGZ8Y93lmUo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Zi3EYgb4Zyg\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases.
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/nopiGYvih9A\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/WpUs5t6Qa9A\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/cmsDNmDtslA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Cold"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/lzya1O27T-Y\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is cold extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this cold extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section. . One fourth of the solid shaft is shown over the screen because this solid shaft is axis symmetric with X and Y direction.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Uz-2UoPpbvY\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/FQvvfp-sH7A\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/1o_djb9RNSc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/YOGXvoKRX2k\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/GP3PiR8jpDw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/uzDHK9D4MuA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/gsQSntn58R0\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/CQkJ7wcG1vw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ipn7paZeQYE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/2ngK-LSM0S8\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/TCdiLaZxnXQ\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/3FY1IYa66dM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Xx3HwWDvFaI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Sv16aXX1OlI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/iNg-E-oJJNc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/RRfyc__clgo\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/TxJIkpKamRM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 1mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==0 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/QKO4ewDD87I\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Maximum force required during hot extrusion process is less than cold extrusion process. Ram velocity is set as 5mm per sec. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/5k8Alyni4wI\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/L8wW43Ucv_4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/0H9NV3KXnv4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/b-izJ92a5Uc\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==45 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/OrLhSnjcvgM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==45 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/XYTTOr-DQ8s\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 45<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/aGhYQEINjIA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/og8tJTzyu84\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==60 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/yfp-ZMJ9oSw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ms9hewglZQE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/LZNn-QxYyO4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==60 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/tqCWqOjqveM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 60<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/iERZRJPpIDM\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="0" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/4B6BxGOC9yE\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is no friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/KXs-pWE2Mi4\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process. Left side coloured strip shows temperature variation in the billet. The red region shows the maximum temperature generated at varying cross section.";
}
elseif($an==90 && $fr=="Medium" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/Xlj8bPe3HiU\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is medium friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==1 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/ePqzHoXY5Vw\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 1mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
}
elseif($an==90 && $fr=="High" && $sp==5 && $ext=="Solid" && $cur==1 && $mw=="Hot"){
echo "<script>window.location=\"Extru_Experiment.php?https://www.youtube.com/embed/XqzjFb4nBaA\"</script> ";
$_SESSION['speech'] = "In this video you can see the extrusion process of Aluminium solid shaft with 50% reduction in diameter of the billet. This process is hot extrusion process where different parameters are controlled on the basis of given specifications. Extrusion forces with respect to pilot height are shown over the graph these Forces are maximum when there is sudden change in area of cross section of the billet. As the pilot height reduces the force required to extrusion of solid is increases. 
Ram velocity is set as 5mm per sec with the radius of 5mm. Die angle is specified as 90<sup>o</sup> and it is specified that there is high friction during this hot extrusion process.";
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