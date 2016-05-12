<?php


function solution($A,$X) {
    
    // find the first position in the array where all the values from 1..X have occured
    // array is at least one element long, each element is an integer between 1 and X
    // complexity O(N) O(X)
    
    // do a variant of creating a counting array:
    // instead of incrementing counters we want to register whether each value has been found 
    // then stop when the number of registered unique values = X
    // perhaps create an array of X elements and delete them when they are found
    // then stop when the array is empty - but this will cause array index not found warnings
    // (plus you keep having to count the array)
    
    // the below gets 100/100
    // I had to cheat and google the solution - I was on the right lines but the key
    // mistake was using an array, when all it really needs is a decrementing counter
    

    
    $n = count($A);


    $C = array_fill(1, $X, 0);

    $uncovered = $X; // initially all are uncovered
    
    for($i = 0; $i < $n; $i++){
        
        if($C[$A[$i]] == 0){ // not yet covered
            $C[$A[$i]]++; // so cover
            $uncovered--; // decrement count of uncovered positions
            if($uncovered == 0){ // if all have been covered
                return $i;
            }
        } 

    }
    
    return -1;
    
} 


//$A = array(1,3,1,4,2,3,5,4);
//$X = 5;

//$A = array(1);
//$X = 1;

$A = array(1,3,1,4,2,3,4,4);
$X = 5;

print_r(solution($A,$X));

?>

