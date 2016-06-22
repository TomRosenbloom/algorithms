<?php

function solution($A) {
    
    // double slice
    // this is really badly explained...
    // what they mean is slice one is A[x+1] to A[y-1] and slice two is A[y+1] to A[z-1]
    // so the values of x, y and z are excluded, and the 'double slice' is
    // effectively A[x+1] to A[z-1] minus A[y]
    
    // my previous attempt was completely wrong headed (but scored surprisingly highly nevertheless)
    // depressing, but I had a gut feeling it wasn't right...
    
    // the correct solution is to do two passes of the array, finding:
    // (1st time) the maximum ending at position i
    // (2nd time) the maximum starting at position i
    // and creating arrays of these values
    // then do a third loop trying the totals of maxending[i] + maxStarting[i]
    
    $n = count($A);
    
    $sumTo = 0;
    $maxTo = 0;
    $maxToArr = array_fill(0, $n,0);    
    
    $sumFrom = 0;
    $maxFrom = 0;
    $maxFromArr = array_fill(0, $n,0);    
    
    for($i = 1; $i < $n-1; $i++){
        $sumTo = max(0,$sumTo + $A[$i]);
        $maxTo = max($maxTo,$sumTo);
        $maxToArr[$i] = $maxTo;
    }
    
    for($i = $n-2; $i >= 1; $i--){
        $sumFrom = max(0,$sumFrom + $A[$i]);
        $maxFrom = max($maxFrom,$sumFrom);
        $maxFromArr[$i] = $maxFrom;
    }    
    
    echo implode(",",$maxToArr) . "<br>";
    echo implode(",",$maxFromArr) . "<br>";
    
    $maxDblSlice = 0;
    
    for($i = 1; $i < $n-1; $i++){ 
        echo $maxToArr[$i-1]." ".$maxFromArr[$i+1]."<br>";
        $dblSlice = $maxToArr[$i-1] + $maxFromArr[$i+1];
        $maxDblSlice = max($dblSlice,$maxDblSlice);
    }
    
    return($maxDblSlice);
    
}

$A = array(3,2,6,-1,4,5,-1,2);
//$A = array(3,-2,2,6,-1,4,5,-1,2);


print_r(solution($A));

?>

