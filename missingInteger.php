<?php


function solution($A) {
    
    // return the smallest positive integer (greater than 0) that does *not* appear in A
    // complexity O(N), O(N)
    // the array is at least one element in length and can include negative numbers
    
    // there could be massive gaps, e.g. [-1000, 1, 2000] so certainly don't want to make
    // a counting array per se
    
    // find max +ve int in A
    // begin a loop starting at 1 and terminating at max
    // if a[x] = i is not found, return as answer
    // ...but we need a counting array to determine if it is found or we'll have to go 
    // through the whole array each time
    // ...so build the array as we go?
    
    // as we build the array, the current candidate for smallestNot i value of current value + 1
    
    // smallestNot = 1
    // for each A
    // C[A[i]]++
    // so we get C[-1000=>1,1=>1,2000=>1] or [1=>2,2=>1,3=>1,4=>1,6=>1] etc.
    // then for each C as key val
    // if key == smallestNot + 1 
    // smallestNot = key, else return smallestNot
    // (what about case where all integers are represented?)
    
    $N = count($A);
    $smallestNot = 1;
    
    $C = array();
    
    for($i = 0; $i <= $N-1; $i++){
        $C[$A[$i]] = $A[$i]; // don't need an actual count, just a flag
    }
    
    //print_r($C); // aargh, the array is not in order
    
    sort($C); // sort array, nb the point of using this array is 
    //so we are sorting an array of count(C) elements, not max(A)
    print_r($C);
    
    for($i = 0; $i <= count($C)-1; $i++){
        $nextInteger = $C[$i] + 1;
        $nextValue = $C[$i+1];
        echo "<br>$C[$i] $nextInteger $nextValue $smallestNot<br>";
        if($C[$i] > 0){
            if($nextValue == $nextInteger){
                $smallestNot = $C[$i];
            } else {
                return $nextInteger;
            }        
        }
    }
    
    
} 

//$A = array(1,3,6,4,1,2);
//$A = array(-1000,1,2000);
$A = array(2,3);

print_r(solution($A));

?>

