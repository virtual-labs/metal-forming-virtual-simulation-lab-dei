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
<div id="header">
<br/>
<b>MEM-103 Manufacturing Processes-I</b></div>
<div>
<table border="0" width="100%"><tr>
<td width="30%" style="font-size:14px; color:#ff0066; font-weight:bold;">Welcome <?php echo $_SESSION['name'];?></td>
<td style="text-align:right;"><a href="workshop.php" title="Bench Work">Bench Work</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem.php" title="Lecture Notes, MEM-103 Manufacturing Process-I">Lecture Notes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="memHome.php" title="Manufacturing Process-I">MEM103 Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="mem_out.php" title="Sign out from Manufacturing Process">Logout</a></td>
</tr></table><br/></div>
<div style="text-align:justify">
<b>MEASUREMENT, MEASURING TOOLS & LAYOUT TOOLS</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="MEM103/Workshop/Tutorial1.pdf" target="_blank" title="Download Tutorial 1">Tutorial 1 Download</a><br/><br/>
<b>Introduction</b><br/>
Accurate interpretation and measurement of dimensions are skills that every individual involved in mechanical shop must have. A thorough understanding of units of measure, measurement systems and measurement terms is necessary for proficiency in workshop technology. This chapter presents information on the basics of measurement, measuring tools and layout tools used in the mechanical shops. 
It outlines the basic knowledge (principles and practice) required in using the most common measuring instruments and layout tools used in mechanical shops.<br/><br/>
Before Industrial revolution the craftsman used to make and carry his own tools and measuring gadgets. The manufacture of products was totally dependent on the skill of the craftsman and accuracy of his tools. As a consequence no two identical parts were interchangeable and the standards could not be met in production. Once industrial revolution took place need arose for division of labor, simplification, standardization to enable mass production. 
As parts are produced in large quantities according to specifications, interchangeability became the norm of production (Interchangeability is the ability of parts to be substituted for one another without the need for part adjustment during assembly). This motivated the engineers to design various mechanical devices to measure accurately the dimensional features of parts. 
For example when the transmission shaft of steam engine broke one had to just state the specification along with part number to get a replacement. As the industrialization progressed more complex machinery operating at higher speeds and closer tolerances became the need of production which in turn motivated engineers to design better measuring instruments. Quality became the catchword and users of products became quality conscious.<br/><br/>
<b>Need of Measurement and Measuring Instruments</b><br/>
When we talk of the length of an object we mean the distance from one end to the other expressed numerically in convenient units. In order to find the length of certain object, we measure by comparing the object to some other object of standard length that is internationally accepted.<br/><br/>
When we produce an object and want to determine its size we cannot in practice compare it to an International Standard of measure. Here comes the need of the measuring instrument with which we can readily measure the size of an object within a desired degree of accuracy which is Internationally accepted.<br/><br/>
Without measurements, the quality of products cannot be assessed, therefore, every manufactured product must be measured in some way. Since all manufacturing processes have some inherent variability, manufactured parts must be checked numerically at some point during the manufacturing process, specially on the finished product to determine whether they meet the design specifications (size, volume, density, pressure, heat, impedance, brightness, etc.) including tolerances and surfacefinish.<br/><br/>
<b>What is Measurement?</b><br/>
The determination of a dimension of a part through the use of some type of device that permits the magnitude of the dimension to be determined directly, or indirectly, in terms of scalar units is known as measurement.<br/>
It is the result of quantitative comparison between a predefined standard and the unknown quantity. There are two basic requirements for measurements.<br/>
1. The standard should be accurately known and internationally accepted.<br/>
2. The device and experimental procedure adopted for comparison must be provable.<br/><br/>
<b>Classification of Measurement:</b><br/>
The majority of measurement techniques can be categorized in following different ways:<br/><br/>
<center><img src="images/mem/Workshop/1.jpg" alt="Classification of Measurement" width="950" height="380"><br/>Figure 1: Classification of Measurement</center>
<b>According to type of measurement</b><br/>
1. Linear measurement - Linear measurement means to measure distance or length. It is mainly concerned with dimensional measurement of objects, that is measurement of length, width, and height. The basic metric unit of dimension is the meter (m). Instruments used for linear measurement are steel rule, vernier caliper, micrometer etc.<br/>
2. Angular measurement - In this, measurement of angles is done. It is important for production of angular features. Generally, instruments or angular measurement have circular division scales, e.g. Protractor.<br/>
3. Comparative measurement - The measurement that deals with relative measurements such as measurement of flatness, straightness and surface finish. The instruments used for this purpose are Non-graduated, make comparisons between dimensions, e.g. use of fixed gages, optical flats.<br/><br/>
<b>According to the nature of measurement</b><br/>
1. Direct measurement - In direct measurement the measured value is obtained directly, e.g., scale, vernier caliper, micrometer, vernier height gauge, depth gauge.<br/>
2. Indirect measurement - In indirect measurement the actual dimension is determined by measuring other values functionally related to the required value, e.g., divider, sine bar, calipers.<br/><br/>
<b>According to the contact with the workpiece</b><br/>
1. Contact measurement - In Contact measurement tip of the instrument actually touches the surface to be measure e.g. Micrometer, calipers, dial indicator.<br/>
2. Contactless measurement - In Contactless measuring where no contact is required with workpiece for measurement, e.g., tool maker’s microscope, projection comparator.<br/><br/>
<b>According to the type of Inspection</b><br/>
1. Online Inspection - On-line inspection is part inspection during processing.<br/>
2. Offline Inspection - Off-line inspection is the inspection of parts after they are produced.<br/><br/>
<b>According to the type of measuring instrument used</b><br/>
1. Fixed measuring instruments - Fixed measuring instruments only indicates whether a part is acceptable or not, such as snap gages, are used to determine if the part is too small or too large as compared to the specification requirements.<br/>
2. Variable measuring instruments - variable measuring instruments measure the actual dimensions of a part, such as micrometers.<br/><br/>
<b>According to the system of measurement used</b><br/>
1. English System - The English system, also known as British Imperial system, is one of two main measuring systems used in the world today. The common unit of length in the English system is the inch. The inch can be abbreviated as in. It can be divided into common fractional divisions or decimal fractional divisions: for example, 1/2 inch or 0.500 inch. Both mean half an inch. Using the fractional method, sixty-fourth is the smallest fractional size that can be measured accurately by eye.<br/><br/>
2. Metric System - The metric system is the dominant language of measurement in use today. It is the measuring system used by most of the world. It is based on a decimal system, in powers of ten. Therefore, it simplifies calculations by using a set of prefixes. The metric system replaces all the traditional units, except the units of time and of angle measure, with units satisfying three conditions:<br/><br/>
(I) Only a single basic unit is defined for each quantity. These basic units are now defined precisely in the International System of Units.<br/>
(II) Larger and smaller units are created by adding prefixes to the names of the basic units. These prefixes denote powers of ten, so that metric units are always divided into tens, hundreds, or thousands. The original prefixes included milli- for 1/1,000, centi- for 1/100, deci- for 1/10, deka- for 10, hecto- for 100, and kilo- for 1,000.<br/>
(III) The basic units are defined rationally and are related to each other in a rational fashion.<br/><br/>
One of the mathematical advantages of the metric system is its combination of metric terminology with its decimal organization.<br/><br/>
<b>The International System of Units (SI)</b><br/>
SI stands for Système International d’Unités, i.e. the International System of Units. SI is the abbreviation used in all languages to indicate this system.<br/><br/>
<b>Principles of the SI system</b><br/>
The SI is constructed from seven base units, which are defined in physical terms. By combining these units in accordance with simple geometrical and physical laws, we can arrive at the derived units. For practical reasons, 21 of the derived units have their own names. In principle, the SI covers all application areas. Certain units outside SI are referred to as additional units, of which the most common are degree, minute and second for plane angle, litre for volume, minute, hour and day for time and tonne for mass.<br/><br/>
<b>SI Base Units</b><br/><br/>
<center><table border="1" width="800" cellspacing="0">
<tr><th>Basic unit</th><th>Length</th><th>Mass</th><th>Time</th><th>Electric current</th><th>Amount of substance</th><th>Thermodynamic temperature</th><th>Luminous intensity</th></tr>
<tr><th>Quantity</th><td>Meter</td><td>Kilogram</td><td>Second</td><td>Ampere</td><td>Mole</td><td>Kelvin</td><td>Candela</td></tr>
<tr><th>SI symbol</th><td>m</td><td>kg</td><td>s</td><td>A</td><td>mol</td><td>K</td><td>Cd</td></tr>
</table></center><br/>
The prefixes that are most important are listed below along with their decimal and exponential equivalents<br/><br/>
<center><table border="1" width="500" cellspacing="0">
<tr><th rowspan="2">Prefix</th><th colspan="2">Numerical Equivalent</th><th rowspan="2">Example</th></tr>
<tr><th>Decimal</th><th>Exponential</th></tr>
<tr><td>Pico</td><td>0.000000000001</td><td style="text-align:center">10<sup>-12</sup></td><td>picosecond</td></tr>
<tr><td>Nano</td><td>0.000000001</td><td style="text-align:center">10<sup>-9</sup></td><td>nanometer (nm)<br/>nanosecond (ns)</td></tr>
<tr><td>Micro</td><td>0.000001</td><td style="text-align:center">10<sup>-6</sup></td><td>micrometer (?m)</td></tr>
<tr><td>Milli</td><td>0.001</td><td style="text-align:center">10<sup>-3</sup></td><td>millimeter (mm)<br/>millisecond (ms)</td></tr>
<tr><td>Centi</td><td>0.01</td><td style="text-align:center">10<sup>-2</sup></td><td>centimeter (cm)</td></tr>
<tr><td>Deci</td><td>0.1</td><td style="text-align:center">10<sup>-1</sup></td><td>decimeter (dm)</td></tr>
<tr><td>No prefix</td><td>1.0</td><td style="text-align:center">10<sup>0</sup></td><td> </td></tr>
<tr><td>Deka</td><td>10.0</td><td style="text-align:center">10<sup>1</sup></td><td>Dekameter(Dm)</td></tr>
<tr><td>Hecto</td><td>100.0</td><td style="text-align:center">10<sup>2</sup></td><td>Hectometer(Hm)</td></tr>
<tr><td>Kilo</td><td>1000</td><td style="text-align:center">10<sup>3</sup></td><td>kilometer (km)<br/>kilogram (kg)</td></tr>
<tr><td>Mega</td><td>1,000,000</td><td style="text-align:center">10<sup>6</sup></td><td>megavolt (MV)<br/>megapascal (MPa)</td></tr>
<tr><td>Giga</td><td>1,000,000,000</td><td style="text-align:center">10<sup>9</sup></td><td>gigapascal (GPa)</td></tr>
</table></center><br/>
<b>Important terms used in measurement</b><br/><br/>
<b>Metrology</b><br/>
Metrology is the science of measurements such as length, thickness, diameter, angle, flatness, straightness, roundness, profiles, and surface roughness.<br/><br/>
<b>Calibration</b><br/>
A fundamental concept in quality assurance is the calibration of measuring instruments. Calibration is a word, which is sometimes misunderstood. Calibration of an instrument means determining by how much the instrument reading is in error by checking it against a measurement standard of known error.<br/>
A calibration is thus not usually associated with approval. It "only" gives information about the error of the equipment with respect to an accepted reference value. As a consequence, it is up to the user to decide whether the equipment is sufficiently good to perform a certain measurement. One possibility is to have the instrument certified. We can always offer good advice if needed.<br/><br/>
<b>Inspection</b><br/>
Inspection involves measurement, investigation or testing of one or more characteristics of a product, and includes a comparison of the results with specified requirements in order to determine whether the requirements have been fulfilled.<br/><br/>
<b>Gauging</b><br/>
The process of determining whether the dimensions of a part are larger or smaller than some established standard, or standards, by direct or indirect methods. It determines conformance of part feature without providing numerical value.<br/><br/>
<b>Measurand</b><br/>
Particular quantity subject to measurement is known as measurand.<br/><br/>
<b>Measurable quantity</b><br/>
Attribute of a phenomenon, body or substance that may be distinguished qualitatively and determined quantitatively.<br/><br/>
<b>Error</b><br/>
"Error" does not mean "mistake". If you have made a mistake, you redo the measurement. "Error" and "uncertainty" are scientific measurement synonyms. Error of a measuring instrument is the indication of a measuring instrument minus a ‘true’ value of the corresponding input quantity, i.e. it has a sign.<br/><br/>
<b>Uncertainty</b><br/>
Uncertainty of measurement is a parameter, associated with the result of a measurement that characterizes the dispersion of the values that could reasonably be attributed to the measurand. It can also be expressed as an estimate characterizing the range of values within which the true value of a measurand lies.<br/><br/>
<b>Basic dimension</b><br/>
The ideal value of a dimension according to designer, from which variations are tolerated.<br/><br/>
<b>Tolerances</b><br/>
The amount of variation in basic dimension that is tolerated without impairing the functional fitness of design part. Necessary and permissible deviation from a desired dimension because no part can be produced exactly to a specified dimension economically.<br/><br/>
<b>Limits</b><br/>
The maximum and minimum dimensions defining the boundaries of the tolerance zone.<br/><br/>
<b>Clearance</b><br/>
The difference in size between mating parts when the male part is smaller than the inner dimension of female part.<br/><br/>
<b>Interference</b><br/>
The difference in size between mating parts when size of male part is greater then the corresponding internal dimension of the female part.<br/><br/>
<b>Allowance</b><br/>
The specified difference between mating parts necessary to secure a specific class of fit. The intentional, desired difference (minimum clearance or maximum interference) between the dimensions of two mating parts.<br/><br/>
<b>Accuracy (Correctness)</b><br/>
The closeness of agreement between a test result and the accepted reference value.<br/>
Measurement always involves uncertainty. Accuracy and precision are two concepts, which convey the degree of certainty to which a measurement is known. Accuracy conveys how well a given measurement agrees with an accepted or true value. The accuracy of a measurement may be indicated by absolute error or relative error.<br/>
More precisely accuracy is the indication of how close a reading is to the true size of the part being measured. It deals with a number of measurements that confirm to standard. Normally in a workshop the terms precision and accuracy are used interchangeably.<br/><br/>
<i>Examples</i><br/>
Measurements can be extremely repeatable, but still be biased or contain a consistent difference from the true value.<br/>
Similarly, measurements of the same quantity can show wide variation but in general be centered around true value.<br/>
Typically, measurements show both systematic and precision errors.<br/><br/>
<b>Precision (number of significant figures)</b><br/>
Precision is a description of the agreement of a set of measures taken in the same manner. It is the indication of the repeatability by which a dimension can be gauged or measured. This refers to the degree of exactness. The precision of a measurement can be expressed using absolute deviation, relative deviation, significant figures, or tolerance. The precision of a measurement should always correspond to the precision of the equipment used to take the measurement. Ideally, the engineer strives to make measurements that have a high degree of accuracy and precision. Any measurement made to degree finer than one-sixty-fourth (1/64) of an inch or one half millimeter can be considered a precision measurement.<br/><br/>
<b>Repeatability</b><br/>
Precision under repeatability conditions. Whereas repeatability conditions are where independent test results are obtained with the same method on identical test items in the same laboratory by the same operator using the same equipment within short intervals of time.<br/><br/>
<b>Reproducibility</b><br/>
Precision under reproducibility conditions. Wheras, reproducibility conditions are where test results are obtained with the same method on identical test items in different laboratories with different operators using different equipment.<br/><br/>
<b>Stability</b><br/>
Stability refers to the ability of a measuring instrument to maintain constant its metrological characteristics with time.<br/><br/>
<b>Traceability</b><br/>
Traceability means that a measured result can be related to stated references, usually national or international standards, through an unbroken chain of comparisons, all having stated uncertainties.<br/><br/>
<b>Resolution (Sensitivity)</b><br/>
Sensitivity is the smallest difference in dimensions that an instrument can detect (the smallest marked increment on the instrument).<br/><br/>
<b>Trueness</b><br/>
The closeness of agreement between the average value obtained from a large series of test results and an accepted reference value. The measure of trueness is usually expressed in terms of bias.<br/><br/>
<b>Range</b><br/>
The range determines the maximum and minimum dimension, which can be measured by a particular instrument.<br/><br/>
<b>Least count</b><br/>
The least count is the smallest division that is marked on the instrument.<br/><br/>
<b>Control of measurement conditions</b><br/>
In every measurement there are four primary conditions that must be controlled:<br/>
1. Control of the part. This requires manufacturing controls to produce precisely machined surface. Accurate measurements may be taken from such surfaces.<br/>
2. Built in design features. Such features permit accurate readings to be taken consistently with the measuring instrument.<br/>
3. The engineer and his expertise in taking and reading a measurement.<br/>
4. Environment, Precision measurements require adequate temperature controls of the workpiece and measuring instruments. Vibration, dust and other environmental conditions that impair the accuracy of a measurement must be eliminated.<br/><br/>
The higher the degree of accuracy required, the more attention should be paid in controlling the four conditions.
<br/></div>
<dt style="text-align:right;"><b><a href="#header">Back to Top</a></b></dt>
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