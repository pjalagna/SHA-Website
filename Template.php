<?php
# template.php
function Template_main(){
include_once 'fin.php';
$ans = '';
$sec1 = <<< sec1
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<!-- page width 1250 -->
</head><body>

<div  style="border: medium none ;" height="100" width="1250">
sec1
;
$ans = $ans . $sec1;
$ans = $ans . fin("banner.html");
$ans = $ans . '</div>';
# work area
$sec2 = <<< sec2
<table>
<tr><td>
<div  style="border: medium none ;" height="700" width="30%">
sec2
;
$ans = $ans . $sec2;
include_once 'TocT.php'; // genTOC to $toc
$ans = $ans . doTocT() ; 
$ans = $ans . '</div></td>';

$sec3 = <<< sec3
<td>
<div  style="border: medium none ;" height="700" width="700">
sec3
;
$ans = $ans . $sec3;
$ans = $ans . '#%wk%';
$ans = $ans . "</div></td></tr></table>";
# footer
$sec4 = <<< sec4
<div  style="border: medium none ;" height="150" width="100%">
sec4
;
$ans = $ans . $sec4;
$ans = $ans . fin("footerFrame.html");
$ans = $ans . "</div>";
$ans = $ans . "</body></html>";
return($ans);
} # main
