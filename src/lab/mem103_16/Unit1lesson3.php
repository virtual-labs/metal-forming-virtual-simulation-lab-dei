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
<tr><td width="65%"><b>Lesson 4 General Shop Safety</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson3/Unit1lesson3.pdf" target="_blank" title="Download Lesson 4">Lesson 4 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><a href="#safety">4.0&nbsp;&nbsp;&nbsp;Safety in Mechanical Workshops</a></td><td><a href="Unit1Lesson3faq.php">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequently Asked questions</a></td></tr>
<tr><td><a href="#general">4.1&nbsp;&nbsp;&nbsp;General Safety Precautions for the Mechanical Workshop</a></td></tr>
<tr><td><a href="#equipment">4.2&nbsp;&nbsp;&nbsp;Clothing and Safety Equipment for the Mechanical Workshop</a></td></tr>
<tr><td><a href="#guidelines">4.3&nbsp;&nbsp;&nbsp;Safety Guidelines for Hand Tools</a></td></tr>
<tr><td><a href="#practices">4.4&nbsp;&nbsp;&nbsp;Safe Practices in Dimensional Measurement</a></td></tr>
<tr><td><a href="#transfer">4.5&nbsp;&nbsp;&nbsp;Safe Practices in using Layout and Transfer Measuring Tools</a></td></tr>
<tr><td><a href="#comments">4.6&nbsp;&nbsp;&nbsp;General do it yourself Safety Comments</a></td></tr>
</table><br/></div>
<div>
<dt><b><a name="safety">4.0 Safety in Mechanical Workshops</a></b></dt>
<dd><p>
Mechanical workshops can be very dangerous places especially for the untrained and inexperienced. The safety and safe working habits must be inculcated from day one in students and workers and their importance must not be ignored. Safety rules must be carefully studied and applied. Everyone must cultivate the “safety-first” habit. An accident may occur due to worker’s own fault, due to unsafe equipment or due to unsafe working conditions. Machines and tools are designed with many safety features. Safety is also linked to the equipment. No equipment is completely safe, no matter how carefully it is designed, constructed and used. Safety is ensured only when the equipment is properly maintained, operated and used under stated conditions.<br/>
Safety may be defined as a judgment of the acceptability of danger, where danger is the combination of hazard and risk. Thus the safety of a workplace depends on the hazard and risk involved with the process or machine operation. Hazard is defined, as an injury that might occur.<br/>
Sharp cutting edges, high-temperatures, explosive gases, electric sparks, power-driven machines, parts, or tools, rotating or reciprocating at high speeds etc. are frequently encountered in manufacturing industry. All these are potential sources of causing injury to human beings or damage to equipment.<br/>
The workshop supervisor is responsible for ensuring that the required safety equipment is available, and that anyone granted permission to use the facilities is conversant with the safe operation of the equipment, tools and machinery. The user must be warned of any special hazards, restrictions imposed in advance.
</p></dd><br/>
<dt><b><a name="general">4.1&nbsp;&nbsp;&nbsp;General Safety Precautions for the Mechanical Workshop</a></b></dt>
<dd><p>
1. Always wear <b>Safety glasses</b> in the shop.<br/>
2. Check tools before use to assure they are safe to use.<br/>
3. Use the proper tool for the job. Many cuts in the shop occur because a wrench slips and the hand hits a sharp cutting tool.<br/>
4. Do not set up or operate any machinery unless an instructor is in the shop.<br/>
5. Do not operate any machine unless authorized to do so by an instructor.<br/>
6. Do not leave tools or work on the table of a machine even if the machine is not running. Tools or work may fall off and cause a toe or foot injury.<br/>
7. Never handle chips with your hands or fingers. Chips are extremely sharp and can easily cause cuts.<br/>
8. Use a brush to remove chips-not hands, fingers.<br/>
9. Never wear gloves to clean the work piece or any part of a machine that is running. Rotating tools or parts can grab gloves and pull you into the machine.<br/>
10. Get first aid immediately for any injury.<br/>
11. Get help for handling large, long, or heavy pieces of material.<br/>
12. Follow safe lifting practices; lift with your leg muscles, not your back. If you do not know how to lift safely, ask an instructor to show you.<br/>
13. Be sure you have sufficient light to see clearly.<br/>
14. Put tools away when not in use.<br/>
15. Place all scrap pieces in the correct containers.<br/>
16. Store materials in such a way that they cannot become tripping hazards.<br/>
17. Keep floor free of oil, grease, or any other type of liquid. Clean up spilled liquids immediately; they are slipping hazards.<br/>
18. Loose clothing or long sleeves should not be worn in the shop. Machines can easily grab loose clothing in rotating parts.<br/>
19. All set-screws should be of the flush or recessed type. If they are not, move with caution when near them. Projecting set-screws are very dangerous because they may catch on sleeves or clothing.<br/>
20. Never use compressed air to clean any machine, your clothes or yourself.<br/>
21. If using compressed air to clean a part, point the air hose down and away from yourself and other persons.<br/>
22. Passageways should be clear at all times to avoid tripping or other accidents.<br/>
23. Do not run in the shop; there should be no “fooling around” in the shop at any time.<br/>
24. Do not walk behind a person operating a machine; you may bump him by accident or surprise them and cause an accident.
</p></dd><br/>
<dt><b><a name="equipment">4.2&nbsp;&nbsp;&nbsp;Clothing and Safety Equipment for the Mechanical Workshop</a></b></dt>
<dd><p>
1. Always wear safety glasses, safety goggles, or face shields designed for the type of work being done when operating any machine or doing any work in the shop.<br/>
2. Wear shirts with short sleeves, sleeves cut off or rolled up above the elbows.<br/>
3. Wear shoes with thick penetration resistant leather soles-safety shoes or boots, if required.<br/>
4. Always remove gloves before turning on or operating any machine. If material is rough or sharp and gloves must be worn, place or handle material with the machine turned off.<br/>
5. Protect long hair by Wearing a suitable hat or welding cap.<br/><br/>
<b>Do not wear</b><br/>
(i) Tennis shoes (wear thick soled leather shoes, which provide some protection for the feet).<br/>
(ii) Sandals<br/>
(iii) Shorts, cutoffs, Bermuda or short-shorts<br/>
(iv) Tank tops, muscle shirts, etc.<br/>
(v) Neckties, loose or torn clothing<br/>
(vi) Rings, watches, bracelets, or other jewelry that could get caught in moving<br/>
(vii) machinery.<br/><br/>
Loose clothing or long sleeves (machines can easily grab loose clothing in rotating parts)<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/1.jpg"><br/><br/><b>Fig. 1: Correct dress</b></center>
</p></dd><br/>
<dt><b><a name="guidelines">4.3&nbsp;&nbsp;&nbsp;Safety Guidelines for Hand Tools</a></b></dt>
<dd><p><br/>
<b>Handsaws</b><br/>
1. Use slow, careful, downward strokes to help the saw cut directly across material.<br/>
2. Do not crowd or force a saw through the cut because the saw may buckle or fly out.<br/>
3. Keep the saw sharp, properly set, and free of cracks and broken teeth.<br/>
4. Replace saw blades as soon as they begin to stick in the cut.<br/>
5. Carry saws with the blades covered do not carry them on your shoulder.<br/>
6. Do not hand a saw overhead on hooks or leave it on the floor.<br/>
7. To prevent scrapes and cuts, do not allow it to protrude from the end or edge of a bench.<br/><br/>
<b>Hammers</b><br/>
1. Check that the head of the hammer is fixed securely at 90 degrees to the handle and that the handle and head are not damaged.<br/>
2. Check that the handles are free from splits and roughness and that the heads are not burred or split.<br/>
3. Keep the head and handle clean to avoid the tool slipping out of your hand or off the work.<br/>
4. Grasp handle firmly at the end while keeping eyes on the point to be struck.<br/>
5. While using heavy hammers, holding the handle firmly at the end with one hand, slide the other hand down the handle until the head strikes the work, all the time keeping your back as straight as possible.<br/>
6. Do not use hammers for extracting nails.<br/>
7. Do not store or leave a hammer above head height.<br/>
8. Make sure that nobody else is within at least three handles lengths of where you are working.<br/>
9. Always wear a helmet when using mells and sledge hammers.<br/><br/>
<b>Crowbars</b><br/>
1. These are heavy tools—keep your back straight and bend your legs when lifting or using.<br/>
2. Stop work if you become tired—a crowbar flying from your exhausted fingers can be very dangerous.<br/>
3. When using a crowbar as a lever, do not jump on the free end or use other tools to hammer on the crowbar. Remember that crowbars can bend.<br/>
4. Carry a crowbar down by your side at the point of balance.<br/>
5. To prevent slips, place a block of wood under the head of the crowbar.<br/><br/>
<b>Axes</b><br/>
1. Keep axes sharp for faster chopping and greater safety.<br/>
2. Check that handles are smooth and not split or damaged.<br/>
3. Ensure that axe heads are firmly wedged onto handles.<br/>
4. Check that there is no damage to the back of axe heads.<br/>
5. Use only a thin-bladed narrow axe for hard wood, and a thick-bladed wide axe for soft wood.<br/>
6. Always wear gloves when sharpening and move sharpening stones away from the edge, not into it.<br/>
7. Always cut away from yourself.<br/>
8. Make sure there is a clear circle in which to swing an axe.<br/>
9. Keep axes protected by sheaths or metal guards when not in use.<br/><br/>
<b>Files</b><br/>
1. When using a file, have secure footing before applying pressure.<br/>
2. Grasp the file with one hand and guide the point of the file with the thumb and forefinger of the other hand.<br/>
3. Use a vice to secure the material being filed and position the workpiece to avoid awkward filing postures.<br/>
4. Do not use oil since this will cause the file to slide across the work preventing fast cutting.<br/><br/>
<b>Jack Planes</b><br/>
1. Store all planes in a rack designed to protect the cutting edges from damage and workers from injuries.<br/>
2. Always keep the cutting edge sharp.<br/>
3. Hold material being planed securely in a vise, clamp or other holding device.<br/><br/>
<b>Scraper</b><br/>
1. Only experienced workers may use scrapers.<br/>
2. Keep scrapers sharp and in good condition.<br/>
3. Store them in special racks to protect the edges and other workers.<br/>
4. Keep work, scraper and hands free from grease and oil when using a scraper.<br/><br/>
<b>Cutters</b><br/>
1. Use heavy-duty cutters when cutting heavy wire.<br/>
2. It is unsafe to overload a light tool.<br/>
3. Apply force at a right angle to the cutting edge, not at a slant.<br/>
4. Never use cutters near live electrical circuits.<br/>
5. When using cutters on bolts or reinforcing rods, hold the portion to be cut in one hand or cover it with a glove to keep it from flying.<br/>
6. Never tamper with the adjustment on the cutter jaws.<br/><br/>
<b>Wood chisels</b><br/>
1. Always drive a wood chisel by hand in an outward direction, away from the body.<br/>
2. Before using a wood chisel, remove nails and metal from the piece of work or drive them into the material.<br/>
3. Protect the sharp edges of chisels and store them in a rack, workbench or slotted section of a tool box.<br/>
4. Safety hazards result if chisels are left on shelves or bench tops where they can roll off.<br/><br/>
<b>Awls</b><br/>
1. Holding an awl at a right angle to the surface of the work will prevent injury-causing slips.<br/>
2. To make a hole with an awl, turn it to the right and to the left as it begins piercing the material.<br/>
3. Never carry an awl in a pocket because the sharp point may cause an injury.<br/><br/>
<b>Screwdriver</b><br/>
1. Handle the screwdriver carefully.<br/>
2. Use the right sized screwdriver for the job.<br/>
3. Keep the blade clean.<br/>
4. Do not carry a screwdriver in your pocket unless it has a pocket.<br/>
5. Never use a screwdriver for prying or chiseling operations.<br/>
6. When difficulty is encountered in driving or removing screws that are hard to turn, do not use pliers to turn the screwdriver.<br/><br/>
<b>Hand drilling machine</b><br/>
1. Clamp down the work to be drilled.<br/>
2. Hold the brace or hand drill vertically.<br/>
3. If you feel it is necessary - wear goggles.<br/>
4. Do not drill too quickly, take your time.<br/><br/>
<b>Hand shears, bench shears and shearing machines</b><br/>
1. Keep fingers away from the cutting edges of all hand tools in general and keep hands and other parts of the body clear of the cutting edges of bench shears, the shearing machine hand shears and nippers.<br/>
2. Do not carry shears, nippers or pincers in your pocket and do not wave them around.<br/>
3. After use be sure to hand them or store them so that they will not cut anyone coming in contact with them.<br/>
4. Always steady the work that is about to be cut to prevent the tool from slipping.<br/>
5. Guillotines both power and treadle, should be fitted with appropriate guarding to ensure that the fingers etc. of the operator cannot come into contact with the shearing blades.<br/>
6. Lever shears should always be fitted with a locking arm to prevent the lever from being accidentally operated when not in use.<br/><br/>
<b>Clamping devices</b><br/>
1. When closing the jaw of a vice or clamp, avoid getting any portion of your hands or body between the jaws or between one jaw and the work.<br/>
2. Use care to keep from being pinched between the end of the handle and the screw.<br/>
3. When holding heavy work in a vice, place a block of wood under work as a prop to prevent it from sliding down and failing on your foot.<br/>
4. Do not open the jaws of a vice beyond their capacity, as the movable jaw will drop off, causing personal injury and possible damage to the jaw.<br/><br/>
<b>Anvils and smithy tools</b><br/>
1. Use extreme care when using these tools to prevent metal chips from flying around and to prevent hot sparks from causing personal injury or fires.<br/>
2. When hot metal is to be forged, wear goggles to protect the eyes.<br/><br/>
<b>General Safety Checklist while operating machines</b><br/>
1. Do not attempt to operate any machinery until you are sure you know how to use it.<br/>
2. Ensure that you know how to stop the machine before starting it.<br/>
3. Ensure that all appropriate guards are in position before starting the machine.<br/>
4. Check, where appropriate that the direction of rotation of the workpiece or cutter is correct.<br/>
5. Ensure that any feed mechanisms are in neutral before starting the machine.<br/>
6. Ensure that all tools, workpieces, etc. are secure before starting the machine.<br/>
7. Do not walk away and leave the machine running.<br/>
8. Wear appropriate personal protection - safety glasses, shoes, etc.<br/>
9. Do not remove swarf with bare hands - wear gloves and use a rake or brush.<br/>
10. Do not wear gloves near rotating machinery.<br/>
11. Always use clamps to hold a workpiece in the drilling machine table.<br/>
12. Do not attempt to hold the workpiece by hand.<br/>
13. Wear appropriate eye protection as abrasive grindwheels can cause serious eye injuries due to grit being thrown from the grindwheel.<br/><br/>
<b>Lathes</b><br/>
1. Correct clothing is important, i.e. remove rings and watches, roll sleeves above elbows.<br/>
2. Always stop the lathe machine before making adjustments.<br/>
3. Do not change spindle speeds until the lathe comes to a complete stop.<br/>
4. Never attempt to measure work while it is turning.<br/>
5. Remove chuck keys and wrenches before operating.<br/>
6. Know where the emergency stop is before operating the lathe.<br/>
7. Never lay tools directly on the guide ways.<br/>
8. Protect the lathe guide ways when grinding or filing.<br/>
9. Use two hands when sanding the workpiece. Do not wrap sand paper or emery cloth around the workpiece.<br/>
10. Never lean on the lathe.<br/><br/>
<b>Shapers/Planers</b><br/>
1. Check the speed and stroke length before starting.<br/>
2. Check that the clutch is disengaged before starting the drive motor.<br/>
3. Check that the workpiece is securely fastened and if using a vice that this is also secure before starting.<br/>
4. Do not use excessive stroke length.<br/>
5. Use guards, where possible, to stop or deflect chips into a collecting tray.<br/>
6. Check that the space occupied by the ram on its return stroke is clear.<br/>
7. Keep the hands away from the workpiece even when using a very low ram speed.<br/>
8. Always stop the ram before gauging the workpiece.<br/><br/>
<b>Milling Machines</b><br/>
1. Ensure that the feed mechanism is disengaged before starting the machine.<br/>
2. Position guards to deflect chips to a safe area.<br/>
3. Do not use cracked or damaged cutters.<br/>
4. Do not attempt climb milling unless the machine is designed for that purpose.<br/>
5. Do not touch revolving cutters.<br/>
6. Do not attempt to clear swarf from the cutter area while it is rotating.<br/><br/>
<b>Band saw</b><br/>
1. Keep your fingers away from the moving blade.<br/>
2. Keep the table clear of stock and scraps so your work will not catch as you push it along.<br/>
3. Keep the upper guide just above the work, not excessively high.<br/>
4. Don’t use cracked blades.<br/>
5. If the saw blade breaks, the operator should shut off the power immediately and not attempt to remove any part of the saw blade until the machine is completely stopped.<br/>
6. If the work binds or pinches on the blade, the operator should never attempt to back the work away from the blade while the saw is in motion since this may break the blade. The operator should always see that the blade is working freely through the cut.<br/><br/>
<b>Welding - Electric Arc</b><br/>
1. Exposure of the naked skin to the heat and light radiation from an electric arc should be avoided.<br/>
2. Screens must be used to protect bystanders from electric arc flashes.<br/>
3. Protective clothing should give cover from the throat to the knees.<br/>
4. Goggles or a face shield must be used when using a chipping hammer to remove slag and spatter.<br/>
5. Hoses and leads must be kept clear of hazards - sharp edges, hot metal.<br/>
6. Welding return leads must be securely connected by bolting or clamping to prevent contact resistance.<br/><br/>
<b>Welding - Gas</b><br/>
1. Cylinders must be handled with care.<br/>
2. Cylinders must be used in an upright position and secured to prevent them falling or being knocked over.<br/>
3. When turning on a cylinder, the valve should be opened very slowly.<br/>
4. Oil or grease must not be allowed to come into contact with the cylinder valves or fittings, especially on oxygen cylinders.<br/>
5. Hoses must be kept in good condition. They should be kept away from sharp edges and hot metal.<br/><br/>
<b>Guidelines for Handling</b><br/>
1. Avoid the need for manual handling where possible.<br/>
2. Avoid heavy lifting and pulling movements.<br/>
3. Use mechanical lifting aids and automate processes where possible.<br/>
4. Store timber so that it can be easily retrieved.<br/><br/>
<b>Guidelines for Carrying Tools</b><br/>
Always carry tools:<br/>
1. Down by your side.<br/>
2. At their point of balance.<br/>
3. With the business end where you can see it.<br/>
4. So that one can easily drop it if needed.<br/><br/>
<b>Guidelines for Storing Tools</b><br/>
If you are not using a tool, make sure<br/>
1. It is stored so nobody can trip over it.<br/>
2. It is stored so it cannot fall on anybody.<br/>
3. It is not buried in the undergrowth. This reduces the risk of someone walking into it accidentally, and means that it will not be forgotten at the end of the day.
</p></dd><br/>
<dt><b><a name="practices">4.4&nbsp;&nbsp;&nbsp;Safe Practices in Dimensional Measurement</a></b></dt>
<dd><p>
1. Remove burrs from a workpiece. Burrs cause inaccuracies in measurement and unsafe handling conditions. Burrs also affect the accurate fitting and movement of mating parts.<br/>
2. Recheck all precision measurements.<br/>
3. Consider the possibility of inaccurate measurement readings. These may result from observational, manipulative, and worker bias errors.<br/>
4. Make it a practice to check and clean measuring tools and the workpiece surface before taking a measurement.
</p></dd><br/>
<dt><b><a name="transfer">4.5&nbsp;&nbsp;&nbsp;Safe Practices in using Layout and Transfer Measuring Tools</a></b></dt>
<dd><p>
1. Examine the workpiece, layout tools and measuring instruments. Each item should be free of burrs.<br/>
2. Use a wiping cloth to clean the workpiece and layout and measuring tools. All chips and foreign matter should be removed.<br/>
3. Handle all tools and parts carefully. Avoid hitting tools or parts together or scraping them against each other.<br/>
4. Recheck each layout and measurement before cutting or forming. Each dimension should meet the drawing or other technical specification.<br/>
5. Use a light touch to feel the accuracy of a measurement at the line of measurement. Force applied to a layout or measuring tool may cause the legs to spread. This produces an inaccurate measurement.<br/>
6. Replace each layout and measurement tool in a protective container or storage area.<br/><br/>
<b>4.5.1 Safety Helmet</b><br/>
The main purpose of the helmet is to protect the head. A one piece moulded, impact resistant helmet protects the wearer against an accidental blow to the head. It is made up of fiberglass and plastic. The safety helmet is fitted with a webbing harness which fits the head, leaving a gap between the helmet and the head to cushion any impact. Never wear a helmet without the harness.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/2.jpg"><br/><br/><b>Fig. 2: Safety helmet</b></center>
<b>4.5.2 Ear protectors</b><br/>
The main purpose of ear protectors is to protect the ears against high frequency noise. Ear protectors are foam filled plastic cups, which fit snugly lover each ear. A padded spring steel head band holds the cups against the ears. Each cup is lined with soft foam pads to seal against the side of the head. Ear protectors can be worn under a safety helmet. Plastic or rubber plugs, which fit into the ear are quite efficient protectors and can be worn along with the ear muffs for added protection.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/3.jpg"><br/><br/><b>Fig. 3: Ear protectors</b></center>
<b>4.5.3 Face mask</b><br/>
The main purpose of face mask is to prevent the inhalation of dust or sprayed paint. The face mask is made from a pad of cotton gauze faced with thin aluminium sheet, which is easily shaped to fit the wearer’s face. It has elastic straps which hold the mask against the nose and mouth, preventing inhalation of the dust particles and paint—laden air produced by spraying. The face mask will not protect you against toxic fumes for which respirators incorporating appropriate filters must be worn.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/4.jpg"><br/><br/><b>Fig. 4: Face mask</b></center>
<b>4.5.4 Eye protectors</b><br/>
The main purpose of eye protectors is to protect the eyes against flying debris and harmful liquids. They are made of plastic and toughened glass when grinding, chiseling or doing any job that generates flying debris, it is essential to protect the eyes. Lightweight, clear spectacles are available with toughened, impact—resistant lens. They are comfortable to wear, even for prolonged periods. Choose a model with side screens or wraparound lens. Goggles provide even more protection as they fit flush against the face and some can be worn over normal spectacles. They are more suitable where liquids are involved or when working in dust—laden air. Some goggles are ventilated to reduce perspiration and condensation. For complete protection, use a clear face screen which covers the whole wrapping around the sides. It is attached to a spark or splash deflector, which protects the forehead and is fitted with an adjustable harness to fit any size.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/5.jpg"><br/><br/><b>Fig. 5: Eye protectors</b></center>
<b>4.5.5 Welder’s Face Mask</b><br/>
During the welding process the eyes must be protected against the intense light by a dark lens. The material used for manufacturing is fiberglass and resin impregnated fiber. This lens is expensive and is therefore protected from breakage and weld spatter by clear glass. The lens may be incorporated in goggles, a hand screen or head screen. The hand screen provides complete face protection being held with one hand while the work is carried on with the other. Its main advantage lies in the fact that it is easily removed for inspection of the work. Alternatively, a head screen which is attached to an adjustable harness can be worn, leaving both hands free. The screen itself hinges upward so you can easily move it to view the work. Some welders wear clear goggles under the screen for protection while chipping.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/6.jpg"><br/><br/><b>Fig. 6: Welder’s Face Mask</b></center>
<b>4.5.6 Gloves and Gauntlets</b><br/>
Gloves and Gauntlets are used to protect the hands against burns. General purpose gloves protect the hands when handling rough or sharp materials. They are sometimes, are entirely of leather or may be backed with cotton twill to improve the ventilation.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/7.jpg"><br/><br/><b>Fig. 7: Gloves and Gauntlets</b></center><br/>
The cuffs may be elasticated or extended to protect the wrists. Some gloves are armoured with steel staples for added protection. Heavy rubber gloves which extend over the wrists protect the hands from chemicals. Most heat—resistant welder’s gloves or gauntlets are made of heavy leather or canvas and felt—lined asbestos.<br/><br/>
<b>4.5.7 Welder’s Apron</b><br/>
It is made up of leather. It is used to protect the welder against flying sparks and molten metal.<br/><br/>
<center><img src="images/mem/Unit3/Lesson4/8.jpg"><br/><br/><b>Fig. 8: Welder’s Apron</b></center>
</p></dd><br/>
<dt><b><a name="comments">4.6&nbsp;&nbsp;&nbsp;General do it yourself Safety Comments</a></b></dt>
<dd><p>
<b>Safety do’s</b>:<br/>
1. Always be aware and alert!<br/>
2. Always keep safety in mind before you do any activity, use caution, care, and good judgment.<br/>
3. Always read the labels on cans containing paints, solvents, and other products; AND always follow the guidelines and any other warnings.<br/>
4. Always read the manufacturer’s instructions (especially the warnings) before using any tool, especially power tools with cutting blades/bits.<br/>
5. Always pay deliberate attention to how a tool works, if you understand it’s operation, you are less likely to cause injury.<br/>
6. Always know and accept the limitations of your tools - use the appropriate tool for the task. Do not try to use a tool for anything it is not designed to do.<br/>
7. Always keep your body (especially hands) away from the business ends of power tools using blades, cutters, and bits.<br/>
8. Always be sure that the electrical supply is safe before using it; do not overload any circuit. Make sure all power tools, extension cables and electrical outlets are serviceable and undamaged. Do not use power tools in wet conditions.<br/>
9. Always clamp small workpieces firmly to a bench or other work surface when using a power tool on them.<br/>
10. Always use both hands where a tool is designed to be used two handed.<br/>
11. Always check ladders and steps before use, make sure the rungs and sides are undamaged.<br/><br/>
<b>Accidents – what to do</b>:<br/>
<table border="0" width="100%">
<tr><th width="20%">Accident</th><th width="25%">Symptoms</th><th width="*">Action</th></tr>
<tr><td>Bruises</td><td></td><td>Apply cloth pad soaked in cold water.Stomach bruises need medical attention.</td></tr>
<tr><td>Burns</td><td></td><td>Cool by immersion in cold water. Do NOT open blisters. Do NOT remove stuck clothing. Protect from infection with clean, dry dressing. Expose surrounding area to the air.</td></tr>
<tr><td>Cuts (deep)</td><td></td><td>Lay patient down. Raise any affected limb. Apply pressure directly on cut to stop bleeding. Bandage firmly. If blood soaks through bandage, cover with another. Treat for shock (see below) if necessary.</td></tr>
<tr><td>Cuts (minor)</td><td></td><td>Wash with soap and clean water. Dab with disinfectant. Allow to dry. Cover with a clean dressing.</td></tr>
<tr><td>Dislocations</td><td>Distortion around joint</td><td>Avoid movement of patient. Treat for shock (see below). Make patient comfortable by supporting the joint. Call a doctor.</td></tr>
<tr><td>Electric Shocks</td><td>Muscular paralysis</td><td>Dry your own hands if wet.Disconnect electricity by switching off orpulling out Plug. If this is impossible, stand on rubber mat and use Piece of dry timber to push victim clear of source.Call a doctor.</td></tr>
<tr><td>Eye injuries</td><td>Breathing has stopped</td><td>Do NOT rub.If injury is from a foreign body, allow natural.watering of eye to wash it away.If this fails to remove the object, and it can be seen, pull down lower lid and remove foreignbody with corner of clean, damphandkerchief.Wash eye with tepid or cold water.</td></tr>
<tr><td>Fainting</td><td></td><td>Lay patient flat on back.Raise legs above level of head.Loosen tight clothing about neck, chest and waist.Make sure patient has plenty of air.</td></tr>
<tr><td>Fractures</td><td></td><td>Treat as for dislocations (see above).Support limb with sling or cushion.Call a doctor.</td></tr>
<tr><td>Gas poisoning</td><td></td><td>Crawl into room with mouth and nose covered and with head as low to floor as possible.Open all windows. Turn off gas supply.Remove patient into fresh air.Lay patient face downward, with head sideways and arms out stretched, but if patient is not breathing, give kiss of life immediately. Treat for shock (see below)Call a doctor.</td></tr>
<tr><td>Haemorrhage</td><td>Restlessness, deepBreathing, paleness</td><td>Treat for shock (see below).Do NOT give liquids or food.Call a doctor.</td></tr>
<tr><td>Head injuries</td><td>Loss of consciousness</td><td>Rest patient, in dark if possible.Turn head to one side.(Vomiting may occur in initial recovery.)Call a doctor.</td></tr>
<tr><td>Nose bleed</td><td></td><td>Sit patient down.Pinch patient’s nose for ten minutes while patient breathes through mouth.Apply pad soaked kin cold water to nose.If bleeding persists, call a doctor.</td></tr>
<tr rowspan="2"><td>Poisoning</td><td>Pain in mouth and Stomach, vomiting, Cramp kin legs</td><td>If patient is conscious and can swallow. no burns on mouth, tickle throat to cause vomiting. Give patient drink of half a tumbler of warm water With dessert-spoon of mustard dissolved kin it.Call a doctor</td></tr>
<tr><td></td><td>Discoloration of lips and Mouth, difficulty in Speaking and <br/>swallowing</td><td>Give patient milk or raw eggs beaten kin cold waterCall a doctor</td></tr>
<tr><td>Shock</td><td>Coldness, paleness, Giddiness, weakness, Nausea.</td><td>Lay victim down with limbs higher than head.Cover with warm blankets, but do not overheat.Allay victim’s anxiety.Call a doctor.</td></tr>
<tr><td>Sprains</td><td>Bruising and swelling Around joint</td><td>Cover affected area with a thick layer of cotton wool;Wrap firmly with bandageRest the limb.Relieve pain with pads soaked kin cold water.</td></tr>
</table><br/>
<center><img src="images/mem/Unit3/Lesson4/9.jpg"><br/><br/><b>Fig. 9: Complete Safe Dressing</b></center>
</p></dd>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit1lesson2.php" title="Properties of Materials">Lecture 3</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit1lesson4.php" title="Body Protection Products">Lecture 5</a></td></tr></table>
</div>
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