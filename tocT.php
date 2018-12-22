<?php
/* file tocT.php
pja 12-17-2018
fails at while
generates the toc via cats.txt
*/
function doTocT(){
$toc1 = <<<toc1x
<table style="width: 200px; height: 600px;" name="toc-frame">
<tbody><tr> <td> 
toc1x
;

$entryT = <<<entryx
<table name="%label%">
<tbody><tr>
<td> ... </td> <td> ... </td> <td> 
<a href="Page2.php?ix=1&cat=%cat%">%label%</a> </td>
</tr>
</tbody>
</table>
entryx
;

$tocbox = '';

// get cats
include_once 'zDAO.php'; 
$cats = fin('db/root/cats.txt');
$ctr = 0;
$iox = 0;
// per cat get name, link
$c1 = 0;
while ($c1 == 0) {
	$ctr++; 
	$front = "<cat index='" . $ctr . "'>";
	list($catbox,$iox) = s2split($cats,$front,'</cat>',$iox);
	// print('test iox - catbox ' . $iox . ' - ' . $catbox . '  ');
	if ( $iox < 0 ) {
	   $c1 = -1 ; // break
	} else {
		// get label // fails here
		list($label,$nop) = s2split($catbox,'<label>','</label>',0);
		// get catName
		list($catName,$nop) = s2split($catbox,'<catName>','</catName>',0);
		// get template
		$entry = $entryT;
		// replace needle, new, str label/catName
		$entry = str_replace('%label%',$label,$entry);
		$entry = str_replace('%cat%',$catName,$entry);
		// add entry to tocbox
		$tocbox = $tocbox . $entry;
	} // endif
// repeat till catbox = -1 
} // wend
$toc2 = <<<toc2x
<br>
<br>
<table name="Contact">
<tbody><tr>
<td> ... </td> <td> Contact </td>
</tr>
</tbody></table>
<table name="about">
<tbody><tr>
<td> ... </td> <td> about </td>
</tr>
</tbody></table>
<table name="commercial">
<tbody><tr>
<td> ... </td> <td> commercial </td>
</tr>
</tbody></table>
<table name="Instagram">
<tbody><tr>
<td> ... </td> <td> instagram </td>
</tr>
</tbody></table>
<table style="width: 105px; height: 309px;" name="tocbuffer2">
<tbody><tr>
<td style="height: 305px;"> . </td>

</tr>
</tbody></table>

 </td> </tr>
</tbody></table>
toc2x
;

return($toc1 . $tocbox . $toc2 );
} // end doTocT()
?>