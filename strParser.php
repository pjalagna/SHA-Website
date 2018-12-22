<?php
/*
file strParser.php
pja 12-13-2018 

raw parse routines for strings
-- (ch,iox) = sioi(str,iox)
-- iox = sioo(iox)
(wd,iox) = swd(str,iox)
(ph,iox) = s2split(str,front,back,iox)
iox = swhite(str,iox)
*/
function sioi($instr,$iox){
    $ans = $instr[$iox];
    $riox = $iox + 1;
    return(array($ans,$riox));
} # sioi
function sioo($iox){
    $riox = $iox - 1;
    return($riox);
} # sioo

function s2split($inString,$front,$back,$offset)
{
   // returns 
         // new offset and
         // text between front token and back token after offset
  // OR -1,””
  $status = 0;
  If ($offset > strlen($inString)){ //1
      $status =-1;
  }else{ // 1
      // set bo to offset
     $bo = $offset;
     // find front after bo if error ans = -1 else set fo adjusted by Len of front
   $fo = strpos($inString,$front,$bo);
   //-----print('s2split fo - bo ' . $fo . ' - ' . $bo );
   if ($fo === false){ // 2 // if error ans =-1
       $status = -1;
   }else{
	   $fo = $fo + strlen($front); 
		  // find back after fo 
		  // if error ans =-1 else set bo
	   $bo = strpos($inString,$back,$fo);
	   $ans = substr($inString,$fo,$bo-$fo);
		  // Clip fo,bo-fo to ans
    } //endif 2
 } //endif 1
 if ($status == 0){
     $newoffset = $bo + strlen($back);
 }else{
     $newoffset = -1;
     $ans = '';
 } // endif
 return (array( trim ($ans),$newoffset));
} // s2split

?>