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
<body style="background:#FFFFFF; margin:auto; width: 1024px; text-align:justify;">
<div id="header"><br/>MEM-103 Manufacturing Processes-I<br /><br /></div>
<div>
<table width="100%"><tr>
<td width="50%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit1lesson3.php" title="General Shop Safety">Lesson 4 General Shop Safety</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 4 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Lesson3/Unit1Lesson3faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>Q.1. Define accident.</b><br/>
An accident is a mishap, which causes injury to the person or damage to the machine tool and equipment. The accident may be due to workers own fault. They may be prevented by one’s own precaution and by making working conditions more favorable.<br/><br/>
<b>Q.2 Name the common machinery safeguarding methods that have been developed.</b><br/>
Barrier guards, safety devices, safety during maintenance of machinery, warnings, personal protecting equipment’s.<br/><br/>
<b>Q.3 What are barrier guards?</b><br/>
When properly designed and maintained, barrier guards prevent operator exposure to common injury producers such as nip points and pinch points. They may be fixed, adjustable, or self-adjusting. Barrier guards also identify hazardous areas of machinery and, in some applications, prevent projectiles (such as broken pieces of a grinding wheel) from being thrown from the machine.<br/>
Mechanical, electrical, hydraulic and optical interlocks are applied to prevent machine operation unless barrier guards are in place. Unless they are bypassed or are unreliable, interlocks increase the effectiveness of barrier guards in most applications.<br/><br/>
<b>Q.4 Name some safety devices that are being used to overcome accidents?</b><br/>
Passive and active safety devices help reduce the risk of severity of injury. These devices include pull-back mechanisms for the operator’s hands, seat belts, dead-man controls and presence-sensing devices.<br/><br/>
<b>Q.5 Enumerate briefly the basic Woodworking Shop Safety points.</b><br/>
<b>1. Think Before You Cut</b> – The most powerful tool in your shop is your brain, use it. Thinking your cuts and movements through before acting can help save both fingers and scrap wood.<br/><br/>
<b>2. Keep a Clean Shop</b> – A cluttered shop is an accident waiting to happen. Keeping your shop clean will help protect you, and your tools, from tripping hazards.<br/><br/>
<b>3. Avoid Distractions</b> – Pay attention to your actions. Looking up to watch the shop TV or visitor can result in your hand contacting the blade. Always wait until you have completed your cut before you take your eyes off the blade.<br/><br/>
<b>4. Don’t Rush</b> – Keep in mind that this is just a hobby and take a break when you feel rushed or frustrated with a project. Mistakes happen when we rush to complete a job.<br/><br/>
<b>5. Don’t Force It</b> – If your saw is resisting the cut, stop and see what’s wrong. A misaligned rip fence or improperly seated throat plate can sometimes cause a board to get stuck in mid cut. Forcing the board in these situations may cause kickback or contact with the blade. Take a moment to evaluate the situation and determine the problem.<br/><br/>
<b>6. Protect Yourself</b> – Wearing the proper shop protection is an important part of safe tool operation. Goggles, Ear Protection, and Lung Protection should be used when operating tools. Use push sticks when working close to the blade and make sure the tool’s safety features are in place.<br/><br/>
<b>7. Let the Tool Stop</b> – Giving the power tool time to wind down after a cut is an often-overlooked safety mistake. Even without power, the spinning blade can still do a lot of damage.<br/><br/>
<b>8. Fumes and Dust</b> – Solvent fumes and airborne dust can present health and explosion hazards. Care should be taken to ensure a supply of fresh air and use only explosion proof vent fans.<br/><br/>
<b>9. Wear Appropriate Clothing</b> – Loose clothing or hair can get caught in power tools and cause severe injury.
</div><br/>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>