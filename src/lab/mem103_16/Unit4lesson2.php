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
<div id="header"><br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 2 Gas Welding or Oxyfuel Gas Welding (OFW)</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit4/Unit4Lesson2.pdf" target="_blank" title="Download Lesson 2">Lesson 2 Download</a></td></tr>
<tr><td><a href="#introduction">2.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#gas">2.1&nbsp;&nbsp;&nbsp;Oxy-Acetylene Gas Welding Process</a></td></tr>
<tr><td><a href="#flame">2.2&nbsp;&nbsp;&nbsp;Oxy-Acetylene Flame</a></td></tr>
<tr><td><a href="#types">2.3&nbsp;&nbsp;&nbsp;Oxy-Acetylene Flame types</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3.1&nbsp;&nbsp;&nbsp;Neutral Flame</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3.2&nbsp;&nbsp;&nbsp;Carburising Flame (Reducing Flame)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.3.3&nbsp;&nbsp;&nbsp;Oxidising Flame</td></tr>
<tr><td><a href="#equipment">2.4&nbsp;&nbsp;&nbsp;Equipment used in Oxy-Acetylene Welding</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.1&nbsp;&nbsp;&nbsp;Oxygen Cylinder</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.2&nbsp;&nbsp;&nbsp;Acetylene Cylinders</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.3&nbsp;&nbsp;&nbsp;Pressure Regulators</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.4&nbsp;&nbsp;&nbsp;Gas Hose</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.5&nbsp;&nbsp;&nbsp;Check Valves</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.6&nbsp;&nbsp;&nbsp;Flash Back Arrestors</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.7&nbsp;&nbsp;&nbsp;Torch</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.4.8&nbsp;&nbsp;&nbsp;Torch Tip</td></tr>
<tr><td><a href="#rods">2.5&nbsp;&nbsp;&nbsp;Welding Rods (Filler Metal) for Oxyfuel Welding</a></td></tr>
<tr><td><a href="#fluxes">2.6&nbsp;&nbsp;&nbsp;Fluxes for Oxyfuel Welding</a></td></tr>
<tr><td><a href="#lighting">2.7&nbsp;&nbsp;&nbsp;Lighting the Torch and Flame Adjustment</a></td></tr>
<tr><td><a href="#base">2.8&nbsp;&nbsp;&nbsp;Base Metal (Workpiece) Preparation</a></td></tr>
<tr><td><a href="#variables">2.9&nbsp;&nbsp;&nbsp;Process Variables for Oxy-Acetylene Welding</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">2.0 &nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
Gas welding processes are a group of welding processes in which weld is made by melting the base metals with a flame obtained by combination of fuel gas (such as acetylene, propane, butane or natural gas) and oxygen to produce a heat, having sufficient energy to melt the base metals.<br/><br/>
Fuel gases are burned with oxygen rather than air because the large nitrogen component of air, which contributes nothing to the combustion, results in a low-temperature flame that is below the fusion temperature of most metals. The type of fuel gas to be used is determined by the desired flame temperature. The most commonly used fuel gas in welding is acetylene and, hence, the process of gas welding is known as oxy-acetylene welding.<br/><br/>
It should be noted here that all the fuel gases used in welding are hydrocarbons consisting of carbon and hydrogen. When they are burned with pure oxygen, they produce carbon dioxide and water, which can damage the metals being welded, like titanium is harmed by these elements. Therefore, we should be certain that the metals being welded by using gas welding are not reactive to the resulting compounds.<br/><br/>
<b>Advantages of gas welding</b><br/>
1. Because oxy acetylene gas welding requires minimal equipment, it is portable, inexpensive and suitable for manual methods.<br/>
2. Weld bead size and shape and weld puddle viscosity are also controlled in the welding process because the filler metal is added independently of the welding heat source.<br/>
3. The gas welding setup can be quickly converted to metal cutting.<br/>
4. Excellent control of temperature of weld zone. Ideal for thin metals, small pipe, poor fit-up, smoothing or repairing rough arc welds.<br/>
5. Used as source of heat for bending, forming, straightening, hardening.<br/><br/>
<b>Disadvantages of gas welding</b><br/>
1. Gas welding involves manual operation.<br/>
2. Gas welding process is slow.<br/>
3. Gas welding requires proper training of worker.
</p></dd><br/>
<dt><b><a name="gas">2.1 &nbsp;&nbsp;&nbsp;Oxy-Acetylene gas welding process</a></b></dt>
<dd><p>
Oxyacetylene gas welding process burns acetylene gas in oxygen stream creating a very high flame temperature of approximately 33000C. The basic technique involves melting the edges of a joint so they can be fused together. A filler rod may also be used to supply molten metal to the interface, and may have flux coating to retard oxidation by generating a gaseous shield around the weld area and dissolving surface oxides.<br/><br/>
<center><img src="images/mem/Unit4/Lesson2/1.jpg"><br><b>Figure 1: Schematic view of oxy-acetylene gas welding process</b></center><br/>
The oxygen is supplied from steel cylinders and the acetylene either from cylinders or from an acetylene generator. With cylinder gas, the pressure is reduced to 0.06 N/mm2 or under, according to the work, by means of a pressure-reducing valve and the acetylene is passed to the torch where it is mixed with oxygen in approximately equal proportions, and finally passed into the tip to be ignited.
</p></dd><br/>
<dt><b><a name="flame">2.2 &nbsp;&nbsp;&nbsp;Oxy-Acetylene Flame</a></b></dt>
<dd><p>
Chemical reaction resulting from the combustion of acetylene with oxygen is an exothermic reaction in which equal volumes of acetylene and oxygen react to produce carbon monoxide, and hydrogen as products of the first stage of combustion. Theoretically, equal volumes of oxygen and acetylene are supplied to the torch. The reaction is as follows:<br/>
Stage 1<br/>
<center>Acetylene + Oxygen = Carbon Monoxide + Hydrogen<br/>
C<sub>2</sub>H<sub>2</sub> + O<sub>2</sub> = 2CO + H<sub>2</sub></center>
Stage 2<br/>
<center>Carbon Monoxide + Hydrogen + Oxygen = Carbon Dioxide + Water<br/>
CO + H<sub>2</sub> + O<sub>2</sub> = CO<sub>2</sub> + H<sub>2</sub>O</center><br/>
In Stage 2, the carbon monoxide burns and forms carbon dioxide, while the hydrogen which is formed in Stage 1, combines with oxygen to form water. The combustion is therefore complete and carbon dioxide and water (turned to steam) are the chief products of combustion. This produces a flame temperature of approximately 3200°C.
</p></dd><br/>
<dt><b><a name="types">2.3 &nbsp;&nbsp;&nbsp;Oxy-Acetylene Flame types</a></b></dt>
<dd><p>
The oxy-acetylene flame has three sections: the inner cone, the middle acetylene feather, and the outer flame envelope. The ratio of the length between the inner cone and the middle acetylene feather should be controlled by adjusting the gases. The temperature of the oxyacetylene flame is not uniform throughout its length of the flame. The temperature is highest just beyond the end of the inner cone and decreases gradually toward the end of the flame. It is so high up to 3316°C.<br/><br/>
<center><img src="images/mem/Unit4/Lesson2/2.jpg"><br><b>Figure 2: Temperature distribution along the length of the flame</b></center>
<b>2.3.1 Neutral flame</b><br/>
The neutral flame is obtained when equal proportions of acetylene and oxygen are used and combustion is complete by consuming all the carbon supplied by the acetylene and the maximum heat given out. In neutral flame, the flame contracts and the white rounded shape cone become clearly visible. This type of flame is extensively used by the welder. In neutral flame, the temperature at the inner cone tip is approximately 3232°C, while at the end of the outer envelope the temperature drops to approximately 1260°C. When steel is welded with this flame, the puddle of molten metal is quiet and clear, and the metal flows without boiling, foaming, or sparking.<br/><br/>
<center><img src="images/mem/Unit4/Lesson2/3.jpg"><img src="images/mem/Unit4/Lesson2/4.jpg"><br/><br/><img src="images/mem/Unit4/Lesson2/5.jpg">
<br><b>Figure 3: Temperature distribution along the length of the flame</b></center><br/>
<b>2.3.2 Carburizing flame (Reducing flame)</b><br/>
The carbonizing flame is obtained with excess of acetylene and showing two cones of flame in addition to an outer envelope. Since it contains excess of acetylene its flame temperature is lower, and the available carbon is not burnt completely because of less oxygen. This flame should not be used for welding steel as unconsumed carbon may be introduced into the weld and produce a hard & brittle deposit. The carburizing flame is best used for welding high carbon steels, for hard surfacing, and for welding non-ferrous alloys, such as Monel. It has a temperature of approximately 3149°C at the inner cone tips.<br/><br/>
<b>2.3.3 Oxidizing flame</b><br/>
Oxidizing flame consists of excess of oxygen. The inner cone becomes shorter and sharper; the flame will turn a deeper purple colour and emit a characteristic slight "hiss". The molten metal will be less fluid during welding and excessive sparking will occur. Oxidizing flame is used to braze steel and cast iron. A stronger oxidizing flame is used for fusion welding brass and bronze. The temperature of this flame is approximately 3482°C at the inner cone tip.
</p></dd><br/>
<dt><b><a name="equipment">2.4 &nbsp;&nbsp;&nbsp;Equipment used in oxy-acetylene gas welding</a></b></dt>
<dd><p><br/>
<center><img src="images/mem/Unit4/Lesson2/6.jpg"><br><b>Figure 4: Schematic view of gas welding setup</b></center>
<b>2.4.1 Oxygen cylinder</b><br/>
It is made of steel and volume of oxygen contained in the cylinder is approximately proportional to the pressure; hence for every 10 litres of oxygen used, the pressure drops about 0.02 N/mm2. This enables us to tell how much oxygen remains in a cylinder. The oxygen cylinder is provided with a valve threaded right hand and is painted black. Oxygen cylinders and apparatus should not be handled with oily hands or oily gloves. Oil and grease in the presence of oxygen may spontaneously ignite and burn violently or explode.<br/><br/>
<b>2.4.2 Acetylene cylinder</b><br/>
Acetylene cylinder should be used in the up right position so acetone may not be drawn out of the tank. The valve has a screw tap fitted and is screwed left hand. The cylinder is painted maroon. Open the cylinder valve 1 to 1 ½ turns, leaving the valve wrench on the valve in the event it has to be shut off quickly. Acetylene should never be used at a pressure that exceeds 103.4 kPa. In order to decrease the size of the open spaces in the cylinder, acetylene cylinders are filled with porous materials such as balsa wood.<br/><br/>
<b>2.4.3 Pressure Regulator</b><br/>
The regulator maintains a steady working pressure as the cylinder pressure drops from use. On turning the knob or screw in or out causes a spring in the regulator to operate the diaphragm which opens or closes a valve in the regulator. This in turn regulates the outlet pressure and flow. By turning the adjusting knob in, there will be increase the flow and pressure; adjusting knob
out, there will be decrease in the flow and pressure. Most regulators have two gauges. One shows the inlet pressure from the cylinder (the high pressure gauge) and the other (low pressure gauge) shows the working pressure being supplied from the regulator.<br/><br/>
<center><img src="images/mem/Unit4/Lesson2/7.jpg"><br><b>Figure 5: Pressure Regulators</b></center>
<b>2.4.4 Gas Hose</b><br/>
The cylinder regulators and torch are usually connected together by double line rubber hoses. The oxygen line is green and fuel gas line red. Hoses are built to withstand high internal the regulators and the torch pressures. They are strong, nonporous, light, and flexible to permit easy manipulation of the torch.<br/><br/>
<b>2.4.5 Check Valve</b><br/>
Check valves are installed between the hoses and torch prevent back flow of gases as they close if a reverse flow starts. For combustion to occur, fuel and oxygen have to mix. This should only happen in the torch mixer or the torch tip. Check valves should be used with all torches.<br/><br/>
<b>2.4.6 Flash Back Arrestor</b><br/>
A flashback, which is a rapid high pressure flame in the hose can occur if there are no check valves or the check valves fail to operate due to improper installation. Arrestors are safety devices on the outlet of the oxygen and fuel gas regulators. A highly sensitive cut off mechanism operates at the slightest back pressure, whether the pressure wave is slow or sudden.<br/><br/>
<b>2.4.7 Torch</b><br/>
The oxy-acetylene welding torch mixes oxygen and acetylene gas in the proper proportions and controls the amount of the mixture burned at the welding tip. Torches have two needle valves: one for adjusting the oxygen flow and the other for adjusting the fuel (acetylene) gas flow. Other basic parts include a handle (body), two tubes (one for oxygen and another for fuel gas), a mixing head, and a tip. Two general types of welding torches are used: Low pressure & Medium pressure.<br/><br/>
Low pressure torch is also known as an injector torch. The fuel-gas pressure is 6.895 kPa or less. A jet of relatively high pressure oxygen produces the suction necessary to draw the acetylene gas into the mixing head. Any change in oxygen flow will produce relative change in acetylene flow so that the proportion of the two gases remains constant. This is accomplished by designing the mixer in the torch to operate on the injector principle.<br/><br/>
Medium pressure torches are often called balanced-pressure or equal-pressure torches because the fuel gas and the oxygen pressure are kept equal. Operating pressures vary, depending on the type of tip used. The pressure ranges from 6.895 to 103.4 kPa. This torch has certain advantages over the low pressure type, i.e., it can be more readily adjusted, and since equal pressures are used for each gas, the torch is less susceptible to flashbacks.<br/><br/>
<center><img src="images/mem/Unit4/Lesson2/8.jpg"><br><b>Figure 6: Temperature distribution along the length of the flame</b></center>
<b>2.4.8 Torch tip</b><br/>
Welding torch tips are made from a special copper alloy. The welding torch tip is mounted on the end of the torch handle and through it the oxygen and fuel gas mixture feed the flame. Welding tips have one hole. Many factors determine the tip size to use, but mainly the thickness of the metal to be welded determines the tip size to be used.
</p></dd><br/>
<dt><b><a name="rods">2.5 &nbsp;&nbsp;&nbsp;Welding rods (filler metal) for oxy-fuel gas welding</a></b></dt>
<dd><p>
The welding rod is melted into the welded joint, plays an important part in the quality of the finished weld. Good welding rods are designed to permit free flowing metal which will unite readily with the base metal to produce sound, clean welds of the correct composition.
</p></dd><br/>
<dt><b><a name="fluxes">2.6 &nbsp;&nbsp;&nbsp;Fluxes for oxy-fuel gas welding</a></b></dt>
<dd><p>
Flux serves as a protection for the molten metal against atmospheric oxidation. The melting point of a flux must be lower than that of the metal or the oxides formed. In cast iron welding, a slag forms on the surface of the puddle. The flux serves to break this up. Equal parts of a carbonate of soda and bicarbonate of soda make a good compound for this purpose. Nonferrous metals usually require a flux. Borax which has been melted and powdered is often used as a flux with copper alloys. A good flux is required with aluminum, because there is a tendency for the heavy slag formed to mix with the melted aluminum and weaken the weld. For sheet aluminum welding, it is customary to dissolve the flux in water and apply it to the rod.
</p></dd><br/>
<dt><b><a name="lighting">2.7 &nbsp;&nbsp;&nbsp;Lighting the torch and flame adjustment</a></b></dt>
<dd><p>
To ignite the flame at the tip of the welding torch, hold it so as to direct the flame away from the operator, gas cylinders, hose, or any flammable material. Open the acetylene torch valve ¼ turn and ignite the gas in front of the tip. Continue to open the acetylene valve slowly until the flame burns clean. Slowly open the oxygen valve. The flame changes to a bluish white and forms a bright inner cone surrounded by an outer flame. The inner cone develops the high temperature required for welding. The inner cone of the burning mixture of gases coming out from the tip is called the working flare. The closer the end of the inner cone is to the surface of the metal being welded, the more effective is the heat transfer from flame to metal.<br/><br/>
The flame can be made soft or harsh by varying the gas flow. Too low a gas flow for a given tip size will result in a soft, ineffective flame sensitive to backfiring. Too high a gas flow will result in a harsh, high velocity flame that is hard to handle and will blow the molten metal from the puddle.
</p></dd><br/>
<dt><b><a name="base">2.8 &nbsp;&nbsp;&nbsp;Base metal (Workpiece) preparation</a></b></dt>
<dd><p>
(1) Contaminants present in the form dirt, oil, and oxides of must be removed along the joint and sides of the base metal.<br/>
(2) The root opening for a given thickness of metal should be large enough to permit full penetration.<br/>
(3) The thickness of the base metal at the joint determines the type of edge preparation for welding. Edges with square faces can be butted together and welded. This type of joint is limited to material under 4.8 mm in thickness. For thicknesses of 4.8 to 6.4 mm, a slight root opening or groove is necessary for complete penetration.<br/>
(4) Joint edges of 6.4 mm and thicker should be beveled because beveled edges at the joint provide a groove for better penetration and fusion at the sides.
<center><img src="images/mem/Unit4/Lesson2/9.jpg"><br><b>Figure 7: Edge preparations for butt joints</b></center>
</p></dd><br/>
<dt><b><a name="variables">2.9 &nbsp;&nbsp;&nbsp;Process variables for oxy-acetylene welding are</a></b></dt>
<dd><p>
1. Gas and oxygen flow rates (flame adjustment and torch manipulation).<br/>
2. Distance from surface.<br/>
3. Edge preparation, spacing and alignment of the parts.<br/>
4. Speed.<br/>
5. Material types.<br/>
6. Temperature control (before, during, and after the welding process).<br/>
7. Size of the torch tip.<br/>
8. Size and type of the filler rod.
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit4lesson1.php" title="Welding">Lecture 1</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit4lesson3.php" title="Electric Arc Welding Process">Lecture 3</a></td></tr></table>
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