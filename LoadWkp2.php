<?php
// file p2try.php
// pja 12-18-2018
// URL is a hack 
// --- need to use zDAO getPicURL(cat,ix)
// --- profile.txt needs full path from main per url
// click send you to bigPix(cat,ix)
// move to main dir change all URL calls to inc $URL[0].
function LoadWkp2Main($cat,$ix) {
global  $p1,$pn1,$pn3,$pn2,$pn4,$pt,$img2;

$p1 = <<<pix
<html> 
<head> <title> Page2 </title> </head>
<body>
pix
;


$pn1 = <<<pn1x
<table name='n1.1x3' >
<tr> <td> %n1.1% </td> </tr>
<tr> <td> %n1.2% </td> </tr>
<tr> <td> %n1.3% </td> </tr>
</table>
pn1x
;

$pn3 = <<<pn3x
<table name='n3.3x1' ><tr>
<td> %n3.1% </td> 
<td> %n3.2% </td>
<td> %n3.3% </td> 
</tr></table>
pn3x
;

$pn2 = <<<pn2x
<table name='n2.4x1' > <tr>
<td style="width: 175px; height: 175px"> %n2.1% </td>
<td style="width: 175px; height: 175px"> %n2.2% </td>
<td style="width: 175px; height: 175px"> %n2.3% </td>
<td style="width: 175px; height: 175px"> %n2.4% </td>
</tr></table>
pn2x
;

$pn4 = <<<pn4x
<table name='n4.1x2' >
<tr> <td> %n4.1% </td> </tr>
<tr> <td> %n4.2% </td> </tr>
</table>
pn4x
;

$pt = <<<ptx
</body>
</html>
ptx
;

$img2 = <<<imgx
<center>
<a href="BigPic.php?ix=%ix%&cat=%cat%">
<img style="width: %detXpx; height: 175px;" alt="" src="%picURL%" > 
</a>
</center>
imgx
;
   return( $p1 . dopn1($cat,$ixc) . $pt );
} //dop2

function dopn1($cat,$ixc){
$ixc =0;
global $pn1;
$ans = $pn1;
$a = dopn2a($cat,$ixc);
$b = dopn3($cat,$ixc);
$c = dopn2b($cat,$ixc);
$ans = str_replace('%n1.1%',$a,$ans);
$ans = str_replace('%n1.2%',$b,$ans);
$ans = str_replace('%n1.3%',$c,$ans);
return($ans);
} // dopn1

function dopn2a($cat,$ixc){
 global $pn2, $img2;
 include_once 'zDAO.php';
 $grand = '';
 $ans = $pn2; // n2.1 --n2.4
 for ($x = 1; $x <= 4; $x++) {
	 $box = $img2; // ix , cat , picURL
	 $box = str_replace('%ix%',$x,$box);
	 $box = str_replace('%cat%',$cat,$box);
	 $url = getXByCatIx("picURL",$cat,$x);
	 $detX = (getXByCatIx("rawY",$cat,$x)/175)*getXByCatIx("rawX",$cat,$x);
	 $box = str_replace('%picURL%',$url,$box);
	 $box = str_replace('%detX%',$detX,$box);
	 $tok = '%n2.' . $x . '%';
	 $ans = str_replace($tok,$box,$ans);
 } // end for
 return($ans);
} // dopn2a

function dopn2b($cat,$ixc){
global $pn2, $img2;
 include_once 'zDAO.php';
 $ans = $pn2; // n2.1 --n2.4
 for ($x = 1; $x <= 4; $x++) {
	 $box = $img2; // ix , cat , picURL
	 $jz = $x + 4;
	 $box = str_replace('%ix%',$jz,$box);
	 $box = str_replace('%cat%',$cat,$box);
	 $url = getXByCatIx("picURL",$cat,$jz);
	 $box = str_replace('%picURL%',$url,$box);
	 $tok = '%n2.' . $x . '%';
	 $ans = str_replace($tok,$box,$ans);
 } // end for
 return($ans);
} // dopn2b

function dopn3($cat,$ixc){
global $pn3, $img2;
include_once 'zDAO.php';
   // prep 3.2
   // series statement(cat)
   include_once 'zDAO.php';
   $box = GetSeriesStatement($cat);
   $ans = $pn3; // n3.1 - 3
   $a = dopn4a($cat);
   $b = dopn4b($cat);
   $ans = str_replace('%n3.1%',$a,$ans);
   $ans = str_replace('%n3.2%',$box,$ans);
   $ans = str_replace('%n3.3%',$b,$ans);
   return($ans);
} //dopn3

function dopn4a($cat){
global $pn4, $img2;
include_once 'zDAO.php';
    $ans = $pn4; // 4.1 - 2
    $box = $img2;
    $a =  getXByCatIx("picURL",$cat,9);
    $box = str_replace('%ix%','9',$box);
    $box = str_replace('%cat%',$cat,$box);
    $box = str_replace('%picURL%',$a,$box);
    $ans = str_replace('%n4.1%',$box,$ans);
    $box = $img2;
    $b = getXByCatIx("picURL",$cat,10);
    $box = str_replace('%ix%','10',$box);
    $box = str_replace('%cat%',$cat,$box);
    $box = str_replace('%picURL%',$b,$box);
    $ans = str_replace('%n4.2%',$box,$ans);
    return($ans);
} //

function dopn4b($cat){
global $pn4, $img2;
include_once 'zDAO.php';
    $ans = $pn4; // 4.1 - 2
    $box = $img2;
    $a = $url = getXByCatIx("picURL",$cat,11);;
    //print("box(" . $box . ")");
    $box = str_replace('%ix%','11',$box);
    $box = str_replace('%cat%',$cat,$box);
    $box = str_replace('%picURL%',$a,$box);
    //print("box(" . $box . ")");
    $ans = str_replace('%n4.1%',$box,$ans);
    $box = $img2;
    $b = $url = getXByCatIx("picURL",$cat,12);
    $box = str_replace('%ix%','12',$box);
    $box = str_replace('%cat%',$cat,$box);
    $box = str_replace('%picURL%',$b,$box);
    $ans = str_replace('%n4.2%',$box,$ans);
    return($ans);
} //
/* test as
include 'p2Try.php';
$cat = "today";
print(dop2($cat,3));

*/
?>