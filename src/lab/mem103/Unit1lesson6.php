<?php session_start();
if($_SESSION['auth']!="ajayMEM103kant2019upadhyay")
{
header("location:mem103.php");
}
else
{
?>
<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manufacturing Processes-I</title>
<link rel="shortcut icon" type="image/x-icon" href="images/icon.ico">
<link href="css/mem.css" rel="stylesheet" type="text/css">
</head>
<body style="background:#FFFFFF; margin:auto; width: 1024px; height:100%;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div><p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table border="0" width="100%">
<tr><td width="65%"><b>Lesson 6 Non-Ferrous Metals</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1Lesson6.pdf" target="_blank" title="Download Lesson 6">Lesson 6 Download</a></td></tr>
<tr><td><dt><a href="#nonFerrous">6.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non-Ferrous Metals</a></dt></td></tr>
<tr><td><dt><a href="#aluminum">6.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aluminum</a></dt></td></tr>
<tr><td><dt><a href="#copper">6.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Copper</a></dt></td></tr>
<tr><td><dt><a href="#lead">6.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lead</a></dt></td></tr>
<tr><td><dt><a href="#cobalt">6.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Cobalt</a></dt></td></tr>
<tr><td><dt><a href="#magnesium">6.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Magnesium</a></dt></td></tr>
<tr><td><dt><a href="#titanium">6.6&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Titanium</a></dt></td></tr>
<tr><td><dt><a href="#chromium">6.7&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chromium</a></dt></td></tr>
<tr><td><dt><a href="#manganese">6.8&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manganese</a></dt></td></tr>
<tr><td><dt><a href="#molybdenum">6.9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Molybdenum</a></dt></td></tr>
<tr><td><dt><a href="#nickel">6.10&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nickel</a></dt></td></tr>
<tr><td><dt><a href="#tin">6.11&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tin</a></dt></td></tr>
<tr><td><dt><a href="#tungsten">6.12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tungsten</a></dt></td></tr>
<tr><td><dt><a href="#zinc">6.13&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zinc</a></dt></td></tr>
<tr><td><dt><a href="#bronze">6.14&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bronze</a></dt></td></tr>
<tr><td><dt><a href="#duralumin">6.15&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Duralumin</a></dt></td></tr>
<tr><td><dt><a href="#brass">6.16&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Brass</a></dt></td></tr>
<tr><td><dt><a href="#beryllium">6.17&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beryllium</a></dt></td></tr>
<tr><td><dt><a href="#zirconium">6.18&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zirconium</a></dt></td></tr>
<tr><td><dt><a href="#applications">6.19&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Important Engineering Applications</a></dt></td></tr>
<tr><td><dt><a href="#effect">6.20&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Effect of various Non-Ferrous Metals on Alloying with Ferrous Metals</a></dt></td></tr>
<tr><td><dt><a href="#glance">6.21&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Non-Ferrous Metals at glance</a></dt></td></tr>
<tr><td><dt><a href="#alloys">6.22&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Some Nonferrous Alloys</a></dt></td></tr>
<tr><td><dt><a href="#properties">6.23&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mechanical Properties of Materials</a></dt></td></tr>
</table><br /></div>
<div>
<dt><b><a name="nonFerrous">6.0 &nbsp;&nbsp;&nbsp;Non-Ferrous Metals</a></b></dt>
<dd><p>
The non-ferrous metals do not contain iron as their main constituent. These are more expensive in comparison to ferrous metals. Non-ferrous metals and alloys find practical applications because of corrosion resistant, high thermal conductivity, and high electrical conductivity, ease of fabrication. Following are the main non-ferrous metals.<br /><br />
<center><table border="0" width="600">
<tr><td>1.	Aluminum</td><td>2.	Copper</td><td>3.	Cobalt</td></tr>
<tr><td>4.	Lead</td><td>5.	Magnesium</td><td>6.	Nickel</td></tr>
<tr><td>7.	Tin</td><td>8.	Titanium</td><td>9.	Zinc</td></tr>
<tr><td>10.	Chromium</td><td>11.	Manganese</td><td>12.	Tungsten</td></tr>
</table></center>
</p></dd><br />
<dt><b><a name="aluminum">6.1 &nbsp;&nbsp;&nbsp;Aluminum (Al)</a></b></dt>
<dd><p>
It is the richest mineral in the earth's crust. It does not appear in its pure form.<br /><br />
<b>Manufacture</b><br />
Aluminum is derived from bauxite, a mineral mined from the earth. Two to three tonnes of bauxite are required to produce one tonne of alumina and two tonnes of alumina are required to produce one tonne of aluminium metal. The aluminium industry relies on the Bayer's process to produce alumina from bauxite.<br /><br />
<b>Salient Characteristics</b><br />
1. <b>Appearance</b>: Aluminum is light gray to silver in color, very bright when polished, dull when oxidized, and light in weight.<br />
2. <b>Strength-to-Weight Ratio</b>: Aluminum exhibits high strength-to-weight ratio i.e. it offers a unique combination of lightweight and high strength.<br />
3. <b>Capability</b>: It has a capability of being cast, forged, machined, formed, and welded. Aluminum sections can be joined by the use of adhesives, clips, bolts, rivets.<br />
4. <b>Lightweight</b>: Aluminum weighs less by volume than most other metals. It is about one-third the weight of iron, steel, copper, or brass.<br />
5. <b>Excellent Thermal Conductor</b>: It conducts heat better than other common metals.<br />
6. <b>Strong</b>: As temperatures fall, aluminum becomes stronger. Therefore, Cold-weather applications are particularly well served by aluminum.<br />
7. <b>Conducts Electricity</b>: Electrical conductivity of aluminum is twice as copper.<br />
8. <b>Nonmagnetic</b>: Aluminum is non-magnetic in nature, therefore, it is useful for high-voltage applications, as well as for electronics, especially where magnetic fields come into play or where magnetic devices are employed.<br />
9. <b>Resilient</b>: Aluminum combines strength with flexibility and can flex under loads or spring back from the shock of impact.<br />
10. <b>Reflective</b>: Highly reflective aluminum can be used to shield products or areas from light, radio waves, or infrared radiation.<br />
11. <b>Not Combustible</b>: Aluminum does not burn and, even at extremely high temperatures, does not produce toxic fumes.<br />
12. <b>Accepts a Variety of Common Finishes</b>: Aluminum can be finished with liquid paint, powder coatings, anodizing, or electroplating.<br />
13. <b>Sparks</b>: No sparks are given off from aluminum. It is appropriate for applications taking place in highly flammable environments or involving explosive materials. Aluminum does not turn red before melting.<br />
14. <b>Resists Corrosion</b>: Aluminum offers excellent corrosion resistance; it does not rust. Its own naturally occurring oxide film protects aluminum.<br />
15. <b>Fracture</b>: A fracture in rolled aluminum sections shows a smooth, bright structure and fracture in an aluminum casting shins a bright crystalline structure.<br />
16. <b>Spark test</b>: No sparks are given off from aluminum.<br />
17. <b>Torch test</b>: Aluminum does not turn red before melting. It holds its shape until almost molten, then collapses (hot shorts) suddenly. A heavy film of white oxide forms instantly on the molten surface.<br /><br />
<b>Important Engineering Applications:</b><br />
a.	Aluminum is used as a de-oxidizer and alloying agent in the manufacture of steel.<br />
b.	Aircraft structures, Castings, Pistons, Pump housings, Kitchen utensils.<br />
c.	Due to its high electrical conductivity transmission lines are made of aluminum.<br />
d.	Heat exchangers or heat sinks are made using aluminum due its excellent thermal conducting property.<br />
e.	It is used in manufacture of paints in powder form.<br />
f.	Due to its light weight and high Strength-to-Weight ratio, finds applications in aerospace, high-rise construction, and automotive design.<br />
g.	Aluminum is used for cryogenic applications and in the extreme cold of outer space, as well as for aircraft and for construction in high latitudes as its strength increases under very cold temperatures.
</p></dd><br />
<dt><b><a name="copper">6.2 &nbsp;&nbsp;&nbsp;Copper (Cu)</a></b></dt>
<dd><p>
The symbol for copper is Cu and comes from the Latin cuprum meaning from the island of Cyprus. It is an important engineering metal with wide applications. It is one of the most principal metals used to produce widely applied, significant engineering alloy's brass and bronze.<br /><br />
<b>Manufacture</b><br />
Copper is extracted from various ores. Generally it is recovered from sulphide ores by a dry extraction process in which the powdered and concentrated ore is roasted where necessary to drive off excess sulphur and smelted in a furnace to produce copper matte.<br /><br />
<b>Salient Characteristics</b><br />
1.	<b>Appearance</b>: Copper is red in color when polished, and oxidizes to various shades of green.<br />
2.	<b>Strength-to-Weight Ratio</b>: Copper and its alloys have relatively low strength-to-weight ratios and low strengths at elevated temperatures. Some copper alloys are also susceptible to stress-corrosion cracking unless they are stress relieved.<br />
3.	<b>Capability</b>: Copper can be forged and cold worked. Pure copper is not suitable for welding. It has poor foundry properties due to large shrinkage.<br />
4.	<b>Machinability</b>:  Copper is very ductile and malleable metal. Its machinability is only fair i.e. very difficult to machine due to its high ductility.<br />
5.	<b>Hot Short</b>:  Some of the copper alloys are hot short; they become brittle at high temperatures, because some of the alloying elements form oxides and other compounds at the grain boundaries, embrittling the material.<br />
6.	Strength Copper alloys derive their strength from cold working.<br />
7.	<b>Thermal Conductor</b>:  Copper has excellent thermal conductivity among all commercial metals due to which it conducts heat rapidly.<br />
8.	<b>Electrical Conductor</b>: Copper has good electrical conductivity among the commercial metals.<br />
9.	<b>Corrosion resistance</b>: Copper has good resistance to corrosion under ordinary atmospheric conditions, in fresh and sea water which makes it very useful in the process industries.<br />
10.	<b>Nonmagnetic</b>: Pure copper is nonmagnetic.<br />
11.	<b>Sparks</b>: Copper gives off no sparks.<br />
12.	<b>Fracture</b>: Copper presents a smooth surface when fractured, which is free from crystalline appearance.<br />
13.	Copper melts suddenly and solidifies instantly.<br />
14.	<b>Torch test</b>: Because copper conducts heat rapidly, a larger flame is required to produce fusion of copper than is needed for the same size piece of steel. Copper melts suddenly and solidifies instantly.<br /><br />
<b>Important Engineering Applications</b><br />
a.	The main use of pure copper is in the electrical industry due its excellent thermal conductivity and ductile in nature where it is made into wire or other conductors.<br />
b.	It is used in the manufacture of nonferrous alloys such as brass, bronze, and Monel metal.<br />
c.	Typical copper products are sheet roofing, cartridge cases, springs, heat exchangers, bushings, wire, bearings, statues, decorative objects.
</p></dd><br />
<dt><b><a name="lead">6.3 &nbsp;&nbsp;&nbsp;Lead (Pb)</a></b></dt>
<dd><p>
The symbol for lead is Pb and comes after the plumbum, the root for the word plumber. Lead was probably one of the first metals to be produced by man. It falls in the category of low melting alloys due to its relatively low melting point. Lead is not found free in nature but it is obtained from Galena (lead sulphide).<br /><br />
<b>Manufacture</b><br />
The important lead minerals are galena (PbS), anglesite (PbSO<sub>4</sub>) and cerussite (PbCO<sub>3</sub>), respectively with 86%, 68% and 77% of lead. Generally lead is extracted from galena (lead sulphide). During extraction of lead initially different ores are separated using selective froth flotation technique.<br /><br />
<b>Salient Characteristics</b><br />
Lead is unique among common metals. It has little mechanical strength, virtually no elasticity and is extremely soft.<br />
1.	<b>General</b>: Lead is a heavy, soft, malleable metal with low melting point, low tensile strength, and low creep strength.<br />
2.	<b>Capabilities</b>: Lead can be cast, cold worked, welded, and machined.<br />
3.	<b>Corrosion resistant</b>: It is resistant to corrosion, atmosphere, moisture, water, and to many acids.<br />
4.	<b>Strong</b>: Lead has low strength with heavy weight.<br />
5.	<b>Harmful</b>: Lead dust and fumes are very poisonous.<br />
6.	<b>Appearance</b>: Lead is a bluish-white lustrous metal.<br />
7.	<b>Electrical conductor</b>: Relatively poor conductor of electricity.<br />
8.	The addition of a small percentage of arsenic, or antimony, to the lead, increases its hardness and mechanical resistance, protecting it from abrasion.<br /><br />
<b>Important Engineering Applications</b>: Lead alloys are largely used in industry.<br />
1.	Lead-acid battery: Biggest use of lead worldwide is for the lead-acid battery. The lead-acid battery consists of lead alloy pasted grids. The grids are made from a lead-antimony alloy (commonly containing from 0.75 - 5% antimony) together with minor additions of other elements.<br />
2.	Cable sheathing Because of it's excellent proven corrosion resistance when in contact with a wide range of industrial and marine environments, soils and chemicals, lead is used to provide a sheath on electric cables. And also provide insulation surrounding the conductors to protect users.<br />
3.	Building Construction: Lead is used in building construction in both pipe and sheet form. Due to lead's corrosion resistant properties. Lead pipe are used for carriage of corrosive chemicals at chemical plants.<br />
4.	Chemical Compounds: Many types of chemical compounds are produced from lead; among these are lead carbonate (paint pigment) and tetraethyl lead (antiknock gasoline).<br />
5.	Radiation Shields: Lead is also used for X-ray protection. Lead pipes have not been used in new domestic water supplies for about 30 years. However.<br />
6.	Lead compounds Tetraethyl and tetramethyl lead (TEL and TML) are used as anti-knock additives in petrol as the most economic method of raising the "octane rating" to provide the grade of petrol needed for the efficient operation of internal combustion engines of high compression ratio.
</p></dd><br />
<dt><b><a name="cobalt">6.4 &nbsp;&nbsp;&nbsp;Cobalt (Co)</a></b></dt>
<dd><p>
The metallic element cobalt is one of the transition elements, closely related to iron and nickel. These three elements are sometimes referred to as the iron family. Cobalt was identified and described in 1735 by Swedish chemist Georg Brandt. The symbol for cobalt is Co.<br /><br />
<b>Manufacture</b><br />
Cobalt does not occur in the free state but is combined with such elements as copper, arsenic, sulfur, and oxygen in mineral ores. The principal minerals are smaltite a compound of cobalt and arsenic and cobaltite (a compound of cobalt, arsenic, and sulfur). One method of ore extraction consists of a series of steps that include smelting and roasting, leaching, precipitation, and electrolysis. In a related method, a cobalt precipitate is reduced by heating it in the presence of aluminum, carbon, or hydrogen.<br /><br />
<b>Salient Characteristics</b><br />
It is hard but chemically less reactive than iron. At ordinary temperatures cobalt is unaffected by air or water. It dissolves slowly in dilute acids, releasing hydrogen gas.<br />
<b>General</b>: Cobalt is a hard and easily magnetizable, white metal similar to nickel in appearance, but has a slightly bluish cast.<br />
<b>Capabilities</b>: Cobalt can be welded, machined (limited), and cold-drawn.<br />
<b>Limitations</b>: Welding high carbon cobalt steel often causes cracking. Cobalt must be machined with cemented carbide cutters.<br />
<b>Cobalt alloy is heat and corrosion resistant</b>.<br />
<b>Appearance</b>:  Pure cobalt is silvery white with a reddish tone.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Cobalt is used chiefly in alloy steels for making high-speed, high-temperature, creep-resisting metal-cutting tools and cemented carbide tools, bits, and cutters.<br />
2.	Cobalt is also used to make permanent magnets for loudspeakers.<br />
3.	Cobalt is used as a catalyst in such processes as the synthesis of gasoline.<br />
4.	Blue pigments made from cobalt compounds are used in enamels and paints, and such driers as cobalt linoleate serve to harden surface coatings.<br />
5.	cobalt combined with other elements, it is used for hard facing materials.<br />
6.	A radioisotope, cobalt-60 is prepared in a nuclear reactor by bombarding cobalt metal or cobalt oxide with slow neutrons. It has a half-life of 5.25 years. The Cobalt-60 emits beta particles and gamma rays is used in the treatment of cancer and in agricultural research to cause gene mutations that sometimes result in new varieties of fruits, grains, and vegetables.<br />
7.	In industry cobalt-60 is used to detect flaws in castings.
</p></dd><br />
<dt><b><a name="magnesium">6.5 &nbsp;&nbsp;&nbsp;Magnesium (Mg)</a></b></dt>
<dd><p>
Magnesium as the lightest structural metal available is a white, machinable, corrosion resistant, high strength metal with a low melting point. It can be alloyed with small quantities of other metals, such as aluminum, manganese, zinc and zirconium, to obtain desired properties.<br /><br />
<b>Manufacture</b><br />
Magnesium is produced in large quantities from sea water.<br /><br />
<b>Salient Characteristics</b><br />
<b>Appearance</b>: Magnesium is white in color and resembles aluminum in appearance. The polished surface is silver-white, but quickly oxidizes to a grayish film.<br />
<b>Strength-to-weight ratio</b>: It is highly corrosion resistant and has a good strength-to-weight ratio, but is lighter in weight than aluminum.<br />
<b>Capabilities</b>: Magnesium can be forged, cast, welded, and machined. At room temperature, magnesium work hardens rapidly, reducing cold formability.<br />
<b>Nonmagnetic</b>: It is nonmagnetic.<br />
<b>Limitations</b>: Magnesium in fine chip form will ignite at low temperatures, 427<sup>o</sup>C to 649<sup>o</sup>C.<br />
<b>Welding</b>: Methods used for joining magnesium are gas tungsten-arc (TIG) and gas metal-arc (MIG) welding, spotwelding, riveting, and adhesive bonding.<br />
<b>Fracture test</b>: Magnesium has a rough surface with a fine grain structure.<br />
<b>Torch test</b>: Magnesium oxidizes rapidly when heated in open air, producing an oxide film, which is insoluble in the liquid metal. A fire may result when magnesium is heated in the open atmosphere.<br /><br />
<b>Other characteristics</b><br />
1.	Because of their low modulus of elasticity, magnesium alloys can absorb energy elastically.<br />
2.	Combined with moderate strength, this provides excellent dent resistance and high damping capacity.<br />
3.	Magnesium has good fatigue resistance and performs particularly well in applications involving a large number of cycles at relatively low stress.<br />
4.	Magnesium is widely recognized for its favorable strength-to-weight ratio and excellent castability.<br /><br />
<b>Important Engineering Applications</b>:<br />
1.	Magnesium is used as a deoxidizer for brass, bronze, nickel, and silver.<br />
2.	Because of its light weight, it is used in many weight-saving applications, particularly in the aircraft industry.<br />
3.	It is also used in the manufacture and use of fireworks for railroad flares and signals, and for military purposes.<br />
4.	Magnesium castings are used for engine housings, blowers, hose pieces, landing wheels, and certain parts of the fuselage of aircraft.<br />
5.	Magnesium alloy materials are used in sewing machines, typewriters, and textile machines.<br />
6.	Typical applications of magnesium gravity castings are aircraft engine components and wheels for race and sports cars.<br />
7.	Typical magnesium forgings are missile fuselage connector rings.<br />
8.	Luggage frames and support frames for military shelters are examples of magnesium extrusions.
</p></dd><br />
<dt><b><a name="titanium">6.6 &nbsp;&nbsp;&nbsp;Titanium (Ti)</a></b></dt>
<dd><p>
Titanium is an abundant element. It is used in many industrial applications because of its excellent corrosion resistance and superior strength-to-weight ratios. It has twice steels strength to density, high affinity for carbon, soft and ductile when annealed.<br /><br />
<b>Manufacture</b><br />
Titanium is a metal of the tin group that occurs naturally as titanium oxide or in other oxide forms. The free element is separated by heating the oxide with aluminum or by the electrolysis of the solution in calcium chloride.<br /><br />
<b>Salient Characteristics</b><br />
It has very good corrosion resistance capability.<br />
It has seizing tendencies at temperatures above 427<sup>o</sup>.<br />
It has a high strength to weight ratio, and its tensile strength increases as the temperature decreases.<br />
<b>Appearance</b>: Titanium is a soft, shiny, silvery-white metal burns in air and is the only element that burns in nitrogen. Titanium alloys look like steel.<br />
<b>Capabilities</b>: Titanium can be machined at low speeds and fast feeds; Can be spot-and seam-welded, and fusion welded using inert gas.<br /><br />
<b>Limitations</b>:<br />
&bull;	Minor amounts of impurities cause titanium to become brittle.<br />
&bull;	Titanium has low impact strength, and low creep strength at high temperatures 427<sup>o</sup>.<br />
&bull;	It can only be cast into simple shapes.<br />
&bull;	It cannot be welded by any gas welding process because of its high attraction for oxygen. Oxidation causes this metal to become quite brittle. The inert gas welding process is recommended to reduce contamination of the weld metal.<br /><br />
<b>Welding</b>: Welding titanium is not difficult. Welding by means of the TIG process (Tungsten Electrode Inert Gas) using Argon gas shielding is most commonly used.<br /><br />
<b>Machining</b>: by all of the customary methods machining on titanium is being done.<br /><br />
<b>Spark test</b>: The sparks given off are large, brilliant white, and of medium length.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Its most important compound is titanium dioxide, which is used widely in welding electrode coatings.<br />
2.	It is used as a stabilizer in stainless steel so that carbon will not be separated during the welding operation.<br />
3.	It is also used as an additive in alloying aluminum, copper, magnesium, steel, and nickel; making powder for fireworks.<br />
4.	Titanium is used in the manufacture of following: Jet Engines, Bicycles, Piping Systems, Aircraft Frames, Roller Blades, Valves, Marine Equipment, Artificial Hips & Knees, Automotive Components, Watches, Heart Valves, Eye Glass Frames, Pace Makers, Chemical Processing Equipment, Heat Exchangers.
</p></dd><br />
<dt><b><a name="chromium">6.7 &nbsp;&nbsp;&nbsp;Chromium (Cr)</a></b></dt>
<dd><p>
It takes its name from the Greek word for color-khroma. Chromium is a critical alloying ingredient for the production of steel, cast iron, and nonferrous alloys of nickel, copper, aluminum, and cobalt. It is widely used in electroplating.<br /><br />
<b>Manufacture</b><br />
Chromium is extracted primarily from chromite, which is composed of iron, chromium and oxygen. It is not found in nature in its free state.<br /><br />
<b>Appearance</b>: It is a silver-gray and lustrous.<br /><br />
<b>Salient Characteristics</b><br />
It is hard and brittle, corrosion resistant. Its principal functions as an alloy in steel making;<br />
(1) increases resistance to corrosion and oxidation<br />
(2) increases harden-ability<br />
(3) adds some strength at high temperatures<br />
(4) resists abrasion and wear (with high carbon).<br /><br />
<b>Capabilities</b>: Chromium alloys can be welded, machined, and forged. Chromium is never used in its pure state.<br /><br />
<b>Limitations</b><br />
Chromium is not resistant to hydrochloric acid, and cannot be used in the pure state because of its brittleness and difficulty to work.<br />
Chromium is resistant to acids other than hydrochloric; and is wear, heat, and corrosion resistant.<br /><br />
<b>Important Engineering Applications</b><br />
1.	It is used as an alloying agent in steel and cast iron (0.25 to 0.35 percent) and in nonferrous alloys of nickel, copper, aluminum, and cobalt.<br />
2.	It is also used in electroplating for appearance and wear, in powder metallurgy.<br />
3.	It is used as a pigment to make mirrors.<br />
4.	Chromium is used as corrosion-resistant decorative plating agent.
</p></dd><br />
<dt><b><a name="manganese">6.8 &nbsp;&nbsp;&nbsp;Manganese (Mn)</a></b></dt>
<dd><p>
<b>Salient Characteristics</b><br />
1.	Pure manganese has a relatively high tensile strength, but is very brittle.<br />
2.	Manganese is used as an alloying agent in steel to deoxidize and desulfurize the metal.<br />
3.	In metals other than steel, percentages of 1 to 15 percent manganese will increase the toughness and the hardenability of the metal involved.<br />
4.	Manganese is highly polishable and brittle.<br /><br />
<b>Capabilities</b>: Manganese can be welded, machined, and cold-worked.<br /><br />
<b>Limitations</b>: Austenitic manganese steels are best machined with cemented carbide, cobalt, and high-speed steel cutters.<br /><br />
<b>Important Engineering Applications</b><br />
1.	It is used mainly as an alloying agent in making steel to increase tensile strength.<br />
2.	It is also added during the steel-making process to remove sulfur as a slag.<br />
3.	Medium-carbon manganese steels are used to make car axles and gears.
</p></dd><br />
<dt><b><a name="molybdenum">6.9 &nbsp;&nbsp;&nbsp;Molybdenum (Mo)</a></b></dt>
<dd><p>
<b>Salient Characteristics</b><br />
Pure molybdenum has a high tensile strength and is very resistant to heat.<br />
Retains hardness and strength at high temperatures; and is corrosion resistant.<br /> 
Used as an alloying agent in steel to increase strength, hardenability, and resistance to heat.<br /><br /> 
<b>Appearance</b><br /> 
<b>Capabilities</b>: Molybdenum can be swaged, rolled, drawn, or machined.<br /><br />
<b>Limitations</b><br />
Molybdenum can only be welded by atomic hydrogen arc, or butt welded by resistance heating in vacuum.<br />
It is attacked by nitric acid, hot sulfuric acid, and hot hydrochloric acid.<br /><br />
<b>Important Engineering Applications</b><br />
Molybdenum is used mainly as an alloy.<br />
Heating elements, switches, contacts, thermo-couplers, welding electrodes, and cathode ray tubes are made of molybdenum.
</p></dd><br />
<dt><b><a name="nickel">6.10 &nbsp;&nbsp;&nbsp;Nickel (Ni)</a></b></dt>
<dd><p>
Some nickel alloys are among the toughest structural materials known.<br /><br />
<b>Appearance</b>: Pure nickel has a grayish white color.<br /><br />
<b>Manufacture</b>: The nickel is extracted from sulphide ores.<br /><br />
<b>Salient Characteristics</b><br />
1.	Nickel is a hard, malleable, ductile metal.<br />
2.	Retains high strength and toughness at high temperatures.<br />
3.	As an alloy, it will increase ductility, has no effect on grain size, lowers the critical point for heat treatment, aids fatigue strength, and increases impact values in low temperature operations.<br />
4.	Both nickel and nickel alloys are machinable and are readily welded by gas and arc methods.<br /><br />
<b>Capabilities</b>: Nickel alloys are readily welded by either the gas or arc methods. Nickel alloys can be machined, forged, cast, and easily formed.<br /><br />
<b>Limitations</b>: Nickel oxidizes very slowly in the presence of moisture or corrosive gases.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Nickel is used in making alloys of both ferrous and nonferrous metal.<br />
2.	Chemical and food processing equipment, electrical resistance heating elements, and parts that must withstand elevated temperatures are all produced from nickel-containing metal.<br />
3.	Alloyed with chromium, it is used in the making of stainless steel.<br />
4.	Structural applications that require specific corrosion resistance or elevated temperature strength receive the necessary properties from nickel and its alloys.<br /><br />
<b>Monel metal</b><br />
<b>Salient Characteristics</b><br />
1.	Monel metal is a nickel alloy of silver-white color.<br />
2.	Contains about 67.00 percent nickel, 29.00 to 80.00 percent copper, 1.40 percent iron, 1.00 percent manganese, 0.10 percent silicon, and 0.15 percent carbon.<br />
3.	In appearance, it resembles untarnished nickel.<br />
4.	After use, or after contact with chemical solutions, the silver-white color takes on a yellow tinge, and some of the luster is lost.<br />
5.	It has a very high resistance to corrosion and can be welded.
</p></dd><br />
<dt><b><a name="tin">6.11 &nbsp;&nbsp;&nbsp;Tin (Sn)</a></b></dt>
<dd><p>
Tin is an important commodity in international trade, but it does not occur naturally as a metal. By far the most important tin mineral is cassiterite, a naturally occurring oxide of tin with the chemical formula SnO<sub>2</sub>.<br /><br />
<b>Appearance</b>: Tin is silvery white in color.<br /><br />
<b>Salient Characteristics</b><br />
1.	Tin is a very soft, malleable, somewhat ductile, corrosion resistant metal having low tensile strength.<br />
2.	It is used in coating metals to prevent corrosion.<br />
3.	In density tin could be described as a medium weight metal - heavier than aluminium, and zinc, but light in comparison with copper, silver, lead, mercury and gold.<br />
4.	Tin readily forms alloys with other metals to create useful materials such as solders, bronzes, pewter, bearing alloys and fusible alloys.<br /><br />
<b>Capabilities</b>: Tin can be die cast, cold worked (extruded), machined, and soldered.<br /><br />
<b>Limitations</b>: Tin is not weldable.<br /><br />
<b>Important Engineering Applications</b><br />
1.	The major application of tin is in coating steel.<br />
2.	Tin, in the form of foil, is often used in wrapping food products.<br />
3.	It is used as an alloying element.<br />
4.	Tin and tin-alloy coatings are widely used in the manufacture of bearings for their anti-corrosion and lubricant properties.<br />
5.	The principal use of tin in electronics is in the use of solders for the joining of electronic components.<br />
6.	Tin is alloyed with copper to produce tin brass and bronze.<br />
7.	Tin is alloyed with lead to produce solder.<br />
8.	Tin is alloyed with antimony and lead to form babbitt.
</p></dd><br />
<dt><b><a name="tungsten">6.12 &nbsp;&nbsp;&nbsp;Tungsten (W)</a></b></dt>
<dd><p>
<b>Appearance</b>: Tungsten is steel gray (dull white) in color.<br /><br />
<b>Salient Characteristics</b>: Tungsten is a hard, heavy, nonmagnetic metal that will melt at approximately 3400<sup>o</sup>C.<br /><br />
<b>Capabilities</b>: Tungsten can be cold and hot drawn.<br /><br />
<b>Limitations</b>: Tungsten is hard to machine, requires high temperatures for melting, and is produced by powered metallurgy.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Tungsten is used in making light bulb filaments, phonograph needles.<br /> 
2.	Alloying agent in production of high-speed steel, armor plate, and projectiles.<br />
3.	It is also used as an alloying agent in non-consumable welding electrodes, armor plate, die and tool steels, and hard metal carbide cutting tools.
</p></dd><br />
<dt><b><a name="zinc">6.13 &nbsp;&nbsp;&nbsp;Zinc (Zn)</a></b></dt>
<dd><p>
Zinc, a crystalline metal with moderate strength and ductility, is seldom used alone except as a coating.<br /><br /> 
<b>Appearance</b>: Both zinc and zinc alloys are blue-white in color when polished, and oxidize to gray.<br /><br />
<b>Manufacture</b>: The zinc ore is heated in an electric furnace to remove all volatile elements present in the ore. The zinc is liberated in the form of vapour. This vapour is then considered to get the metallic zinc.<br /><br />
<b>Salient Characteristics</b><br />
1.	Zinc is a medium low strength metal having a very low melting point.<br />
2.	It is easy to machine.<br />
3.	Zinc can be soldered or welded.<br /><br />
<b>Capabilities</b>: Zinc can be cast, cold worked (extruded), machined, and welded.<br /><br />
<b>Limitations</b>: Zinc die castings can not be used in continuous contact with steam.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Galvanizing metal is the largest use of zinc and is done by dipping the part in molten zinc or by electroplating it. The most commonly galvanized products are sheet and strip steel, tube and pipe, and wire and wire rope. The automobile industry is the largest consumer of galvanized steel.<br /><br />
2.	Zinc is also used as an alloying element in producing alloys such as brass and bronze which is essentially an alloy of copper and zinc, with the proportion of zinc ranging from 5 to 40 per cent. They are used in plumbing, heat exchange equipment, and a wide range of decorative hardware, to name a few applications.<br /><br />
3.	Another important use of zinc is in the manufacture of a vast range of die-cast products. Because it has a relatively low melting point and is very fluid, zinc is easy to pour when melted. Therefore it is well suited to rapid, assembly-line die-casting, particularly to produce small and intricate shapes. Typical parts made with zinc die castings, toys, ornaments, building equipment, grills, door and window handles, carburetor and fuel pump bodies, instrument panels, wet and dry batteries, fuse plugs, pipe organ pipes, munitions, cooking utensils, and flux.<br /><br />
4.	Rolled zinc metal is a basic component in dry-cell batteries, and zinc oxide is used as a catalyst in the manufacture of rubber and as a pigment in white paint.<br /><br />
5.	It is used as zinc oxide and zinc sulfide, widely used in paint and rubber, and zinc dust, which is used in the manufacture of explosives and chemical agents.<br /><br />
<b>Antimony</b><br />
1.	Metallic element of nitrogen family.<br />
2.	A bright silvery-white metal.<br />
3.	It expands upon solidification, therefore, it is useful in combination with other substances as an alloy ingredient in type metal and castings.<br />
4.	When alloyed with other metals, antimony imparts strength.<br /><br />
<b>Important engineering Application</b><br />
With lead, it forms strong alloys, which are made into automobile storage batteries, bullets, and coverings for telephone cables.<br />
Antimony compounds are used to make matches, flameproof fabrics, pigments, and expectorants.
</p></dd><br />
<dt><b><a name="bronze">6.14 &nbsp;&nbsp;&nbsp;Bronze</a></b></dt>
<dd><p>
Any alloy of copper and tin is called bronze. Bronze is a combination of 84% copper and 16% tin. It has high strength, is rust or corrosion resistant, has good machinability, and can be welded.<br /><br />
<b>Appearance</b><br />
The color of polished bronze varies with the composition from red, almost like copper, to yellow brass. They oxidize to various shades of green, brown, or yellow.<br /><br />
<b>Copper-nickel-zinc alloys (Nickel silver)</b>: Nickel is added to copper zinc alloys to lighten their color; the resultant alloys are called nickel silver. These alloys are of two general types, one type containing 65 percent, the other containing 55 to 60 percent copper and nickel combined. The first type can be cold worked by such operations as deep drawing, stamping, and spinning. The second type is much harder end is not processed by any of the cold working methods.<br /><br />
<b>Copper-Nickel Alloys (Nickel copper) (cupro-nickel)</b><br />
1.	Alloys of copper and nickel, with or without other elements but in any case containing by weight not more than 1 % of zinc.<br />
2.	These are either wrought or cast alloys containing nickel as the principal alloying element.<br />
3.	Nickel alloys have moderately high-to-high tensile strength, which increases with the nickel content.<br />
4.	They are moderately hard, quite tough, and ductile.<br />
5.	They are very resistant to the erosive and corrosive effects of high velocity seawater, stress corrosion, and corrosion fatigue.<br />
6.	Because of their high resistance to corrosion, copper nickel alloys, containing 70% copper and 30% nickel or 90% copper and 10% nickel, are used for saltwater piping systems.<br />
7.	Small storage tanks and hot-water reservoirs are constructed of a copper-nickel alloy that is available in sheet form.
</p></dd><br />
<dt><b><a name="duralumin">6.15 &nbsp;&nbsp;&nbsp;Duralumin</a></b></dt>
<dd><p>
One of the first of the strong structural aluminum alloys developed is called Duralumin.<br /><br />
<b>Alclad</b><br />
This is a protective covering that consists of a thin sheet of pure aluminum rolled onto the surface of an aluminum alloy during manufacture.<br /><br />
<b>Monel</b><br />
1.	Monel is an alloy in which nickel is the major element. It contains from 64% to 68% nickel, about 30% copper, and small percentages of iron, manganese, and cobalt.<br />
2.	Monel is harder and stronger than either nickel or copper and has high ductility.<br />
3.	This alloy can be worked cold and can be forged and welded.<br />
4.	At high temperature it becomes "hot short" or brittle.<br />
5.	Nuts, bolts, screws, and various fittings are made of Monel.<br /><br /> 
<b>K-Monel</b><br />
1.	This is a special type of alloy developed for greater strength and hardness than Monel.<br />
2.	In strength, it is comparable to heat-treated steel.<br />
3.	K-monel is used for instrument parts that must resist corrosion.<br /><br />
<b>Inconel</b><br />
1.	This high-nickel alloy is often used in the exhaust systems of aircraft engines.<br />
2.	Inconel is composed of 78.5% nickel, 14% chromium, 6.5% iron, and 1% of other elements.<br />
3.	It offers good resistance to corrosion and retains its strength at high-operating temperatures.<br />
Beryllium copper sometimes known as beryllium bronze contains from 1.50 to 2.75 percent beryllium. It is ductile when soft, but loses ductility and gains tensile strength when hardened.
</p></dd><br />
<dt><b><a name="brass">6.16 &nbsp;&nbsp;&nbsp;Brass</a></b></dt>
<dd><p>
Any alloy of copper and zinc is called brass. It has a low melting point and high heat conductivity. Brass has a wide range of uses in making tools, machinery, and construction materials. Brass is also used in arts and crafts. Most brass is easily worked, and it resists deterioration by corrosion.<br /><br />
<b>Appearance</b>: The color of polished brass varies with the composition from red, almost like copper, to yellow brass. They oxidize to various shades of green, brown, or yellow.<br /><br />
<b>Kinds and Uses of Brass</b><br />
1.	<b>White Brasses</b>:  Brasses that contain less than 55 percent copper.<br /><br />
<b>Salient Characteristics</b><br />
Hard and brittle that they cannot be hammered or otherwise worked without breaking.<br /><br />
<b>Important Engineering Applications</b><br />
Molten white brass can be cast to make parts that endure sliding motion in machinery without wearing away.<br />
2. <b>Alpha-Beta Brasses</b>: Brasses that contain 55 to 63 percent copper.<br /><br />
<b>Salient Characteristics</b><br />
They are very strong but can be readily worked while hot. These brasses are usually for structural materials. One such brass is Muntz metal, yellow metal.<br /><br />
<b>Important Engineering Applications</b><br />
1.	Used in welding rods, condenser tubes, and valve stems. Extruded rivet metal is made into rivets and screws.<br />
2.	It is used for tube plates of condensers and heat exchangers with brass or copper-nickel tubes.<br />
3. <b>Alpha Brasses</b>:  Brasses that contain from 63 to 95 percent copper.<br /><br />
<b>Salient Characteristics</b><br />
They are not as strong as other brasses, but they are more easily worked even when cold.<br /><br />
<b>Types of Alpha Brasses and their important engineering applications</b><br />
1.	<b>High brass</b>: is used to make parts for radiators, springs, chains, and grillwork.<br />
2.	<b>Cartridge brass</b>: is used for cartridges, tubes, and eyelets.<br />
3.	<b>Brazing brass</b>: is used for soldering.<br />
4.	<b>Red brass</b>: is used to make pipes, condenser tubes, flexible hose, and hardware.<br />
5.	<b>Commercial brass</b>: is used to make forgings and screen wire.<br />
6.	<b>Gilding metal</b>: is used as a decorative coating because of its rich color.<br /><br />
4. The fourth group of brasses contains one or more additional metals, apart from copper and zinc, added to the alloy to increase its strength or its resistance to corrosion, to make the alloy more easily machined, or to change its color.<br /><br />
<b>Aluminum brasses</b>: Brasses that contains aluminium as additional material apart from copper and zinc. They are both stronger and more resistant to corrosion.<br /><br />
<b>Tin brasses (admiralty and naval brasses)</b>: Brasses that contains tin as additional material apart from copper and zinc. Tin brasses are also known as admiralty and naval brasses because of their resistance to the corrosion of seawater.<br /><br />
<b>Nickel silver</b>: Brasses that contains nickel as additional material apart from copper and zinc.<br /><br />
<b>Iron brass (delta metal)</b>: Brasses that contains iron tin, and manganese as additional material apart from copper and zinc. It has resistance to stretching, than most brasses.<br /><br />
<b>Lead brass</b>: Brasses that contains lead as additional material apart from copper and zinc. Lead brass is relatively soft, is suited for filing or turning and shaping on a lathe.<br /><br />
<b>Working with Brass</b><br />
1.	Molten brass is cast to produce a wide range of products. Gas and water taps and machine bearings are sometimes made of cast brass.<br />
2.	Some brass products are formed by spinning a brass sheet on a lathe. The metalworker uses a burnishing tool to press the sheet and form it into the desired product. The spinning sheet will cup in or flare out almost as easily as clay.
</p></dd><br />
<dt><b><a name="beryllium">6.17 &nbsp;&nbsp;&nbsp;Beryllium</a></b></dt>
<dd><p>
<b>Salient Characteristics</b><br />
1.	It has low density (two-thirds that of aluminum),<br /> 
2.	high modulus per weight (five times that of ultrahigh-strength steels), high specific heat,<br /> 
3.	high strength per density,<br /> 
4.	excellent dimensional stability,<br />
5.	Beryllium is expensive, however, and its impact strength is low compared to values for most other metals.<br /><br /> 
<b>Capabilities</b><br />
1.	Beryllium parts can be hot formed from cross-rolled sheet and plate as well as plate machined from hot-pressed block.<br /> 
2.	Structural assemblies of beryllium components can be joined by most techniques such as mechanical fasteners, rivets, adhesive bonding, brazing, and diffusion bonding.<br />
3.	All conventional machining operations are possible with beryllium<br /><br />
<b>Limitations</b><br />
The bare metal corrodes readily when exposed for prolonged periods to tap or seawater or to a corrosive environment that includes high humidity.<br /><br />
<b>Important Engineering Applications</b><br />
Beryllium typically used in military-aircraft and space-shuttle brake systems, in missile reentry body structures, missile guidance systems, mirrors and optical systems, satellite structures, and X-ray windows.
</p></dd><br />
<dt><b><a name="zirconium">6.18 &nbsp;&nbsp;&nbsp;Zirconium</a></b></dt>
<dd><p>
<b>Salient Characteristics</b><br />
1.	It provides resistance to HCl at all concentrations and at temperatures above the boiling temperature,<br /> 
2.	Zirconium and its alloys also have excellent resistance in sulfuric acid at temperatures above boiling<br />
3.	This metal also resist most organics such as acetic acid and acetic anhydride as well as citric, lactic, tartaric, oxalic, tannic, and chlorinated organic acids.<br /><br />
<b>Limitations and capabilities</b><br />
1.	Zirconium alloys can be machined by conventional methods.<br />
2.	Zirconium is most commonly welded by the gas-tungsten arc method.
</p></dd><br />
<dt><b><a name="applications">6.19 &nbsp;&nbsp;&nbsp;Important Engineering Applications</a></b></dt>
<dd><p>
Zirconium and its alloys are used as a construction material in the chemical-processing industry. Applications include heat exchangers (for producing hydrogen peroxide, rayon, etc.), drying columns, pipe and fittings, pump and valve housings, and reactor vessels.<br /><br />
<b>The order of LUSTER of some familiar metals is</b>:<br />
GOLD > SILVER > CHROMIUM > TIN > COPPER > ZINC > MAGNESIUM > ALUMINIUM > LEAD > IRON.<br /><br />
<b>The order of THERMAL CONDUCTIVITY of some familiar metals is</b>:<br />
SILVER > COPPER > GOLD > ALUMINIUM > MAGNESIUM > ZINC > CHROMIUM > IRON > TIN > LEAD<br /><br />
<b>The order of ELECTRICAL CONDUCTIVITY of some familiar metals is</b>:<br />
SILVER > COPPER > GOLD > ALUMINIUM > MAGNESIUM > ZINC > IRON > TIN > CHROMIUM > LEAD.<br /><br />
<b>The order of DUCTILITY of some familiar metals is</b>:<br />
GOLD > SILVER > PLATINUM > IRON > COPPER > ALUMINIUM > ZINC > TIN > LEAD.
</p></dd><br />
<dt><b><a name="effect">6.20 &nbsp;&nbsp;&nbsp;Effect of various non-ferrous metals on alloying with ferrous metals</a></b></dt>
<dd><p>
<b>Chromium</b> is used as an alloying element in carbon steels to increase hardenability, corrosion resistance, and shock resistance. It imparts high strength with little loss in ductility.<br /><br />
<b>Nickel</b> increases the toughness, strength, and ductility of steels, and lowers the hardening temperatures.<br /><br />
<b>Manganese</b> is used in steel to produce greater toughness, wear resistance, easier hot rolling, and forging. An increase in manganese content decreases the weldability of steel.<br /><br />
<b>Molybdenum</b> increases hardenability. The impact fatigue property of the steel is improved with up to 0.60 percent molybdenum.<br /><br />
<b>Titanium</b> used as additional alloying agents in low-carbon content, corrosion resistant steels. Supports resistance to intergranular corrosion after the metal is subjected to high temperatures for a prolonged time period.<br /><br />
<b>Tungsten</b>, as an alloying element in tool steel that retains its hardness at high temperatures.<br /><br />
<b>Vanadium</b> is used to help control grain size. It is also added to steel during manufacture to remove oxygen.<br /><br />
<b>Silicon</b> is added to steel to obtain greater hardenability and corrosion resistance, and is often used with manganese to obtain strong and tough steel.<br /><br />
<b>How titanium can be distinguished from steel</b>?<br />
Titanium can be distinguished from steel by a copper sulfate solution. The solution will not react with titanium, but will leave a coating of copper on steel.<br /><br />
<b>What is the Design weaknesses of aluminium</b>?<br />
Design weaknesses of aluminium is difficult to arc weld.<br /><br />
<b>What is the effect on the properties of nickel when it is mixed with: 1. Chromium, 2. Manganese, 3. Cobalt.</b><br />
When nickel is used with chromium, it is resistant to high temperature oxidation and corrosion.<br />
When combined with manganese it is resistant to oxidation and reduction at elevated temperatures.<br />
Nickel with cobalt provides high heat resistance which makes it useful in chemical industry.<br /><br />
<b>How cobalt achieves high strength</b>?<br />
Cobalt achieves its strength through solid solution strengthening and precipitation hardening. Cobalt based materials have low machinability because of rapid work hardening that takes place at elevated temperatures.<br /><br />
<b>How following metals are distinguished from each other through chemical test</b>?<br />
Monel metal from Inconel<br />
Magnesium from aluminum<br />
Monel can be distinguished form Inconel by one drop of nitric acid applied to the surface. It will turn blue-green on Monel, but will show no reaction on Inconel.<br />
Magnesium can be distinguished from aluminum using silver nitrate, which will leave a black deposit on magnesium, but not on aluminum.
</p></dd><br />
<dt><b><a name="glance">6.21 &nbsp;&nbsp;&nbsp;Non-Ferrous Metals at glance</a></b></dt>
<dd><p>
<center><table border="1" cellspacing="0" width="800" style="text-align:justify">
<tr><th>Name</th><th>Composition</th><th>Properties</th><th>Uses</th></tr>
<tr><td>Aluminium</td><td>Pure Metal</td><td>Greyish-White, soft, malleable, conductive to heat and electricity, It is corrosion resistant. It can be welded but this is difficult. Needs special processes.</td><td>Aircraft, boats, window frames, saucepans, packaging and insulation, pistons and cranks.</td></tr>
<tr><td>Aluminium alloys(Duralumin)</td><td>Aluminium + 4% Copper + 1% Manganese</td><td>Ductile, Malleable, Work Hardens.</td><td>Aircraft and vehicle parts.</td></tr>
<tr><td>Copper</td><td>Pure metal</td><td>Red, tough, ductile, High electrical conductor, corrosion resistant, Can work hard or cold. Needs frequent annealing.</td><td>Electrical wire, cables and conductors, water and central heating pipes and cylinders. Printed circuit boards, roofs.</td></tr>
<tr><td>Brass</td><td>65% copper + 35% zinc.</td><td>Very corrosive, yellow in colour, tarnishes very easily. Harder than copper. Good electrical conductor.</td><td>Castings, ornaments, valves, forgings.</td></tr>
<tr><td>Lead</td><td>Pure metal</td><td>The heaviest common metal. Soft, malleable, bright and shiny when new but quickly oxidizes to a dull grey. Resistant to corrosion.</td><td>Protection against X-Ray machines. Paints, roof coverings, flashings.</td></tr>
<tr><td>Zinc</td><td>Pure metal</td><td>A layer of oxide protects it from corrosion, bluish-white, easily worked.</td><td>Makes brass. Coating for steel galvanized corrugated iron roofing, tanks, buckets, rust-proof paints</td></tr>
<tr><td>Tin</td><td>Pure metal</td><td>White and soft, corrosion resistant.</td><td>Tinplate, making bronze.</td></tr>
<tr><td>Gilding metal</td><td>85% copper + 15% zinc.</td><td>Corrosion resistant, golden colour, enamels well.</td><td>Beaten metalwork, jewellery.</td></tr>
</table></center>
</p></dd><br />
<dt><b><a name="alloys">6.22 &nbsp;&nbsp;&nbsp;Some Nonferrous Alloys</a></b></dt>
<dd><p>
<center><table border="1" cellspacing="0" width="800" style="text-align:justify">
<tr><th>General Composition*</th><th>Name of Alloy</th><th>Special Qualities</th><th>Typical Uses</th></tr>
<tr><td>Cobalt, tungsten, molybdenum silicon, and chromium</td><td>Stellite</td><td>Extreme hardness</td><td>Cutting tools</td></tr>
<tr><td>Copper and zinc</td><td>Brass</td><td>Easily shaped, good appearance</td><td>Hardware</td></tr>
<tr><td>Copper and beryllium</td><td>Beryllium copper</td><td>Very hard, high strength</td><td>Nonsparking tools, rifle parts, small castings</td></tr>
<tr><td>Gold and palladium</td><td>White gold</td><td>Color, durability</td><td>Jewelry</td></tr>
<tr><td>Lead and tin</td><td>Plumber's solder</td><td>Low melting point</td><td>Sealing metal joints</td></tr>
<tr><td>Nickel, copper, iron, manganese, and silicon</td><td>Monel metal</td><td>Corrosion resistance</td><td>Steam valves, turbine blades</td></tr>
<tr><td>Nickel and chromium</td><td>Nichrome</td><td>Electrical resistance, nonoxidizing</td><td>Heating elements in stoves, irons, toasters</td></tr>
<tr><td>Tin, antimony, and copper</td><td>Babbitt metal</td><td>Low melting point, low friction</td><td>Bearings</td></tr>
<tr><td>Tungsten and thorium</td><td>Tungsten filament</td><td>High melting point, electrical resistance</td><td>Very high voltage electronic filaments</td></tr>
</table></center>
</p></dd><br />
<dt><b><a name="properties">6.23 &nbsp;&nbsp;&nbsp;Mechanical Properties of Materials</a></b></dt>
<dd><p>
<center><table border="1" cellspacing="0" width="500" style="text-align:justify; text-align:center">
<tr><th>Material</th><th>Young’s Modulus<br/>(GPa)</th><th>Poison ratio</th><th>Yield stress<br/>(MPa)</th><th>Ultimate stress<br/>(MPa)</th></tr>
<tr><td>Aluminum</td><td>70</td><td>0.33</td><td>20</td><td>70</td></tr>
<tr><td>Brass</td><td>96-110</td><td>0.34</td><td>70-550</td><td>200-620</td></tr>
<tr><td>Bronze</td><td>96-120</td><td>0.34</td><td>82-690</td><td>200-830</td></tr>
<tr><td>Cast iron</td><td>83-170</td><td>0.20-0.30</td><td>120-190</td><td>69-480</td></tr>
<tr><td>Copper</td><td>110-120</td><td>0.33-0.36</td><td>330</td><td>380</td></tr>
<tr><td>Glass</td><td>48-83</td><td>0.20-0.27</td><td></td><td>70</td></tr>
<tr><td>Magnesium</td><td>41</td><td>0.35</td><td>20-70</td><td>100-170</td></tr>
<tr><td>Rubber</td><td>0.0007-0.004</td><td>0.45-0.50</td><td>1-7</td><td>7-20</td></tr>
<tr><td>Tool steel</td><td>190-210</td><td>0.27-0.30</td><td>520</td><td>900</td></tr>
<tr><td>Titanium</td><td>110</td><td>0.33</td><td>400</td><td>500</td></tr>
<tr><td>Tungsten</td><td>340-380</td><td>0.20</td><td></td><td>1400-4000</td></tr>
<tr><td>Wood</td><td>10-11</td><td></td><td>30-40</td><td>30-50</td></tr>
</table></center>
</p></dd><br />
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson4.php" title="Body Protection Products">Lecture 5</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson7.php" title="Ferrous Metals">Lecture 7</a></td></tr></table>
</div>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>