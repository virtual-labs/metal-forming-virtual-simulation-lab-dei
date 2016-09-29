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
<body style="background:#FFFFFF; margin:auto; width: 1024px; text-align:justify;">
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table width="100%"><tr>
<td width="35%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson9.php" title="Lesson 9 Types of Moulding Methods and Moulding Machines">Lesson 9 Types of Moulding Methods and Moulding Machines</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 9 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson9/Unit3Lesson9faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q.1. Compare bench, floor and pit moulding process on the basis of application?</b><br/><br/>
<b>Bench moulding</b>: is for small work, done on a bench of a height convenient to the moulder.<br/><br/>
<b>Floor moulding</b>: When castings increase in size, with resultant difficulty in handling, the work is done on the foundry floor. This type of moulding is used for practically all medium and large size castings.<br/><br/>
<b>Pit moulding</b>: Extremely large castings are frequently moulded in a pit instead of a flask. The pit acts as the drag part of the flask and a separate cope is used above it. They sides of the pit are brick kind, and on the bottom there.<br/><br/>
<b>Q.2. What are the Desirable characteristics of Moulds?</b><br/>
1. The mould must be strong enough to hold the weight of the metal.<br/>
2. The mould must resist the erosive action of the rapidly flowing molten metal during pouring.<br/>
3. The mould must generate a minimum amount of gas when filled with molten metal.<br/>
4. The mould must provide enough venting so that any gases formed can pass through the body of the mould itself, rather than penetrate the metal.<br/>
5. The mould must be refractory enough to withstand the high temperature of the molten metal and strip away cleanly from the casting after cooling.<br/>
6. The mould must permit the casting to contract after solidification.<br/><br/>
<b>Q.3. What are the basics functions that are performed by moulding machines?</b><br/>
Moulding machines perform the following basic functions:<br/>
(i) Ramming or compacting of sand in the mould boxes through the operations of jolting, squeezing or slinging the sand in the mould box.<br/>
(ii) Rolling over or inverting the mould upside down.<br/>
(iii) Rapping of pattern (embedded in compacted sand) by vibrating it.<br/>
(iv) Withdrawing of pattern from the mould.<br/>
(v) forming the gate<br/><br/>
<b>Q.4. What are the adavantages of doing moulding using machines?</b><br/>
Mechanized mould making offers several advantages, such as greater and uniform strength of mould, greater production rate, less-skilled labour requirement, and better component dimensional tolerances.<br/><br/>
<b>Q.5. What are the different techniques compacting after the pattern and cores have been inserted into the sand?</b><br/><br/>
(i) <b>Squeeze Moulding Machines</b> - automatically insert and compact sand. The processes used are designed to produce a uniform compaction. Jolting is sometimes used to help settle the sand. These moulds are made in flasks.<br/><br/>
(ii) <b>Vertical Flaskless Moulding</b> - the moulds halves are made by blowing sand against a vertical mould. High production rates are possible.<br/><br/>
(iii) <b>Sandslingers</b> - A high speed stream of sand into the flask tends to pack the sand effectively.<br/><br/>
(iv) <b>Impact moulding</b> - an explosive impulse is used to compact the sand. The mould quality with this technique is quite good.<br/><br/>
(v) <b>Vacuum moulding</b> - an envelope of plastic is created about the sand using plastic sheeting. Air is drawn from the sand, and the vacuum leads to compaction.<br/><br/>
<b>Q.6. What is mulling with reference to moulding?</b><br/>
Mixing thoroughly of sand mixture is called mulling. Generally mulling machines are used to uniformly mull.<br/><br/>
<b>Q.7. Name few additives that are used with sand for moulding.</b><br/>
<b>Clay</b> (bentonite) is used as a cohesive agent to bond sand particles (giving the sand strength).<br/><br/>
<b>Zircon</b> (ZrSiO<sub>4</sub>), <b>Olivine</b> (Mg<sub>2</sub>SiO<sub>4</sub>) and <b>Iron</b> silicate (Fe<sub>2</sub>SiO<sub>4</sub>) sands are often used in steel foundries for their low thermal expansion.<br/><br/>
<b>Chromite</b> (Fe<sub>2</sub>Cr<sub>2</sub>O<sub>4</sub>) is used for its high heat transfer properly.<br/><br/>
<b>Q.8. What is Fettling of casting?</b><br/>
Fettling is the cleaning operation of removing from casting the adhering sand, gates, risers, flash metal at joints, fins or cores and cleaning the casting surface. Gates and risers are removed by hammering, chipped off by chisel and hand or pneumatic hammer and castings cleaned by chipping, filing, shearing or sawing with abrasive wheel, flame cutting or grinding. After fettling of gates and risers or fins, the adhering sand is removed by raping, wire brushing, tumbling, pickling and shot blasting. 
Raping involves hammering the casting to remove sand. In tumbling, castings are kept in a barrel with small shaip-cornered stars of white cast iron and the barrel rotated so that the impact of stars with casting may result in cleaning the castings. In the pickling process, castings are treated with acids such as hydrofluoric acid for cast iron castings, nitric acid for brass castings. Castings are later dipped in some alkaline solution and then in hot water. In shot blasting, large size sand particles or round or angular chilled iron shots are projected with high velocity against castings, the shots being carried by high velocity air-stream or mechanically hurled from a rotating impeller.<br/><br/>
</div>
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