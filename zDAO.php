<?php
/* file zDAO.php
pja 12-16-2018

directory database routines
Page_fixedYByWkix(wkix){ // -> fixedY
cats_catNameByCix($cix) { // -> catName
cat_profileListBycatName($catName) { -> profileList
firstProfile(profileList){ // -> list(profile,iox)
nextProfile(profileList){ // -> list(profile,iox) or iox =-1
picURL(profile){
rawX(profile){
rawY(profile){
artStatement(profile){
SeriesStatement($cat){
*/
include_once 'fin.php';
include_once 'strParser.php';
include_once 'zDAO.php';

function getXByCatIx($token,$cat,$ix){
// get profile tag entry by cat,ix
// get profile.txt
$profilex = fin('db/root/profile.txt');
// front = <profile index='cat.$cat.index.$ix>
$front = "<profile index='cat." . $cat . ".index." . $ix . "'>";
// $profile = front , "</profile>"
list($profile,$nop) = s2split($profilex,$front,"</profile>",0);
// fan by usage
if ($token == 'picURL') {
   $ans = getPicURL($profile);
} elseif ($token == 'rawX') {
   $ans = getrawX($profile);
} elseif ($token == 'rawY') {
   $ans = getrawY($profile);
} elseif ($token == 'label') {
   $ans = getLabel($profile);
} else {
  $ans = '';
} // endif
return($ans);
} // $url = getXByCatIx($cat,$x);
function Page_fixedYByWkix($wkix){
$pagex = fin('db/root/Page.txt');
$front = "<work index='" . $wkix . "'>";
list($wkx,$iox) = s2split($pagex,$front,'</work>',0);
list($fixedY,$iox) = s2split($wkx,'<fixedY>','</fixedY>',0);
return($fixedY);
} // Page_fixedYByWkix(wkix)

function cats_catNameByIx($cix){
//open cats
$cats = fin('db/root/cats.txt');
// <cat index='cix'> to <cat>
$front = "<cat index='" . $cix . "'>";
list($catx,$iox) = s2split($cats,$front,'</cat>',0);
// <catName> to </catName>
list($catName,$iox) = s2split($catx,'<catName>','</catName>',0);
return($catName);
} // cats_catNameByIx($cix)

function cat_profListByCatName($catName){
// get cat
$catx = fin('db/root/cat.txt');
// <cat index'$catName'> to <cat>
$front = "<cat index='" . $catName . "'>";
list($catl,$iox) = s2split($catx,$front,'</cat>',0);
// <list> to <list>
list($listx,$iox) = s2split($catl,'<list>','</list>',0);
// ret listx
return($listx);
} // cat_profListByCatName($catName)

function firstProfile($profList,$iox){
//list($profName,$iox) = fistProfile($profList,$iox)
list($profName,$iox) = s2split($profList,'<profile>','</profile>',0);
return(array($profName,$iox));
} // firstProfile($profList,$iox)

function nextProfile($profList,$iox){
list($profName,$iox) = s2split($profList,'<profile>','</profile>',$iox);
return(array($profName,$iox));
} // nextProfile($profList,$iox)

function getProfile($profName){
# get profile
$profilex = fin('db/root/profile.txt');
// <profile index='$profName'> to </profile>
$front = "<profile index='" . $profName . "'>";
list($profile,$nop) = s2split($profilex,$front,'</profile>',0);
return($profile);
} // getProfile($profName)

function getPicURL($profile){
list($url,$nop) = s2split($profile,'<picURL>','</picURL>',0);
return($url);
} // getPicURL($profile)

function getrawX($profile){
list($url,$nop) = s2split($profile,'<rawX>','</rawX>',0);
return($url);
} // getrawX($profile)

function getrawY($profile){
list($url,$nop) = s2split($profile,'<rawY>','</rawY>',0);
return($url);
} // getrawY($profile)

function getLabel($profile){
list($url,$nop) = s2split($profile,'<label>','</label>',0);
return($url);
} // getrawY($profile)

function GetSeriesStatement($cat){
    $catName = cats_catNameByIx($cat);
    // get cat
    $catx = fin('db/root/cat.txt');
    // <cat index'$catName'> to <cat>
    $front = "<cat index='" . $catName . "'>";
    list($catl,$iox) = s2split($catx,$front,'</cat>',0);
    list($ans,$nop) =
s2split($catl,'<SeriesStatement>','</SeriesStatement>',0);
    return($ans);
} // GetSeriesStatement($cat){

?>