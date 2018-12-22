<?php
/*
file page2.php
pja 12-15-2018
input (catNum,ix)
*/
include_once 'fin.php';
include_once 'strParser.php';

function loadPage2(){
// get cat, ix
$cat = $_REQUEST['cat'];
$ix = $_REQUEST['ix'];
// get PageTemplate
include_once 'Template.php';
$pg2 = Template_main();
// get wk2
$wk = loadWork2($cat,$ix);
// substitute
$pg2 = str_replace('#%wk%',$wk,$pg2);
// ret
return($pg2);
} // loadPage2

// build work area
function loadWork2($cat,$ix){
    include_once 'LoadWkp2.php';
    $ans = LoadWkp2Main($cat,$ix);
    return($ans);
} // loadWork2($cat,$ix)

print(loadPage2());
?>
