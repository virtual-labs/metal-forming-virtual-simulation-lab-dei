<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 transitional//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Virtual Lab-Dayalbagh Educational Institute</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/dropdown.css" media="all" rel="stylesheet" type="text/css" />
<link href="css/advanced.css" media="all" rel="stylesheet" type="text/css" />
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
<div style="background-image:url(images/content_bg.jpg);position: relative; margin:auto; width: 1024px; min-height:550px;">
<div class="box">
<h2>Variables in Upset Forging Process</h2><br>
<span class="blue">EFFECT OF FORGING EQUIPMENT ON FORGING PROCESS </span><br>
<br>Each type of forging press or machine (mechanical, hydraulic, screw, hammer) has unique stroke characteristics. One important variable that affects the forming process is press ram speed. Some machines have constant ram speeds (hydraulic press) while others have variable ram speeds (mechanical press).<br><br>
<center><span class="blue">HYDRAULIC PRESS SIMULATION</span></center><br><table>
<tr><td>Material </td><td>:AlZn5.6Mg2.5Cu1.5<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:300°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hydraulic </td></tr>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/HLS6QvxQp00?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/VwXtx_7IRgM?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CK45<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1050°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hydraulic </td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/FwpdehmcQn0?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/YpEaUCgCsB4?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:Ti6Alv4<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1200°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hydraulic</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/56SHjqKi1zY?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/5LtczLm34ks?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CuZn40Al2<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:650°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hydraulic </td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/kJZDj_hYqe0?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/I2WBYXNFEsc?rel=0" frameborder="0" allowfullscreen></iframe></center><br><br>
<center><span class="blue">MECHANICAL PRESS SIMULATION</span></center><br><table>
<tr><td>Material </td><td>:AlZn5.6Mg2.5Cu1.5<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:300°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Mechanical</td></tr>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/DVMsXEO_g-o?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/8ZmAwo068g4?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CK45<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1050°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Mechanical</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/lsR5yypQkuk?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/bzPxZ1uG7m8?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:Ti6Alv4<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1200°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Mechanical</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/LnrTjVe2TUg?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/a1Knb-9fdDE?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CuZn40Al2<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:650°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Mechanical</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/yADMPIyODCo?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/VjzBCP-Fa60?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<center><span class="blue">HAMMER PRESS SIMULATION</span></center><br><table>
<tr><td>Material </td><td>:AlZn5.6Mg2.5Cu1.5<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:300°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hammer</td></tr>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/yu1c8__rnio?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/LRFtO2fTvmA?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CK45<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1050°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hammer</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/l02ZZkeHC0E?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/3a_q_orQvgA?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:Ti6Alv4<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:1200°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hammer</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/JunTppSTEMs?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/lYP1nCd2R6M?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<table>
<tr><td>Material </td><td>:CuZn40Al2<br></td></tr>
<tr><td>Dimension</td><td>:Height =100 mm,&nbsp;&nbsp;&nbsp;&nbsp;Diameter =100mm</td></tr>
<tr><td>Billet Temperature</td><td>:650°C</td></tr>
<tr><td>Die Temperature</td><td>:250°C</td></tr>
<tr><td>% Reduction in height&nbsp;&nbsp;&nbsp;&nbsp;</td><td>: 50%</td></tr>
<tr><td>Press</td><td>:Hammer</td></tr><br>
</table>
<br><center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/E-A2eWIofQY?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">FORCE DURING UPSETTING PROCESS</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/mYS0nP3fUfo?rel=0" frameborder="0" allowfullscreen></iframe></center><br>
<span class="blue">Comparision</span><br><br>
<center>
<iframe width="600" height="400" src="https://www.youtube.com/embed/8b5zd85WfHM?rel=0" frameborder="0" allowfullscreen></iframe></center>
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
&copy; Metal Forming Virtual Simulation Lab - Dayalbagh Educational Institute (www.dei.ac.in)
</div>
</body>
</html>