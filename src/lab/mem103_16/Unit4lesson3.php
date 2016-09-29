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
<tr><td width="65%"><b>Lesson 3 Electric Arc Welding Process</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit4/Unit4Lesson3.pdf" target="_blank" title="Download Lesson 3">Lesson 3 Download</a></td></tr>
<tr><td><a href="#introduction">3.0&nbsp;&nbsp;&nbsp;Introduction</a></td></tr>
<tr><td><a href="#welding">3.1&nbsp;&nbsp;&nbsp;Arc Welding</a></td></tr>
<tr><td><a href="#mechanics">3.2&nbsp;&nbsp;&nbsp;Mechanics of Arc</a></td></tr>
<tr><td><a href="#polarity">3.3&nbsp;&nbsp;&nbsp;Polarity in Welding (Applicable to DC Arc Welding only)</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.1&nbsp;&nbsp;&nbsp;Straight Polarity (DCSP)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.3.2&nbsp;&nbsp;&nbsp;Reverse Polarity (DCRP)</td></tr>
<tr><td><a href="#alternating">3.4&nbsp;&nbsp;&nbsp;Alternating Current Welding</a></td></tr>
<tr><td><a href="#electrodes">3.5&nbsp;&nbsp;&nbsp;Arc Welding Electrodes</a></td></tr>
<tr><td><a href="#equipment">3.6&nbsp;&nbsp;&nbsp;Arc Welding Equipments</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.6.1&nbsp;&nbsp;&nbsp;Arc Welding Machines (Power Source)</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.6.2&nbsp;&nbsp;&nbsp;AC Metal-Arc Welding Machines</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.6.3&nbsp;&nbsp;&nbsp;DC Arc Welding Machines</td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.6.4&nbsp;&nbsp;&nbsp;Miscellaneous Equipments</td></tr>
</table><br/></div>
<div>
<dt><b><a name="introduction">3.0 &nbsp;&nbsp;&nbsp;Introduction</a></b></dt>
<dd><p>
In electrical arc welding circuit there are three factors: current (flow of electricity), pressure (force required to cause the current to flow) and resistance (force required to regulate the flow of current).<br/><br/>
<b>Current (I)</b> is a rate of flow and is measured by the amount of electricity that flows through a wire in one second. The term ampere denotes the amount of current per second that flows in a circuit.<br/><br/>
<b>Pressure</b> is the force that causes a current to flow. The measure of electrical pressure is the volt (E). The voltage between two points in an electrical circuit is called the difference in potential. This force or potential is called electromotive force or EMF. The difference of potential or voltage causes current to flow in an electrical circuit.<br/><br/>
<b>Resistance</b> is the restriction to current flow in an electrical circuit. Every component in the circuit, including the conductor, has some resistance to current flow. Resistance (R) depends on the material, the cross-sectional area, and the temperature of the conductor. The unit of electrical resistance is ohm. It is designated by the letter.<br/><br/>
From welding point of view, voltage is important as sufficient "pressure" is required to make the current flow through a circuit. In any circuit of a given resistance, it is the current which primarily determines the amount of heat generated.<br/><br/>
<b>AC and DC</b><br/>
<b>In Direct Current (DC)</b>, current flows in the one direction constantly throughout the circuit. One side of the power source is nominated as the positive (+) pole and the other as the negative (-) pole. An automotive battery or dry cell gives DC.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/1.jpg"><br><b>Figure 1: AC and DC</b></center><br/>
<b>In Alternating Current (AC)</b>, current periodically reverses its direction along the conductor, i.e., one fraction of a second the right-hand terminal is "negative", the next fraction of a second it is "positive". In 50 Hertz AC current, the current is changing direction of flow 100 times a second.
</p></dd><br/>
<dt><b><a name="welding">3.1 &nbsp;&nbsp;&nbsp;Arc Welding</a></b></dt>
<dd><p>
In arc welding process the heat required for welding is obtained through electrical energy. In arc welding processes, an electric arc is used to heat base metals and a consumable filler rod. Welding begins when an electric arc is struck between the tip of the electrode and the base metal to be weld. The intense heat (temperatures above 6000°C) of the arc melts the tip of the electrode and the surface of the work beneath the arc. Small globules of molten metal form on the tip of the electrode, then transfer through the arc stream into the molten weld pool. In this manner, filler metal is deposited as the electrode is progressively consumed. The arc is moved over the work at an appropriate arc length and travel speed, melting and fusing a portion of the base metal and adding filler metal as the arc progresses.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/2.jpg"><br/><b>Arc welding process</b><br/><br/>
<img src="images/mem/Unit4/Lesson3/3.jpg"><br><b>Arc welding process setup</b><br/><br/>
<b>Figure: 2</b></center><br/>
The power source in arc welding process is called a welding machine or welder. This power source is used to create a high potential between an electrode (guided by the welder) and a base metal.<br/><br/>
<b>Advantages of arc welding process</b><br/>
1. It is a versatile, simple and flexible joining process.<br/>
2. Equipment is simple and of low initial cost.<br/>
3. Used by small welding shop, home mechanic, farmer, but also extensive application in industrial fabrication, structural steel erection, weldment manufacture.<br/><br/>
<b>Disadvantages of arc welding process</b><br/>
The main problem that arises in arc welding is contamination of the metal with elements in the atmosphere (O, H, N). There can also be problems with surfaces that are not clean.
</p></dd><br/>
<dt><b><a name="mechanics">3.2 &nbsp;&nbsp;&nbsp;Mechanics of Arc</a></b></dt>
<dd><p>
An electric arc is formed when an electric current passes between two electrodes separated by a short distance from each other. The electrode and base metal are connected to the electric supply, one to the positive pole and one to the negative pole. The arc is started by momentarily touching the electrode on to the base metal and then withdrawing it to about 3 to 4 mm from the base metal.
When the electrode touches the metal workpiece, current flows, and as it is withdrawn from the metal workpiece the current continues to flow in the form of a 'spark' across the very small gap first formed. This causes the air gap to become ionized and as a result the current is able to flow across the gap, even when it is quite wide, in the form of an arc. When alternating current is used, heat is developed equally at metal workpiece and welding electrode, since the electrode and base metal are changing polarity at the frequency of the supply. The greater the volts drop across the arc the greater the energy liberated in heat for a given current.<br/><br/>
<b>Arc energy</b> is usually expressed in kilo-Joules per millimeter length of the weld (kJ/mm) and<br/><br/>
<center><b>Arc energy (kJ/mm) = (arc voltage x welding current) / welding speed (mm/s) x 100</b><br/><br/></center>
<b>Penetration</b> - Penetration is the depth from the surface of the work to the bottom of the molten metal.<br/><br/>
Length of arc</b> - It is the distance between the tip of the electrode and the base metal upon which the melted globules of electrode metal are deposited. The length of the arc is proportional to the voltage across the arc. If the arc length is increased beyond a certain point, the arc will suddenly go out. If a higher current is used, a longer arc can be maintained.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/4.jpg"><br><b>Figure 3: Arc length and Arc column with reference to base metal and electrode</b></center><br/>
<b>Arc column</b> - Arc column is that portion which is in between anode and cathode drop regions. It consists of radiating mixture of electrons and highly excited neutral atoms and molecules. The arc column is normally round in cross section.<br/><br/>
<b>Electron theory of arc column</b><br/>
When an electric arc is struck between two electrodes, flow of electrons takes place from cathode (electrode) to anode (base metal). However, the mass of the electrons is very small, they travel with very high velocities, and when they strike the surface of the base metal, kinetic energy acquired by these electrons is converted into heat energy. At the same time the positively charged ions
traveling from anode to cathode give protecting shield to the flowing electrons as shown in Figure below.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/5.jpg"><br><b>Figure 4: Electron theory of arc column</b></center><br/>
Approximately 50% of the electrical energy put into the arc system comes out in the form of heat energy. Approximately two-thirds of the energy released in the arc column system is always at the anode or the positive pole. This is true in all dc systems. When an ac power supply is used, the heat in the arc column is generally equalized between the anode and the cathode areas.<br/><br/>
<b>Arc crater</b> - In arc welding pool of molten metal at end of rod called crater is obtained by the pressure of expanding gases from the electrode tip. This causes the molten metal to flow back into the weld bead.<br/><br/>
<b>Arc stability</b> - Arc is stable if it is uniform and steady. A good weld bead and a defect free weld is the product of a stable arc.<br/><br/>
<b>Factors affecting arc stability</b><br/>
a. Suitable matching of arc and power source characteristics.<br/>
b. Continuous and proper emission of electrons from the electrode and the thermal ionization in the arc column.<br/>
c. Arc length and arc current.<br/>
d. Electrode geometry.<br/>
e. Use of arc stabilizing material in the coating of the electrode.<br/>
f. Skill of the operator.<br/><br/>
<b>Arc blow</b> - Arc blow is the deflection of an electric arc from its normal path due to magnetic forces. Arc blow and is experienced when using currents above 200A or below 40A. AC welding has less trouble with arc blow since the magnetic field due to the arc stream is constantly alternating in direction at the frequency of the supply.<br/><br/>
<b>Initiating an arc</b><br/>
To establish a stable arc during arc welding, turn on the welding machine, the operator should briefly touch the electrode tip to the base metal by moving down, across and up, and quickly raise it to a distance of 3mm to 4mm between electrode and base metal.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/6.jpg"><br><b>Figure 5: Procedure for initiating an arc</b></center><br/>
<b>Metal transfer in arc welding process from the tip of the electrode</b><br/>
When an arc is struck between the electrode and plate, the heat generated forms a molten pool in the base metal and the electrode begins to melt away, the metal being transferred from the electrode to the base metal. The metal is transferred in the form of drops or globules and these globules vary in size according to the current and type of electrode covering. The force, which causes the transfer, is due to: (1) its own weight, (2) the electro magnetic forces, (3) gas entrainment, (4) magneto dynamic forces producing movement, (5) surface tension. The globule is finally necked off by the magnetic pinch effect.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/7.jpg"><br><b>Figure 6: Metal transfer in the form drops (globules), elongate with a neck connecting them to the electrode,<br>the neck gets reduced in size until it breaks and finally the drop is projected in the molten pool</b></center><br/>
</p></dd>
<dt><b><a name="polarity">3.3 &nbsp;&nbsp;&nbsp;Polarity in welding (Applicable to DC arc welding only)</a></b></dt>
<dd><p>
In DC welding, the welding current circuit may be either straight polarity (DCSP) or reverse polarity (DCRP). It has been observed that while welding with direct current, about 60% to 75% of heat produced in the arc is collected on the positive pole and rest on negative pole, i.e., for both current polarities the greatest part of the heating effect occurs at the positive side of the arc. Therefore, for thick jobs DCSP and for thin jobs and sheets DCRP is preferred.<br/><br/>
<b>3.3.1 Straight polarity (DCSP)</b><br/>
In DCSP, the welding machine connections are electrode negative and workpiece positive. Electron flow is from electrode to workpiece. DCSP welding will produce a wide, relatively shallow weld. In general, straight polarity is used with all mild steel, bare, or light coated electrodes.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/8.jpg"><br><b>Figure 7: Circuit for DC straight polarity arc welding</b></center>
<b>3.3.2 Reverse polarity (DCRP)</b><br/>
In DCRP, the welding machine connections are electrode positive and workpiece negative. Electron flow is from workpiece to electrode. DCRP requires a larger diameter electrode than does DCSP. DCRP welding gives a narrow, deep weld. Reverse polarity is used in the welding of non-ferrous metals such as aluminum, bronze, monel, and nickel.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/9.jpg"><br><b>Figure 8: Circuit for DC reverse polarity arc welding</b></center>
</p></dd>
<dt><b><a name="alternating">3.4 &nbsp;&nbsp;&nbsp;Alternating Current Welding</a></b></dt>
<dd><p>
In AC there is no polarity because current keeps on changing its direction of flow from one polarity to another. AC weldingis a combination of DCRP and DCSP welding. This can be best explained by showing the three current waves visually. In AC welding half of each complete alternating current (AC) cycle is DCSP, the other half is DCRP.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/10.jpg"><br><b>Figure 9: Effect of polarity on weld shape</b><br><br>
<table border="1" cellspacing="0" width="800">
<th>AC arc welding</th><th>DC arc welding</th>
<tr><td>AC arc welding machine has no rotating parts</td><td>DC arc welding machine has rotating parts such as motors and generators.</td></tr>
<tr><td>Transformer costs less.</td><td>Initial cost of generator type of set up is high.</td></tr>
<tr><td>Maintenance of setup is less</td><td>Maintenance of setup is high.</td></tr>
<tr><td>Generation of heat is equal on both the poles.</td><td>Generation of heat is different at both the poles i.e. 75% of heat is generated at positive pole and 25% heat is generated at negative pole.</td></tr>
<tr><td>The problem of arc blow does not exist in AC arc welding process, as it is very easy to control.</td><td>The problem of arc blow is severe and is not easily controlled.</td></tr>
<tr><td>Bare electrodes can not be used and only coated electrodes are used effectively.</td><td>All types of electrodes, bare or coated, can be used with DC.</td></tr>
<tr><td>Usually ferrous metals are welded by AC and not the non-ferrous ones.</td><td>All types of metals are joined with DC arc welding.</td></tr>
<tr><td>Arc is never stable</td><td>Arc is more stable.</td></tr>
</table><br><b>Table: Comparison between AC and DC Arc welding</b></center>
</p></dd>
<dt><b><a name="electrodes">3.5 &nbsp;&nbsp;&nbsp;Arc welding electrodes</a></b></dt>
<dd><p>
In electric arc welding, the term electrode refers to the component that conducts the current from the electrode holder to the metal being welded. It progressively melts away due to the heat of an electric arc held between it and the base metal. The arc welding electrode combines a central current carrying "core wire" (filler rod) and a flux coating. Arc welding electrodes are available in various diameters and lengths, depending on the base metal thickness and requirements of the welded joint.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/11.jpg"><br><b>Figure 10: Arc welding electrode</b></center><br>
Electrodes are classified into two groups: consumable and nonconsumable.<br/>
<b>Consumable electrodes</b> not only provide a path for the current but they also supply filler metal to the joint. An example is the electrode used in shielded metal arc welding.<br/><br/>
<b>Non-consumable electrodes</b> are only used as a conductor for the electrical current, such as tungsten electrode and carbon electrode. The filler metal for processes using non-consumable electrodes are hand fed consumable welding rod.<br/><br/>
<b>Electrode Size</b> - Electrode size is nominated by diameter of core wire. Electrodes are available from 2.0mm to 6mm diameter. Size determines the amperage used and so the heat input into the job. For bigger the joint, bigger electrode is desirable.<br/><br/>
<b>Electrode efficiency</b> - The efficiency of an electrode is the mass of metal actually deposited compared with the mass of that portion of the electrode consumed. It can be expressed as a percentage thus:<br/><br/>
<b>Efficiency % = Mass of metal deposited x 100 / mass of metal of the electrode consumed</b><br/><br/>
<b>Functions of coating on the electrode</b><br/>
a. It provides a gaseous shield to exclude the air from the arc areas and so reduce the tendency to oxidation of the molten metal.<br/>
b. It produces a slag, which assists in the protection of the molten metal.<br/>
c. It provides a vehicle for adding alloying elements into the weld metal, over and above those elements normally available within the core wire.<br/>
d. It can include arc stabilizing elements which permit smooth stable arc characteristics, even on low voltage AC welding power.<br/><br/>
Electrodes are classified in five main groupings:<br/>
<b>Rutile (titanium dioxide)</b> – It is a general purpose electrode. Gives arc stability and low spatter.<br/><br/>
<b>Basic (calcium carbonate and fluoride)</b> - Moisture resistant flux coating, low spatter, good arc striking. Used on carbon steels giving excellent mechanical properties and low crack risk.<br/><br/>
<b>Cellulosic (cellulose)</b> - Deeply penetrating all positions electrodes provides light slag covering, used mainly for high speed welding of pipe.<br/><br/>
<b>Iron powder</b> - Added to coating/flux to produce deep penetrating welds and good arc striking characteristics. Used mainly for structural steels.<br/><br/>
<b>Surfacing and non-ferrous alloy type</b> - Nickel type electrodes for welding of cast iron, giving an imaginably deposit. Used for building up of worn surfaces and providing a wear resistant finish.
</p></dd><br/>
<dt><b><a name="equipment">3.6 &nbsp;&nbsp;&nbsp;Arc welding equipments</a></b></dt>
<dd><p>
<b>3.6.1 Arc welding machines (power source)</b> - Arc welding machine also known as arc welder is an electrical machine capable of supplying current of sufficient magnitude to provide satisfactory welding heat at a safe voltage capable of sustaining the arc.<br/><br/>
<b>3.6.2 AC arc welding machines</b> are based on a transformer, which is a static electrical machine that can convert AC power from high voltage low amperage (as in the mains) to low voltage high amperage power (as used in welding).<br/><br/>
<b>3.6.3 DC arc welding machines</b> are either DC rotary generators driven by an AC electric motor or alternatively use an AC transformer with a rectifier attachment which is an electrical "one-way flow valve" permitting the AC welding current to only flow in one direction, thus achieving a DC effect.<br><br>
<b>3.6.4 Miscellaneous arc welding equipments</b><br>
<b>Electrode holder</b> - An electrode holder is an insulated clamping device for holding the electrode at any desired angle during the electric arc welding firmly process. The electrode holder is connected to the power source.<br/><br/>
<center><img src="images/mem/Unit4/Lesson3/12.jpg"><br><b>Figure 11: Arc welding electrode holder</b></center><br>
<b>Cables</b> - Two welding cables of sufficient current carrying capacity with heavy insulation are used in electric arc welding process.<br/><br/>
<b>Earth clamp</b> - It gives connection of earthing cable with the base metal through the metallic welding table on which the base metal is placed.<br/><br/>
<b>Chipping hammer and wire brush</b> - A chipping hammer is required to loosen scale, oxides and slag. A wire brush is used to clean each weld bead before further welding.<br/><br/>
<b>Welding table</b> - A welding table should be of all-steel construction. A container for electrodes with an insulated hook to hold the electrode holder when not in use should be provided.<br/><br/>
<b>Goggles</b> - During all electric arc welding processes, operators must wear safety goggles to protect their eyes from weld spatter.<br/><br/>
<center><table style="text-align:center;"><tr><td><img src="images/mem/Unit4/Lesson3/13.jpg" width="200"></td><td><img src="images/mem/Unit4/Lesson3/14.jpg" width="300"></td><td><img src="images/mem/Unit4/Lesson3/15.jpg" width="150"></td></tr>
<tr><td><b>Goggles</b></td><td><b>Chipping hammer and wire brush</b></td><td><b>Shield</b></td></tr>
<tr><td><img src="images/mem/Unit4/Lesson3/16.jpg"></td><td><img src="images/mem/Unit4/Lesson3/17.jpg" width="200"></td></tr>
<tr><td><b>Apron</b></td><td><b>Gloves</b></td></tr></table><br><b>Figure 12: Miscellaneous arc welding equipments</b></center><br>
<b>Hand-held shield</b> - Welder needs a hand-held shield to protect his eyes and face from harmful light and particles of hot metal.<br/><br/>
<b>Apron</b> - It is made of heat resistant chrome leather, is used to protect the operator from sparks and heat.<br/><br/>
<b>Gloves</b> - Gloves are also made of chrome leather and are used to protect the hands of welder from the spark and spatter of the arc.
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit4lesson2.php" title="Gas Welding or Oxyfuel Gas Welding (OFW)">Lecture 2</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit4lesson4.php" title="Resistance Welding">Lecture 4</a></td></tr></table>
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