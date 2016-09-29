<?php session_start();
ini_set("display_errors","Off"); ?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
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
	<li><a href="upsetting_process.php">Upsetting</a></li>
	<li><a href="upsetting_simulation.php">Simulations</a></li>
	<li class="dir"><a href="#">Simulation Bench</a>
	<ul>
	<li><a href="Hydraulic.php">SIMULATION BENCH FOR HYDRAULIC PRESS</a></li>
	<li><a href="Mechanical.php">SIMULATION BENCH FOR MECHANICAL PRESS</a></li>		
	</ul> 
	</li>
	<li><a href="upsetcomp.php">Comparative Simulations</a></li>
	<li class="dir"><a href="#">Applications</a>
	<ul>
	<li class="dir"><a href="#">ALLOY WHEEL</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/7XsEMIKKrGY">Alloy wheel</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/iwKH3PeUNmA">Alloy wheel with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">BRASS FORGED PART</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/IKfMmkMPr9I">Brass forged part</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/Lhs9kW-XySU">Brass forged part with strain</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">FORGED PISTON</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/PpoEzA19Q3o">Forged piston-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/uUURe5wU81s">Forged piston with graph</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/oRnruCNjq8c">Forged piston-Section view</a></li>
	</ul>
	</li>
	<li class="dir"><a href="#">MUDGUARD</a>
	<ul>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/olYwov1mZAs">Mudguard-Setup</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/M1O5SbdZYOE">Mudguard with strain in Upward Direction</a></li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/AKhl2OKXAmU">Mudguard with strain in Downward Direction</a></li>
	</ul>
	</li>
	<li><a href="Upset_Experiment.php?https://www.youtube.com/embed/ob2lwdSvbvI">PATTERN MAKING</a></li>
	</ul>
	</li>
	<li><a href="MCQ_Upsetting.php">Self Check Quiz</a></li>
EOQ;
?>
</ul></div>
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:600px;">
<br><center><u style="font-size:2em; color:#ff00ff;">Interactive Simulation Bench for Hydraulic Press</u>

<FORM METHOD="post" onSubmit="return valid(this)" action="Hydraulic.php">
<table border="0" cellpadding="2" cellspacing="22">

<tr><td><h1>Material</h1></td><td>:</td><td><input type="radio" name="mat" value="Aluminium"><b>Aluminium</b></td>
<td><input type="radio" name="mat" value="Copper"><b>Copper</b></td><td><input type="radio" name="mat" value="Titanium"><b>Titanium</b></td>
<td><input type="radio" name="mat" value="Steel"><b>ck-45 Steel</b></td></tr>

<tr><td><h1>L/ D Ratio of Workpiece</h1></td><td>:</td><td><input type="radio" name="l/d" value="1"><b>1.0</b></td>
<td><input type="radio" name="l/d" value="1.5"><b>1.5</b></td><td><input type="radio" name="l/d" value="2"><b>2.0</b></td></tr>

<tr><td><h1>Coefficient of Friction</h1></td><td>:</td><td><input type="radio" name="fr" value="0"><b>Low</b></td>
<td><input type="radio" name="fr" value="Medium"><b>Medium</b></td>
<td><input type="radio" name="fr" value="High"><b>High<b></td></tr>

<tr><td><h1>Velocity of Upper Die/ Speed</h1></td><td>:</td><td><input type="radio" name="udie" value="1"><b>1 mm/sec</b></td>
<td><input type="radio" name="udie" value="10"><b>10 mm/sec</b></td></tr>

<tr><td><h1>Material/ Workpiece Temperature</h1></td><td>:</td><td><input type="radio" name="m/w" value="Cold"><b>Cold</b></td>
<td><input type="radio" name="m/w" value="Hot"><b>Hot</b></td></tr>
</table>

<center><input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM></center>

<?php
$ld = $_REQUEST["l/d"];
$fr = $_REQUEST["fr"];
$udie = $_REQUEST["udie"];
$mat = $_REQUEST["mat"];
$mw = $_REQUEST["m/w"];

