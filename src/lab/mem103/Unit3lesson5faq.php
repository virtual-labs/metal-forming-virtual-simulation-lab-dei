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
<script type="text/javascript">
//Google Analytics Code
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-38541839-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<p id="fbtab"><a href="#header" title="Back to Top"></a></p>
<table Border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="Unit3lesson5.php" title="Lesson 5 Casting Process: Casting Defects">Lesson 5 Casting Process: Casting Defects</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<b>Lesson 5 Frequently Asked Questions</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson5/Unit3Lesson5faq.pdf" target="_blank" title="Download Frequently Asked Questions">Frequently Asked Questions Download</a><br/><br/>
<b>1. Name Casting Defects and mention their causes and the remedial measure.<br/><br/>
Defects due to gases: porosity, pinholes, and gas holes</b><br/>
The gas may come from various sources such as solubility, aspiration, and reaction of hot metal with mould. The remedy is controlled melting or other measures for reduced solubility of gases, reduced moisture content and increased permeability of the mould.<br/><br/>
<b>Defects due to insufficient compacting: drop and penetration</b><br/>
If moulding sand is not compacted enough, a portion of sand may drop because of the jerk in handling the moulding boxes. This defect is known as drop. The penetration defect arises because of penetration of the molten material within spaces around the sand particles. The remedy for both defects is to use proper proportion of water and clay in the sand for strength and to ram the sand adequately during mould preparation.<br/><br/>
<b>Defect due to loose dirt: dirt</b><br/>
This defect arises because of loose dirt left in the mould during cleaning. As sand is light, it rises to the top of the mould surface when the molten material is poured in.<br/><br/>
<b>Defects due to impurities: inclusions</b><br/>
The impurities may either be present already in the molten material or generated during melting because of the addition of fluxes or reaction with atmosphere.<br/><br/>
<b>Due to improper gating system or insufficient mould strength: wash</b><br/>
This defect arises when velocity of the molten material entering the mould is too high or the mould surface strength is not adequate because of improper composition or inadequate compacting.<br/><br/>
<b>Due to improper sand composition: buckle and swell</b><br/>
When molten material enters the mould, the latter heats up and thereby expands. In the absence of inadequate organic material which is supposed to burn and make space for such an expansion, mould wall either swells or buckles.<br/><br/>
<b>Due to rapid cooling of molten material: misrun and coldshut</b><br/>
If molten material has to travel a long distance in order to fill the mould cavity, it runs the risk of solidifying before the entire mould is filled. This gives rise to a partially filled mould which is known as the misrun. When liquid material travels in the mould from opposite sides, a cold shut is produced where the two fronts meet if they are not hot enough to cause diffusion of the mating material.<br/><br/>
<b>Due to improper positioning of the cope and drag or the core: shifts</b><br/><br/>
<b>Due to the lack of feeding: shrinkage cavities</b><br/>
In case of an incorrect riser volume or its placement, liquid material is not able to fill the cavities produced because of shrinkage of the casting material during solidification. The cure here of course is to provide adequate riser volume and place it in proper locations.<br/><br/>
<b>Due to tensile stresses in the mould: hot tear</b><br/>
This defect arises when because of mould constraint and the contraction from cooling a section of the casting is subjected to tensile stresses. The section is most susceptible to developing cracks from this tensile stress in locations where the temperature is close to the solidus temperature of the material, because in this state the structure consists of the solid grains combines with liquid film. At the lower temperature, casting experiences greater strain and so the likelihood of hot tears is increased even further.<br/><br/>
<b>2. How casting produced can be stress free and homogeneous in structure?</b><br/>
During this time metal properties are being determined, and internal stresses are being generated. If a part is allowed to cool slowly enough at a constant rate then the final part will be relatively homogenous and stress free.<br/><br/>
<b>3. What is casting yield? How it is calculated?</b><br/>
Not all the molten metal, which is melted and poured in to mould, will end up as a casting. Some amount of molten material will remain in riser, sprue, runner and gates. In addition, some of the material will be lost in melting. Casting yield is defined as the ratio of casting mass to actual mass of the metal that has entered mould cavity. It is expressed as percentage and is given by<br/>
<center><img src="images/mem/lesson5/Formula.png" alt="Formula" height="80px" width="250px"></center>
where<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wc = weight of casting,<br/>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wg = weight of material in gating system (sprue, runner, gate, riser etc.).<br/>
The material in the gating system is removed from the castings, after castings are removed from the moulds. They are cleaned, and re-melted again and used as raw material.<br/><br/>
<b>4. What are the important considerations in casting process?</b><br/>
Fluid flow, heat transfer, design of the mold and gating system to ensure proper flow of the metal into to the mold cavities are the important considerations in casting process.<br/><br/>
<b>5. What is main draw back of casting process?</b><br/>
As metal contract during solidification and cooling cavities can form in the casting. Porosity caused by gases evolving during solidification is a signification problem, particularly because of its adverse effect on the mechanical properties of castings this is main draw back of casting process.<br/><br/>
<b>6. What are the requirements that should be followed while Pouring the molten metal?</b><br/>
A pouring technique must be devised to introduce the molten metal into the mould. Provision should be made to permit the escape of all air or gases in the mould before pouring and those generated by the action of the hot metal entering the mould. The molten metal can then completely fill the cavity, producing a quality casting that is fully dense and free of defects.<br/><br/>
<b>7. What are the different types of shrinkage?</b><br/>
I.&nbsp;&nbsp;&nbsp;&nbsp;Liquid contraction during cooling prior to solidification<br/>
II.&nbsp;&nbsp;&nbsp;Contraction during the phase change from Liquid to Solid<br/>
III.&nbsp;&nbsp;&nbsp;Thermal contraction of the solidified casting during cooling to room temperature<br/><br/>
<b>8. What do you understand by term Shrinkage in casting? Why it occurs?</b><br/>
Because of thermal expansion characteristics, metals shrink (contract) during solidification and cooling. Shrinkage, which causes dimensional changes and, sometimes, cracking is the result of:-<br/>
I.&nbsp;&nbsp;&nbsp;&nbsp;Contraction of the molten metal as it cools prior to its solidification,<br/> 
II.&nbsp;&nbsp;&nbsp;Contraction of the metal during phase change from liquid to solid (latent heat of fusion); and<br/> 
III.&nbsp;&nbsp;&nbsp;Contraction of the solidified metal (the casting) as its temperature drops to ambient temperature.<br/> 
IV.&nbsp;&nbsp;&nbsp;The largest amount of shrinkage occurs during cooling of the casting.<br/><br/>
<b>9. How Porosity in a casting is caused?</b><br/>
Porosity in a casting may be caused by shrinkage or gases, or both. Porosity is detrimental to the ductility of a casting and its surface finish, making it permeable and thus affecting pressure tightness of a cast pressure vessel. Porous regions can develop in castings because of shrinkage of the solidified metal. Thin sections in a casting solidify sooner than thicker regions. As a result, molten metal cannot be fed into the thicker regions that have not yet solidified.
<br/><br/></div>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>