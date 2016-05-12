<?php


function solution($A) {
    
    // return the smallest positive integer (greater than 0) that does *not* appear in A
    // complexity O(N), O(N)
    // the array is at least one element in length and can include negative numbers
    // there could be massive gaps, e.g. [-1000, 1, 2000] so certainly don't want to make
    // a counting array per se
    // gaps generally are problematical, even if just '1' is not present as per [2,3]
    // there could be large runs of duplicate numbers
    
    // had to cheat and google this one...
    // fuck this is still only 80/75
    // fails on:
    // single element, got 1 expected 2
    // large_2, shuffled sequence 1,2, ..., 100000 (without minus), got 100000 expected 100001
    
    $n = count($A);
    
    $occurrence = array_fill(1, $n, False);
    
    for($i = 0; $i < $n; $i++){
        echo "<br>$i $A[$i]<br>";
        if($A[$i] > 0 && $A[$i] < $n){
            $occurrence[$A[$i]] = True;
        }
    }
    
    var_dump($occurrence);
    echo "<br>";
    
    for ($i = 1; $i < $n+1; $i++){
        if($occurrence[$i] === False){
            return $i;
        }
    }
} 

//$A = array(1,3,6,4,1,2);
//$A = array(-1000,1,2000);
$A = array(2);
//$A = array(3,6,4,2);

print_r(solution($A));

?>

