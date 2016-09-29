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
ini_set("display_errors","Off");
echo <<<EOQ
	<li><a href="home.php">Home</a></li>
	<li class="dir"><a href="Rolling_Process.php">Rolling Process</a>
	<ul>
	<li><a href="Ring_Rolling.php">Ring Rolling</a></li>
	<li><a href="ThreadRolling.php">Thread Rolling</a></li>
	<li><a href="WedgeRolling.php" title="Transverse Wedge Rolling">Wedge Rolling</a></li>
	</ul>
	</li>
	<li><a href="Rolling.php">Simulation Bench</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">Flat Plate Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/t6VKzjRu6Gw">Flat Plate</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/FaG4fXe1UrQ">Close-up View</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">Angle Rolling</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/v0wYMR2vQGI">Angle Rolling</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/cYAQY360hnY">Angle Rolling with Graph</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/Hpwo8x_Hi10">Angle Bar Rolling</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/jc8VUbC2rfM">Circular Bar Rolling</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">I-Section</a>
	<ul>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/WV-PlH7Kkcg">I-Section with 4-Roller</a></li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/HVFRCMP7EJA">I-Section with 2-Roller</a></li>	
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/fJexvf_16Gw">I-Section with graph</a></li>
	</ul>
	</li>
	<li><a href="Rolling_Experiment.php?https://www.youtube.com/embed/4vL0vnRppVo">Seamless pipe using Rolling</a></li>
	</ul> 
	</li>
	<li><a href="MCQ_Rolling.php">Self Check Quiz</a></li>	
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:600px;">
<br><center><u style="font-size:2em; color:#ff00ff;">Interactive Bench of Simulations for Rolling Process</u>

<FORM METHOD="post" onSubmit="return valid(this)" action="Rolling.php">
<table border="0" cellpadding="0" cellspacing="28">

<tr><td><h1>Material</h1></td><td>:</td><td><input type="radio" name="mat" value="Al"><b>Aluminium</b></td>
<td><input type="radio" name="mat" value="Cu"><b>Copper</b></td>
<td><input type="radio" name="mat" value="Steel"><b>Ck-45 Steel</b></td></tr>

<tr><td><h1>Coefficient of Friction</h1></td><td>:</td><td><input type="radio" name="fr" value="0"><b>Low</b></td>
<td><input type="radio" name="fr" value="Medium"><b>Medium</b></td>
<td><input type="radio" name="fr" value="High"><b>High</b></td></tr>

<tr><td><h1>Velocity of Ram/ Speed</h1></td><td>:</td><td><input type="radio" name="speed" value=0.5><b>0.5 mm/sec</b></td>
<td><input type="radio" name="speed" value=1><b>1 mm/sec</b></td>
<td><input type="radio" name="speed" value=1.5><b>1.5 mm/sec</b></td></tr>

<tr><td><h1>Material/ Workpiece Temperature</h1></td><td>:</td><td><input type="radio" name="m/w" value="Cold"><b>Cold</b></td>
<td><input type="radio" name="m/w" value="Hot"><b>Hot</b></td></tr>
</table>

<center><input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM></center>
<?php
$mt = $_REQUEST["mat"];
$fr = $_REQUEST["fr"];
$sp = $_REQUEST["speed"];
$mw = $_REQUEST["m/w"];

if(isset($_POST["send"])){
if($fr=="0" && $sp==0.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/htRo-M7kM-M\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/jcOjuZ6AcN4\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/f7TyWIO_300\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==0.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/d5tvYixyu6w\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==1 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/ONoQFh5pMjY\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different sets of rollers. The slabs of Aluminium is taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==1.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/VqKlT6wXMaw\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==0.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/MkE4im1b4Xg\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==1 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/5wNO9_mKOYw\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==1.5 && $mt=="Al" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/kUjdC2l-M8A\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Aluminium is taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==0.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/d_8wlXDcpNU\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/0XYdmeZl3Zo\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/6UYe337_dFU\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==0.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/9S6kP2R-328\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==1 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/QnOw3WzO91A\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="Medium" && $sp==1.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/g4atqeqLY3A\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). Medium friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==0.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/WWfsKbmNKuQ\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==1 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/Q7uYe0Mm0tU\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="High" && $sp==1.5 && $mt=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/lbFu_VCq1Sw\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Steel(C-45) are taken cold (cold rolling). High friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==0.5 && $mt=="Cu" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/pJmKOC9GkV0\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Copper is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 0.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1 && $mt=="Cu" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/aiiH_ELcvFo\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Copper is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
}
elseif($fr=="0" && $sp==1.5 && $mt=="Cu" && $mw=="Cold"){
echo "<script>window.location=\"Rolling_Experiment.php?https://www.youtube.com/embed/zX6JEc94hDg\"</script>";
$_SESSION['speech'] = "The video shows the rolling operation taking place using three different set of rollers. The slabs of Copper is taken cold (cold rolling). Zero friction between rollers and slabs is shown on the top end in the video. The roller sets are rotating with the 1.5 r.p.m. speed with lower rollers moving clockwise and vice versa. 
On the right hand side one could see two graph of forging force evaluation on lower and upper roller respectively vs. step during rolling process. The scale on left hand side describes the equivalent strain in slab changing during the process.";
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