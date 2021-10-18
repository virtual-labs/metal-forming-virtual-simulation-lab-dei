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
<table width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="mem.php" title="Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div>
<table border="0" width="100%">
<tr><td width="60%"><b>Lesson 2 CASTING PROCESS: PATTERN MAKING</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Unit3/Lesson2/Unit3Lesson2.pdf" target="_blank" title="Download Casting Process: Pattern Making">Lesson 2 Download</a></td><td><b>Supplementary Material</b></td></tr>
<tr><td><dt><a href="#objectives">2.0&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Objectives</a></dt></td><td><a href="Unit3lesson2scq.php">1.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Self-check questions</a></td></tr>
<tr><td><dt><a href="#patterns">2.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Types of Patterns</a></dt></td><td><a href="Unit3lesson2faq.php">2.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Frequently asked questions</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.1.1&nbsp;&nbsp;&nbsp;Removable Patterns</td><td><a href="Unit3lesson2tq.php">3.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Terminal questions</a></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1.1&nbsp;&nbsp;&nbsp;Solid Patterns</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1.2&nbsp;&nbsp;&nbsp;Split Patterns</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1.3&nbsp;&nbsp;&nbsp;Match Plate Patterns</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1.4&nbsp;&nbsp;&nbsp;Loose Piece Patterns</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.1.1.5&nbsp;&nbsp;&nbsp;Gated Patterns</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.1.2&nbsp;&nbsp;&nbsp;Disposable patterns</td><td></td></tr>
<tr><td><dt><a href="#allowances">2.2&nbsp;&nbsp;&nbsp;Pattern Allowances</a></dt></td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.2.1&nbsp;&nbsp;&nbsp;Shrinkage Allowance</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.2.2&nbsp;&nbsp;&nbsp;Machining Allowance</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.2.3&nbsp;&nbsp;&nbsp;Draft Allowance</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.2.4&nbsp;&nbsp;&nbsp;Distortion Allowance</td><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;2.2.5&nbsp;&nbsp;&nbsp;Rapping or Shake Allowance</td><td></td></tr>
</table><br/></div>
<div>
<b>CASTING PROCESS: PATTERN MAKING</b>
<p>
Pattern is used to form the mould cavity in which molten metal is poured. To ensure the desired quality of castings being produced, it is necessary to select the right pattern material. The different materials commonly used for pattern making include wood, metals and alloys, plasters, plastic and rubber and wax. The selection of the material for a pattern depends on type of moulding material used, number of castings to be produced, and degree of dimensional accuracy required. Commonly used pattern materials are wood, metal, plastic, and polystyrene.</p><br/>
<dt><b><a name="objectives">2.0&nbsp;&nbsp;&nbsp;Objectives</a></b></dt>
<dd>
<p>
After going through this lesson, you will be able to understand:<br/>
1. Purpose of pattern in casting process.<br/>
2. Types of patterns and there selection for specific application.<br/>
3. Factors involved in designing of patterns.</p><br/>
</dd>
<dt><b><a name="patterns">2.1&nbsp;&nbsp;&nbsp;Types of Patterns</a></b></dt>
<dd>
<p>
The pattern used in foundry work can be classified into following two categories.<br/> 
1. Removable pattern, and<br/>
2. Disposable pattern<br/><br/>
<b>2.1.1 Removable Pattern</b><br/>
A removable pattern is used for producing multiple identical moulds. The sand is packed around the pattern and the pattern is withdrawn from the sand leaving the desired cavity. The cavity produced is filled with molten metal to create the casting. The removable patterns are discussed and illustrated below.<br/><br/>
<b>2.1.1.1 Solid pattern</b><br/>
This type of pattern is made as a single piece pattern, which has no partings or loose pieces. A solid pattern is shown in Fig. 2.1 (a). Such patterns are generally used for castings of simple shapes. This pattern and the cavity produced by it are completely in the lower flask, normally.<br/><br/>
<b>2.1.1.2 Split pattern</b><br/>
Many patterns cannot be made in a single piece because of the difficulties encountered in removing them from the mould. To eliminate this difficulty patterns are made in two parts, so that half of the pattern will be in the lower part of the mould and half in the upper part. The split in the pattern occurs at the parting line of the mould. The two parts are aligned by means of dowel pins as shown in Fig. 2.1 (b). In case of complicated castings, a pattern may be made in three or more parts. Such patterns are known as multi-piece patterns.<br/><br/>
<center><img src="images/mem/lesson3/DifferentPatterns.jpg" width="700" height="220" alt="Different types of patterns"><br/><b>Fig. 2.1 Different types of patterns (a) Solid pattern (b) Split pattern (c) Match-plate pattern (d) Cope-and drag pattern</b></center><br/>
<b>2.1.1.3 	Match plate pattern</b><br/>
When split patterns are attached on either side of the match plate it is called as match plate pattern and is shown in Fig. 2.1 (c). There is no well-defined definition for match plate pattern. A match plate is a plate on which two halves of a split pattern is mounted, on either side, such that one side is used to prepare one flask and the other side is used to prepare other flask. This facilitates perfect alignment and easy removal of pattern. Match plate patterns speed up production and help in maintaining uniformity in the size and shape of the castings.<br/><br/>
<b>2.1.1.4 Loose piece pattern</b><br/>
It is a pattern with loose pieces, which are necessary to facilitate withdrawal of the pattern from the mould. A loose-piece pattern is shown in Fig. 2.2. This type of pattern is used when the contour of the part is such that withdrawal of the pattern from the mould is not possible. This type of pattern is also used in situations where the casting is having projections, undercuts, or other configurations that would otherwise hinder the removal of the pattern. During moulding the obstructing part of the contour is held as a loose piece by wire. The portion of the pattern liable to cause obstruction in withdrawal is prepared as a loose part, called loose piece, which can be attached or detached as required. After ramming is over, first, the main pattern is removed and then loose pieces are withdrawn through the gap generated by the main pattern.<br/><br/>
<center><img src="images/mem/lesson3/LoosePiecePattern.jpg" width="350" height="220" alt="Loose piece pattern"><br/><b>Fig. 2.2 Loose piece pattern</b><br/><br/>
<img src="images/mem/lesson3/GatedPattern.jpg" alt="Gated pattern for producing 8 castings"><br/><b>Fig. 2.3  Gated pattern for producing 8 castings</b></center>
<b>2.1.1.5 Gated pattern</b><br/>
For producing small sized castings, in one mould many cavities may be made. This is done by making a gated pattern in which number of small patterns, of the desired casting, are attached to a single runner by means of gates. Generally, gated patterns are made of metal to make them strong. A gated pattern for eight small castings is illustrated in Fig. 2.3.<br/><br/>
<b>2.1.2 Disposable pattern</b><br/>
The disposable patterns are made from polystyrene and sand is rammed around them. The pattern is left in the mould instead of being removed from the sand. The pattern material vaporizes when the molten metal is poured in to the mould and the cavity thus created is filled with the molten metal. The method is also known as cavity less method. The mould with the disposable pattern in the mould is shown in Fig. 2.4 (a) and pouring of the metal in Fig. 2.4 (b).<br/><br/>
<center><img src="images/mem/lesson3/DisposablePattern.jpg" width="650" height="400" alt="Using a disposable pattern for castings"><br/><b>Fig. 2.4 Using a disposable pattern for castings</b></center>
</p><br/>
</dd>
<dt><b><a name="allowances">2.2&nbsp;&nbsp;&nbsp;Pattern Allowances</a></b></dt>
<dd>
<p>
In order to produce a casting of proper size and shape and for many mechanical and metallurgical reasons, allowances are provided on the patterns. Pattern allowance affects the dimensional characteristics and shape of the casting. For example, we know that metals expand on heating and shrink when cooled. Hence, a cavity filled with molten metal will produce a smaller casting. Thus, when the pattern is produced, certain allowances are given on dimensions specified in the component drawing so that a casting with the desired specifications can be produced with the pattern.<br/><br/>
<b>2.2.1 Shrinkage allowance</b><br/>
All metals used for casting shrink after solidification in the mould and, therefore, the pattern must be made larger than the required casting. The pattern size is increased by an amount equal to the shrinkage of specific metal from its melting point to room temperature. This is known as shrinkage allowance or contraction allowance. It is the correction for solidification shrinkage of the casting and its contraction during cooling to room temperature.<br/><br/>
<b>2.2.2 Machining allowance</b><br/>
Machining allowance also known as finishing allowance is the extra material added to certain parts of the casting to enable their machining or finishing to the required size, accuracy and surface finish. The amount of allowance provided depends upon casting method used, size and shape of the casting, type of material, machining process to be used, degree of accuracy and surface finish required.<br/><br/>
<b>2.2.3 Draft allowance</b><br/>
For making a mould, first, sand is rammed around the removable pattern and then pattern is removed from the sand. The draft allowance also known as taper allowance is the taper provided on the vertical faces of the removable patterns so that the pattern can be withdrawn from the rammed sand without causing damage to the vertical sides and without the need for excessive rapping. The pattern with draft allowance is withdrawn with ease. Draft provides a light clearance for the vertical sides of the pattern as it is lifted up. Fig. 2.5 shows two patterns for an object, one having zero (no) draft and other having draft allowance. Typical draft allowance on patterns ranges from 1<sup>o</sup> to 3<sup>o</sup> for wooden patterns.<br/><br/>
<center><img src="images/mem/lesson3/Patterns.jpg" width="600" height="220" alt="Patterns without draft and with draft"><br/>
<video width="600" height="220" autoplay loop controls>
<source src="MEM103/Unit3/Simulations/PatternDraft.mp4" type="video/mp4">
</video>
<br/><b>Fig. 2.5 Patterns without draft and with draft</b></center><br/>
<b>2.2.4 Distortion allowance</b><br/>
This is provided on patterns whose castings tend to distort on cooling. This happens due to unequal rate of cooling in different parts of the casing.<br/><br/>
<b>2.2.5 Rapping or Shake allowance</b><br/>
During moulding, to withdraw the pattern from the rammed sand, it is (rapped) cracked to loosen it from the sand, so that it can be easily withdrawn from the mould cavity without damaging the mould walls. When a pattern is rapped for easy withdrawals, the mould cavity is enlarged. To account for this increase in size of cavity, the pattern size is reduced, i.e. the pattern is made smaller by an amount equal to the mould enlargement that may take place during rapping. This allowance is important in large sized or precision castings. The amount of rapping allowance depends upon factors such as extent of rapping, degree of compaction of sand, size of mould etc., most of which are difficult to evaluate.</p></dd>
</div><br/>
<table width=1024><tr><td style="text-align:left; font-weight:bold;"><a href="Unit3lesson1.php" title="Casting Process">Lecture 1</a></td>
<td style="text-align:right; font-weight:bold;"><a href="Unit3lesson3.php" title="Casting Process: Moulding">Lecture 3</a></td></tr></table>
<div id="footer">
&copy; MEM103 - Dayalbagh Educational Institute <a href="https://www.dei.ac.in" target="_blank" title="DEI">(www.dei.ac.in)</a>&nbsp;-&nbsp;<a href="../ajay/index.html" target="_blank" title="Profile">Ajay Kant Upadhyay</a></div>
</body>
</html>
<?php
}
?>