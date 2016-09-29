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
<br><center><u style="font-size:2em; color:#ff00ff;">Interactive Simulation Bench for Mechanical Press</u>

<FORM METHOD="post" onSubmit="return valid(this)" action="Mechanical.php">
<table border="0" cellpadding="2" cellspacing="22">

<tr><td><h1>Material</h1></td><td>:</td><td><input type="radio" name="mat" value="Aluminium"><b>Aluminium</b></td>
<td><input type="radio" name="mat" value="Copper"><b>Copper</b></td><td><input type="radio" name="mat" value="Titanium"><b>Titanium</b></td>
<td><input type="radio" name="mat" value="Steel"><b>ck-45 Steel</b></td></tr>

<tr><td><h1>L/ D Ratio of Workpiece</h1></td><td>:</td><td><input type="radio" name="l/d" value="1"><b>1.0</b></td>
<td><input type="radio" name="l/d" value="1.5"><b>1.5</b></td><td><input type="radio" name="l/d" value="2"><b>2.0</b></td></tr>

<tr><td><h1>Coefficient of Friction</h1></td><td>:</td><td><input type="radio" name="fr" value="0"><b>Low</b></td>
<td><input type="radio" name="fr" value="Medium"><b>Medium</b></td>
<td><input type="radio" name="fr" value="High"><b>High<b></td></tr>

<tr><td><h1>Material/ Workpiece Temperature</h1></td><td>:</td><td><input type="radio" name="m/w" value="Cold"><b>Cold</b></td>
<td><input type="radio" name="m/w" value="Hot"><b>Hot</b></td></tr>
</table>

<center><input type="submit" name="send" value="Submit">
<input type="button" name="reset_form" value="Reset Form" onclick="this.form.reset();"></center>
</FORM></center>

<?php
$mat = $_REQUEST["mat"];
$ld = $_REQUEST["l/d"];
$fr = $_REQUEST["fr"];
$temp = $_REQUEST["m/w"];

