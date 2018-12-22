<?php
# file LoadWire1.php
/*
pja 12-13-2018  not completed

uses directory database db/root/[keyNme.keyIndex].txt
cats
-- index label seriesStatement
cat
-- catN,
-- ix,
-- picURL
-- label
-- locationURL
-- rawX
-- rawY
-- artStatement
*/
function DoloadWire1() {
include_once 'fin.php';
include_once 'strParser.php';
include_once 'zDAO.php';

$db = 'db/root/';
$Screen = 'Page1';
/* real code use after test
$ix = rand(1 ,12);
$cat = rand(1 ,4);
*/
$cat = 1; # test
$ix = rand(1 ,12);
//print('cat =(' . $cat . ")");
// print('ix =(' . $ix . ")");
// wire1 needs detX,cat,ix,picURL, statement
// use dx dy * 7
$factor = 700;
$rawX = getXByCatIx("rawX",$cat,$ix);
$rawY = getXByCatIx("rawY",$cat,$ix);
if ($rawX <= $rawY) { 
    $dx=$factor; 
    $dy= floor(($rawX/$rawY * $factor)); 
} else { 
    $dy = $factor;
    $dx = floor(($rawY/$rawX)*$factor);
} //

$url = getXByCatIx("picURL",$cat,$ix);
$statement = GetSeriesStatement($cat) ;
# load wire1 template
$wire1 = fin('wire1.html');
# substitutes
// dx
$wire1 = str_replace('%dx%',$dx,$wire1);
// dy
$wire1 = str_replace('%dy%',$dy,$wire1);
#cat
$wire1 = str_replace('%cat%',$cat,$wire1);
#ix,
$wire1 = str_replace('%ix%',$ix,$wire1);
#picURL
$wire1 = str_replace('%picURL%',$url,$wire1);
// statment
$wire1 = str_replace('%statement%',$statement,$wire1);
return($wire1);
} #loadWire1
?>
