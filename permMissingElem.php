<?php


function solution($A) {
    
    // find missing number in array of integers
    // time complexity O(n), array may be empty, elements are distinct integers in range [1...(N+1)]
    
    // calculate triangular number for N+1, then subtract the sum of the array
    
    // 100% first time!
    
    function triangular($n){
        return $n*($n + 1)/2;
    }
    
    $n = count($A);

    $plusOneSum = triangular($n+1);
    
    $sum = 0;
    
    for ($i = 0; $i <= $n - 1; $i++){
        $sum += $A[$i];
    }
    
    echo "$plusOneSum $sum<br>";
    
    return $plusOneSum - $sum;
    
} 


//$A = array(2,3,1,5);
$A = array(1,3);

print_r(solution($A));

?>

