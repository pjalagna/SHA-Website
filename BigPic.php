<?php
# file bigPic.php(fx)
include_once 'fin.php';
include_once 'zDAO.php';
#t3c3
function loadPage3(){
$cat = $_REQUEST['cat'];
$ix = $_REQUEST['ix'];
$picURL = getXByCatIx('picURL',$cat,$ix);
$label = getXByCatIx('label',$cat,$ix);
$box1 = <<<box1D
<table style="width: 100%;" border="3">
<tbody><tr>
<td> .. </td><td> <center> %pic% </center> </td><td> .. </td>
</tr>
<tr>
<td> .. </td><td> 
box1D
;
// substitute
$box1 = str_replace("%pic%",$label,$box1);
print($box1);

$box1a = <<<box1aD
<center>
<img style="border: 0px solid ; width: %dx%px; height: %dy%px;" alt="" src="%picURL%"> 
</center>
box1aD
;
$rawX = getXByCatIx('rawX',$cat,$ix);
$rawY = getXByCatIx('rawY',$cat,$ix);
if ($rawX <= $rawY) { 
    $dx=1500; 
    $dy= ($rawX/$rawY * 1500); 
} else { 
    $dy = 1000;
    $dx = ($rawY/$rawX)*1000;
} //
$box1a = str_replace('%picURL%',$picURL,$box1a);
$box1a = str_replace('%dx%',$dx,$box1a);
$box1a = str_replace('%dy%',$dy,$box1a);
print($box1a);

$box2 = <<<box2D
</td><td> .. </td>
</tr>
<tr>
<td> 
<input type='button' name='left'>&lt;</input>
</td>
<td> .. </td>
<td> 
<input type='button' name='right'>&gt;</input>
</td>
</tr>
</tbody></table>
box2D
;
print($box2);
} //
loadPage3();
?>