if($_REQUEST["send"]=="Submit"){
if($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/ZM4KTeY0fkM\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). Friction (for billet and dies) =0 is shown on the top end in the video. The upper die presses with the velocity of 1mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature of billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/YexxEWMmr0g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). Friction (for billet and dies) =0  is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature of billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/kdPNdJpcM1g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/lcswntWlTs0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/vQPLcJQdQoI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). High Friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature of billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/IAm1E3RNMvY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1 is taken cold (cold upsetting). High Friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature of billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/CxQRbjk6hI0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/UejnTV3nxbE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/FaFOf7GScdo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/VXUML__jZkU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/nn5ImD6zPtA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/mbnWqKSham0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/MJDVGHrUfqo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/vlrJRrQzbEc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/i0WwhsaNPF0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/2UK-T73ENdQ\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/ebH_dwlG4v0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/gvCLYLauX6g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminum having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/rvJq7REBAjg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/7cjinrkKRZU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/UvseiAjBEMs\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QxonJoO3t9g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/x30WXY8AF24\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/4W6OPzg8o18\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Tahzyi1sMak\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/iDYT8oY5j8g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/OAqn11LzhyY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Zwx_l0a0OHg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/pDhMx_JY50E\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QnvxdaobFpk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/WP1Iq5pkJMs\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/IK5oqLSQIA8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/x-BB4SeCQls\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/qL5IT0bjbYs\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/eZQ2AMZVzCE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Aluminium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/R5Kbz33Wy3A\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/yn3KztCdhgo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/0d4t9JeuhhM\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/WNc133guG6I\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/U4J6BoFsr7Y\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/_fkgivA0K2E\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/w2I1MBDMkvw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/p8Cdj6H7Smw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/ZPv0mBbFDdA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/2z5QlMT8HeI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QzR37TDjWQU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/IDnWX9kOq9U\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/CEURWyA_deA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/1eA0xKdZ2II\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/ipIdV3cfh1g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent starin in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/EcsZHx6jfZM\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/uqRlhBuqMFI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/eNyWcZ3xHlI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent starin in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/6DZZ_XB2rQo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/BGCYMKhU8k4\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/-mmRdfVzSQI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/dwMc43-hpDk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/B4w8YMgbL2Q\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/u6luMVWVFGA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/YZZ_w2d6GR4\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/cQxPCNm7550\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/o3d1OZV04Vs\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/_jsQorIS0sA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/0pay20CNuqE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/taxc6HEzIlY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/JRCZrs8tG74\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/0mB_ndEAytw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/9NPLr_SUXpI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/fHqhpOZbA40\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/qcbRndJMkh8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Usbj-_z_9kk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Copper" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Rio9kA5pB_Y\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/jMLjH1jcYP8\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  290.62 tonnes. The average  equivalent strain generated here is 0.69.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/CcZ3eXAyi3w\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand, upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 302.09 tonnes. The average  equivalent strain generated here is 0.69.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/HylanAZ2vsA\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 210<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 302.32 tonnes.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Taf0WhgtBKo\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 239.57<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 314.21 tonnes.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/xCgR1SD4jwk\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25 °C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 250<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 319.38 tonnes.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/TQe8JStfduk\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 332.6 tonnes. The average  equivalent strain generated here is 1.04.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/FjkdIMCyu5Q\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 288.51 tonnes. The average  equivalent strain generated here is 0.71.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/-nPrKRmkEIg\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 221.03<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 299.8 tonnes.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/GKEeXYyHAVM\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 221.34<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. the length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 294.57 tonnes.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/JThVT6N_eJ4\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 271.76<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. the length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 305.86 tonnes.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/3En5EirPTOE\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 293.58 tonnes. The average  equivalent strain generated here is 1.06.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/SwvMYmyyCaI\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch.  Maximum forging force required here is 305.18 tonnes. The average  equivalent strain generated here is 1.09.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/KpmZCFJi-KI\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 24.99<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 212.58<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 288.26 tonnes.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/BR3OMtcBdXs\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 299.43 tonnes. The average  equivalent strain generated here is 0.689.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QgEPw72sSGo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Titanium having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/DbB8rqK3bAE\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 239.98<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  302.64 tonnes.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/PuYSCnGnGe8\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 261.08<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  285.51 tonnes.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/srR8j2VD1ko\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 203.56<sup>o</sup>C
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  295.57 tonnes.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/C7hograMpFQ\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 557<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  422.02 tonnes.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/TVa6a4wQjIk\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 570.96 tonnes. The average  equivalent strain generated here is 0.718.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/TSJYyWwxMMI\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 579.47<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 428.6 tonnes.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/EX4Pu5u1CXc\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch..Maximum forging force required here is 579.55 tonnes. The average  equivalent strain generated here is 0.84 .";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/oQPJGh82sDU\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 580.25<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 442.64 tonnes.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/XsyECrVwaH4\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10 mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 711.14<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 601.92 tonnes.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/WuHbQH7q5q8\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 551.73<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 397.43 tonnes.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/V0DbzGMmT70\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 537.06 tonnes. The average  equivalent strain generated here is 0.707.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/NRHlK6eadcA\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 591.59<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 401.33 tonnes.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/wVcc_XgsCXE\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 542.3 tonnes. The average  equivalent strain generated here is 1.91.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/-bJlYuG0rXU\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 593.706<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 408.27 tonnes.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/zekdJ8Syzoo\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 551.45 tonnes. The average  equivalent strain generated here is 1.7.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/8hVICoUZwZ8\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 299.69<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 538.19<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 382.71 tonnes.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Na_xhSr9oz0\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is 516.91 tonnes. The average  equivalent strain generated here is 0.758.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/LgG3TRYhvxk\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 299.62<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 630.88<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  385.49 tonnes.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QHT6cN37Ing\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  520.62 tonnes. The average  equivalent strain generated here is 1.23.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Ad1UWTMGU6w\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 1mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 299.45<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 599.08<sup>o</sup>C.
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  390.26 tonnes.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Titanium" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/c2NqxZ-MWmk\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction with a velocity of 10mm/sec.
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is hydraulic press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  527.41 tonnes. The average  equivalent strain generated here is 1.76.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/nXkdeDp_5nY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/b9NHbndypVE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/4zxKZLLTKko\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/tmesU6g64Jg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/SbhH_bDdFD4\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/itZ8CE-ySL0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/dFV212X4EbU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/awXCDbTGcQk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/BzUoMy5eRAc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Yn9s1omttIg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/mA-f4MSfqfE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/cx8B1djAaP4\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/pNrMJi9g2Ss\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/z6nu_JI3gCs\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/TnjvYth0p7E\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/NYsxjOAG7Fw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/yj1REUz7nWk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/XI5j39mEkz0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/3AXtLK-MJfc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/vncZKAOy-c8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/fHtnFgRSTHE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/hI89sBaUzbw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/4K6WIaRxKBc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/CCJI1a-Ap1c\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Lv-ddecIkqo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/xM6nrXu5s8w\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/oAyIHMk9K_M\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/KGju7NSC988\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/-NS5XhgSCjo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="1.5" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/xfyMzLkhQks\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Nx8HGU3YxsA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($ld=="2" && $fr=="0" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/TWFe6qYSf_c\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/8FklVq_TRZ8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="Medium" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/OF0jCg2VKnk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the colour of parts";
}
elseif($ld=="2" && $fr=="High" && $udie=="1" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/AGDpLM5kjgI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($ld=="2" && $fr=="High" && $udie=="10" && $mat=="Steel" && $mw=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/n5BJMa5N4nI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Hydraulic Press. The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 10 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the pressure over billet changing during the process.";
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