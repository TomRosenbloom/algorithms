<?php

// you can write to stdout for debugging purposes, e.g.
// print "this is a debug message\n";

function solution($A) {
    // write your code in PHP5.5
    
    // brute force: for each index, calculate the total to that point and the total after
    // no that's stupid - just separate the array into two as we go along and do array_sum
    
    $solutions = array();
    
    $arrLength = count($A);
    
    foreach($A as $key=>$val) {
        
        $belowArray = array_slice($A,0,$key);
        $aboveArray = array_slice($A,$key+1,$arrLength);
        
        $belowSum = array_sum($belowArray);
        
        $aboveSum = array_sum($aboveArray);
        
        echo "<p>Total below is ".$belowSum.", total above is ".$aboveSum."</p>";
        
        if($belowSum == $aboveSum) {  
            echo "got one: array key ".$key;
            $solutions[] = $key;
        }
         
    }
    
    return($solutions);     
    
} 
$A = array(-1, 3, -4, 5, 1, -6, 2, 1);
print_r(solution($A));

?>

