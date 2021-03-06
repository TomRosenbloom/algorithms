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
    //$maxTo = 0;
    $maxToArr = array_fill(0, $n,0);    
    
    $sumFrom = 0;
    //$maxFrom = 0;
    $maxFromArr = array_fill(0, $n,0);    
    
    for($i = 1; $i < $n-1; $i++){
        $sumTo = max(0,$sumTo + $A[$i]);
        //$maxTo = max($maxTo,$sumTo);
        $maxToArr[$i] = $sumTo;
    }
    
    for($i = $n-2; $i >= 1; $i--){
        $sumFrom = max(0,$sumFrom + $A[$i]);
        //$maxFrom = max($maxFrom,$sumFrom);
        $maxFromArr[$i] = $sumFrom;
    }    
    
    echo implode(",",$maxToArr) . "<br>";
    echo implode(",",$maxFromArr) . "<br>";
    
    $maxDblSlice = 0;
    
    for($i = 0; $i < $n-2; $i++){ 
        echo $maxToArr[$i]." ".$maxFromArr[$i+2]."<br>";
        $dblSlice = $maxToArr[$i] + $maxFromArr[$i+2];
        $maxDblSlice = max($dblSlice,$maxDblSlice);
    }
    
    return($maxDblSlice);
    
}

$A = array(3,2,6,-1,4,5,-1,2);
//$A = array(1,2,3,4,5,6,7,8);
//$A = array(-11, -53, -4, 38, 76, 80);
// this test fails - gives 114, but should be 72, no 112 (0,1,5)
// NO! (1,2,5) gives 114!

// the above solution now gets 100/100
// the crucial change was to make the sumTo and sumFrom arrays literally that
// i.e. sums for the whole array, not the maximum up to this point
// I got this by copying from CodeSays, but I don't really understand why it works
// given that the sums are for the whole array?
// something to do with the fact that what gets added to one side is taken from the other
// ...but basically I just don't have the intellect to understand this. Fuck.

// ok, we do the same thing in standard max slice i.e. comparing current sum
// with zero, but in this case we don't do the secondary step of comparing that with
// the current global max, we just store it in an array for later use
// It's perfectly simple really - in each array slot, we have the max slice up to this
// point (which may be more or less than the previous sum). It doesn't matter at 
// all what the starting point of the slice was, but there is still something that
// seems wrong and that is the fact that the sum at point i can be less than at
// an earlier point i-x, so it seems like we will be losing sight of a previous
// maximum, but the point is this:
// any decrease in the sum *to* this point is balanced by an increase in the 
// corresponding sum *from* this point



print_r(solution($A));

?>

