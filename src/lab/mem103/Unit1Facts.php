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
<div>
<table Border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Historical Facts of Metal Casting</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit1/Unit1Facts.pdf" target="_blank" title="Download Historical facts of metal casting">Historical Facts of Metal Casting Download</a><br/><br/>
<b>3200 B.C.</b> A copper frog, the oldest known casting in existence, is cast in Mesopotamia.<br/>
<b>2000 B.C.</b> Iron is discovered.<br/>
<b>800-700 B.C.</b> First Chinese production of cast iron.<br/>
<b>645 B.C.</b> Earliest known sand moulding (Chinese).<br/> 
<b>233 B.C.</b> Cast iron plowshares are poured in China.<br/>
<b>500 A.D.</b> Cast crucible steel is first produced in India, but the process is lost until 1750, when Benjamin Huntsman reinvents it in England.<br/><br/>
<b>Middle Ages to 1800</b><br/>
<b>1455</b> Dillenburg Castle in Germany is the first to use cast iron pipe to transport water.<br/>
<b>1480</b> Birth of Vannoccio Biringuccio (1480-1539), the "father of the foundry industry," in Italy. He is the first man to document the foundry process in writing.<br/>
<b>1642</b> Saugus Iron Works, America's first iron foundry (and second industrial plant), is established near Lynn, Massachusetts. The first American iron casting, the Saugus pot, is poured there.<br/>
<b>1709</b> Englishman Abraham Darby creates the first true foundry flask for sand and loam moulding.<br/>
<b>1720</b> Rene Antoine de Reaumur develops the first malleable iron, known today as "European Whiteheart."<br/>
<b>1730</b> Abraham Darby is the first to use coke as fuel in his melting furnace in Coalbrookdale, England.<br/>
<b>1750</b> Benjamin Huntsman reinvents the process of cast crucible steel in England. This process is the first in which the steel is completely melted, producing a uniform composition within the melt. Since the metal is completely molten, it also allows for alloy steel production, as the additional elements in the alloy can be added to the crucible during melting. Prior steel production was accomplished by a combination of forging and tempering, and the metal never reached a molten state.<br/>
<b>1776</b> Foundrymen Charles Carroll, James Smith, George Taylor, James Wilson, George Ross, Philip Livingston and Stephen Hopkins sign the American Declaration of Independence.<br/>
<b>1794</b> First use of the cupola in iron founding. Invented by John Wilkinson of England, the original had metal-cladding and utilized a steam engine to provide the air blast.<br/><br/>
<b>The 19th Century</b><br/>
<b>1809</b> Centrifugal casting is developed by A. G. Eckhardt of Soho, England.<br/>
<b>1815</b> The cupola is introduced in the United States in Baltimore, MD.<br/>
<b>1818</b> First cast steel produced by the crucible process in the U.S. at the Valley Forge Foundry.<br/>
<b>1825</b> Aluminum, the most common metal in the earth's crust, is isolated.<br/>
<b>1826</b> Seth Boyden of Newark, NJ, is the first to develop a process for and produce "blackheart" malleable iron.<br/> 
<b>1831</b> In Cincinnati, OH, William Garrard establishes the first commercial crucible steel operation in the U.S.<br/>
<b>1837</b> First dependable moulding machine is marketed and used by the S. Jarvis Adams Company in Pittsburg.<br/>
<b>1845</b> The open hearth furnace is developed.<br/>
<b>1851</b> Sir Henry Bessemer and William Kelly both invent a simple converter that uses blasts of air to burn out the impurities, silicon, manganese and excess carbon in pig iron. Although Kelly is the first to use a converter, Bessemer obtains the U.S. patents. Kelly proves patent priority in 1857.<br/>
<b>1863</b> Metallography, the etching, polishing, and microscopic evaluation of metal surfaces, is developed by Henry C. Sarby of Sheffield, England. It is the first process to physically examine the surface of castings for quality analysis.<br/>
<b>1867</b> James Nasmythe develops a gear-tilted foundry ladle, increasing worker safety and operational economy.<br/>
<b>1870</b> Sandblasting is first used to clean large castings by R. E. Tilghman of Philadelphia.<br/>
<b>1880-1887</b> The Sly tumbling mill is developed. It is the first cleaning machine for small castings. This mill greatly reduced the time needed for hand-cleaning operations and produced a finer finished product.<br/>
<b>1896</b> American Foundrymen's Association (renamed American Foundrymen's Society in 1948 and now called the American Foundry Society) is formed.<br/>
<b>1897</b> Investment casting is rediscovered by B.F. Philbrook of Iowa. He uses it to cast dental inlays.<br/><br/>
<b>Late 20th Century</b><br/>
<b>Early 1970s</b> The Semi-Solid Metalworking (SSM) process is conceived of at Massachusetts Institute of Technology. It combines aspects of casting with aspects of forging.<br/>
<b>1971</b> The Japanese develop V-Process moulding. This method uses unbonded sand and a vacuum.<br/>
<b>1971</b> Rheocasting is developed at Massachusetts Institute of Technology.<br/>
<b>1971</b> U.S. Congress passes the Clean Air Act and OSHA, the Occupational Health and Safety Act.<br/>
<b>1972</b> The first production Austempered Ductile Iron (ADI) component is produced by Wagner Castings Company.<br/>
<b>1974</b> Fiat introduces the in-mould process for ductile iron treatment.<br/>
<b>1976</b> Compacted graphite iron (CGI), an iron with elongated graphite particles with rounded edges and roughened surfaces, is developed in the U.K. It has characteristics of both gray and ductile iron.<br/>
<b>1982</b> The Warm-Box binder system is introduced.<br/>
<b>1993</b> First foundry application of a plasma ladle refiner (melting and refining in one vessel) occurs at Maynard Steel Casting Company in Milwaukee, WI.<br/>
<b>1995</b> Babcock and Wilcox, Barberton, OH, patent a lost foam vacuum casting process to produce stainless steel castings with low carbon content.<br/>
<b>1996</b> Cast metal matrix composites are first used in a production model automobile in the brake rotors for the Lotus Elise.<br/>
<b>1997</b> Electromagnetic casting processes developed by Argonne and Inland Steel Corporation. Electromagnetic edge containment greatly reduces cost and energy expenditures in steel production.<br/>
<b>2007</b> Nanotechnology and nano manufacturing.<br/><br/>
</div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>