<?php


function solution($A) {
    
    // return the smallest positive integer (greater than 0) that does *not* appear in A
    // complexity O(N), O(N)
    // the array is at least one element in length and can include negative numbers
    
    // there could be massive gaps, e.g. [-1000, 1, 2000] so certainly don't want to make
    // a counting array per se
    
    // gaps generally are problematical, even if just '1' is not present as per [2,3]
    
    // there could be large runs of duplicate numbers
    
    // 
    
    // count integers from 1 and stop when we find one that isn't there
    // make an array of each unique value (doesn't need to count them)
    
    // this solution gets 100/25 = 66%
    // timed out on 'large' tests
    // detected time complexity is O(n**2)
    
    $N = count($A);
    $C = array();
    
    for($i = 0; $i <= $N-1; $i++){
        if($A[$i] > 0){
            $C[$A[$i]] = $A[$i]; 
        }
    } 
    sort($C);
    
    $i = 1;
    while($i < PHP_INT_MAX){
        $value = array_shift($C);
        if($value != $i){
            return $i;
        }
        $i++;
    }
    
} 

//$A = array(1,3,6,4,1,2);
//$A = array(-1000,1,2000);
$A = array(2,3);
//$A = array(3,6,4,2);

print_r(solution($A));

?>