if($_REQUEST["send"]=="Submit"){
if($fr=="0" && $ld=="1" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Xp-Bq2lL-tU\"</script>";
$_SESSION['speech'] = "The metal forming video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/yQbZ9YpEnxQ\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/-tC7YlVtDhA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/3D2q8X4c0AU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/svUA3cyiI7M\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/FZ5U-ttRsMM\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/b-EM1WXqR3c\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/aYhK7EiTJXI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Aluminium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/bUeyEkV39so\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QGma60Qhw64\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/y3alJ_RQSbM\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/1fIeVnDiTsk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/6VoZcYjsFpY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/C8hOS2AeNoo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/vSyVHJhjXqo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/bBcvUfSyuOE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/eeOnx0_h98Y\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Aluminium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/_q2EcobGsZg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Aluminium having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Ay_e6inSNJ4\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/KHFSna3WYGY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/2eUVrt19Dpc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/LZ_U6OxuACg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/SSlyvyUBxZU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/moPQ2nk5gDg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/G5wZ7RKTxbk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/9XktRYoysrY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Copper" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/OZ9hed_dkaU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/QyowFqJVjqo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/uq867SDtMX0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/mMkK2LZip2Y\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/GB5EQVKHayI\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/is_8MInyDJ8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the equivalent strain in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/3Uhq6jv7qrw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/5IM_0jrIOvw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/63FUwnUAoBQ\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Copper" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/6as0xm6T_XY\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Copper having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/SLEJFcmKpSU\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/yRqzuBMF6bk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/NC_UQXpMyNc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/rwUkIa55dno\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/GeK7nGvUnPc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/1bF6sdOPgB8\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/X9rXJMZPRsA\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/8vkmdItF4cw\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Steel" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/eKYS5X7kBXk\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken cold (cold upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/V_RScIStnTg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/PCLWEHkYU5g\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/HemzEEJ73Ws\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/04v2g-4rnwE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/x6hE60TQpd0\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/CYf6ekJANLo\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=1.5 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/_q6IAva1HAg\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Zero friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/RDiQlhiYcPE\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). Medium friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Steel" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Xw-0wUhYrvc\"</script>";
$_SESSION['speech'] = "The video shows the upsetting operation taking place using Mechanical Press The initial billet of Steel having L/D ratio=2 is taken hot (hot upsetting). High friction (for billet and dies) is shown on the top end in the video. The upper die presses with the velocity of 1 mm/sec with lower die stationary. 
On the right hand side one could see the graph of forging force on upper die vs. pilot height showing the forging force evolution during upsetting process for 50% deformation. The scale on left hand side describes the temperature in billet changing during the process.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/C7NRM9976UA\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand, upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  290.52 tonnes. The average  equivalent strain generated here is 0.69.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/W2bHPsl157Q\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 261.85<sup>o</sup>C. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  302.06 tonnes.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/YdPP0-36ifM\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand, upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time.  The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 316.71<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  319.02 tonnes.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/jqFZkP_a_3o\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process.  Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 136.16<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  211.09 tonnes.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/750605tq1Qs\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 137.83<sup>o</sup>C. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  214.12 tonnes.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/WrnmcbjyC1g\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand, upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 166.21<sup>o</sup>C. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  213.9 tonnes.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/W4ao11XXz2I\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 99.82<sup>o</sup>C.
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  181.97 tonnes.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/Uz3Qw0Ts3S4\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 109.51<sup>o</sup>C. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  183.78 tonnes.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Titanium" && $temp=="Cold"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/hhZgb-2q37Q\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 25<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 115.50<sup>o</sup>C. 
Here the cold upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  185.38 tonnes.";
}
elseif($fr=="0" && $ld=="1" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/S51jNOrc36k\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 619.73<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  630.29 tonnes.";
}
elseif($fr=="Medium" && $ld=="1" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/GXdeANmtAHg\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 690.12<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  639.88 tonnes.";
}
elseif($fr=="High" && $ld=="1" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/2NQYZnniyug\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 580.25<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  442.64 tonnes.";
}
elseif($fr=="0" && $ld=="1.5" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/OITpI9aiHos\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 541.26<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  588.9 tonnes.";
}
elseif($fr=="Medium" && $ld=="1.5" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/T-ZVgbM6_eY\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand, upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300 <sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 620.22<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  594.62 tonnes.";
}
elseif($fr=="High" && $ld=="1.5" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/hQ4XmYIrKIs\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 654.402<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 1.5 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  605.43 tonnes.";
}
elseif($fr=="0" && $ld=="2" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/5L4wY2ncjjI\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 495.28<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. The length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is zero. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  562.45 tonnes.";
}
elseif($fr=="Medium" && $ld=="2" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/uZzfKu5NQbo\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is 559.40<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. the length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is medium. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  566.54 tonnes.";
}
elseif($fr=="High" && $ld=="2" && $mat=="Titanium" && $temp=="Hot"){
echo "<script>window.location=\"Upset_Experiment.php?https://www.youtube.com/embed/NiW27QYWB4k\"</script>";
$_SESSION['speech'] = "Here this metal forming simulation is depicting upsetting process. Upsetting is a process in which metal is plastically deformed and it is an open die forging process. This process is extensively used for shaping over sized billets by compressing them. In this Finite Element Simulation video, one can see upsetting process simulation for Titanium. Here, one can observe that forging process requires two dies - one bottom and one upper die. Bottom die is rigid and it is not moving, on the other hand , upper die is moving in downward direction. 
One could observe in this simulation that only one fourth part of the upsetting process is shown here. This is because upsetting process is axis symmetric, so therefore only one part of the process is simulated for the sake of saving completion time. The initial temperature of Billet is 300<sup>o</sup>C. The change in temperature is depicted by the colour code shown on the left hand side of the video  & final temperature of the billet is  589.11<sup>o</sup>C. 
Here the hot upsetting process for Titanium billet is shown. the length by diameter or L by D ratio of billet is 2 and the friction involved in the upsetting process is high. The reduction produced after forging is 50% & the press used is mechanical press.
The graph on the right side shows the evolution of the Forging Force with pilot height of the punch. Maximum forging force required here is  574.11 tonnes.";
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