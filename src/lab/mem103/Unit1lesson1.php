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
<tr><td width="65%"><b>Lesson 2 OVERVIEW OF MANUFACTURING PROCESSES</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson1/Unit1Lesson1.pdf" target="_blank" title="Download Lesson 2">Lesson 2 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><dt><a href="#what">2.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What is Manufacturing?</a></dt></td><td><a href="Unit1Lesson1scq.php">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self-check questions</a></td></tr>
<tr><td><dt><a href="#evolution">2.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Evolution of Manufacturing</a></dt></td><td><a href="Unit1Lesson1tq.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td><a href="#types">2.2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Types of Manufacturing Processes</a></td><td><a href="Unit1Lesson1Assignment.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Assignments</a></td></tr>
<tr><td><a href="#forming">2.2.1&nbsp;&nbsp;&nbsp;Forming Processes</a></td><td></td></tr>
<tr><td><dt><a href="#joining">2.2.2&nbsp;&nbsp;&nbsp;Joining</a></dt></td><td></td></tr>
<tr><td><dt><a href="#machining">2.2.3&nbsp;&nbsp;&nbsp;Machining</a></dt></td><td></td></tr>
<tr><td><dt><a href="#powder">2.2.4&nbsp;&nbsp;&nbsp;Powder Metallurgy</a></dt></td><td></td></tr>
<tr><td><dt><a href="#production">2.3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Types of Production Systems</a></dt></td><td></td></tr>
<tr><td><dt><a href="#job">2.3.1&nbsp;&nbsp;&nbsp;Job shop Production</a></dt></td><td></td></tr>
<tr><td><dt><a href="#batch">2.3.2&nbsp;&nbsp;&nbsp;Batch Production</a></dt></td><td></td></tr>
<tr><td><dt><a href="#mass">2.3.3&nbsp;&nbsp;&nbsp;Mass Production</a></dt></td><td></td></tr>
<tr><td><dt><a href="#projects">2.3.4&nbsp;&nbsp;&nbsp;Projects</a></dt></td><td></td></tr>
<tr><td><dt><a href="#cellular">2.3.5&nbsp;&nbsp;&nbsp;Cellular Production</a></dt></td><td></td></tr>
<tr><td><dt><a href="#lean">2.3.6&nbsp;&nbsp;&nbsp;Lean Manufacturing</a></dt></td><td></td></tr>
<tr><td><dt><a href="#agile">2.3.7&nbsp;&nbsp;&nbsp;Agile Manufacturing</a></dt></td><td></td></tr>
<tr><td><dt><a href="#recent">2.3.8&nbsp;&nbsp;&nbsp;Recent Concepts in Manufacturing</a></dt></td><td></td></tr>
<tr><td><dt><a href="#workshops">2.4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Safety in Mechanical Workshops</a></dt></td><td></td></tr>
<tr><td><dt><a href="#ethics">2.5&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Professionalism and Ethics</a></dt></td><td></td></tr>
</table><br/></div>
<div>
<b>OVERVIEW OF MANUFACTURING PROCESSES</b>
<p>
The wealth of a nation depends on its resources and the skill of its people to produce variety of quality articles for its use and consumption. <i>The prosperity and degree of comfort depend on the ability of people to convert the raw resources available in to useful articles of consumption and to distribute these articles equitably among its citizens</i>. The present day individual is required to learn not only the state of art technology but also the attitudes that make him successful in the struggle of life. He should build in himself a strong impulse to cultivate innovative bent of mind along with adaptability with nature. 
Education appears to be the only means of motivating the masses to achieve the above objectives. <i>Manufacturing is one of the most important fields of human endeavor which effects day to day life and culture of people</i>. There is a proverb in English, viz., "One lives to learn", which means that man always learns newer and newer things throughout his life. Whenever there is an opportunity to learn something it should be learnt at once. One should never let slip a good opportunity. If a good chance is once missed, it is futile to hope that such an opportunity would come again, viz., "Time once lost is never regained".</p><br/>
<dt><b><a name="what">2.0&nbsp;&nbsp;&nbsp;What is Manufacturing?</a></b></dt>
<dd><p>
The word "<b>manufacturing</b>" comes from two Latin words: <b>manu (which means "hand"), and factus (which means "to make")</b>, meaning, "made by hand". In the modern context, manufacturing involves making products from raw materials by using various processes, by making use of tools, machines and computers. The word 'production' is often used interchangeably with the word manufacturing. Have you ever thought how a pencil, which you use every day, is manufactured? How the other commodities that we use in our day-to-day life are manufactured? All these are made by different processes. 
Any object made by us for any specific purpose is called a product. The process of making or producing a product is called manufacturing. To carry out the manufacturing activity we require 5 Ms, viz.<br/><br/> 
1. Material,<br/>
2. Machinery,<br/>
3. Men,<br/>
4. Money, and<br/>
5. Methods.<br/><br/>
Every product requires material (often referred as the raw material) from which the product is made. Every product, parts, assembly or material requires a method to convert raw material into the desired product. We need machines to convert the material to get desired shape, size, properties etc. To convert the raw material into the product using machines and methods, we require men to operate the machines and apply the methods. The last is Money, which is the essential input required for purchasing raw material, machines, manpower etc. The Fig.1.1 illustrates the manufacturing process and its interaction with the five M's.
<br/><br/><center><img src="images/mem/lesson1/ManufacturingProcess.jpg" width="640" height="200" alt="Manufacturing Process"><br/><b>Fig. 1.1 The Manufacturing Process and five M’s</b></center></p><br/>
</dd>
<dt><b><a name="evolution">2.1&nbsp;&nbsp;&nbsp;The Evolution of Manufacturing</a></b></dt>
<dd><p>
Before the Industrial Revolution most goods and articles were made by hand. There were relatively few consumers and mass produced products were not in demand. Items that we consider essential such as clothing and furniture were made by hand, one at a time. Today, the definition of manufacturing has changed. Our population is larger and people's needs have changed. Most of us no longer have the time or skills to make our own clothing or build our own furniture. We work in specialized areas and rely on manufacturing companies to produce the goods that we need. Because the population and demand for products is so a large, manufacturing companies must produce items in large quantities.<br/><br/>
A finer distinction between production and manufacturing systems can be stated as below. A production system deals with all aspects of workers, machines and know how required to manufacture parts or products. For example, it can be a company that makes automobiles, assembly plant, casting plant, etc.<br/>
A <i>manufacturing</i> system is a collection of manufacturing processes and operations resulting in a specific end product. For example, forging of crankshafts, front axle beams, or any other series of connected operations or processes.</p><br/>
</dd>
<dt><b><a name="types">2.2&nbsp;&nbsp;&nbsp;Types of Manufacturing Processes</a></b></dt>
<dd><p>
The basic manufacturing processes are detailed here. The underlying concepts are briefly introduced.  An elaborate discussion of the selective manufacturing processes is incorporated subsequently. 
Manufacturing Processes can be broadly classified into five groups:<br/><br/>
a. Forming<br/>
b Joining<br/>
c. Machining<br/>
d. Powder Metallurgy<br/>
e. Casting</p><br/>
</dd>
<dt><b><a name="forming">2.2.1&nbsp;&nbsp;&nbsp;Forming Processes</a></b></dt>
<dd><p>
Processes that cause changes in the shape of solid metal articles via plastic (permanent) deformations are called forming processes. These are the manufacturing processes in which material is plastically deformed to the desired shape and size. The equipment for forming processes is expensive because of the large forces involved. The production rate is fast. Forming processes make use of suitable force, pressure or stresses like compression, tension, shear or their combinations to cause a permanent deformation of the material to give it the required shape. Examples of metal forming processes include extrusion, rolling, forging, drawing, swaging and sheet metal forming etc. The various forming operations are illustrated in Fig 1.1. Typical examples of the products manufactured by forming processes include piston rods, crank shafts, axle beams, kitchen utensils, wires, cold drink bottle caps, body of a pen, collapsible tubes, rails etc. Forming is normally categorized as hot and cold.</p><br/>
</dd>
<dt><b><a name="joining">2.2.2&nbsp;&nbsp;&nbsp;Joining</a></b></dt>
<dd><p>
In joining, two or more pieces are joined together to produce the required product. Different methods are used for joining two or more parts together. The six main joining processes used in industry today are welding, brazing, braze welding, soldering, adhesive bonding, and mechanical fasteners. The joint can be permanent or temporary.<br/>
The permanent joining can be done by fusing the metals together. For this kind of joining, metal is locally heated or melted and filler material may be used. Examples of permanent joining processes include welding, brazing, soldering etc. The temporary joining of the components can be done using rivets, nuts, bolts, screws, etc. Adhesives are also used to make temporary joints. Joining processes are widely used in assembly. Fig. 1.2 illustrates joint made by different joining methods.
<br/><br/><center><img src="images/mem/lesson1/JoiningMethods.jpg" width="700" height="220" alt="Various joining methods (a) Riveting (b) Welding (c) Fastening"><br/><br/><b>Fig. 1.2 Various joining methods (a) Riveting (b) Welding (c) Fastening</b></center></p><br/>
</dd>
<dt><b><a name="machining">2.2.3&nbsp;&nbsp;&nbsp;Machining</a></b></dt>
<dd><p>
Material removal by mechanical means began in the stone age when man discovered that material could be shaped by chipping. Machining is a process where excess material is removed from the unwanted regions of the raw material to get the required size and shape. In this process, material removal may be done manually or by using a machine tool. Cutting, generally involving single-point or multipoint cutting tools, each with a clearly defined geometry. It is important to view machining, as well as all manufacturing operations, as a system consisting of the workpiece, the tool and the machine. Using machining processes, it is possible to manufacture components with very close dimensional tolerances, which cannot be obtained by other methods of manufacturing. Typical examples of the products made by machining processes include shafts, gears, automobile parts, nuts and bolts etc. The traditional machining includes primers on turning, milling, drilling, and grinding. The unit product of metal removed during cutting is known as "chip". Fig. 1.3 shows different metal cutting operations carried out on different machines.
<br/><br/><center><img src="images/mem/lesson1/MachiningProcesses.jpg" width="750" height="600" alt="Various machining processes (a) Turning (b) Drilling (c) Horizontal Milling (d) Vertical Milling"><br/><br/><b>Fig. 1.3 Various machining processes (a) Turning (b) Drilling (c) Horizontal Milling (d) Vertical Milling</b></center></p><br/>
<dd>
<dt><b><a name="powder">2.2.4&nbsp;&nbsp;&nbsp;Powder Metallurgy</a></b></dt>
<dd><p>
In <i>powder</i> metallurgy, fine metallic powder is blended, pressed into a desired shape in a die and then heated in a controlled atmosphere to bond the contacting surfaces of the particles and get the desired properties, various steps are illustrated in Fig. 1.4. This process is capable of producing relatively complex parts economically, in net-shape form to close tolerances, from a wide variety of alloy and metal powders. The size of the product that can be made by this process ranges from tiny balls for ballpoint pen tips to parts weighing up to few hundred kilograms. The products produced by this process have good dimensional accuracy and finish. The products usually do not require any further processing. Typical products made from powder metallurgy include some critical parts, such as jet-engine component, are now being made by P/M techniques.
<br/><br/><center><img src="images/mem/lesson1/PowderMetallurgy.jpg" width="650" height="450" alt="Stages in powder metallurgy process (1) Blending, (2) Compacting, (3) Sintering"><br/><br/><b>Fig. 1.4 Stages in powder metallurgy process (1) Blending, (2) Compacting, (3) Sintering</b></center></p><br/>
</dd>
<dt><b><a name="production">2.3&nbsp;&nbsp;&nbsp;Types of Production Systems</a></b></dt>
<dd><p>
Based on quantity of product, manufacturing activity can be classified under four categories, Fig. 1.5, viz.<br/>
1.	Projects -- low volume, highly customized products<br/> 
2.	Job shop production - low volume, highly customized products<br/>
3.	Batch Production -- moderate volume, moderately customized products<br/>
4.	Mass Production -- high volume, standardized products<br/> 
&nbsp;&nbsp;&nbsp;(a) Assembly line - very high volume, single, standard product but output is in the form of discrete unit automobiles.<br/>
&nbsp;&nbsp;&nbsp;(b) Continuous Production -- very high volume, single, standard product but output is in the form of continuous petrochemicals, paper.
<br/><br/><center><img src="images/mem/lesson1/ProductionSystem.jpg" width="700" height="220" alt="Continum of production systems differentiated on the basis of flexibility, volume, standardization"><br/><br/><b>Fig. 1.5 Continum of production systems differentiated on the basis of flexibility, volume, standardization</b></center></p><br/>
</dd>
<dt><b><a name="job">2.3.1&nbsp;&nbsp;&nbsp;Job Shop Production</a></b></dt>
<dd><p>
Job shop production is commonly used to meet specific customer orders requiring one or very few numbers of the product having a very specific design and specifications. Examples of the products made from job shop production include a space vehicle, a special tool, and an easy chair of customer specified design. Layout of job shop process is depicted in Fig. 1.6.<br/><br/>
<b>Characteristics of Job shops:</b><br/>
1.	Low volume, customized product, made to order (MTO)<br/>
2.	Large product variety<br/>
3.	Batch size depends on customer order<br/>
4.	Requires flexible, general-purpose equipment<br/>
5.	Requires highly skilled, flexible labor<br/>
6.	Layout - functional grouping of activities
<br/><br/><center><img src="images/mem/lesson1/JobShop.jpg" alt="Layout of job shop"><br/><br/><b>Fig. 1.6 Layout of job shop</b></center></p><br/>
</dd>
<dt><b><a name="batch">2.3.2&nbsp;&nbsp;&nbsp;Batch Production</a></b></dt>
<dd><p>
Batch production is used for producing low volumes of moderately customized products. The orders for the product may be repetitive or non-repetitive. Typical examples of the products made in batch production include textbooks, furniture, clothing, industrial equipments, drugs.<br/><br/>
<b>Characteristics of Batch Production:</b><br/>
1.	Variety of co-designed products<br/>
2.	Moderate volume<br/>
3.	made to stock (MTS) sometimes made to order (MTO)<br/>
4.	Higher production rates but still general-purpose equipment<br/>
5.	Workers more specialized<br/>
6.	Equipment and labor are organized by similar machine functions  i.e. functional or process layout. Example: all lathes together, all grinders together, all mills together, etc.</p><br/>
</dd>
<dt><b><a name="mass">2.3.3&nbsp;&nbsp;&nbsp;Mass Production</a></b></dt>
<dd><p>
Mass production is used for producing large volumes of standardized discrete i.e. noncontinuous; a space between each one products. Mass production is characterized by the manufacture of identical products in bulk quantities. In mass production environment, the entire organization is dedicated for the manufacture of a particular type of product. Examples of mass production are pens, refills, screws, cars, scooters. As, the machines and equipment are involved in the manufacture of single type of product, the machines and equipment must be <i>special purpose rather than general purpose</i> and, hence, the investment required for machine tools and equipment is high. Typically, mass production takes place on assembly lines.<br/><br/>
<b>Characteristics of mass production:</b><br/>
1.	Product flow is straight, predictable<br/>
2.	Production is very efficient and low cost<br/>
3.	Production is very inflexible<br/>
4.	The layout is based on a specific product design, so changing products is difficult.</p><br/>
</dd>
<b>2.3.3.1&nbsp;&nbsp;&nbsp;Assembly line production</b>
<p>
Materials flows through the manufacturing facilities are uni-directional and any product flowing along the line usually requires all the facilities on the line as shown in Fig. 1.7. This type of approach needs a well trained, flexible workforce with supervisors and workers on the shop-floor possessing up-to-the-minute information. When the product type is changed - complex resetting is necessary.<br/><br/>
<center><img src="images/mem/lesson1/AssemblyLine.jpg" width="700" height="150" alt="Layout of assembly line"><br/><br/><b>Fig. 1.7 Layout of assembly line</b></center></p><br/>
<b>Characteristics of Assembly line:</b><br/>
1.	High volume<br/>
2.	Standardized products<br/>
3.	Uniformity in product sequence of steps<br/>
4.	Specialized equipment (capital intensive)<br/>
5.	Layout: By Product (sequential)<br/>
6.	Little buffer inventory<br/>
7.	Narrow range of tasks per worker</p><br/>
<b>2.3.3.2&nbsp;&nbsp;&nbsp;Continuous Process Production</b>
<p>Continuous processes are used for very high volume commodity products that flow, like steel, paper, paints, chemicals, and foods. Continuous process is a special form of line organization that is - plant dominated.<br/><br/>
<b>Characteristics of Continuous processes:</b><br/> 
1.	Highly efficient<br/> 
2.	Ease of control<br/>
3.	Large volume production of commodities<br/>
4.	Very specialized equipment<br/>
5.	Automated & tightly integrated process<br/>
6.	Many operate 24 hours/day<br/>
7.	Enormous capacity<br/> 
8.	Large investment in plant and equipment<br/> 
9.	Limited variety<br/> 
10.	Difficulty adjusting to volume changes</p><br/>
<dt><b><a name="projects">2.3.4&nbsp;&nbsp;&nbsp;Projects</a></b></dt>
<dd><p>
Projects represent one-of-a-kind production for a single customer. Examples of projects are constructing a building, building ships, and producing the space shuttle.<br/><br/>
<b>Characteristics of projects include:</b><br/>
1.	Large monetary investment in the project<br/> 
2.	Intense customer involvement<br/> 
3.	Some subcontracting<br/> 
4.	Very flexible process<br/> 
5.	Often done on the customer's site, not in a factory<br/> 
6.	Usually highly technical<br/> 
7.	Very high cost<br/>
8.	Lengthy schedule</p><br/>
</dd>
<dt><b><a name="cellular">2.3.5&nbsp;&nbsp;&nbsp;Cellular Production</a></b></dt>
<dd><p>
In cellular production, machines are grouped into cells. These grouped machines processes a family of outputs who share same or similar processing requirements.  The basis for grouping can be operations needed to process a group of similar items or part families. Advantages of such systems include relatively short throughput time, reduced material handling, less work-in-process inventory, and reduced setup time. <i>Group technology</i> involves items that have similar design or processing requirements and grouping them into part families for cellular production. It also includes a coding system for items. A sample cellular production process layout is depicted in Fig. 1.8.</p><br/>
</dd>
<dt><b><a name="lean">2.3.6&nbsp;&nbsp;&nbsp;Lean Manufacturing</a></b></dt>
<dd><p>
A methodology to minimize waste at all levels through assessment of each activities of a company. A systematic approach to the identification and elimination all forms of waste from the value stream. This principle has been stressed by: Henry Ford, Taiichi Ohno (Toyota production system), Tom Peters (Thriving On Chaos), Shigeo Shingo, J. F. Halpin (Zero Defects).
<br/><br/><center><img src="images/mem/lesson1/CellularProduction.jpg" width="700" height="400" alt="Layout of a cellular production process using group technology"><br/><br/><b>Fig. 1.8 Layout of a cellular production process using group technology (L-Lathe machine, M-Milling Machine, D-Drilling Machine, G-Grinding Machine, A-Assembly Line)</b></center></p><br/>
</dd>
<dt><b><a name="agile">2.3.7&nbsp;&nbsp;&nbsp;Agile Manufacturing</a></b></dt>
<dd><p>
Agile manufacturing is implementation of lean principles on a broad scale with flexibility (quick response to market).</p><br/>
</dd>
<dt><b><a name="recent">2.3.8&nbsp;&nbsp;&nbsp;Recent concepts in manufacturing</a></b></dt>
<dd><p>
Concurrent engineering is the bringing together of engineering design and manufacturing personnel early in the design phase. The following concepts of design are embedded in concurrent engineering and manufacturing. Design for manufacturing (DFM); Design for assembly (DFA); Design for recycling (DFR); Remanufacturing; Design for disassembly (DFD); Robust design.</p><br/>
</dd>
<dt><b><a name="workshops">2.4&nbsp;&nbsp;&nbsp;Safety in Mechanical Workshops</a></b></dt>
<dd><p>
Mechanical workshops can be very dangerous places especially for the untrained and inexperienced. The safety and safe working habits must be inculcated from day one and their importance must not be ignored. Safety rules must be carefully studied and applied. Everyone must cultivate the "safety-first" habit. An accident may occur due to worker's own fault, due to unsafe equipment or due to unsafe working conditions. Machines and tools are designed with many safety features. Safety is also linked to the equipment. No equipment is completely safe, no matter how carefully it is designed, constructed and used. Safety is ensured only when the equipment is properly maintained, operated and used under stated conditions.<br/><br/>
Safety may be defined as a judgment of the acceptability of danger, where danger is the combination of hazard and risk. Thus the safety of a workplace depends on the hazard and risk involved with the process or machine operation. Hazard is defined, as an injury that might occur.<br/>
Sharp cutting edges, high-temperatures, explosive gases, electric sparks, power-driven machines, parts, or tools, rotating or reciprocating at high speeds etc. are frequently encountered in manufacturing industry. All these are potential sources of causing injury to human beings or damage to equipment.</p><br/>
</dd>
<dt><b><a name="ethics">2.5&nbsp;&nbsp;&nbsp;Professionalism and Ethics</a></b></dt>
<dd><p>
Society has placed a position of trust on the scientists, engineers and technologists responsible for manufacturing products, since the products manufactured have the potential to do great harm to the mankind if they are not manufactured and used properly or they do not perform properly during use. For this reason engineers, scientist and technologists are expected to adhere to high ethical standards. Various international and national societies and institutions have developed codes of ethics to address the fundamental issues. The code of ethics of the Institution of Electrical and Electronics Engineers (IEEE) has the worldwide acceptance. Engineers, scientist and technologists are expected to practice their profession in adherence to ethical cannons and enjoy high respect in society.<br/><br/>
</p></dd>
<dt><b><a name="questions">2.6&nbsp;&nbsp;&nbsp;Self-check Questions</a></b></dt>
<dd><p>
1. What are the Factors that are to be considered in Selecting Processes?<br/>
2. What is primary shaping? Name some primary shaping manufacturing process?<br/>
3. What is metal forming? Name some metal forming manufacturing process?<br/>
4. What is metal cutting? Name some metal cutting processes?<br/>
5. What is manufacturing process? What are the two types of manufacturing strategies?<br/>
6. What are the main components of which Manufacturing System is composed of?<br/>
7. What are the Competitive priorities in today's manufacturing environment?<br/>
8. What is lean manufacturing?<br/>
9. What is Agile manufacturing?<br/>
10. What are the reasons for the changing trend of manufacturing from mass production to agile manufacturing?<br/>
11. What is Concurrent Engineering?<br/>
12. Enumerate some basic safety guidelines in Mechanical workshop.</p><br/>
</dd>
<dt><b><a name="answers">2.7&nbsp;&nbsp;&nbsp;Possible Answers to Self-check Questions</a></b></dt>
<dd><p>
1.<br/>
a.	Basic shape of product<br/>
b.	Material and its properties before and after processing<br/>
c.	Economics of production<br/>
d.	Precision (tolerances) required<br/>
e.	Surface Finish required<br/><br/>
2. In primary shaping manufacturing process there is no initial shape of product and after the process we get well defined final shape. Few examples of primary shaping manufacturing process are Casting (sand and die), metal powder pressing etc.<br/><br/>
3. In metal forming process material is formed by Plastic Deformation of metal. Some frequently used metal forming process are rolling, extrusion, cold and hot forging, bending, deep drawing, rod and tube drawing.<br/><br/>
4. In metal cutting a new shape is made by removing excess of material. Metal cutting processes are sawing, turning, milling, broaching and drilling.<br/><br/>
5. A manufacturing process is defined as the use of one or more physical mechanisms to transform a material's shape and/or form. The two types of manufacturing strategies are: Discrete parts manufacturing and Continuous parts manufacturing.<br/><br/>
6. The main components of Manufacturing System are: {people + machinery + auxiliary equipment} and Common material and information flow.<br/><br/>
7. Cost - Low-cost operations are preferred; Quality - High performance design, Consistent quality are essential; Time - Fast delivery time (lead time), On time delivery, Development speed a must; Flexibility - Customization and Volume flexibility are desired.<br/><br/>
8. In lean manufacturing measures are directed toward eliminating waste over a broad sequence of processes while maintaining quality; example of continuous improvement.<br/><br/>
9. Lean or world class manufacturing is being very good at doing the things you can control. Agile manufacturing deals with the things you can NOT control. Agile Manufacturing is a philosophy of maximizing the capability to respond positively to external and internal changes in condition; includes new products, processes, organizations, teaming, etc.<br/><br/>
10. Here are a few of the reasons that the manufacturing paradigm is changing from mass production to agile manufacturing:<br/>
&bull;	Global competition is intensifying.<br/>
&bull;	Mass markets are fragmenting into niche markets.<br/>
&bull;	Cooperation among companies is becoming necessary, including companies who are in direct competition with each other.<br/>
&bull;	Customers expect low volume, high quality, custom products.<br/>
&bull;	Very short product life-cycles, development time, and production lead times are required.<br/>
&bull;	Customers want to be treated as individuals.<br/><br/>
11.	Concurrent engineering refers to the process of considering simultaneously the requirements of assembly and manufacturing with design requirements in order to reduce the unit cost of production, improve quality, and reduce total lead time.<br/><br/>
12.<br/>
1.	Everyone must wear safety glasses in the shop. Even when one is not working on a machine, one must wear safety glasses. A chip from a machine on which someone is working on could fly into your eye.<br/>
2.	Check your clothes and hair before you walk into the shop. In particular: If you have long hair or a long beard, tie it up. If your hair is caught in spinning machinery, it will be pulled out even you will be pulled into the machine.<br/>
3.	No loose clothing.-Ties, scarves, loose sleves, etc. are prohibited.<br/>
4.	No gloves.<br/>
5.	Wear appropriate shoes - No open toed sandals. Wear shoes that give a sure footing. If you are working with heavy objects, steel toes are recommended.</p><br/>
</dd>
<dt><b><a name="terminal">2.8&nbsp;&nbsp;&nbsp;Terminal Questions</a></b></dt>
<dd><p>
1.	How does manufacturing activity play its role in standard of living in a country? Discuss qualitatively.<br/>
2.	What are the 5 Ms of manufacturing? Briefly explain.<br/>
3.	What is the difference between machining, fabrication and forming?<br/>
4.	List any three components made by joining, metal forming and casting processes other than the examples mentioned in the text that we use in our day- to-day life.<br/>
5.	What is powder metallurgy? How is it different from casting?<br/>
6.	Describe the five categories of manufacturing processes.</p><br/>
</dd>
<dt><b><a name="assignments">2.9&nbsp;&nbsp;&nbsp;Assignments</a></b></dt>
<dd><p>
<b><br/>2.9.1	Class assignments</b><br/>
Make a list of products in your room / home. For each product identify the manufacturing process used to make the product. Find out how many different parts have been used to make each product, identify each of these parts and determine the method(s) used to assemble these parts to make the product.<br/>
<b><br/>2.9.2	Home assignments</b><br/>
With reference to class assignment mentioned above, do you think that the product is performing the intended function properly? Justify your answer. What improvements can be made in the products, say, in design or in manufacturing, to improve the functionality or quality of these products?
</p>
</dd><br/>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson0.php" title="Socio Economic Susutainability">Lecture 1</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson2.php" title="Properties of Materials">Lecture 3</a></td></tr></table>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>