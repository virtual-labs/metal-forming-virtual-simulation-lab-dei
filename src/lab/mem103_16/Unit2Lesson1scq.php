<?php session_start();
ini_set("display_errors","Off");
if($_SESSION['auth']!="rahulMEM103_2016swarupsharma")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML public "-w3c//dtd//xhtml 1.0 strict//en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table Border="0" width="100%"><tr>
<td width="35%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit2lesson1.php" title="Metal Forming Processes">Lesson 1 Metal Forming Processes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 1 Self-Check Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit2/Lesson1/Unit2Lesson1scq.pdf" target="_blank" title="Download Self-Check Questions">Self-Check Questions Download</a><br/><br/>
<b>1. Workability of a metal</b><br/>
a. is same as its formability<br/>
b. refers to the deformation in which forces applied to the metal are mainly compressive<br/>
c. refers to the deformation in which forces applied to the metal are mainly tensile<br/>
d. refers to the deformation in which forces applied to the metal are mainly shear<br/><br/>
<b>2. Stresses experienced by the material during metal working process are</b><br/>
a. greater than the yield strength but less than the fracture strength of the material<br/> 
b. greater than the tensile strength but less than the compressive strength of the material<br/> 
c. greater than the compressive strength but less than the tensile strength of the material<br/> 
d. greater than the tensile strength but less than the shear strength of the material<br/><br/>
<b>3. In metal working process</b><br/> 
a. there is no change in the material strength<br/> 
b. the material strength improves by strain hardening<br/> 
c. the material strength deteriorates by strain hardening<br/> 
d. the material strength deteriorates by atom dislocation<br/><br/>
<b>4. As a metal is deformed into desired shape, it experiences</b><br/> 
a. only tensile stresses<br/> 
b. only tensile or compressive stresses<br/> 
c. only tensile, compressive or shear stresses<br/>
d. various combinations of tensile, compressive, and shear stresses<br/><br/>
<b>5. The orientation of the atoms in a grain</b><br/> 
a. is uniform but differs in adjacent grains<br/> 
b. is uniform and the pattern of orientation remains same throughout the material<br/> 
c. is non-uniform and this variation is uniform in all grains of a material<br/> 
d. is non-uniform and the orientation differs from one grain to another<br/><br/>
<b>6. The amount of deformation that a metal can undergo at room temperature depends on its</b><br/> 
a. Tensile strength<br/> 
b. Compressive strength<br/> 
c. Hardness<br/> 
d. Ductility<br/><br/>
<b>7. The amount of deformation that metal can undergo</b><br/> 
a. is more when it is in pure state than when it is alloyed with other elements<br/> 
b. is less when it is in pure state than when it is alloyed with other elements<br/> 
c. is not affected whether it is in pure state or it is alloyed with other elements<br/> 
d. depends upon the alloying elements in it as alloying decreases the tendency and rapidity of strain hardening<br/><br/>
<b>8. When a metal is deformed in cold state, severe stresses are set up in it. These stresses are called</b><br/> 
a. residual stresses<br/> 
b. recrystalline stresses<br/> 
c. biaxial and triaxial stresses<br/> 
d. microscopic stresses<br/><br/> 
<b>9. Cold working is the name given to the process of plastic deformation of metals performed generally at</b><br/>
a. zero degree centigrade<br/> 
b. zero degree Kelvin<br/> 
c. below the recrystallization temperature of metal<br/> 
d. above the recrystallization temperature of metal<br/><br/>
<b>10. Directional properties can be imparted to the metal in</b><br/> 
a. Cold working<br/> 
b. Hot working<br/> 
c. Warm working<br/> 
d. Both hot and cold working but not in warm working<br/><br/>
<b>11. Probability of residual stresses being present in the component is more when it is manufactured by</b><br/> 
a. Cold working<br/> 
b. Hot working<br/> 
c. Warm working<br/> 
d. Both hot and cold working but not in warm working<br/><br/>
<b>12. Hot working is the name given to the process of plastic deformation of metal carried out at a temperature</b><br/> 
a. hundred degree centigrade<br/> 
b. hundred degree Kelvin<br/> 
c. above the recrystallization temperature of metal<br/> 
d. below the recrystallization temperature of metal<br/><br/>
<b>13. Recrystallization temperature of a metal is the one at which</b><br/>
a. its atoms reach a certain higher energy level and the new crystals start forming<br/> 
b. its crystals start recirculating around the atoms<br/> 
c. its crystals reunite to become bigger in size<br/> 
d. its crystals cease to reunite<br/><br/>
<b>14. In warm working of metals, the metal deformation is carried out at temperatures</b><br/> 
a. above the recrystallization temperature<br/> 
b. above the recrystallization temperature but below the crystallization temperature<br/> 
c. below the recrystallization temperature but above the room temperature<br/> 
d. below the recrystallization temperature but above the crystallization temperature<br/><br/>
<b>15. In which metal working process the surface finish of material becomes poor due to scale formation?</b><br/> 
a. Cold working<br/> 
b. Warm working<br/> 
c. Lukewarm working<br/>
d. Hot working<br/><br/>
<b>Possible answers to self check questions</b><br/><br/>
<table width="400">
<tr><td>1</td><td>(b)</td><td>2</td><td>(a)</td><td>3</td><td>(b)</td></tr>
<tr><td>4</td><td>(d)</td><td>5</td><td>(a)</td><td>6</td><td>(d)</td></tr>
<tr><td>7</td><td>(a)</td><td>8</td><td>(a)</td><td>9</td><td>(c)</td></tr>
<tr><td>10</td><td>(a)</td><td>11</td><td>(a)</td><td>12</td><td>(c)</td></tr>
<tr><td>13</td><td>(a)</td><td>14</td><td>(c)</td><td>15</td><td>(d)</td></tr>
</table>
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute (www.dei.ac.in)</div>
</body>
</html>
<?php
}
 	//Opening file to get counter value
	$fp = fopen ("../counter.txt", "r");
	$count_number = fread ($fp, filesize ("../counter.txt"));
	fclose($fp);
	$counter = (int)($count_number) + 1;
    $count_number = (string)($counter);
	$fp = fopen ("../counter.txt", "w");
	fwrite ($fp, $count_number);
	fclose($fp);
?>