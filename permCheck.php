<?php


function solution($A) {
    
    // for an array of N integers, check if the array contains a 'premutation'
    // i.e. the integers 1 to N once only (in no particular order)
    // complexity O(n)/O(n)
    // The array might contain duplicate values, but not zeros or negative numbers
    // values could be greater than N 
    // - if there *is* any value greater than N or any duplicate values then the 
    // array is certainly not a permutation
    // Is it also true then that if there is *not* a value greater than N or any
    // duplicate then it *is* a permutation?
    // Yes I think so - so we could do this with a counting array, bailing out if
    // any value is duplicated or exceeds N
    // Does that satisfy o(n) space complexity?
    // In fact we don't need to create an actual counting array, but the counting array
    // that we *should* have i.e. [1,1,1,1..N]
    // then if we iterate through A and find either $A[$i] not in $C or > 1 that's a fail
    // the first test can be simplified as just if $A[$i] > $N
    
    // 100/100 first time, phew!

    
    $N = count($A);
    
    
    $C = array_fill(1,$N,0);
    
    
    // check the values that should be in A i.e. that values from 1 to N
    for ($i = 0; $i <= $N-1; $i++){

        echo "$A[$i]<br>";        
        
        if($A[$i] > $N){
            return 0;
        }
        
        $C[$A[$i]]++;
        
        echo implode(",",$C)."<br>";

        
        if($C[$A[$i]] > 1){ 
            return 0;
        }
    }
    
    return 1;
    
} 

$A = array(1);

print_r(solution($A));

?>

