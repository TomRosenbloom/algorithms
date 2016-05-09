<?php


function solution($A) {
    
    // time complexity is expected to O(n) so that rules out brute force
    // i.e. can't just iterate over the whole array for each possible value of P
    // was thinking prefix sumes, but...
    // if we sum the entire array, then we can go through once keeping a running
    // total and subtracting that from the array sum

    // this is really doing my head in - just can't get a 100% correct solution (got 83%)
    // that works with +ve/-ve numbers and/or an array of two e.g. [1000,-1000]
    // the problem is always around initialising the smallest difference
    
    // ...so let's try using prefix sums
    
    
    $N = count($A);
 
    $sum = 0;
    foreach ($A as $value) {
        $sum += $value;
    }
    
    
    
//    $firstPart = $A[0];
//    $smallestDiff = abs(($sum - $A[0]) - $A[0]);
//    for($i = 1; $i <= $N-1; $i++) {
//        $firstPart += $A[$i];
//        $secondPart = $sum - $firstPart;
//        $diff = abs($secondPart - $firstPart);
//        echo "$firstPart $secondPart $diff $smallestDiff<br>";
//        if($diff < $smallestDiff){
//            $smallestDiff = $diff;
//        }
//    } 
    
//    return $smallestDiff;
    
    // can do something with recursion to combine the two loops?
    // so we make the sum as we go in and test the diffs as we back out...
    
//    function tapeEq($A,$N,$i,$sum){
//        echo "$sum<br>";
//        if($i == $N){
//            return $sum;
//        } else {
//            $sum += $A[$i];
//            $i++;            
//            return tapeEq($A,$N,$i,$sum);
//        }
//    }
//    
//    return tapeEq($A,$N,0,0);    
    
} 

//$A = array(1000,-1000);
$A = array(3,1,2,4,3);

print_r(solution($A));

?>

